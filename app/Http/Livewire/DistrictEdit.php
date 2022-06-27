<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Region;
use App\Models\DistrictKppm;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class DistrictEdit extends Component
{
    public $districtKPPMs = [];
    public $selectedKPPM;
    public $name;
    public $district;

    public function mount($district)
    {
        $this->name = $district->name;
        $this->regions = Region::all()->pluck('name', 'id');

        $this->dfos = User::whereHas('roles', function (Builder $query) {
            $query->where('title', 'like', 'DFO');
        })->pluck('name', 'id')
        ->prepend(trans('global.pleaseSelect'), '');

        $this->adfos = User::whereHas('roles', function (Builder $query) {
            $query->where('title', 'like', 'ADFO');
        })
        ->pluck('name', 'id');

        $this->kppms = User::whereHas('roles', function (Builder $query) {
            $query->where('title', 'like', 'KPPM');
        })->orderby('name')->get();


        $selectedKPPMs = DistrictKppm::where('district_id', $district->id)->get();
        foreach ($selectedKPPMs as $selectedKPPM)
        {
            $this->districtKPPMs[] = ['kppm_id'=>$selectedKPPM->kppm_id, 'kppm_name'=>$selectedKPPM->kppm->name];    

        }

    }

    public function addKPPM()
    {
        if ($this->selectedKPPM != '') 
        {
            $kppm = User::where('id', $this->selectedKPPM)->first();
            // $this->districtKPPMs[] = ['kppm_id'=>$this->selectedKPPM, 'kppm_name'=>$kppm->name];    
            $this->districtKPPMs[] = ['kppm_id'=>$kppm->id, 'kppm_name'=>$kppm->name];    
            // $this->districtKPPMs[] = ['kppm_name'=>$kppm->id];    


        }
        // dd($this->districtKPPMs);
    }

    public function removeKPPM($index)
    {
        unset($this->districtKPPMs[$index]);
        $this->districtKPPMs = array_values($this->districtKPPMs);
        
    }

    public function render()
    {
        return view('livewire.district-edit');
    }
}
