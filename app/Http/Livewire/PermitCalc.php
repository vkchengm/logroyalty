<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Permit;
use App\Models\PermitDetail;
use App\Models\District;
use App\Models\Species;
use App\Models\LandTypes;

class PermitEdit extends Component
{
    public $epermitdetails = [];
    public $species = [];
    public $permit;

    public function mount($permit)
    {
        $this->species = Species::all();
        $this->districts = District::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $this->districts2 = District::all();
        $this->landtypes = LandTypes::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $this->epermitdetails = PermitDetail::where('permit_id', $permit->id)->get()->toArray();
    }

    public function addEditDetail()
    {
        $this->epermitdetails[] = ['log_no'=>'', 'species_id'=>'', 'length'=>0, 'diameter_1'=>0, 'diameter_2'=>0, 'mean'=>0, 'defect_symbol'=>0, 'defect_length'=>0, 'defect_diameter'=>0];        
    }

    public function removeEditDetail($index)
    {
        unset($this->epermitdetails[$index]);
        $this->epermitdetails = array_values($this->epermitdetails);
    }


    public function render()
    {
        return view('livewire.permit-edit');
    }
}
