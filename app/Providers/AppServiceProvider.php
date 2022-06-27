<?php

namespace App\Providers;

use App\Models\Permit;
use App\Observers\PermitObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;

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
        Builder::macro('search', function ($field1, $field2, $string){
            // return $string ? $this->where($field, 'like', '%'.$string.'%') :$this;
            return $string ? $this->where($field1, 'like', '%'.$string.'%')->orWhere($field2, 'like', '%'.$string.'%') :$this;
        });
        
    }
}
