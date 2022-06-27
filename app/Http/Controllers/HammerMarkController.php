<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\HammerMark;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreHammerMarkRequest;
use App\Http\Requests\UpdateHammerMarkRequest;

class HammerMarkController extends Controller
{
    public function index()
    {
        // $hammermarks = HammerMark::all();

        // return view('hammermarks.index', compact('hammermarks'));
        return view('hammermarks.index');

    }

    public function create()
    {
        $districts = District::all()->pluck('name', 'id');

        return view('hammermarks.create', compact('districts'));        
    }

    public function store(StoreHammerMarkRequest $request)
    {
        $hammerMark = HammerMark::create($request->validated());
        $hammerMark->status = 'A';
        $hammerMark->save();

        return redirect()->route('hammermarks.index');
        
        
    }

    public function show(HammerMark $hammermark)
    {
        return view('hammermarks.show', compact('hammermark'));
        
    }

    public function edit(HammerMark $hammermark)
    {
        $districts = District::all()->pluck('name', 'id');
        return view('hammermarks.edit', compact('hammermark', 'districts'));
    }

    public function update(UpdateHammerMarkRequest $request, HammerMark $hammermark)
    {
        $hammermark->update($request->validated());

        return redirect()->route('hammermarks.index');

    }

    public function destroy(HammerMark $hammermark)
    {
        $hammermark->status = 'D';
        $hammermark->save();

        return redirect()->route('hammermarks.index');

    }

    // public function destroy(HammerMark $hammermark)
    // {
    //     $hammermark->delete();

    //     return redirect()->route('hammermarks.index');

    // }
}
