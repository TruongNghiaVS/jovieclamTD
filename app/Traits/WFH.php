<?php

namespace App\Traits;

use App\Job;

trait WFH
{


    public function scopeWFH($query)
    {
        return $query->where('wfh', '=', Job::JOB_WFH_YES);
    }

}
