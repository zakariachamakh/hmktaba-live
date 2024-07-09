<?php

namespace App\Models\Hrm;

use App\Models\BaseModel;
use App\Scopes\CompanyScope;

class LeaveType extends BaseModel
{
    protected $table = 'leave_types';

    protected $default = ['xid', 'name', 'is_paid', 'total_leaves', 'created_by'];

    protected $guarded = ['id', 'max_leaves_per_month', 'created_at', 'updated_at'];

    protected $hidden = ['id',];

    protected $appends = ['xid',];

    protected $filterable = ['name'];

    protected $casts = [
        'is_deletable' => 'integer',
        'is_paid' => 'integer',
        'max_leaves_per_month' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CompanyScope);
    }
}
