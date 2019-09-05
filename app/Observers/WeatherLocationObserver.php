<?php

namespace App\Observers;

use App\WeatherLocation;
use Illuminate\Support\Facades\Log;

class WeatherLocationObserver
{
    /**
     * Handle the weather location "created" event.
     *
     * @param  \App\WeatherLocation  $weatherLocation
     * @return void
     */
    public function created(WeatherLocation $weatherLocation)
    {
        if($weatherLocation->getLatLng() === null) {
            Log::error('Error: invalid ZIP code.');
            return;
        }
        
        $weatherLocation->getCurrentForecast();
    }

    /**
     * Handle the weather location "updated" event.
     *
     * @param  \App\WeatherLocation  $weatherLocation
     * @return void
     */
    public function updated(WeatherLocation $weatherLocation)
    {
        //
    }

    /**
     * Handle the weather location "deleted" event.
     *
     * @param  \App\WeatherLocation  $weatherLocation
     * @return void
     */
    public function deleted(WeatherLocation $weatherLocation)
    {
        //
    }

    /**
     * Handle the weather location "restored" event.
     *
     * @param  \App\WeatherLocation  $weatherLocation
     * @return void
     */
    public function restored(WeatherLocation $weatherLocation)
    {
        //
    }

    /**
     * Handle the weather location "force deleted" event.
     *
     * @param  \App\WeatherLocation  $weatherLocation
     * @return void
     */
    public function forceDeleted(WeatherLocation $weatherLocation)
    {
        //
    }
}
