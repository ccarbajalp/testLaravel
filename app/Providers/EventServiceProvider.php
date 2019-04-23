<?php

namespace App\Providers;

use App\Providers\App\Events\MessageWasReceived;
use App\Providers\App\Listeners\SendAutoresponder;
use App\Providers\App\Listeners\SendNotificationToTheOwner;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        //Registered::class => [
            //SendEmailVerificationNotification::class,
        //],
        App\Events\MessageWasReceived::class => [
            App\Listeners\SendAutoresponder::class,
            App\Listeners\SendNotificationToTheOwner::class,
        ],
        App\Events\UserWasCreated::class => [
            App\Listeners\NotifyNewRegister::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
