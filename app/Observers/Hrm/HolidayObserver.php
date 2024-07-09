<?php

namespace App\Observers\Hrm;

use App\Models\Hrm\Holiday;

class HolidayObserver
{
    public function saving(Holiday $holiday)
    {
        $company = company();

        // Cannot put in creating, because saving is fired before creating. And we need company id for check bellow
        if ($company && !$company->is_global) {
            $holiday->company_id = $company->id;
        }
    }
}
