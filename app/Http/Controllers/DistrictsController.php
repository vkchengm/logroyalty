<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Region;
use App\Models\District;
use App\Models\DistrictKppm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Db;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\StoreDistrictRequest;
use App\Http\Requests\UpdateDistrictRequest;
use Symfony\Component\HttpFoundation\Response;

class DistrictsController extends Controller
{
    public function index()
    {
        $districts = District::orderBy('name')
                        ->get();

        return view('districts.index', compact('districts'));
    }

    public function create()
    {
        // $regions = Region::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        // $dfos = User::whereHas('roles', function (Builder $query) {
        //     $query->where('title', 'like', 'DFO');
        // })->pluck('name', 'id')
        // ->prepend(trans('global.pleaseSelect'), '');
        // return view('districts.create', compact('dfos', 'regions'));
        return view('districts.create');
    }

    public function edit(District $district)
    {
        $regions = Region::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dfos = User::whereHas('roles', function (Builder $query) {
                $query->where('title', 'like', 'DFO'); })
                ->pluck('name', 'id')
                ->prepend(trans('global.pleaseSelect'), '');

        $adfos = User::whereHas('roles', function (Builder $query) {
                $query->where('title', 'like', 'ADFO'); })
                ->pluck('name', 'id')
                ->prepend(trans('global.pleaseSelect'), '');

        return view('districts.edit', compact('dfos', 'adfos', 'regions', 'district'));
    }

    public function store(StoreDistrictRequest $request)
    {
        $district = District::create($request->all());

        // $count = count($request->districtKPPMs);
        if (!empty($request->districtKPPMs))
        {
            foreach ($request->districtKPPMs as $districtKPPM) {
                $line = new DistrictKppm;
                $line->district_id = $district->id;
                $line->kppm_id = $districtKPPM['kppm_id'];
                $line->save();
            }
        }   
        return redirect()->route('districts.index');
    }

    public function show(District $district)
    {
        return view('districts.show', compact('district'));
    }


    public function update(UpdateDistrictRequest $request, District $district)
    {

        $district->update($request->all());

        $deleted = DistrictKppm::where('district_id', $district->id)->delete();
        if (!empty($request->districtKPPMs)) 
        {
            foreach ($request->districtKPPMs as $districtKPPM) {
                $line = new DistrictKppm;
                $line->district_id = $district->id;
                $line->kppm_id = $districtKPPM['kppm_id'];
                $line->save();
            }
        }
        return redirect()->route('districts.index');
    }

    public function destroy(District $district)
    {
        $district->delete();

        return redirect()->route('districts.index');
    }
}
