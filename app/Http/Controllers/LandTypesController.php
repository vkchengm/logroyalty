<?php

namespace App\Http\Controllers;

use App\Models\LandTypes;
use App\Http\Requests\StoreLandTypesRequest;
use App\Http\Requests\UpdateLandTypesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class LandTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $landtypes = LandTypes::all();

        return view('landtypes.index', compact('landtypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('landtypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLandTypesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLandTypesRequest $request)
    {
        LandTypes::create($request->validated());

        return redirect()->route('landtypes.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LandTypes  $landTypes
     * @return \Illuminate\Http\Response
     */
    public function show(LandTypes $landtypes)
    {
        return view('landtypes.show', compact('landtypes'));        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LandTypes  $landTypes
     * @return \Illuminate\Http\Response
     */
    public function edit(LandTypes $landtype)
    {
        return view('landtypes.edit', compact('landtype'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLandTypesRequest  $request
     * @param  \App\Models\LandTypes  $landTypes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLandTypesRequest $request, LandTypes $landtype)
    {
        $landtype->update($request->validated());

        return redirect()->route('landtypes.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LandTypes  $landTypes
     * @return \Illuminate\Http\Response
     */
    public function destroy(LandTypes $landtype)
    {
        $landtype->delete();

        return redirect()->route('landtypes.index');
        
    }
}
