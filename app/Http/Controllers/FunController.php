<?php

namespace App\Http\Controllers;

use App\Models\Fun;
use App\Models\User;
use App\Http\Requests\StoreFunRequest;
use App\Http\Requests\UpdateFunRequest;
use Carbon\Carbon;

class FunController extends Controller
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
     * @param  \App\Http\Requests\StoreFunRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFunRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fun  $fun
     * @return \Illuminate\Http\Response
     */
    public function show(Fun $fun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fun  $fun
     * @return \Illuminate\Http\Response
     */
    public function edit(Fun $fun)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFunRequest  $request
     * @param  \App\Models\Fun  $fun
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFunRequest $request, Fun $fun)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fun  $fun
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fun $fun)
    {
        //
    }

    public function weeklyreaction()
    {
        $data = User::whereHas('likes',function ($q) {
                $q->whereBetween('updated_at', [Carbon::now()->subDays(7)->format('Y-m-d'), Carbon::now()->format('Y-m-d')]);
            })->withCount(['likes' => function ($q) {
                $q->whereBetween('updated_at', [Carbon::now()->subDays(7)->format('Y-m-d'), Carbon::now()->format('Y-m-d')]);
            }])->whereHas('comments',function ($q) {
                $q->whereBetween('updated_at', [Carbon::now()->subDays(7)->format('Y-m-d'), Carbon::now()->format('Y-m-d')]);
            })->withCount(['comments' => function ($q) {
                $q->whereBetween('updated_at', [Carbon::now()->subDays(7)->format('Y-m-d'), Carbon::now()->format('Y-m-d')]);
            }])->get()->take(5)->toArray();
            
        $result = [
            'data' => $data,
            'options' => array_column($data, 'name')
        ];
        return response()->json($result, 200);
    }
}
