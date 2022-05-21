<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreRegionRequest;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\UpdateRegionRequest;
use Symfony\Component\HttpFoundation\Response;

class RegionsController extends Controller
{
    public function index()
    {
        $regions = Region::all();

        return view('regions.index', compact('regions'));
    }

    public function create()
    {
        $fos = User::whereHas('roles', function (Builder $query) {
            $query->where('title', 'like', 'FO');
        })->pluck('name', 'id')
        ->prepend(trans('global.pleaseSelect'), '');

        $ppws = User::whereHas('roles', function (Builder $query) {
            $query->where('title', 'like', 'PPW');
        })->pluck('name', 'id')
        ->prepend(trans('global.pleaseSelect'), '');

        $tppws = User::whereHas('roles', function (Builder $query) {
            $query->where('title', 'like', 'TPPW');
        })->pluck('name', 'id')
        ->prepend(trans('global.pleaseSelect'), '');

        return view('regions.create', compact('fos', 'ppws', 'tppws'));
    }

    public function store(StoreRegionRequest $request)
    {
        Region::create($request->validated());
        // $region = Region::create($request->all());

        return redirect()->route('regions.index');
    }

    public function show(Region $region)
    {
        return view('regions.show', compact('region'));
    }

    public function edit(Region $region)
    {
        $fos = User::whereHas('roles', function (Builder $query) {
            $query->where('title', 'like', 'FO');
        })->pluck('name', 'id')
        ->prepend(trans('global.pleaseSelect'), '');

        $ppws = User::whereHas('roles', function (Builder $query) {
            $query->where('title', 'like', 'PPW');
        })->pluck('name', 'id')
        ->prepend(trans('global.pleaseSelect'), '');

        $tppws = User::whereHas('roles', function (Builder $query) {
            $query->where('title', 'like', 'TPPW');
        })->pluck('name', 'id')
        ->prepend(trans('global.pleaseSelect'), '');


        return view('regions.edit', compact('region', 'fos', 'ppws', 'tppws'));
    }

    public function update(UpdateRegionRequest $request, Region $region)
    {
        $region->update($request->validated());

        return redirect()->route('regions.index');
    }

    public function destroy(Region $region)
    {
        $region->delete();

        return redirect()->route('regions.index');
    }
}
