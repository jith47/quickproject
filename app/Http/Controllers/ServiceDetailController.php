<?php

namespace App\Http\Controllers;

use App\Models\ServiceDetail;
use App\Http\Requests\StoreServiceDetailRequest;
use App\Http\Requests\UpdateServiceDetailRequest;

class ServiceDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceDetail  $serviceDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceDetail $serviceDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceDetail  $serviceDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceDetail $serviceDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceDetailRequest  $request
     * @param  \App\Models\ServiceDetail  $serviceDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceDetailRequest $request, ServiceDetail $serviceDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceDetail  $serviceDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceDetail $serviceDetail)
    {
        //
    }
}
