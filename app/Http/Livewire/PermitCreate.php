<?php

namespace App\Http\Livewire;

use App\Models\License;
use App\Models\Species;
use Livewire\Component;
use App\Models\District;
use App\Models\LandTypes;
use App\Imports\LogsImport;
use App\Models\LicenseAccCoupe;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class PermitCreate extends Component
{
    use WithFileUploads;

    public $permitdetails = [];
    public $species = [];
    public $line_no = 1;
    public $licenseAccounts;
    public $licenseId;
    public $logs_sheet;

    public $description = '';
    public $place_of_scaling = '';
    public $name_of_scaler = '';
    public $owner_of_property_hammer_mark = '';
    public $registered_property_hammer_mark = '';
    public $buyer = '';

    public function mount()
    {
        $this->species = Species::all();
        $this->licenses = License::where('licensee_id', Auth::user()->licensee->id)->orderBy('name')->pluck('id', 'name');
        $this->districts = District::orderBy('name','asc')->pluck('id','name')->prepend(trans(''), 'Please select');
        $this->landtypes = LandTypes::orderBy('name','asc')->pluck('id','name')->prepend(trans(''), 'Please select');
        $this->licenseAccounts = LicenseAccCoupe::where('license_id', $this->licenses->first())->orderBy('account_no','DESC')->get();


    }

    public function addDetails()
    {
        for($x=0; $x<=$this->line_no-1; $x++)
        {
            $this->permitdetails[] = ['log_no'=>'', 'species_id'=>'', 'length'=>0, 'diameter_1'=>0, 'diameter_2'=>0, 'mean'=>0, 'defect_symbol'=>0, 'defect_length'=>0, 'defect_diameter'=>0];
        }
    }

    public function importLogsExcel()
    {
        $this->validate([
            'logs_sheet' => ['required', 'file'],
        ]);

        $path = $this->logs_sheet->path();

        $pathParts = explode('livewire-tmp', $path);

        $path = 'livewire-tmp'.$pathParts[1];

        $uploadedFileMimeType = $this->logs_sheet->getMimeType();

        if (
        ! in_array(strtolower($uploadedFileMimeType), [
            'text/csv',
            'application/vnd.msexcel',
            'application/vnd.ms-excel',
            'text/comma-separated-values',
            'application/csv,application/excel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheetapplication/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ])
        ) {
            return $this->addError(
                'logs_sheet',
                'File format is not supported'
            );
        }

        $logs = Excel::toArray(new LogsImport(), $path,  config('filesystems.default'));


        $logs = collect($logs[0])->map(function ($log) {
            $log['mean'] = 0;

            return $log;
        })->toArray();

        $this->permitdetails = array_merge($logs, $this->permitdetails);

        $this->emit('imported');

        $this->reset(['logs_sheet']);
    }

    public function changeLicense()
    {
        $this->licenseAccounts = LicenseAccCoupe::where('license_id', $this->licenseId)->orderBy('account_no','DESC')->get();
    }

    public function removeDetail($index)
    {
        unset($this->permitdetails[$index]);
        $this->permitdetails = array_values($this->permitdetails);
    }

    public function render()
    {
        if (auth()->user()->is_activated == true)
        {
            return view('livewire.permit-create');
        }
        else{
            return <<<'blade'
            <div class="py-4 text-center">
                This account needs to be activated!  Please contact Administrator, Thank you!
            </div>
            blade;
        }
    }
}
