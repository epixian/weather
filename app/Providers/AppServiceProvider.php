<?php

namespace App\Providers;

use App\Location;
use App\WeatherLocation;
use Illuminate\Support\Facades\DB;
use App\Observers\LocationObserver;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use App\Observers\WeatherLocationObserver;

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
        DB::listen(function($query) {
            Log::info(
                $query->sql,
                $query->bindings,
                $query->time
            );
        });

        // register observers
        Location::observe(LocationObserver::class);
        WeatherLocation::observe(WeatherLocationObserver::class);
    }
}
