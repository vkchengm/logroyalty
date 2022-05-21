<?php

namespace App\Providers;

use App\Models\Tdp;
use App\Models\Permit;
// use App\Observers\PermitObserver;
use App\Notifications\PermitUpdated;
use App\Providers\PermitUpdatedEvent;
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
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        // PermitUpdatedEvent::class => [
        //     PermitUpdated::class,
        // ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        // Permit::observe(PermitObserver::class);
    }
}
