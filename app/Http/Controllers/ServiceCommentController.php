<?php

namespace App\Http\Controllers;

use App\Models\ServiceComment;
use App\Http\Requests\StoreServiceCommentRequest;
use App\Http\Requests\UpdateServiceCommentRequest;

class ServiceCommentController extends Controller
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
     * @param  \App\Http\Requests\StoreServiceCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceCommentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceComment  $serviceComment
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceComment $serviceComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceComment  $serviceComment
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceComment $serviceComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceCommentRequest  $request
     * @param  \App\Models\ServiceComment  $serviceComment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceCommentRequest $request, ServiceComment $serviceComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceComment  $serviceComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceComment $serviceComment)
    {
        //
    }
}
