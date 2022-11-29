<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // fix for specific key too long error for MySQL v5.7.7 or lower
        Schema::defaultStringLength(191);
        
        // if($this->app->environment('production')) {
        //       URL::forceScheme('https');
        // }
    }
}
