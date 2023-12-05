<?php

namespace App\Events;

use App\Company;
use Illuminate\Queue\SerializesModels;

class RequestPasswordLink
{

    use SerializesModels;

    public $company;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Company $company)
    {
        $this->company = $company;
    }

}
