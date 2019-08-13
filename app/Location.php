<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    /**
     * Get the customer associated with the location
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    /**
     * Get the weather location associated with the location
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function weatherLocation()
    {
        return $this->belongsTo('App\WeatherLocation');
    }

    public function forecasts()
    {
        return $this->hasManyThrough('App\Forecast', 'App\WeatherLocation');
    }

    /**
     * Set the customer this location belongs to
     * @param Customer $customer
     */ 
    public function setCustomer(Customer $customer)
    {
        $this->customer()->associate($customer)->save();
    }

    /**
     * Set the weather location this location belongs to
     * @param WeatherLocation $weatherLocation
     */
    public function setWeatherLocation(WeatherLocation $weatherLocation)
    {
        $this->weatherLocation()->associate($weatherLocation)->save();
    }
}
