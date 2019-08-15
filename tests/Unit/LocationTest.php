<?php

namespace Tests\Unit;

use App\Forecast;
use App\Location;
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
        $location = factory('App\Location')->create(['postal_code' => '12345']);

        // creates a new location
        $this->assertCount(1, Location::all());

        // should also create new weather location
        $this->assertCount(1, WeatherLocation::all());

        // and associate to the location
        $this->assertEquals($location->weatherLocation->id, WeatherLocation::first()->id);
        $this->assertEquals($location->weatherLocation->address, $location->postal_code);

        // add another location with same zip code
        $location = factory('App\Location')->create(['postal_code' => '12345']);

        // should associate existing weather location and not create new
        $this->assertCount(2, Location::all());
        $this->assertCount(1, WeatherLocation::all());
    }

    /** @test */
    public function weather_locations_have_forecasts()
    {
        $location = factory('App\WeatherLocation')->create();

        $this->assertCount(1, Forecast::all());
        $this->assertCount(1, WeatherLocation::all());
        $this->assertEquals($location->forecasts->first()->id, Forecast::first()->id);
    }
}
