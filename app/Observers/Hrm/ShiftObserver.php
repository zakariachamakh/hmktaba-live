<?php

namespace App\Observers\Hrm;

use App\Models\Hrm\Shift;

class ShiftObserver
{
    public function saving(Shift $shift)
    {
        $company = company();

        // Cannot put in creating, because saving is fired before creating. And we need company id for check bellow
        if ($company && !$company->is_global) {
            $shift->company_id = $company->id;
        }
    }
}
