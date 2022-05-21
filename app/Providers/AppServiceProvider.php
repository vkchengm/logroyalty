<?php

namespace App\Providers;

use App\Models\Permit;
use App\Observers\PermitObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Permit::observe(PermitObserver::class);
        
    }
}
