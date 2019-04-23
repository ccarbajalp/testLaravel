<?php

namespace App\Providers\App\Listeners;

use App\Providers\App\Events\MessageWasReceived;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendNotificationToTheOwner
{
    /**
     * Handle the event.
     *
     * @param  MessageWasReceived  $event
     * @return void
     */
    public function handle(MessageWasReceived $event)
    {
        $message = $event->message;
        //Mail::send('emails.contact',['msg'=>$message], function($m) use ($message){
        //    $m->from($message->email, $message->nombre)
        //        ->to('music_azulcamp-1@hotmail.com','Carlos')
         //       ->subject('Tu mensaje fue recibido');
        //});
    }
}
