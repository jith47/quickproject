<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ServiceController extends Controller
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
        // return Auth::user();
        $services = Service::where('company_id',  Auth::user()->company_id)
            ->with('details')
            ->with(['tech' => function ($q) {
                $q->with(['user' => function ($qu) {
                    $qu->with('details');
                }]);
            }])
            ->with('consumer')
            ->with('creator')
            ->get();

        return response()->json($services, 200);
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
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
    public function recentlyclosed()
    {
        // return Auth::user();
        $services = Service::where('company_id',  Auth::user()->company_id)
            ->with('details')
            ->with(['tech' => function ($q) {
                $q->with(['user' => function ($qu) {
                    $qu->with('details');
                }]);
            }])
            ->where('type', 3)
            ->with('consumer')
            ->with('creator')
            ->orderBy('updated_at')
            ->paginate(3)->map(function ($val) {
                $val->closed = Carbon::parse($val->updated_at)->diffForHumans(\Carbon\Carbon::now());
                return $val;
            });

        return response()->json($services, 200);
    }
}
