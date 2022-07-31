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
        $species = Species::orderBy('name')->get();

        return view('species.index', compact('species'));
    }

    public function create()
    {
        return view('species.create');        
    }

    public function store(StoreSpeciesRequest $request)
    {
        Species::create($request->validated());

        return redirect()->route('species.index');
        
    }

    public function show(Species $species)
    {
        return view('species.show', compact('species'));
        
    }

    public function edit(Species $species)
    {
        return view('species.edit', compact('species'));
    }

    public function update(UpdateSpeciesRequest $request, Species $species)
    {
        // $this->validate($request, [              
        //     'import_code'=> 'required|unique:species.import_code,'.$species,
        //     ]);  

        $species->update($request->validated());
        return redirect()->route('species.index');
        
    }

    public function destroy(Species $species)
    {
        
        $species->delete();

        return redirect()->route('species.index');
        
    }
}
