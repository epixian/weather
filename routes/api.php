<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// WEATHER LOCATIONS
Route::get('/weatherlocations', 'WeatherLocationsApiController@index');
Route::post('/weatherlocations', 'WeatherLocationsApiController@store');
Route::get('/weatherlocations/{weatherLocation}', 'WeatherLocationsApiController@show');

// LOCATIONS
Route::get('/locations', 'LocationsApiController@index');
Route::get('/locations/{location}', 'LocationsApiController@show');

// CUSTOMER->LOCATIONS
Route::get('/customers/{customer}/locations', 'CustomerLocationsApiController@index');
Route::post('/customers/{customer}/locations', 'CustomerLocationsApiController@store');
