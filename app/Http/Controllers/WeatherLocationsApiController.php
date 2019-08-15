<?php

namespace App\Http\Controllers;

use App\WeatherLocation;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WeatherLocationsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = WeatherLocation::with([
            'locations', 
            'forecasts' => function ($query) {
                $query->latest()->limit(1);
            }
        ])->get();

        return response($locations->jsonSerialize(), Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created weather location or return existing match
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return existing address if exists
        $location = WeatherLocation::where(
            ['address' => $request->input('address')]
        )->first();

        if ($location !== null)
            return response(json_encode($location), Response::HTTP_OK);

        // else create a new one
        $location = WeatherLocation::create(['address' => $request->input('address')]);
        
        // $location->getLatLng();

        // $location->getCurrentForecast();

        // reload model
        $location = WeatherLocation::with('forecasts')->find($location->id);

        return response(json_encode($location), Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WeatherLocation  $weatherLocation
     * @return \Illuminate\Http\Response
     */
    public function show(WeatherLocation $weatherLocation)
    {
        dd($weatherLocation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WeatherLocation  $weatherLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(WeatherLocation $weatherLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WeatherLocation  $weatherLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WeatherLocation $weatherLocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WeatherLocation  $weatherLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(WeatherLocation $weatherLocation)
    {
        //
    }
}
