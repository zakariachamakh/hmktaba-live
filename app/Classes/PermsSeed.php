<?php

namespace App\Classes;

use App\Models\Permission;
use Nwidart\Modules\Facades\Module;

class PermsSeed
{
    public static $mainPermissionsArray = [
        // Shifts
        'shifts_view' => [
            'name' => 'shifts_view',
            'display_name' => 'Shift View'
        ],
        'shifts_create' => [
            'name' => 'shifts_create',
            'display_name' => 'Shift Create'
        ],
        'shifts_edit' => [
            'name' => 'shifts_edit',
            'display_name' => 'Shift Edit'
        ],
        'shifts_delete' => [
            'name' => 'shifts_delete',
            'display_name' => 'Shift Delete'
        ],

        // Attendances
        'attendances_view' => [
            'name' => 'attendances_view',
            'display_name' => 'Attendance View'
        ],
        'attendances_create' => [
            'name' => 'attendances_create',
            'display_name' => 'Attendance Create'
        ],
        'attendances_edit' => [
            'name' => 'attendances_edit',
            'display_name' => 'Attendance Edit'
        ],
        'attendances_delete' => [
            'name' => 'attendances_delete',
            'display_name' => 'Attendance Delete'
        ],

        // awards
        'awards_view' => [
            'name' => 'awards_view',
            'display_name' => 'Award View'
        ],
        'awards_create' => [
            'name' => 'awards_create',
            'display_name' => 'Award Create'
        ],
        'awards_edit' => [
            'name' => 'awards_edit',
            'display_name' => 'Award Edit'
        ],
        'awards_delete' => [
            'name' => 'awards_delete',
            'display_name' => 'Award Delete'
        ],

        // appreciation
        'appreciations_view' => [
            'name' => 'appreciations_view',
            'display_name' => 'Appreciation View'
        ],
        'appreciations_create' => [
            'name' => 'appreciations_create',
            'display_name' => 'Appreciation Create'
        ],
        'appreciations_edit' => [
            'name' => 'appreciations_edit',
            'display_name' => 'Appreciation Edit'
        ],
        'appreciations_delete' => [
            'name' => 'appreciations_delete',
            'display_name' => 'Appreciation Delete'
        ],

        // Departments
        'departments_view' => [
            'name' => 'departments_view',
            'display_name' => 'Department View'
        ],
        'departments_create' => [
            'name' => 'departments_create',
            'display_name' => 'Department Create'
        ],
        'departments_edit' => [
            'name' => 'departments_edit',
            'display_name' => 'Department Edit'
        ],
        'departments_delete' => [
            'name' => 'departments_delete',
            'display_name' => 'Department Delete'
        ],

        // Designations
        'designations_view' => [
            'name' => 'designations_view',
            'display_name' => 'Designation View'
        ],
        'designations_create' => [
            'name' => 'designations_create',
            'display_name' => 'Designation Create'
        ],
        'designations_edit' => [
            'name' => 'designations_edit',
            'display_name' => 'Designation Edit'
        ],
        'designations_delete' => [
            'name' => 'designations_delete',
            'display_name' => 'Designation Delete'
        ],

        // Employee Payments
        'employee_payments_view' => [
            'name' => 'employee_payments_view',
            'display_name' => 'Employee Payment View'
        ],
        'employee_payments_create' => [
            'name' => 'employee_payments_create',
            'display_name' => 'Employee Payment Create'
        ],
        'employee_payments_edit' => [
            'name' => 'employee_payments_edit',
            'display_name' => 'Employee Payment Edit'
        ],
        'employee_payments_delete' => [
            'name' => 'employee_payments_delete',
            'display_name' => 'Employee Payment Delete'
        ],

        // Holidays
        'holidays_create' => [
            'name' => 'holidays_create',
            'display_name' => 'Holiday Create'
        ],
        'holidays_edit' => [
            'name' => 'holidays_edit',
            'display_name' => 'Holiday Edit'
        ],
        'holidays_delete' => [
            'name' => 'holidays_delete',
            'display_name' => 'Holiday Delete'
        ],
        'mark_weekend_holiday' => [
            'name' => 'mark_weekend_holiday',
            'display_name' => 'Mark Weend Holiday'
        ],

        // Leave Types
        'leave_types_view' => [
            'name' => 'leave_types_view',
            'display_name' => 'Leave Type View'
        ],
        'leave_types_create' => [
            'name' => 'leave_types_create',
            'display_name' => 'Leave Type Create'
        ],
        'leave_types_edit' => [
            'name' => 'leave_types_edit',
            'display_name' => 'Leave Type Edit'
        ],
        'leave_types_delete' => [
            'name' => 'leave_types_delete',
            'display_name' => 'Leave Type Delete'
        ],

        // Leaves
        'leaves_assign_to_all' => [
            'name' => 'leaves_assign_to_all',
            'display_name' => 'Leave Assign To All'
        ],
        'leaves_edit_all' => [
            'name' => 'leaves_edit_all',
            'display_name' => 'Edit All Leaves'
        ],
        'leaves_delete_all' => [
            'name' => 'leaves_delete_all',
            'display_name' => 'Delete All Leaves'
        ],
        'leaves_approve_reject' => [
            'name' => 'leaves_approve_reject',
            'display_name' => 'Approve/Reject Leaves'
        ],

        'leaves_settings' => [
            'name' => 'leaves_settings',
            'display_name' => 'Leave Settings'
        ],

        //Attendance
        'attendances_view' => [
            'name' => 'attendances_view',
            'display_name' => 'Attendance View'
        ],
        'attendances_create' => [
            'name' => 'attendances_create',
            'display_name' => 'Attendance Create'
        ],
        'attendances_edit' => [
            'name' => 'attendances_edit',
            'display_name' => 'Attendance Edit'
        ],
        'attendances_delete' => [
            'name' => 'attendances_delete',
            'display_name' => 'Attendance Delete'
        ],

        // Increment and Promotion
        'increments_promotions_view' => [
            'name' => 'increments_promotions_view',
            'display_name' => 'Increment and Promotion View'
        ],
        'increments_promotions_create' => [
            'name' => 'increments_promotions_create',
            'display_name' => 'Increment and Promotion Create'
        ],
        'increments_promotions_edit' => [
            'name' => 'increments_promotions_edit',
            'display_name' => 'Increment and Promotion Edit'
        ],
        'increments_promotions_delete' => [
            'name' => 'increments_promotions_delete',
            'display_name' => 'Increment and Promotion Delete'
        ],

        // Payroll
        'payrolls_view' => [
            'name' => 'payrolls_view',
            'display_name' => 'Payroll View'
        ],
        'payrolls_create' => [
            'name' => 'payrolls_create',
            'display_name' => 'Payroll Create'
        ],
        'payrolls_edit' => [
            'name' => 'payrolls_edit',
            'display_name' => 'Payroll Edit'
        ],
        'payrolls_delete' => [
            'name' => 'payrolls_delete',
            'display_name' => 'Payroll Delete'
        ],

        // Pre-Payments
        'pre_payments_view' => [
            'name' => 'pre_payments_view',
            'display_name' => 'Pre Payments View'
        ],
        'pre_payments_create' => [
            'name' => 'pre_payments_create',
            'display_name' => 'Pre Payments Create'
        ],
        'pre_payments_edit' => [
            'name' => 'pre_payments_edit',
            'display_name' => 'Pre Payments Edit'
        ],
        'pre_payments_delete' => [
            'name' => 'pre_payments_delete',
            'display_name' => 'Pre Payments Delete'
        ],

        //basic_salary
        'basic_salaries_view' => [
            'name' => 'basic_salaries_view',
            'display_name' => 'Basic Salary View'
        ],
        'basic_salaries_create' => [
            'name' => 'basic_salaries_create',
            'display_name' => 'Basic Salary Create'
        ],
        'basic_salaries_edit' => [
            'name' => 'basic_salaries_edit',
            'display_name' => 'Basic Salary Edit'
        ],
        'basic_salaries_delete' => [
            'name' => 'basic_salaries_delete',
            'display_name' => 'Basic Salary Delete'
        ],

        // HRM Settings
        'hrm_settings' => [
            'name' => 'hrm_settings',
            'display_name' => 'HRM Settings'
        ],
        // Brand
        'brands_view' => [
            'name' => 'brands_view',
            'display_name' => 'Brand View'
        ],
        'brands_create' => [
            'name' => 'brands_create',
            'display_name' => 'Brand Create'
        ],
        'brands_edit' => [
            'name' => 'brands_edit',
            'display_name' => 'Brand Edit'
        ],
        'brands_delete' => [
            'name' => 'brands_delete',
            'display_name' => 'Brand Delete'
        ],

        // Category
        'categories_view' => [
            'name' => 'categories_view',
            'display_name' => 'Category View'
        ],
        'categories_create' => [
            'name' => 'categories_create',
            'display_name' => 'Category Create'
        ],
        'categories_edit' => [
            'name' => 'categories_edit',
            'display_name' => 'Category Edit'
        ],
        'categories_delete' => [
            'name' => 'categories_delete',
            'display_name' => 'Category Delete'
        ],

        // Product
        'products_view' => [
            'name' => 'products_view',
            'display_name' => 'Product View'
        ],
        'products_create' => [
            'name' => 'products_create',
            'display_name' => 'Product Create'
        ],
        'products_edit' => [
            'name' => 'products_edit',
            'display_name' => 'Product Edit'
        ],
        'products_delete' => [
            'name' => 'products_delete',
            'display_name' => 'Product Delete'
        ],

        // Variation
        'variations_view' => [
            'name' => 'variations_view',
            'display_name' => 'Variation View'
        ],
        'variations_create' => [
            'name' => 'variations_create',
            'display_name' => 'Variation Create'
        ],
        'variations_edit' => [
            'name' => 'variations_edit',
            'display_name' => 'Variation Edit'
        ],
        'variations_delete' => [
            'name' => 'variations_delete',
            'display_name' => 'Variation Delete'
        ],

        // Purchase
        'purchases_view' => [
            'name' => 'purchases_view',
            'display_name' => 'Purchase View'
        ],
        'purchases_create' => [
            'name' => 'purchases_create',
            'display_name' => 'Purchase Create'
        ],
        'purchases_edit' => [
            'name' => 'purchases_edit',
            'display_name' => 'Purchase Edit'
        ],
        'purchases_delete' => [
            'name' => 'purchases_delete',
            'display_name' => 'Purchase Delete'
        ],

        // Purchase Return
        'purchase_returns_view' => [
            'name' => 'purchase_returns_view',
            'display_name' => 'Purchase Return View'
        ],
        'purchase_returns_create' => [
            'name' => 'purchase_returns_create',
            'display_name' => 'Purchase Return Create'
        ],
        'purchase_returns_edit' => [
            'name' => 'purchase_returns_edit',
            'display_name' => 'Purchase Return Edit'
        ],
        'purchase_returns_delete' => [
            'name' => 'purchase_returns_delete',
            'display_name' => 'Purchase Return Delete'
        ],

        // Payment Out
        'payment_out_view' => [
            'name' => 'payment_out_view',
            'display_name' => 'Payment Out View'
        ],
        'payment_out_create' => [
            'name' => 'payment_out_create',
            'display_name' => 'Payment Out Create'
        ],
        'payment_out_edit' => [
            'name' => 'payment_out_edit',
            'display_name' => 'Payment Out Edit'
        ],
        'payment_out_delete' => [
            'name' => 'payment_out_delete',
            'display_name' => 'Payment Out Delete'
        ],

        // Payment In
        'payment_in_view' => [
            'name' => 'payment_in_view',
            'display_name' => 'Payment In View'
        ],
        'payment_in_create' => [
            'name' => 'payment_in_create',
            'display_name' => 'Payment In Create'
        ],
        'payment_in_edit' => [
            'name' => 'payment_in_edit',
            'display_name' => 'Payment In Edit'
        ],
        'payment_in_delete' => [
            'name' => 'payment_in_delete',
            'display_name' => 'Payment In Delete'
        ],

        // Sales
        'sales_view' => [
            'name' => 'sales_view',
            'display_name' => 'Sales View'
        ],
        'sales_create' => [
            'name' => 'sales_create',
            'display_name' => 'Sales Create'
        ],
        'sales_edit' => [
            'name' => 'sales_edit',
            'display_name' => 'Sales Edit'
        ],
        'sales_delete' => [
            'name' => 'sales_delete',
            'display_name' => 'Sales Delete'
        ],

        // Sales Return
        'sales_returns_view' => [
            'name' => 'sales_returns_view',
            'display_name' => 'Sales Return View'
        ],
        'sales_returns_create' => [
            'name' => 'sales_returns_create',
            'display_name' => 'Sales Return Create'
        ],
        'sales_returns_edit' => [
            'name' => 'sales_returns_edit',
            'display_name' => 'Sales Return Edit'
        ],
        'sales_returns_delete' => [
            'name' => 'sales_returns_delete',
            'display_name' => 'Sales Return Delete'
        ],

        // Order Payments
        'order_payments_view' => [
            'name' => 'order_payments_view',
            'display_name' => 'Order Payments View'
        ],
        'order_payments_create' => [
            'name' => 'order_payments_create',
            'display_name' => 'Order Payments Create'
        ],

        // Stock Adjustment
        'stock_adjustments_view' => [
            'name' => 'stock_adjustments_view',
            'display_name' => 'Stock Adjustment View'
        ],
        'stock_adjustments_create' => [
            'name' => 'stock_adjustments_create',
            'display_name' => 'Stock Adjustment Create'
        ],
        'stock_adjustments_edit' => [
            'name' => 'stock_adjustments_edit',
            'display_name' => 'Stock Adjustment Edit'
        ],
        'stock_adjustments_delete' => [
            'name' => 'stock_adjustments_delete',
            'display_name' => 'Stock Adjustment Delete'
        ],

        // Stock Transfer
        'stock_transfers_view' => [
            'name' => 'stock_transfers_view',
            'display_name' => 'Stock Transfer View'
        ],
        'stock_transfers_create' => [
            'name' => 'stock_transfers_create',
            'display_name' => 'Stock Transfer Create'
        ],
        'stock_transfers_edit' => [
            'name' => 'stock_transfers_edit',
            'display_name' => 'Stock Transfer Edit'
        ],
        'stock_transfers_delete' => [
            'name' => 'stock_transfers_delete',
            'display_name' => 'Stock Transfer Delete'
        ],

        // Quotation
        'quotations_view' => [
            'name' => 'quotations_view',
            'display_name' => 'Quotation View'
        ],
        'quotations_create' => [
            'name' => 'quotations_create',
            'display_name' => 'Quotation Create'
        ],
        'quotations_edit' => [
            'name' => 'quotations_edit',
            'display_name' => 'Quotation Edit'
        ],
        'quotations_delete' => [
            'name' => 'quotations_delete',
            'display_name' => 'Quotation Delete'
        ],

        // Expense Category
        'expense_categories_view' => [
            'name' => 'expense_categories_view',
            'display_name' => 'Expense Category View'
        ],
        'expense_categories_create' => [
            'name' => 'expense_categories_create',
            'display_name' => 'Expense Category Create'
        ],
        'expense_categories_edit' => [
            'name' => 'expense_categories_edit',
            'display_name' => 'Expense Category Edit'
        ],
        'expense_categories_delete' => [
            'name' => 'expense_categories_delete',
            'display_name' => 'Expense Category Delete'
        ],

        // Expense
        'expenses_view' => [
            'name' => 'expenses_view',
            'display_name' => 'Expense View'
        ],
        'expenses_create' => [
            'name' => 'expenses_create',
            'display_name' => 'Expense Create'
        ],
        'expenses_edit' => [
            'name' => 'expenses_edit',
            'display_name' => 'Expense Edit'
        ],
        'expenses_delete' => [
            'name' => 'expenses_delete',
            'display_name' => 'Expense Delete'
        ],

        // Unit
        'units_view' => [
            'name' => 'units_view',
            'display_name' => 'Unit View'
        ],
        'units_create' => [
            'name' => 'units_create',
            'display_name' => 'Unit Create'
        ],
        'units_edit' => [
            'name' => 'units_edit',
            'display_name' => 'Unit Edit'
        ],
        'units_delete' => [
            'name' => 'units_delete',
            'display_name' => 'Unit Delete'
        ],

        // Custom Fields
        'custom_fields_view' => [
            'name' => 'custom_fields_view',
            'display_name' => 'Custom Field View'
        ],
        'custom_fields_create' => [
            'name' => 'custom_fields_create',
            'display_name' => 'Custom Field Create'
        ],
        'custom_fields_edit' => [
            'name' => 'custom_fields_edit',
            'display_name' => 'Custom Field Edit'
        ],
        'custom_fields_delete' => [
            'name' => 'custom_fields_delete',
            'display_name' => 'Custom Field Delete'
        ],

        // Payment Mode
        'payment_modes_view' => [
            'name' => 'payment_modes_view',
            'display_name' => 'Payment Mode View'
        ],
        'payment_modes_create' => [
            'name' => 'payment_modes_create',
            'display_name' => 'Payment Mode Create'
        ],
        'payment_modes_edit' => [
            'name' => 'payment_modes_edit',
            'display_name' => 'Payment Mode Edit'
        ],
        'payment_modes_delete' => [
            'name' => 'payment_modes_delete',
            'display_name' => 'Payment Mode Delete'
        ],

        // Currency
        'currencies_view' => [
            'name' => 'currencies_view',
            'display_name' => 'Currency View'
        ],
        'currencies_create' => [
            'name' => 'currencies_create',
            'display_name' => 'Currency Create'
        ],
        'currencies_edit' => [
            'name' => 'currencies_edit',
            'display_name' => 'Currency Edit'
        ],
        'currencies_delete' => [
            'name' => 'currencies_delete',
            'display_name' => 'Currency Delete'
        ],

        // Tax
        'taxes_view' => [
            'name' => 'taxes_view',
            'display_name' => 'Tax View'
        ],
        'taxes_create' => [
            'name' => 'taxes_create',
            'display_name' => 'Tax Create'
        ],
        'taxes_edit' => [
            'name' => 'taxes_edit',
            'display_name' => 'Tax Edit'
        ],
        'taxes_delete' => [
            'name' => 'taxes_delete',
            'display_name' => 'Tax Delete'
        ],

        // Modules
        'modules_view' => [
            'name' => 'modules_view',
            'display_name' => 'Modules View'
        ],

        // Role
        'roles_view' => [
            'name' => 'roles_view',
            'display_name' => 'Role View'
        ],
        'roles_create' => [
            'name' => 'roles_create',
            'display_name' => 'Role Create'
        ],
        'roles_edit' => [
            'name' => 'roles_edit',
            'display_name' => 'Role Edit'
        ],
        'roles_delete' => [
            'name' => 'roles_delete',
            'display_name' => 'Role Delete'
        ],

        // Warehouse
        'warehouses_view' => [
            'name' => 'warehouses_view',
            'display_name' => 'Warehouse View'
        ],
        'warehouses_create' => [
            'name' => 'warehouses_create',
            'display_name' => 'Warehouse Create'
        ],
        'warehouses_edit' => [
            'name' => 'warehouses_edit',
            'display_name' => 'Warehouse Edit'
        ],
        'warehouses_delete' => [
            'name' => 'warehouses_delete',
            'display_name' => 'Warehouse Delete'
        ],

        // Company
        'companies_edit' => [
            'name' => 'companies_edit',
            'display_name' => 'Company Edit'
        ],

        // Translation
        'translations_view' => [
            'name' => 'translations_view',
            'display_name' => 'Translation View'
        ],
        'translations_create' => [
            'name' => 'translations_create',
            'display_name' => 'Translation Create'
        ],
        'translations_edit' => [
            'name' => 'translations_edit',
            'display_name' => 'Translation Edit'
        ],
        'translations_delete' => [
            'name' => 'translations_delete',
            'display_name' => 'Translation Delete'
        ],

        // Staff Member
        'users_view' => [
            'name' => 'users_view',
            'display_name' => 'Staff Member View'
        ],
        'users_create' => [
            'name' => 'users_create',
            'display_name' => 'Staff Member Create'
        ],
        'users_edit' => [
            'name' => 'users_edit',
            'display_name' => 'Staff Member Edit'
        ],
        'users_delete' => [
            'name' => 'users_delete',
            'display_name' => 'Staff Member Delete'
        ],

        // Customer
        'customers_view' => [
            'name' => 'customers_view',
            'display_name' => 'Customer View'
        ],
        'customers_create' => [
            'name' => 'customers_create',
            'display_name' => 'Customer Create'
        ],
        'customers_edit' => [
            'name' => 'customers_edit',
            'display_name' => 'Customer Edit'
        ],
        'customers_delete' => [
            'name' => 'customers_delete',
            'display_name' => 'Customer Delete'
        ],

        // Supplier
        'suppliers_view' => [
            'name' => 'suppliers_view',
            'display_name' => 'Supplier View'
        ],
        'suppliers_create' => [
            'name' => 'suppliers_create',
            'display_name' => 'Supplier Create'
        ],
        'suppliers_edit' => [
            'name' => 'suppliers_edit',
            'display_name' => 'Supplier Edit'
        ],
        'suppliers_delete' => [
            'name' => 'suppliers_delete',
            'display_name' => 'Supplier Delete'
        ],

        // Storage Settings
        'storage_edit' => [
            'name' => 'storage_edit',
            'display_name' => 'Storage Settings Edit'
        ],

        // Email Settings
        'email_edit' => [
            'name' => 'email_edit',
            'display_name' => 'Email Settings Edit'
        ],

        // POS
        'pos_view' => [
            'name' => 'pos_view',
            'display_name' => 'POS View'
        ],

        // Update App
        'update_app' => [
            'name' => 'update_app',
            'display_name' => 'Update App'
        ],

        // Cash & Bank
        'cash_bank_view' => [
            'name' => 'cash_bank_view',
            'display_name' => 'Cash & Bank View'
        ],


    ];

    public static $eStorePermissions = [];

    public static function getPermissionArray($moduleName)
    {
        if ($moduleName == 'Estore') {
            return self::$eStorePermissions;
        } else if ($moduleName != '') {
            $className = "Modules\\{$moduleName}\\Classes\PermsSeed";
            return $className::$mainPermissionsArray;
        }

        return self::$mainPermissionsArray;
    }

    public static function seedPermissions($moduleName = '')
    {
        $permissions = self::getPermissionArray($moduleName);

        foreach ($permissions as $group => $permission) {
            $permissionCount = Permission::where('name', $permission['name'])->count();

            if ($permissionCount == 0) {
                $newPermission = new Permission();
                $newPermission->name = $permission['name'];
                $newPermission->display_name = $permission['display_name'];
                $newPermission->save();
            }
        }
    }

    public static function seedMainPermissions()
    {
        // Main Module
        self::seedPermissions();

        // Seeding modules
        self::seedAllModulesPermissions();
    }

    public static function seedAllModulesPermissions()
    {
        $allModules = Module::all();
        foreach ($allModules as $allModule) {
            self::seedPermissions($allModule);
        }
    }
}
