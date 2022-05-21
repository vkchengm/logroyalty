<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tdp;
use App\Models\TdpLog;
use App\Models\District;
use App\Models\Species;
use App\Models\LandTypes;

class Logs extends Component
{
    public $tdpLogs = [];
    public $species = [];

    public function mount()
    {
        $this->species = Species::all();
        $this->districts = District::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $this->districts2 = District::all();
        $this->landtypes = LandTypes::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $this->tdpLogs = [
            ['log_no'=>'', 'length'=>0, 'diameter_1'=>0, 'diameter_2'=>0, 'mean'=>0, 'defect_symbol'=>0, 'defect_length'=>0, 'defect_diameter'=>0]
        ];
    }

    public function addLog()
    {
        $this->tdpLogs[] = ['log_no'=>'', 'length'=>0, 'diameter_1'=>0, 'diameter_2'=>0, 'mean'=>0, 'defect_symbol'=>0, 'defect_length'=>0, 'defect_diameter'=>0];        
    }

    public function removeLog($index)
    {
        unset($this->tdpLogs[$index]);
        $this->tdpLogs = array_values($this->tdpLogs);
    }

    public function render()
    {
        return view('livewire.logs');
    }
}
