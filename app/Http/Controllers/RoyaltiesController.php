<?php

namespace App\Http\Controllers;

use App\Models\Royalties;
use App\Models\Species;
use App\Models\LandTypes;
use App\Models\LogSize;


use App\Http\Requests\StoreRoyaltiesRequest;
use App\Http\Requests\UpdateRoyaltiesRequest;

class RoyaltiesController extends Controller
{
    public function index()
    {
        $royalties = Royalties::all();
        // $royalties = Royalties::orderBy('class')
        //                 ->orderBy('market')
        //                 ->orderBy('species_id')
        //                 ->get();
                        
        return view('royalties.index', compact('royalties'));
    }

    public function create()
    {
        $species = Species::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $landtypes = LandTypes::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $logsizes = LogSize::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('royalties.create', compact('species', 'landtypes','logsizes'));

    }

    public function store(StoreRoyaltiesRequest $request)
    {
        $royalty = Royalties::create($request->all());

        return redirect()->route('royalties.index');

    }

    public function show(Royalties $royalties)
    {
        //
    }

    public function edit(Royalties $royalty)
    {
        $species = Species::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $landtypes = LandTypes::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $logsizes = LogSize::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('royalties.edit', compact('species', 'landtypes','logsizes','royalty'));
        
    }

    public function update(UpdateRoyaltiesRequest $request, Royalties $royalty)
    {
        $royalty->update($request->all());

        return redirect()->route('royalties.index');

    }

    public function destroy(Royalties $royalty)
    {
        $royalty->delete();

        return redirect()->route('royalties.index');

    }
}
