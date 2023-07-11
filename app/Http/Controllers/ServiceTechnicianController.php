<?php

namespace App\Http\Controllers;

use App\Models\ServiceTechnician;
use App\Http\Requests\StoreServiceTechnicianRequest;
use App\Http\Requests\UpdateServiceTechnicianRequest;
use Illuminate\Support\Facades\Auth;

class ServiceTechnicianController extends Controller
{
    protected $auth;	

    public function __construct()
    {
        $this->auth = Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return $this->auth;
        $company_id = Auth::user()->company_id;
        $techs = ServiceTechnician::whereHas('service', function($q) use ($company_id) {
                $q->where('company_id',  $company_id);
            })->with(['user' => function ($q) {
                $q->with('details')->with('likes');
            }])
            ->get();

        return response()->json($techs, 200);
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
    public function mostliked()
    {
        // return $this->auth;
        $company_id = Auth::user()->company_id;
        $techs = ServiceTechnician::whereHas('service', function($q) use ($company_id) {
                $q->where('company_id',  $company_id);
            })->with(['user' => function ($q) {
                $q->with('details')->withCount('likes');
            }])
            ->get()->sortBy(function ($tech) {
                return $tech->user->likes_count;
            })->toArray();

            

        return response()->json(array_reverse($techs), 200);
    }
}
