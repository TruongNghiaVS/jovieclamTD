<?php

namespace App\Events;

use App\Company;
use Illuminate\Queue\SerializesModels;

class CompanyRegistered
{

    use SerializesModels;

    public $company;
    public $pass;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Company $company, $passInput)
    {
        $this->company = $company;
        $this->pass =  $passInput;
    }

}
