<?php

namespace App\Listeners;

use Mail;
use App\Events\RequestPasswordLink;
use App\Mail\CompanyRegisteredMailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ResetPassword;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
class RequestmailPasswordListener implements ShouldQueue
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CompanyRegistered  $event
     * @return void
     */
    public function handle(RequestPasswordLink $event)
    {
        $data = $event->company;
        $codegenerate =  Str::random(30);
        $email = $data->email;
        $codeActive = new ResetPassword();
        $codeActive->code = $codegenerate;
        $codeActive->type ="1";
        $codeActive->isMember ="0";
        $codeActive->userId = $data->id;
        $codeActive->save();
        $response = Http::post('http://192.168.1.2:8083/pushMailResetPassword', [
            'emailTo' => $data->email,
            'code' =>  $codeActive->code
        ]);
    }

}
