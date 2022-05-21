<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Permit;
use App\Models\Region;
use App\Models\Licensee;
use Livewire\Component;
use App\Models\District;
use App\Models\LandTypes;
use App\Models\PermitDetail;
use Illuminate\Support\Facades\DB;

class ReportR3PermitLandtypeDiameter extends Component
{
    public $yearList;
    public $monthList;
    public $landTypeId;

    public $yearSelected;
    public $monthSelected;

    public $result;
    public $totalVol;
    public $totalAmount;

    public $sqlstring = 'permit_id,
                        sum(case when (mean>=60) then vol else 0 end) as "cm60",
                        sum(case when (mean<60) and (mean>=44) then vol else 0 end) as "cm44",
                        sum(case when (mean<44) and (mean>=30)then vol else 0 end) as "cm30",
                        sum(case when (mean<30) then vol else 0 end) as "cm29",
                        sum(vol) total_vol';

    public function mount()
    {
        $this->landtypes = LandTypes::all()->pluck('name', 'id');
        
        $this->result = Permit::select(DB::raw('YEAR(scaled_date) as year'))->distinct()->get();
        $this->yearList = $this->result->sortByDesc('year');

        $this->result = Permit::select(DB::raw('MONTH(scaled_date) as month'))->distinct()->get();
        $this->monthList = $this->result->sortBy('month');

        $this->permits = Permit::
                        join('permit_details', 'permits.id', '=', 'permit_details.permit_id')
                        ->select('permit_details.permit_id','permits.*', 'permit_details.*')
                        // ->groupBy('permit_id')
                        ->get()->toArray();
        dd($this->permits);

        $this->permits = PermitDetail::selectRaw($this->sqlstring)

                                        ->addSelect(['district_id' =>Permit::select('district_id')
                                            ->whereColumn('permit_id', 'permits.id')
                                            ->orderByDesc('district_id')
                                            ->limit(1)
                                        ])

                                        // ->addSelect(['name' => Licensee::select('licensees.name')
                                        // ->join('users', 'users.licensee_id', '=', 'licensees.id')
                                        // ->whereColumn('users.id', 'Permits.user_id')
                                        // ->take(1)
                                        // ])

                                        ->groupBy('permit_id')
                                        // ->groupBy('district_id')

                                        // ->groupBy('user_id', 'district_id')
                                        // ->orderBy(
                                        //     Licensee::select('licensees.name')
                                        //     ->join('users', 'users.licensee_id', '=', 'licensees.id')
                                        //     ->whereColumn('users.id', 'Permits.user_id')
                                        //     ->take(1)
                                        // )
                                        // ->orderBy(
                                        //     Region::select('regions.name')
                                        //     ->join('districts', 'districts.region_id', '=', 'regions.id')
                                        //     ->whereColumn('districts.id', 'Permits.district_id')
                                        //     ->take(1)
                                        // )
                                        // ->orderBy(
                                        //     District::select('name')
                                        //     ->whereColumn('district_id', 'districts.id')
                                        //     ->orderByDesc('name')
                                        //     ->limit(1)
                                        // )
                                        ->get();
        // dd($this->permits);
        $this->totalVol = number_format($this->permits->sum('total_vol'));
        $this->total60Vol = number_format($this->permits->sum('cm60'));
        $this->total44Vol = number_format($this->permits->sum('cm44'));
        $this->total30Vol = number_format($this->permits->sum('cm30'));
        $this->total29Vol = number_format($this->permits->sum('cm29'));

        // $this->totalAmount = number_format($this->permits->sum('total_amount'));
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
                    )->whereYear('scaled_date', $this->yearSelected)->whereIn('district_id', $this->districtIds)->get();
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
                    )->whereYear('scaled_date', $this->yearSelected)->whereIn('district_id', $this->districtIds)->where('district_id',$this->districtId)->get();
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
                                        )->whereYear('scaled_date', $this->yearSelected)->whereIn('district_id', $this->districtIds)->where('user_id',$this->licenseeId)->get();
    
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
                                        )->whereYear('scaled_date', $this->yearSelected)->whereIn('district_id', $this->districtIds)->get();
    
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
                                        )->whereYear('scaled_date', $this->yearSelected)->get();
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
                                        )->whereYear('scaled_date', $this->yearSelected)->where('district_id',$this->districtId)->get();
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
                                        )->whereYear('scaled_date', $this->yearSelected)->where('user_id',$this->licenseeId)->get();
    
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
                                        )->whereIn('district_id', $this->districtIds)->get();
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
                                        )->whereIn('district_id', $this->districtIds)->where('district_id',$this->districtId)->get();
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
                                        )->whereIn('district_id', $this->districtIds)->where('user_id',$this->licenseeId)->get();
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
                                        )->get();
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
                                        )->where('district_id',$this->districtId)->get();
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
                                        )->where('user_id',$this->licenseeId)->get();
    
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
                                        ->get();
                }
            }            
        }

        $this->totalVol = number_format($this->permits->sum('total_vol'));
        $this->totalAmount = number_format($this->permits->sum('total_amount'));
    }

   
    public function render()
    {
        return view('livewire.report-r3-permit-landtype-diameter');
    }
}
