<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTdpRequest;
use App\Http\Requests\UpdateTdpRequest;
use App\Models\Tdp;
use App\Models\TdpLog;
use App\Models\District;
use App\Models\Species;
use App\Models\LandTypes;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Db;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Response;

class TdpsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('permit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $tdps = Tdp::all();
        return view('tdps.index', compact('tdps'));
    }

    public function create()
    {
        // $districts = District::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        // $districts2 = District::all();
        // $species = Species::all();
        // $landtypes = LandTypes::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        // $tdpLogs = [
        //     []
        // ];
        // $landtypes = LandTypes::all();
        return view('tdps.create');
        // return view('tdps.create', compact('districts', 'districts2', 'species', 'landtypes', 'tdpLogs'));

    }

    public function show(Tdp $tdp)
    {
        $tdplogs = DB::table('tdp_logs')
                    ->where('tdp_id', '=', $tdp->id)
                    ->get();
        
        return view('tdps.show', compact('tdp'));
    }

    public function edit(Tdp $tdp)
    {
        // $districts = District::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        // $districts2 = District::all();
        // $species = Species::all();
        // $landtypes = LandTypes::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        // return view('tdps.edit', compact('tdp', 'districts', 'districts2', 'species', 'landtypes'));
        return view('tdps.edit', compact('tdp'));
    }

    public function assign(Tdp $tdp)
    {
        return view('tdps.assign', compact('tdp'));
    }

    public function store(StoreTdpRequest $request)
    {
        $tdp = Tdp::create($request->all());

        foreach ($request->tdpLogs as $log) {
            DB::table('tdp_logs')->insert([
                'tdp_id' => $tdp->id,
                'log_no' => $log['log_no'],
                'species_id' => $log['species'],
                'length' => $log['length'],
                'diameter_1' => $log['diameter_1'],
                'diameter_2' => $log['diameter_2'],
                'mean' => $log['mean'],
                'defect_symbol' => $log['defect_symbol'],
                'defect_length' => $log['defect_length'],
                'defect_diameter' => $log['defect_diameter'],
            ]);
            
        }

        return redirect()->route('tdps.index');
    }

    public function update(UpdateTdpRequest $request, Tdp $tdp)
    {
        $tdp->update($request->all());

        return redirect()->route('tdps.index');
    }

    public function destroy(Tdp $tdp)
    {
        $tdp->delete();

        return redirect()->route('tdps.index');
    }
}
