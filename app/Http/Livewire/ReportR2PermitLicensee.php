<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Permit;
use App\Models\Region;
use App\Models\Licensee;
use Livewire\Component;
use App\Models\District;
use App\Models\PermitDetail;
use Illuminate\Support\Facades\DB;

class ReportR2PermitLicensee extends Component
{
    public $districtId;
    public $districtIds;
    public $regionId;
    public $licenseeId;
    public $yearList;
    public $yearSelected;
    public $result;
    public $totalVol;
    public $totalAmount;
    public $sqlstring = 'user_id, district_id,
    sum(case when (logging_method="Helicopter") then billed_vol else 0 end) as helicopter_vol,
    sum(case when (logging_method="RIL") then billed_vol else 0 end) as ril_vol,
    sum(case when (logging_method="Non-RIL") then billed_vol else 0 end) as non_ril_vol,
    sum(case when (logging_method="Helicopter") then billed_vol else 0 end)+sum(case when (logging_method="Non-RIL") 
    then billed_vol else 0 end)+sum(case when (logging_method="RIL") then billed_vol else 0 end) total_vol,
    
    sum(case when (logging_method="Helicopter") then billed_amount else 0 end) as helicopter_amount,
    sum(case when (logging_method="RIL") then billed_amount else 0 end) as ril_amount,
    sum(case when (logging_method="Non-RIL") then billed_amount else 0 end) as non_ril_amount,
    sum(case when (logging_method="Helicopter") then billed_amount else 0 end)+sum(case when (logging_method="Non-RIL") 
    then billed_amount else 0 end)+sum(case when (logging_method="RIL") then billed_amount else 0 end) total_amount';

    public function mount()
    {
        $this->districts = District::orderBy('name','ASC')->get();
        $this->regions = Region::orderBy('name','ASC')->get();
        
        $this->result = Permit::select(DB::raw('YEAR(scaled_date) as year'))->distinct()->get();
        $this->yearList = $this->result->sortByDesc('year');

        $this->licensees = Permit::addSelect(['name' => Licensee::select('licensees.name')
            ->join('users', 'users.licensee_id', '=', 'licensees.id')
            ->whereColumn('users.id', 'Permits.user_id')
            ->take(1)
            ])
            ->distinct('user_id')
            ->orderByDesc('name')
            ->pluck('name','user_id');

        $this->permits = Permit::selectRaw($this->sqlstring)
                                        ->groupBy('user_id', 'district_id')
                                        ->orderBy(
                                            Licensee::select('licensees.name')
                                            ->join('users', 'users.licensee_id', '=', 'licensees.id')
                                            ->whereColumn('users.id', 'Permits.user_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            Region::select('regions.name')
                                            ->join('districts', 'districts.region_id', '=', 'regions.id')
                                            ->whereColumn('districts.id', 'Permits.district_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            District::select('name')
                                            ->whereColumn('district_id', 'districts.id')
                                            ->orderByDesc('name')
                                            ->limit(1)
                                        )
                                        ->where('status', env('PERMIT_STATUS'))
                                        ->get();

        $this->totalVol = number_format($this->permits->sum('total_vol'));
        $this->totalAmount = number_format($this->permits->sum('total_amount'));
    }

    public function changeRegion()
    {
        if ($this->regionId != '')
        {
            $this->districts = District::where('region_id', $this->regionId)->orderBy('name','ASC')->get();
        }
        else
        {
            $this->districts = District::orderBy('name','ASC')->get();            
        }
        
        $this->districtId = '';
        $this->districtIds = District::where('region_id', $this->regionId)->pluck('id');

        $this->changeOption();
    } 

    public function changeOption()
    {
        if ($this->yearSelected != '')
        {
            if ($this->regionId != '')
            {
                if ($this->districtId == '' && $this->licenseeId == '')
                {
                    $this->permits = Permit::selectRaw($this->sqlstring)
                    ->groupBy('user_id', 'district_id')
                    ->orderBy(
                        Licensee::select('licensees.name')
                        ->join('users', 'users.licensee_id', '=', 'licensees.id')
                        ->whereColumn('users.id', 'Permits.user_id')
                        ->take(1)
                    )
                    ->orderBy(
                        Region::select('regions.name')
                        ->join('districts', 'districts.region_id', '=', 'regions.id')
                        ->whereColumn('districts.id', 'Permits.district_id')
                        ->take(1)
                    )
                    ->orderBy(
                        District::select('name')
                        ->whereColumn('district_id', 'districts.id')
                        ->orderByDesc('name')
                        ->limit(1)
                    )->whereYear('scaled_date', $this->yearSelected)->whereIn('district_id', $this->districtIds)->where('status', env('PERMIT_STATUS'))
                    ->get();
                }
                elseif ($this->districtId != '' && $this->licenseeId == '')
                {
                    $this->permits = Permit::selectRaw($this->sqlstring)
                    ->groupBy('user_id', 'district_id')
                    ->orderBy(
                        Licensee::select('licensees.name')
                        ->join('users', 'users.licensee_id', '=', 'licensees.id')
                        ->whereColumn('users.id', 'Permits.user_id')
                        ->take(1)
                    )
                    ->orderBy(
                        Region::select('regions.name')
                        ->join('districts', 'districts.region_id', '=', 'regions.id')
                        ->whereColumn('districts.id', 'Permits.district_id')
                        ->take(1)
                    )
                    ->orderBy(
                        District::select('name')
                        ->whereColumn('district_id', 'districts.id')
                        ->orderByDesc('name')
                        ->limit(1)
                    )->whereYear('scaled_date', $this->yearSelected)->whereIn('district_id', $this->districtIds)->where('district_id',$this->districtId)->where('status', env('PERMIT_STATUS'))
                    ->get();
                }
                elseif ($this->districtId == '' && $this->licenseeId != '')
                {
                    $this->permits = Permit::selectRaw($this->sqlstring)
                                        ->groupBy('user_id', 'district_id')
                                        ->orderBy(
                                            Licensee::select('licensees.name')
                                            ->join('users', 'users.licensee_id', '=', 'licensees.id')
                                            ->whereColumn('users.id', 'Permits.user_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            Region::select('regions.name')
                                            ->join('districts', 'districts.region_id', '=', 'regions.id')
                                            ->whereColumn('districts.id', 'Permits.district_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            District::select('name')
                                            ->whereColumn('district_id', 'districts.id')
                                            ->orderByDesc('name')
                                            ->limit(1)
                                        )->whereYear('scaled_date', $this->yearSelected)->whereIn('district_id', $this->districtIds)->where('user_id',$this->licenseeId)->where('status', env('PERMIT_STATUS'))
                                        ->get();
    
                }
                elseif ($this->districtId == '' && $this->licenseeId == '')
                {
                    $this->permits = Permit::selectRaw($this->sqlstring)
                                        ->groupBy('user_id', 'district_id')
                                        ->orderBy(
                                            Licensee::select('licensees.name')
                                            ->join('users', 'users.licensee_id', '=', 'licensees.id')
                                            ->whereColumn('users.id', 'Permits.user_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            Region::select('regions.name')
                                            ->join('districts', 'districts.region_id', '=', 'regions.id')
                                            ->whereColumn('districts.id', 'Permits.district_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            District::select('name')
                                            ->whereColumn('district_id', 'districts.id')
                                            ->orderByDesc('name')
                                            ->limit(1)
                                        )->whereYear('scaled_date', $this->yearSelected)->whereIn('district_id', $this->districtIds)->where('status', env('PERMIT_STATUS'))
                                        ->get();
    
                }
                elseif ($this->districtId != '' && $this->licenseeId != '')
                {
                    $this->permits = Permit::selectRaw($this->sqlstring)
                                        ->groupBy('user_id', 'district_id')
                                        ->orderBy(
                                            Licensee::select('licensees.name')
                                            ->join('users', 'users.licensee_id', '=', 'licensees.id')
                                            ->whereColumn('users.id', 'Permits.user_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            Region::select('regions.name')
                                            ->join('districts', 'districts.region_id', '=', 'regions.id')
                                            ->whereColumn('districts.id', 'Permits.district_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            District::select('name')
                                            ->whereColumn('district_id', 'districts.id')
                                            ->orderByDesc('name')
                                            ->limit(1)
                                        )->whereYear('scaled_date', $this->yearSelected)
                                        ->whereIn('district_id', $this->districtIds)
                                        ->where('district_id',$this->districtId)
                                        ->where('user_id',$this->licenseeId)
                                        ->where('status', env('PERMIT_STATUS'))
                                        ->get();
                }
            }
            else
            {
                if ($this->districtId == '' && $this->licenseeId == '')
                {
                    $this->permits = Permit::selectRaw($this->sqlstring)
                                        ->groupBy('user_id', 'district_id')
                                        ->orderBy(
                                            Licensee::select('licensees.name')
                                            ->join('users', 'users.licensee_id', '=', 'licensees.id')
                                            ->whereColumn('users.id', 'Permits.user_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            Region::select('regions.name')
                                            ->join('districts', 'districts.region_id', '=', 'regions.id')
                                            ->whereColumn('districts.id', 'Permits.district_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            District::select('name')
                                            ->whereColumn('district_id', 'districts.id')
                                            ->orderByDesc('name')
                                            ->limit(1)
                                        )->whereYear('scaled_date', $this->yearSelected)->where('status', env('PERMIT_STATUS'))
                                        ->get();
                }
                elseif ($this->districtId != '' && $this->licenseeId == '')
                {
                    $this->permits = Permit::selectRaw($this->sqlstring)
                                        ->groupBy('user_id', 'district_id')
                                        ->orderBy(
                                            Licensee::select('licensees.name')
                                            ->join('users', 'users.licensee_id', '=', 'licensees.id')
                                            ->whereColumn('users.id', 'Permits.user_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            Region::select('regions.name')
                                            ->join('districts', 'districts.region_id', '=', 'regions.id')
                                            ->whereColumn('districts.id', 'Permits.district_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            District::select('name')
                                            ->whereColumn('district_id', 'districts.id')
                                            ->orderByDesc('name')
                                            ->limit(1)
                                        )->whereYear('scaled_date', $this->yearSelected)->where('district_id',$this->districtId)->where('status', env('PERMIT_STATUS'))
                                        ->get();
                }
                elseif ($this->districtId == '' && $this->licenseeId != '')
                {
                    $this->permits = Permit::selectRaw($this->sqlstring)
                                        ->groupBy('user_id', 'district_id')
                                        ->orderBy(
                                            Licensee::select('licensees.name')
                                            ->join('users', 'users.licensee_id', '=', 'licensees.id')
                                            ->whereColumn('users.id', 'Permits.user_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            Region::select('regions.name')
                                            ->join('districts', 'districts.region_id', '=', 'regions.id')
                                            ->whereColumn('districts.id', 'Permits.district_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            District::select('name')
                                            ->whereColumn('district_id', 'districts.id')
                                            ->orderByDesc('name')
                                            ->limit(1)
                                        )->whereYear('scaled_date', $this->yearSelected)->where('user_id',$this->licenseeId)->where('status', env('PERMIT_STATUS'))
                                        ->get();
    
                }
                elseif ($this->districtId != '' && $this->licenseeId != '')
                {
                    $this->permits = Permit::selectRaw($this->sqlstring)
                                        ->groupBy('user_id', 'district_id')
                                        ->orderBy(
                                            Licensee::select('licensees.name')
                                            ->join('users', 'users.licensee_id', '=', 'licensees.id')
                                            ->whereColumn('users.id', 'Permits.user_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            Region::select('regions.name')
                                            ->join('districts', 'districts.region_id', '=', 'regions.id')
                                            ->whereColumn('districts.id', 'Permits.district_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            District::select('name')
                                            ->whereColumn('district_id', 'districts.id')
                                            ->orderByDesc('name')
                                            ->limit(1)
                                        )->whereYear('scaled_date', $this->yearSelected)
                                        ->where('district_id',$this->districtId)
                                        ->where('user_id',$this->licenseeId)
                                        ->where('status', env('PERMIT_STATUS'))
                                        ->get();
                }
            }            
        }
        else
        {
            if ($this->regionId != '')
            {
                if ($this->districtId == '' && $this->licenseeId == '')
                {
                    $this->permits = Permit::selectRaw($this->sqlstring)
                                        ->groupBy('user_id', 'district_id')
                                        ->orderBy(
                                            Licensee::select('licensees.name')
                                            ->join('users', 'users.licensee_id', '=', 'licensees.id')
                                            ->whereColumn('users.id', 'Permits.user_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            Region::select('regions.name')
                                            ->join('districts', 'districts.region_id', '=', 'regions.id')
                                            ->whereColumn('districts.id', 'Permits.district_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            District::select('name')
                                            ->whereColumn('district_id', 'districts.id')
                                            ->orderByDesc('name')
                                            ->limit(1)
                                        )->whereIn('district_id', $this->districtIds)->where('status', env('PERMIT_STATUS'))
                                        ->get();
                }
                elseif ($this->districtId != '' && $this->licenseeId == '')
                {
                    $this->permits = Permit::selectRaw($this->sqlstring)
                                        ->groupBy('user_id', 'district_id')
                                        ->orderBy(
                                            Licensee::select('licensees.name')
                                            ->join('users', 'users.licensee_id', '=', 'licensees.id')
                                            ->whereColumn('users.id', 'Permits.user_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            Region::select('regions.name')
                                            ->join('districts', 'districts.region_id', '=', 'regions.id')
                                            ->whereColumn('districts.id', 'Permits.district_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            District::select('name')
                                            ->whereColumn('district_id', 'districts.id')
                                            ->orderByDesc('name')
                                            ->limit(1)
                                        )->whereIn('district_id', $this->districtIds)->where('district_id',$this->districtId)->where('status', env('PERMIT_STATUS'))
                                        ->get();
                }
                elseif ($this->districtId == '' && $this->licenseeId != '')
                {
                    $this->permits = Permit::selectRaw($this->sqlstring)
                                        ->groupBy('user_id', 'district_id')
                                        ->orderBy(
                                            Licensee::select('licensees.name')
                                            ->join('users', 'users.licensee_id', '=', 'licensees.id')
                                            ->whereColumn('users.id', 'Permits.user_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            Region::select('regions.name')
                                            ->join('districts', 'districts.region_id', '=', 'regions.id')
                                            ->whereColumn('districts.id', 'Permits.district_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            District::select('name')
                                            ->whereColumn('district_id', 'districts.id')
                                            ->orderByDesc('name')
                                            ->limit(1)
                                        )->whereIn('district_id', $this->districtIds)->where('user_id',$this->licenseeId)->where('status', env('PERMIT_STATUS'))
                                        ->get();
                }
                elseif ($this->districtId != '' && $this->licenseeId != '')
                {
                    $this->permits = Permit::selectRaw($this->sqlstring)
                                        ->groupBy('user_id', 'district_id')
                                        ->orderBy(
                                            Licensee::select('licensees.name')
                                            ->join('users', 'users.licensee_id', '=', 'licensees.id')
                                            ->whereColumn('users.id', 'Permits.user_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            Region::select('regions.name')
                                            ->join('districts', 'districts.region_id', '=', 'regions.id')
                                            ->whereColumn('districts.id', 'Permits.district_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            District::select('name')
                                            ->whereColumn('district_id', 'districts.id')
                                            ->orderByDesc('name')
                                            ->limit(1)
                                        )->whereIn('district_id', $this->districtIds)
                                        ->where('district_id',$this->districtId)
                                        ->where('user_id',$this->licenseeId)
                                        ->where('status', env('PERMIT_STATUS'))
                                        ->get();
                }
            }
            else
            {
                if ($this->districtId == '' && $this->licenseeId == '')
                {
                    $this->permits = Permit::selectRaw($this->sqlstring)
                                        ->groupBy('user_id', 'district_id')
                                        ->orderBy(
                                            Licensee::select('licensees.name')
                                            ->join('users', 'users.licensee_id', '=', 'licensees.id')
                                            ->whereColumn('users.id', 'Permits.user_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            Region::select('regions.name')
                                            ->join('districts', 'districts.region_id', '=', 'regions.id')
                                            ->whereColumn('districts.id', 'Permits.district_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            District::select('name')
                                            ->whereColumn('district_id', 'districts.id')
                                            ->orderByDesc('name')
                                            ->limit(1)
                                        )->where('status', env('PERMIT_STATUS'))
                                        ->get();
                }
                elseif ($this->districtId != '' && $this->licenseeId == '')
                {
                    $this->permits = Permit::selectRaw($this->sqlstring)
                                        ->groupBy('user_id', 'district_id')
                                        ->orderBy(
                                            Licensee::select('licensees.name')
                                            ->join('users', 'users.licensee_id', '=', 'licensees.id')
                                            ->whereColumn('users.id', 'Permits.user_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            Region::select('regions.name')
                                            ->join('districts', 'districts.region_id', '=', 'regions.id')
                                            ->whereColumn('districts.id', 'Permits.district_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            District::select('name')
                                            ->whereColumn('district_id', 'districts.id')
                                            ->orderByDesc('name')
                                            ->limit(1)
                                        )->where('district_id',$this->districtId)->where('status', env('PERMIT_STATUS'))
                                        ->get();
                }
                elseif ($this->districtId == '' && $this->licenseeId != '')
                {
                    // dd($this->licenseeId);
                    $this->permits = Permit::selectRaw($this->sqlstring)
                                        ->groupBy('user_id', 'district_id')
                                        ->orderBy(
                                            Licensee::select('licensees.name')
                                            ->join('users', 'users.licensee_id', '=', 'licensees.id')
                                            ->whereColumn('users.id', 'Permits.user_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            Region::select('regions.name')
                                            ->join('districts', 'districts.region_id', '=', 'regions.id')
                                            ->whereColumn('districts.id', 'Permits.district_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            District::select('name')
                                            ->whereColumn('district_id', 'districts.id')
                                            ->orderByDesc('name')
                                            ->limit(1)
                                        )->where('user_id',$this->licenseeId)->where('status', env('PERMIT_STATUS'))
                                        ->get();
    
                }
                elseif ($this->districtId != '' && $this->licenseeId != '')
                {
                    $this->permits = Permit::selectRaw($this->sqlstring)
                                        ->groupBy('user_id', 'district_id')
                                        ->orderBy(
                                            Licensee::select('licensees.name')
                                            ->join('users', 'users.licensee_id', '=', 'licensees.id')
                                            ->whereColumn('users.id', 'Permits.user_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            Region::select('regions.name')
                                            ->join('districts', 'districts.region_id', '=', 'regions.id')
                                            ->whereColumn('districts.id', 'Permits.district_id')
                                            ->take(1)
                                        )
                                        ->orderBy(
                                            District::select('name')
                                            ->whereColumn('district_id', 'districts.id')
                                            ->orderByDesc('name')
                                            ->limit(1)
                                        )->where('district_id',$this->districtId)
                                        ->where('user_id',$this->licenseeId)
                                        ->where('status', env('PERMIT_STATUS'))
                                        ->get();
                }
            }            
        }

        $this->totalVol = number_format($this->permits->sum('total_vol'));
        $this->totalAmount = number_format($this->permits->sum('total_amount'));
    }

   
    public function render()
    {
        return view('livewire.report-r2-permit-licensee');
    }
}
