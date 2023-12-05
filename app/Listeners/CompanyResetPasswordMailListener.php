<?php

namespace App\Listeners;

use Mail;
use App\Events\CompanyRegistered;
use App\Mail\CompanyRegisteredMailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ResetPassword;
use App\Company;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
class CompanyResetPasswordMailListener implements ShouldQueue
{


    public function __construct()
    {
        //
    }

    public function handle(CompanyResetPasswordMail $event)
    {
     
        $data = $event->company;
        $codegenerate =  Str::random(30);
        $email = $data->email;
        $companyItem = Company::where('email', $email)->first();
        if($companyItem)
        {

        }
        else 
        {
            return false;
        }
        $codeActive = new ResetPassword();
        $codeActive->code = $codegenerate;
        $codeActive->userId = $companyItem->id;
        $codeActive->type = "1";
        $codeActive->status = "1";
        $codeActive->save();
        $response = Http::post('http://localhost:8082/pushMailResetPassword', [
            'emailTo' => $companyItem->email,
            'isMember'=>0,
            'fullName'=> $companyItem->name,
            'code' =>  $codeActive->code
        ]);
        return true;
    }

}
