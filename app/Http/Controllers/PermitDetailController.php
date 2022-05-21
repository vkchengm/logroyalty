<?php

namespace App\Http\Controllers;

use App\Models\PermitDetail;
use App\Http\Requests\StorePermitDetailRequest;
use App\Http\Requests\UpdatePermitDetailRequest;

class PermitDetailController extends Controller
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
     * @param  \App\Http\Requests\StorePermitDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermitDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PermitDetail  $permitDetail
     * @return \Illuminate\Http\Response
     */
    public function show(PermitDetail $permitDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PermitDetail  $permitDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(PermitDetail $permitDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePermitDetailRequest  $request
     * @param  \App\Models\PermitDetail  $permitDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermitDetailRequest $request, PermitDetail $permitDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PermitDetail  $permitDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PermitDetail $permitDetail)
    {
        //
    }
}
