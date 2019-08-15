<?php

namespace App\Observers;

use App\Location;

class LocationObserver
{
    /**
     * Handle the location "created" event.
     *
     * @param  \App\Location  $location
     * @return void
     */
    public function created(Location $location)
    {
        $location->setWeatherLocation();
    }

    /**
     * Handle the location "updated" event.
     *
     * @param  \App\Location  $location
     * @return void
     */
    public function updated(Location $location)
    {
        //
    }

    /**
     * Handle the location "deleted" event.
     *
     * @param  \App\Location  $location
     * @return void
     */
    public function deleted(Location $location)
    {
        //
    }

    /**
     * Handle the location "restored" event.
     *
     * @param  \App\Location  $location
     * @return void
     */
    public function restored(Location $location)
    {
        //
    }

    /**
     * Handle the location "force deleted" event.
     *
     * @param  \App\Location  $location
     * @return void
     */
    public function forceDeleted(Location $location)
    {
        //
    }
}
