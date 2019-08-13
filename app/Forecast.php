<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Forecast extends Model
{
    use HasEagerLimit;

    /**
     * The attributes that are not mass-fillable
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'data' => 'array',
    ];

    /**
     * Get the location(s) this forecast applies to
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function weatherLocation()
    {
        return $this->belongsTo('App\WeatherLocation');
    }

    public function setWeatherLocation(WeatherLocation $weatherLocation)
    {
        $this->weatherLocation()->associate($weatherLocation)->save();
    }
}
