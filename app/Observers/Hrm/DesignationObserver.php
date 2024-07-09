<?php

namespace App\Observers\Hrm;

use App\Models\Hrm\Designation;

class DesignationObserver
{
    public function saving(Designation $designation)
    {
        $company = company();

        // Cannot put in creating, because saving is fired before creating. And we need company id for check bellow
        if ($company && !$company->is_global) {
            $designation->company_id = $company->id;
        }
    }
}
