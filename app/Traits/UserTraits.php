<?php

namespace App\Traits;

use App\Classes\Common;
use App\Classes\Notify;
use App\Http\Requests\Api\Customer\ImportRequest;
use App\Imports\UserImport;
use App\Models\Role;
use App\Models\UserWarehouse;
use Examyou\RestAPI\ApiResponse;
use Examyou\RestAPI\Exceptions\ApiException;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

trait UserTraits
{
    public $userType = "";

    public function modifyIndex($query)
    {
        $warehouse = warehouse();
        $request = request();

        $query = $query->leftJoin('user_warehouse', 'users.id', '=', 'user_warehouse.user_id')
            ->join('roles', 'roles.id', '=', 'users.role_id');

        if ($this->userType == 'staff_members') {
            $user = user();
            $query = $query->where('users.company_id', $user->company_id);
        }

        // records of current warehouse
        $query = $query->where(function ($qury) use ($warehouse) {
            $qury->where('user_warehouse.warehouse_id', $warehouse->id)
                ->orWhere('roles.name', '=', 'admin');
        });

        if ($request->has('dates') && $request->dates != '') {
            dd($request);
            $dates = explode(',', $request->dates);
            $startDate = $dates[0];
            $endDate = $dates[1];

            $query = $query->whereRaw('users.created_at ==', [$startDate]);
        }



        $query = $query->where('users.user_type', $this->userType);

        return $query;
    }

    public function storing($user)
    {
        $loggedUser = user();
        $request = request();
        $warehouse = warehouse();
        $company = company();

        if ($user->user_type != $this->userType) {
            throw new ApiException("Don't have valid permission");
        }

        if ($user->user_type == 'staff_members') {
            $user->role_id = $loggedUser->ability('admin', 'assign_role') && $request->has('role_id') && $request->role_id ? $this->getIdFromHash($request->role_id) : $loggedUser->role_id;
        }

        $user->warehouse_id = $loggedUser->hasRole('admin') ? $request->warehouse_id : $warehouse->id;
        $user->created_by = $loggedUser->id;
        $user->lang_id = $company->lang_id;

        return $user;
    }

    public function stored($user)
    {
        $this->saveAndUpdateRole($user);

        // Notifying to Warehouse
        Notify::send('staff_member_create', $user);

        // Updating Company Total Users
        Common::calculateTotalUsers($user->company_id, true);
    }

    public function updating($user)
    {
        $loggedUser = user();
        $request = request();
        // Can not change role because only one
        // Admin exists for whole app
        if ($user->user_type == "staff_members") {
            $adminRoleUserCount = Role::join('role_user', 'roles.id', '=', 'role_user.role_id')
                ->where('roles.name', '=', 'admin')
                ->count('role_user.user_id');
            if ($adminRoleUserCount <= 1 && $user->isDirty('role_id')) {
                $newRole = Role::find($user->role_id);
                if ($newRole && $newRole->name != 'admin') {
                    throw new ApiException("Can not change role because app have only one admin");
                }
            }
        }

        if ($loggedUser->id == $user->id && $user->isDirty('role_id')) {
            throw new ApiException("You can not change your role.");
        }

        if ($user->user_type != $this->userType) {
            throw new ApiException("Don't have valid permission");
        }

        // If logged in user is not admin
        // then cannot update user who are
        // of other warehouse
        if (!$loggedUser->hasRole('admin') && $user->user_type == 'staff_members' && $loggedUser->warehouse_id != $user->warehouse_id) {
            throw new ApiException("Don't have valid permission");
        }

        // Demo mode admin cannot be edit
        // email, password, status, role_id
        if (env('APP_ENV') == 'production' && ($user->isDirty('password') || $user->isDirty('email') || $user->isDirty('status') || $user->isDirty('role_id'))) {
            if ($user->user_type == 'staff_members' && ($user->getOriginal('email') == 'admin@example.com' || $user->getOriginal('email') == 'stockmanager@example.com' || $user->getOriginal('email') == 'salesman@example.com')) {
                throw new ApiException('Not Allowed In Demo Mode');
            }
        }

        if ($user->user_type == 'staff_members') {
            $user->role_id = $loggedUser->ability('admin', 'assign_role') && $request->has('role_id') && $request->role_id ? $this->getIdFromHash($request->role_id) : $user->getOriginal('role_id');
        }

        if ($loggedUser->hasRole('admin')) {
            $user->warehouse_id = $request->warehouse_id;
        }

        return $user;
    }

    public function updated($user)
    {
        $this->saveAndUpdateRole($user);

        // Notifying to Warehouse
        Notify::send('staff_member_update', $user);
    }

    public function saveAndUpdateRole($user)
    {
        $request = request();

        // Only For Staff Members
        if ($user->user_type == 'staff_members') {

            DB::table('role_user')->where('user_id', $user->id)->delete();
            $user->attachRole($user->role_id);
        }

        $role = Role::find($user->role_id);
        $roleName = $role && $role->name ? $role->name : '';

        // Deleting Staff Member Warehouses
        UserWarehouse::where('user_id', $user->id)->delete();
        if ($request->has('warehouses') && $roleName != 'admin') {
            foreach ($request->warehouses as $selectedWarehouse) {
                $selectedWarehouseId = Common::getIdFromHash($selectedWarehouse);

                $userWarehouse = new UserWarehouse();
                $userWarehouse->user_id = $user->id;
                $userWarehouse->warehouse_id = $selectedWarehouseId;
                $userWarehouse->save();
            }
        }

        return $user;
    }

    public function destroying($user)
    {
        if ($user->user_type != $this->userType) {
            throw new ApiException("Don't have valid permission");
        }

        $loggedUser = user();
        $loggedUserCompany = company();

        if ($loggedUserCompany->admin_id == $user->id) {
            throw new ApiException('Can not delete company root admin');
        }

        if (env('APP_ENV') == 'production' && $user->user_type == 'staff_members' && ($user->getOriginal('email') == 'admin@example.com' || $user->getOriginal('email') == 'stockmanager@example.com' || $user->getOriginal('email') == 'salesman@example.com')) {
            throw new ApiException('Not Allowed In Demo Mode');
        }

        // If application have only one admin
        // Then staff member cannot be deleted
        if ($user->user_type == "staff_members") {
            if ($user->role_id) {
                $userRole = Role::find($user->role_id);

                if ($userRole && $userRole->name == 'admin') {
                    $adminRoleUserCount = Role::join('role_user', 'roles.id', '=', 'role_user.role_id')
                        ->where('roles.name', '=', 'admin')
                        ->count('role_user.user_id');

                    if ($adminRoleUserCount <= 1) {
                        throw new ApiException('You are the only admin of app. So not able to delete.');
                    }
                }
            }

            if (!$loggedUser->hasRole('admin') && $loggedUser->warehouse_id != $user->warehouse_id) {
                throw new ApiException("Don't have valid permission");
            }
        }

        if ($loggedUser->id == $user->id) {
            throw new ApiException('Can not delete yourself.');
        }

        return $user;
    }

    public function destroyed($user)
    {
        // Updating Company Total Users
        Common::calculateTotalUsers($user->company_id, true);

        // Notifying to Warehouse
        Notify::send('staff_member_delete', $user);
    }

    public function import(ImportRequest $request)
    {
        if ($request->hasFile('file')) {
            Excel::import(new UserImport($this->userType), request()->file('file'));
        }

        return ApiResponse::make('Imported Successfully', []);
    }
};
