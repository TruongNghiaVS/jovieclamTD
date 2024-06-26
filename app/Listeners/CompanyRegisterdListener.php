<?php

namespace App\Listeners;

use Mail;
use App\Events\CompanyRegistered;
use App\Mail\CompanyRegisteredMailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\CodeActive;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
class CompanyRegisterdListener implements ShouldQueue
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
public function handle(CompanyRegistered $event)
    {
 
        $data = $event->company;
        $pass = $event->pass;
        $codegenerate =  Str::random(30);
        $email = $data->email;
        $codeActive = new CodeActive();
        $codeActive->code = $codegenerate;
        $codeActive->userId = $data->id;
        $codeActive->save();
        $response = Http::post('http://192.168.1.2:8083/sendMailRegisterTD', [
            'emailTo' => $data->email,
            'code' =>  $codeActive->code,
            'fullName'=> $data->name,
            'password'=> $pass
        ]);
    }

}
