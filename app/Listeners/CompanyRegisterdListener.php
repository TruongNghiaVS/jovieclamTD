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
        $codegenerate =  Str::random(30);
        $email = $event->email;
        $codeActive = new CodeActive();
        $codeActive->code = $codegenerate;
        $codeActive->userId = $event->id;
        $codeActive->save();
        $response = Http::post('http://localhost:8080/pushMailNOtification', [
            'emailTo' => $CompanyRegistered->email,
            'code' =>  $codeActive,
        ]);
    }

}
