<?php

namespace App\Http\Livewire;

use App\Models\Permit;
use App\Models\License;
use App\Models\Species;
use Livewire\Component;
use App\Models\District;
use App\Models\LandTypes;
use App\Imports\LogsImport;
use App\Models\PermitDetail;
use Illuminate\Http\Request;
use App\Models\LicenseAccCoupe;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PermitCreate extends Component
{
    public $permitdetails = [];
    public $species = [];
    public $line_no = 1;
    public $licenseAccounts;
    public $licenseId;

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

    // public function addDetail()
    // {
    //     $this->permitdetails[] = ['log_no'=>'', 'species_id'=>'', 'length'=>0, 'diameter_1'=>0, 'diameter_2'=>0, 'mean'=>0, 'defect_symbol'=>0, 'defect_length'=>0, 'defect_diameter'=>0];        
    // }

    public function addDetails()
    {
        for($x=0; $x<=$this->line_no-1; $x++)
        {
            $this->permitdetails[] = ['log_no'=>'', 'species_id'=>'', 'length'=>0, 'diameter_1'=>0, 'diameter_2'=>0, 'mean'=>0, 'defect_symbol'=>0, 'defect_length'=>0, 'defect_diameter'=>0];        
        }
    }

    public function importExcel(Request $request)
    {
        dd($request->file);
        // $file = $request->file('logs_file');
        // $file = $request->file('logs_file')->getRealPath();
        // $path1 = $request->file('logs_file')->store('temp'); 
        // $path=storage_path('app').'/'.$path1;  

        // $data = \Excel::import(new UsersImport,$path);

        // (new LogsImport)->import($request->file('logs_file'), null, \Maatwebsite\Excel\Excel::CSV);

        $path1 = $request->file('logs_file')->store('temp'); 
        $path=storage_path('app').'/'.$path1;  

        $collection = (new LogsImport)->toCollection($path, null, \Maatwebsite\Excel\Excel::CSV);
        // $collection = Excel::toCollection(new LogsImport, $path);
        dd('testing');
        for($x=0; $x<=$this->line_no-1; $x++)
        {
            $this->permitdetails[] = ['log_no'=>'', 'species_id'=>'', 'length'=>0, 'diameter_1'=>0, 'diameter_2'=>0, 'mean'=>0, 'defect_symbol'=>0, 'defect_length'=>0, 'defect_diameter'=>0];        
        }
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
