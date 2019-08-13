<?php

namespace Tests\Unit;

use App\Forecast;
use Tests\TestCase;
use App\WeatherLocation;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LocationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function locations_have_a_weather_location()
    {
        $weatherLocation = factory('App\WeatherLocation')->create();

        $location = factory('App\Location')->make(['postal_code' => $weatherLocation->address]);

        $location->setWeatherLocation($weatherLocation);

        $location->fresh();

        $this->assertEquals($location->weatherLocation->id, $weatherLocation->id);
        $this->assertEquals($location->weatherLocation->address, $location->postal_code);
    }

    /** @test */
    public function weather_locations_have_forecasts()
    {
        $location = factory('App\WeatherLocation')->create();
        $forecast = factory('App\Forecast')->make();

        $location->addForecast($forecast);

        $this->assertCount(1, Forecast::all());
        $this->assertCount(1, WeatherLocation::all());
        $this->assertEquals($location->forecasts->first()->data, $forecast->data);
    }

    /** @test */
    public function forecasts_have_a_location()
    {
        $location = factory('App\WeatherLocation')->create();
        $forecast = factory('App\Forecast')->make();

        $forecast->setWeatherLocation($location);

        $this->assertCount(1, Forecast::all());
        $this->assertCount(1, WeatherLocation::all());
        $this->assertEquals($forecast->weatherLocation, $location);
    }
}
