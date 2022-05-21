<?php

namespace App\Http\Livewire;

use App\Models\Permit;
use App\Models\Region;
use App\Models\Species;
use Livewire\Component;
use App\Models\District;
use App\Models\LandTypes;
use App\Models\PermitDetail;
use Illuminate\Support\Facades\DB;

class ReportPermitSummary extends Component
{
    public $districtId;
    public $districtIds;
    public $regionId;
    public $landTypeId;
    public $loggingMethod;
    public $market;
    public $yearList;
    public $yearSelected;
    public $result;
    public $totalVol;
    public $totalAmount;

    public function mount()
    {
        $this->species = Species::all();
        $this->districts = District::orderBy('name','ASC')->get();
        $this->regions = Region::orderBy('name','ASC')->get();
        
        $this->result = Permit::select(DB::raw('YEAR(scaled_date) as year'))->distinct()->get();
        $this->yearList = $this->result->sortByDesc('year');

        $this->landtypes = LandTypes::all()->pluck('name', 'id');
        // $this->permits = Permit::all();
        // $this->permits = Permit::where('status','assigned')->get();
        $this->permits = Permit::where('status', env('PERMIT_STATUS'))->get();

        $this->totalVol = number_format($this->permits->sum('billed_vol'));
        $this->totalAmount = number_format($this->permits->sum('billed_amount'));

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

    public function changeYear()
    {
        // dd($this->yearSelected);
    }

    public function changeOption()
    {
        if ($this->yearSelected != '')
        {
            // $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)->get();
            if ($this->regionId != '')
            {
                if ($this->districtId == '' && $this->landTypeId == '' && $this->loggingMethod == '' && $this->market == '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)->whereIn('district_id', $this->districtIds)->where('status',env('PERMIT_STATUS'))->get();
                }
                elseif ($this->districtId != '' && $this->landTypeId == '' && $this->loggingMethod == '' && $this->market == '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)->whereIn('district_id', $this->districtIds)->where('district_id',$this->districtId)->where('status',env('PERMIT_STATUS'))->get();
                }
                elseif ($this->districtId == '' && $this->landTypeId != '' && $this->loggingMethod == '' && $this->market == '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)->whereIn('district_id', $this->districtIds)->where('land_type_id',$this->landTypeId)->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId == '' && $this->landTypeId == '' && $this->loggingMethod != '' && $this->market == '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)->whereIn('district_id', $this->districtIds)->where('logging_method',$this->loggingMethod)->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId == '' && $this->landTypeId == '' && $this->loggingMethod == '' && $this->market != '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)->whereIn('district_id', $this->districtIds)->where('market',$this->market)->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId != '' && $this->loggingMethod == '' && $this->market == '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)
                                        ->whereIn('district_id', $this->districtIds)
                                        ->where('district_id',$this->districtId)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId == '' && $this->loggingMethod != '' && $this->market == '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)
                                        ->whereIn('district_id', $this->districtIds)
                                        ->where('district_id',$this->districtId)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId == '' && $this->loggingMethod == '' && $this->market != '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)
                                        ->whereIn('district_id', $this->districtIds)
                                        ->where('district_id',$this->districtId)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId == '' && $this->landTypeId != '' && $this->loggingMethod != '' && $this->market == '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)
                                        ->whereIn('district_id', $this->districtIds)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId == '' && $this->landTypeId != '' && $this->loggingMethod == '' && $this->market != '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)
                                        ->whereIn('district_id', $this->districtIds)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId == '' && $this->landTypeId == '' && $this->loggingMethod != '' && $this->market != '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)
                                        ->whereIn('district_id', $this->districtIds)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId != '' && $this->loggingMethod != '' && $this->market == '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)
                                        ->whereIn('district_id', $this->districtIds)
                                        ->where('district_id',$this->districtId)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId != '' && $this->loggingMethod == '' && $this->market != '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)
                                        ->whereIn('district_id', $this->districtIds)
                                        ->where('district_id',$this->districtId)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId == '' && $this->loggingMethod != '' && $this->market != '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)
                                        ->whereIn('district_id', $this->districtIds)
                                        ->where('district_id',$this->districtId)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId == '' && $this->landTypeId != '' && $this->loggingMethod != '' && $this->market != '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)
                                        ->whereIn('district_id', $this->districtIds)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId != '' && $this->loggingMethod != '' && $this->market != '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)
                                        ->whereIn('district_id', $this->districtIds)
                                        ->where('district_id',$this->districtId)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
                }
    
            }
            else
            {
                if ($this->districtId == '' && $this->landTypeId == '' && $this->loggingMethod == '' && $this->market == '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)->where('status',env('PERMIT_STATUS'))->get();
                }
                elseif ($this->districtId != '' && $this->landTypeId == '' && $this->loggingMethod == '' && $this->market == '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)->where('district_id',$this->districtId)->where('status',env('PERMIT_STATUS'))->get();
                }
                elseif ($this->districtId == '' && $this->landTypeId != '' && $this->loggingMethod == '' && $this->market == '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)->where('land_type_id',$this->landTypeId)->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId == '' && $this->landTypeId == '' && $this->loggingMethod != '' && $this->market == '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)
                                        ->where('logging_method',$this->loggingMethod)->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId == '' && $this->landTypeId == '' && $this->loggingMethod == '' && $this->market != '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)
                                        ->where('market',$this->market)->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId != '' && $this->loggingMethod == '' && $this->market == '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)
                                        ->where('district_id',$this->districtId)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId == '' && $this->loggingMethod != '' && $this->market == '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)
                                        ->where('district_id',$this->districtId)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId == '' && $this->loggingMethod == '' && $this->market != '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)
                                        ->where('district_id',$this->districtId)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId == '' && $this->landTypeId != '' && $this->loggingMethod != '' && $this->market == '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId == '' && $this->landTypeId != '' && $this->loggingMethod == '' && $this->market != '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId == '' && $this->landTypeId == '' && $this->loggingMethod != '' && $this->market != '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId != '' && $this->loggingMethod != '' && $this->market == '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)
                                        ->where('district_id',$this->districtId)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId != '' && $this->loggingMethod == '' && $this->market != '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)
                                        ->where('district_id',$this->districtId)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId == '' && $this->loggingMethod != '' && $this->market != '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)
                                        ->where('district_id',$this->districtId)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId == '' && $this->landTypeId != '' && $this->loggingMethod != '' && $this->market != '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId != '' && $this->loggingMethod != '' && $this->market != '')
                {
                    $this->permits = Permit::whereYear('scaled_date', $this->yearSelected)
                                        ->where('district_id',$this->districtId)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
                }
            }            
        }
        else
        {
            // $this->permits = Permit::all();
            if ($this->regionId != '')
            {
                if ($this->districtId == '' && $this->landTypeId == '' && $this->loggingMethod == '' && $this->market == '')
                {
                    $this->permits = Permit::whereIn('district_id', $this->districtIds)->where('status',env('PERMIT_STATUS'))->get();
                }
                elseif ($this->districtId != '' && $this->landTypeId == '' && $this->loggingMethod == '' && $this->market == '')
                {
                    $this->permits = Permit::whereIn('district_id', $this->districtIds)->where('district_id',$this->districtId)->where('status',env('PERMIT_STATUS'))->get();
                }
                elseif ($this->districtId == '' && $this->landTypeId != '' && $this->loggingMethod == '' && $this->market == '')
                {
                    $this->permits = Permit::whereIn('district_id', $this->districtIds)->where('land_type_id',$this->landTypeId)->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId == '' && $this->landTypeId == '' && $this->loggingMethod != '' && $this->market == '')
                {
                    $this->permits = Permit::whereIn('district_id', $this->districtIds)->where('logging_method',$this->loggingMethod)->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId == '' && $this->landTypeId == '' && $this->loggingMethod == '' && $this->market != '')
                {
                    $this->permits = Permit::whereIn('district_id', $this->districtIds)->where('market',$this->market)->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId != '' && $this->loggingMethod == '' && $this->market == '')
                {
                    $this->permits = Permit::whereIn('district_id', $this->districtIds)
                                        ->where('district_id',$this->districtId)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId == '' && $this->loggingMethod != '' && $this->market == '')
                {
                    $this->permits = Permit::whereIn('district_id', $this->districtIds)
                                        ->where('district_id',$this->districtId)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId == '' && $this->loggingMethod == '' && $this->market != '')
                {
                    $this->permits = Permit::whereIn('district_id', $this->districtIds)
                                        ->where('district_id',$this->districtId)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId == '' && $this->landTypeId != '' && $this->loggingMethod != '' && $this->market == '')
                {
                    $this->permits = Permit::whereIn('district_id', $this->districtIds)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId == '' && $this->landTypeId != '' && $this->loggingMethod == '' && $this->market != '')
                {
                    $this->permits = Permit::whereIn('district_id', $this->districtIds)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId == '' && $this->landTypeId == '' && $this->loggingMethod != '' && $this->market != '')
                {
                    $this->permits = Permit::whereIn('district_id', $this->districtIds)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId != '' && $this->loggingMethod != '' && $this->market == '')
                {
                    $this->permits = Permit::whereIn('district_id', $this->districtIds)
                                        ->where('district_id',$this->districtId)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId != '' && $this->loggingMethod == '' && $this->market != '')
                {
                    $this->permits = Permit::whereIn('district_id', $this->districtIds)
                                        ->where('district_id',$this->districtId)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId == '' && $this->loggingMethod != '' && $this->market != '')
                {
                    $this->permits = Permit::whereIn('district_id', $this->districtIds)
                                        ->where('district_id',$this->districtId)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId == '' && $this->landTypeId != '' && $this->loggingMethod != '' && $this->market != '')
                {
                    $this->permits = Permit::whereIn('district_id', $this->districtIds)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId != '' && $this->loggingMethod != '' && $this->market != '')
                {
                    $this->permits = Permit::whereIn('district_id', $this->districtIds)
                                        ->where('district_id',$this->districtId)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
                }
    
            }
            else
            {
                if ($this->districtId == '' && $this->landTypeId == '' && $this->loggingMethod == '' && $this->market == '')
                {
                    $this->permits = Permit::where('status',env('PERMIT_STATUS'))->get();
                }
                elseif ($this->districtId != '' && $this->landTypeId == '' && $this->loggingMethod == '' && $this->market == '')
                {
                    $this->permits = Permit::where('district_id',$this->districtId)->where('status',env('PERMIT_STATUS'))->get();
                }
                elseif ($this->districtId == '' && $this->landTypeId != '' && $this->loggingMethod == '' && $this->market == '')
                {
                    $this->permits = Permit::where('land_type_id',$this->landTypeId)->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId == '' && $this->landTypeId == '' && $this->loggingMethod != '' && $this->market == '')
                {
                    $this->permits = Permit::where('logging_method',$this->loggingMethod)->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId == '' && $this->landTypeId == '' && $this->loggingMethod == '' && $this->market != '')
                {
                    $this->permits = Permit::where('market',$this->market)->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId != '' && $this->loggingMethod == '' && $this->market == '')
                {
                    $this->permits = Permit::where('district_id',$this->districtId)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId == '' && $this->loggingMethod != '' && $this->market == '')
                {
                    $this->permits = Permit::where('district_id',$this->districtId)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId == '' && $this->loggingMethod == '' && $this->market != '')
                {
                    $this->permits = Permit::where('district_id',$this->districtId)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId == '' && $this->landTypeId != '' && $this->loggingMethod != '' && $this->market == '')
                {
                    $this->permits = Permit::where('land_type_id',$this->landTypeId)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId == '' && $this->landTypeId != '' && $this->loggingMethod == '' && $this->market != '')
                {
                    $this->permits = Permit::where('land_type_id',$this->landTypeId)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId == '' && $this->landTypeId == '' && $this->loggingMethod != '' && $this->market != '')
                {
                    $this->permits = Permit::where('logging_method',$this->loggingMethod)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId != '' && $this->loggingMethod != '' && $this->market == '')
                {
                    $this->permits = Permit::where('district_id',$this->districtId)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId != '' && $this->loggingMethod == '' && $this->market != '')
                {
                    $this->permits = Permit::where('district_id',$this->districtId)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId == '' && $this->loggingMethod != '' && $this->market != '')
                {
                    $this->permits = Permit::where('district_id',$this->districtId)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId == '' && $this->landTypeId != '' && $this->loggingMethod != '' && $this->market != '')
                {
                    $this->permits = Permit::where('land_type_id',$this->landTypeId)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
    
                }
                elseif ($this->districtId != '' && $this->landTypeId != '' && $this->loggingMethod != '' && $this->market != '')
                {
                    $this->permits = Permit::where('district_id',$this->districtId)
                                        ->where('land_type_id',$this->landTypeId)
                                        ->where('logging_method',$this->loggingMethod)
                                        ->where('market',$this->market)
                                        ->where('status',env('PERMIT_STATUS'))->get();
                }
            }            
        }

        $this->totalVol = number_format($this->permits->sum('billed_vol'));
        $this->totalAmount = number_format($this->permits->sum('billed_amount'));
    }

   
    public function render()
    {
        return view('livewire.report-permit-summary');
    }
}
