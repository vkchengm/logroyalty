<?php

namespace App\Http\Controllers;

use App\Models\Species;
use App\Http\Requests\StoreSpeciesRequest;
use App\Http\Requests\UpdateSpeciesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SpeciesController extends Controller
{
    public function index()
    {
        $species = Species::all();

        return view('species.index', compact('species'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('species.create');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSpeciesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpeciesRequest $request)
    {
        Species::create($request->validated());

        return redirect()->route('species.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function show(Species $species)
    {
        return view('species.show', compact('species'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function edit(Species $species)
    {
        return view('species.edit', compact('species'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSpeciesRequest  $request
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpeciesRequest $request, Species $species)
    {
        $species->update($request->validated());

        return redirect()->route('species.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Species  $species
     * @return \Illuminate\Http\Response
     */
    public function destroy(Species $species)
    {
        
        $species->delete();

        return redirect()->route('species.index');
        
    }
}
