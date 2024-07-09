<?php

namespace App\Observers\Hrm;

use App\Models\Hrm\Department;

class DepartmentObserver
{
    public function saving(Department $department)
    {
        $company = company();

        // Cannot put in creating, because saving is fired before creating. And we need company id for check bellow
        if ($company && !$company->is_global) {
            $department->company_id = $company->id;
        }
    }
}
