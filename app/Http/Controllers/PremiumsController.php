<?php

namespace App\Http\Controllers;

use App\Models\Premiums;
use App\Models\Species;
use App\Models\LandTypes;
use App\Models\LogSize;


use App\Http\Requests\StorePremiumsRequest;
use App\Http\Requests\UpdatePremiumsRequest;

class PremiumsController extends Controller
{
    public function index()
    {
        $premiums = Premiums::all();
        return view('premiums.index', compact('premiums'));
    }

    public function create()
    {
        // $species = Species::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $landtypes = LandTypes::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $logsizes = LogSize::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('premiums.create', compact('landtypes','logsizes'));

    }

    public function store(StorePremiumsRequest $request)
    {
        $premium = Premiums::create($request->all());

        return redirect()->route('premiums.index');

    }

    public function show(Premiums $premiums)
    {
        //
    }

    public function edit(Premiums $premium)
    {
        // $species = Species::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $landtypes = LandTypes::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $logsizes = LogSize::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('premiums.edit', compact('landtypes','logsizes','premium'));
        
    }

    public function update(UpdatePremiumsRequest $request, Premiums $premium)
    {
        $premium->update($request->all());

        return redirect()->route('premiums.index');

    }

    public function destroy(Premiums $premium)
    {
        $premium->delete();

        return redirect()->route('premiums.index');

    }
}
