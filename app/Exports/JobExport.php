<?php

namespace App\Exports;

use App\Job;
use Maatwebsite\Excel\Concerns\FromCollection;

class JobExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Job::all();
    }
}
