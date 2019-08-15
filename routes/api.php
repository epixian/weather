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

Route::get('/weatherlocations', 'WeatherLocationsApiController@index');
Route::post('/weatherlocations', 'WeatherLocationsApiController@store');

Route::get('/locations', 'LocationsApiController@index');
Route::post('/locations', 'LocationsApiController@store');
