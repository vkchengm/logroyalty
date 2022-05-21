<?php

namespace App\Http\Controllers;

use App\Models\Prices;
use App\Models\Species;
use App\Models\LandTypes;
use App\Models\LogSize;


use App\Http\Requests\StorePricesRequest;
use App\Http\Requests\UpdatePricesRequest;

class PricesController extends Controller
{
    public function index()
    {
        $prices = Prices::all();
        return view('prices.index', compact('prices'));
    }

    public function create()
    {
        $species = Species::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $landtypes = LandTypes::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $logsizes = LogSize::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('prices.create', compact('species', 'landtypes','logsizes'));

    }

    public function store(StorePricesRequest $request)
    {
        $price = Prices::create($request->all());

        return redirect()->route('prices.index');

    }

    public function show(Prices $prices)
    {
        //
    }

    public function edit(Prices $price)
    {
        $species = Species::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $landtypes = LandTypes::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $logsizes = LogSize::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('prices.edit', compact('species', 'landtypes','logsizes','price'));
        
    }

    public function update(UpdatePricesRequest $request, Prices $price)
    {
        $price->update($request->all());

        return redirect()->route('prices.index');

    }

    public function destroy(Prices $price)
    {
        $price->delete();

        return redirect()->route('prices.index');

    }
}
