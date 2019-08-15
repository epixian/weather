<?php

namespace Tests\Feature;

use App\Location;
use Tests\TestCase;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WeatherLocationsApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp() :void
    {
        parent::setUp();

        $this->user = factory('App\User')->create();
    }

    /** @test */
    public function list_stored_weather_locations()
    {
        $locations = factory('App\WeatherLocation', 5)->create();

        // $this->json('GET', '/api/weatherlocations?api_token=' . $this->user->api_token)
        $this->json('GET', '/api/weatherlocations')
            ->assertStatus(200)
            ->assertJsonStructure()
            ->assertSee($locations->random()->address);
    }

    /** @test */
    public function create_a_weather_location()
    {
        $this->json('POST', '/api/weatherlocations', [
                // 'api_token' => $this->user->api_token, 
                'address' => '19038'
            ])
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJson([
                'address' => '19038'
            ]);
    }

    /** @test */
    public function use_cached_weather_locations()
    {
        $location = factory('App\WeatherLocation')->create();

        $this->json('POST', '/api/weatherlocations', [
                // 'api_token' => $this->user->api_token, 
                'address' => $location->address
            ])
            ->assertStatus(Response::HTTP_OK)
            ->assertJson([
                'address' => $location->address
            ]);
    }
}
