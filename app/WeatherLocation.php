<?php

namespace App;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Naughtonium\LaravelDarkSky\Facades\DarkSky;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class WeatherLocation extends Model
{
    use HasEagerLimit;

    /**
     * The relationships that should be eager-loaded
     * @var array
     */
    protected $with = [ 
        'locations',
        'forecasts'
    ];

    /**
     * The attributes that are not mass-fillable
     * @var array
     */
    protected $guarded = [];
    
    /**
     * Get the forecasts associated with the weather location
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function forecasts()
    {
        return $this->hasMany('App\Forecast')->latest();
    }

    public function locations()
    {
        return $this->hasMany('App\Location');
    }

    /**
     * Associate a forecast with this location
     * @param Forecast|false
     */
    public function addForecast(Forecast $forecast)
    {
        return $this->forecasts()->save($forecast);
    }

    /**
     * Associate multiple forecasts with this location
     * @param \Illuminate\Support\Collection $forecasts
     * @return iterable
     */
    public function addForecasts(Collection $forecasts)
    {
        return $this->forecasts()->saveMany($forecasts);
    }

    /**
     * Fetch a new forecast from DarkSky for this location
     * @return Forecast
     */
    public function getCurrentForecast()
    {
        return $this->addForecast(
                Forecast::make([
                    'data' => DarkSky::location($this->lat, $this->lng)->excludes(['minutely'])->get()
                ])
            );
    }

    /**
     * Geocode the location using Google Maps API
     * @return WeatherLocation
     */
    public function getLatLng()
    {
        $response = \GoogleMaps::load('geocoding')
            ->setParam(['address' => $this->address])
            ->get('results.geometry.location');

        if (isset($response['status']))
            return null;

        $location = $response['results'][0]['geometry']['location'];
        
        $this->lat = $location['lat'];
        $this->lng = $location['lng'];

        $this->save();
        
        return $this;
    }
}
