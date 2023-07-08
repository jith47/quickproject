<?php

namespace App\Http\Controllers;

use App\Models\ServiceTechnician;
use App\Http\Requests\StoreServiceTechnicianRequest;
use App\Http\Requests\UpdateServiceTechnicianRequest;

class ServiceTechnicianController extends Controller
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
     * @param  \App\Http\Requests\StoreServiceTechnicianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceTechnicianRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceTechnician  $serviceTechnician
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceTechnician $serviceTechnician)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceTechnician  $serviceTechnician
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceTechnician $serviceTechnician)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceTechnicianRequest  $request
     * @param  \App\Models\ServiceTechnician  $serviceTechnician
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceTechnicianRequest $request, ServiceTechnician $serviceTechnician)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceTechnician  $serviceTechnician
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceTechnician $serviceTechnician)
    {
        //
    }
}
