<?php

namespace App\Http\Controllers;

// use Maatwebsite\Excel\Excel;
use App\Models\License;
use App\Models\Licensee;
use App\Models\LicenseMaster;
use App\Models\LicenseAccCoupe;
use App\Imports\LicenseMasterImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreLicenseMasterRequest;
use App\Http\Requests\UpdateLicenseMasterRequest;

class LicenseMasterController extends Controller
{

    public function import() 
    {
        dd('testing');
        Excel::import(new LicenseMasterImport, 'LICMAS.csv');
        
        return redirect('/')->with('success', 'All good!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $licensemasters = LicenseMaster::limit(100)->get();

        return view('licensemasters.index', compact('licensemasters'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Importing License Master
        $deleted = LicenseMaster::truncate();
        Excel::import(new LicenseMasterImport, 'LICMAS.csv');

        // Importing Licensees
        $deleted = Licensee::whereNotIn('id', [1,2,3,4,5,6])->delete();
        
        $licensemasters = LicenseMaster::select('licensee_name')
                            ->where('licensee_name', '=','YAYASAN SABAH' )
                            ->distinct('licensee_name')->get();
        foreach($licensemasters as $licenseMaster) {
            $added = Licensee::create([
                'name' => $licenseMaster->licensee_name,
                'type' => 'Company',
            ]);
        };

        $licensemasters = LicenseMaster::select('licensee_name')
                            ->where('licensee_name', 'LIKE','DAERAH %' )
                            ->orWhere('licensee_name', 'LIKE','WILAYAH %' )
                            ->orWhere('licensee_name', 'LIKE','%AUTHORITY%' )
                            ->orWhere('licensee_name', 'LIKE','%DEVELOPMENT BOARD%' )
                            ->distinct('licensee_name')->get();
        foreach($licensemasters as $licenseMaster) {
            $added = Licensee::create([
                'name' => $licenseMaster->licensee_name,
                'type' => 'Government',
            ]);
        };

        $licensemasters = LicenseMaster::select('licensee_name')
                            ->where('licensee_name', 'LIKE','% DAN %' )
                            ->orWhere('licensee_name', 'LIKE','% AND %' )
                            ->orWhere('licensee_name', 'LIKE','%PESERTA%' )
                            ->orWhere(function($query)
                            {
                                $query->where('licensee_name', 'NOT LIKE','%CO LTD')
                                ->Where('licensee_name', 'LIKE','% & %');
                            })
                            ->distinct('licensee_name')->get();
        foreach($licensemasters as $licenseMaster) {
            $added = Licensee::create([
                'name' => $licenseMaster->licensee_name,
                'type' => 'Group',
            ]);
        };

        $licensemasters = LicenseMaster::select('licensee_name')
                        ->where('licensee_name', 'LIKE','% BHD' )
                        ->orWhere('licensee_name', 'LIKE','SYA%' )
                        ->orWhere('licensee_name', 'LIKE','SYT%' )
                        ->orWhere('licensee_name', 'LIKE','%LTD%' )
                        ->orWhere('licensee_name', 'LIKE','%ENTERPRISE%' )
                        ->orWhere('licensee_name', 'LIKE','%CONSTRUCTION%' )
                        ->distinct('licensee_name')->get();
        foreach($licensemasters as $licenseMaster) {
            $added = Licensee::firstOrCreate(
                ['name' => $licenseMaster->licensee_name],
                ['type' => 'Company']
            );
        };

        $licensemasters = LicenseMaster::select('licensee_name')
                            ->distinct('licensee_name')->get();
        foreach($licensemasters as $licenseMaster) {
            $added = Licensee::firstOrCreate(
                ['name' => $licenseMaster->licensee_name],
                ['type' => 'Individual']
            );
        };


        // Importing Licenses
        $licensemasters = LicenseMaster::select('license_no', 'licensee_name')
                            ->distinct('license_no')
                            ->where('license_no', '!=', null)
                            ->orderBy('license_no') 
                            ->get();
        $deleted = License::whereNotNull('id')->delete();
        foreach($licensemasters as $licenseMaster) {
            $licenseeId = Licensee::where('name', $licenseMaster->licensee_name)->first()->id;
            License::upsert([
                ['name' => $licenseMaster->license_no, 'licensee_id' => $licenseeId, 'type' => null],
            ], ['name', 'licensee_id'], ['type']);
        };


        // Importing License Account and Coupe
        $licensemasters = LicenseMaster::orderBy('account_no')->get();
        $deleted = LicenseAccCoupe::whereNotNull('id')->delete();
        foreach($licensemasters as $licenseMaster) {
            if($licenseMaster->license_no != null){
                $licenseeId = Licensee::where('name', $licenseMaster->licensee_name)->first()->id;
                // $licenseId = License::where('name', $licenseMaster->license_no)->first()->id;
                $licenseId = License::where('name', $licenseMaster->license_no)->where('licensee_id', $licenseeId)->first()->id;
                LicenseAccCoupe::upsert([
                    ['account_no' => $licenseMaster->account_no, 'license_id' => $licenseId, 'coupe_no' => $licenseMaster->coupe_no, 'issued_date' => $licenseMaster->issued_date],
                ], ['account_no', 'license_id', 'coupe_no'], ['issued_date']);    
                // ], ['account_no', 'license_id'], ['coupe_no', 'issued_date']);    

            }
        };

        // 'issued_date'    => !empty($row[5])?Carbon::createFromFormat("d/m/Y",$row[5])->format("Y-m-d"):null, 

        
        return redirect('/')->with('success', 'All good!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLicenseMasterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLicenseMasterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LicenseMaster  $licenseMaster
     * @return \Illuminate\Http\Response
     */
    public function show(LicenseMaster $licenseMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LicenseMaster  $licenseMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(LicenseMaster $licenseMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLicenseMasterRequest  $request
     * @param  \App\Models\LicenseMaster  $licenseMaster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLicenseMasterRequest $request, LicenseMaster $licenseMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LicenseMaster  $licenseMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(LicenseMaster $licenseMaster)
    {
        //
    }
}
