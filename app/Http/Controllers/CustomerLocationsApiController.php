<?php

namespace App\Http\Controllers;

use App\Location;
use App\Customer;
use Illuminate\Http\Request;

class CustomerLocationsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function index(Customer $customer)
    {
        return Customer::with('locations')->find($customer->id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function create(Customer $customer)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer, Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer, Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer, Location $location)
    {
        //
    }
}
