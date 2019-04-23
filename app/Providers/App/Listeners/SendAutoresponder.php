<?php

namespace App\Providers\App\Listeners;

use App\Providers\App\Events\MessageWasReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendAutoresponder
{
     /**
     * Handle the event.
     *
     * @param  MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
        //dd($event->message);
        $message = $event->message;

        if(auth()->check())
        {
            $message->email = auth()->user()->email;
        }
        //Mail::send('emails.contact',['msg'=>$message], function($m) use ($message){
        //    $m->to($message->email, $message->nombre)->subject('Tu mensaje fue recibido');
        //});
    }
}
