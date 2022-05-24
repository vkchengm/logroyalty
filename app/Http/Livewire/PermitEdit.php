<?php

namespace App\Http\Livewire;

use App\Models\Permit;
use App\Models\License;
use App\Models\Species;
use Livewire\Component;
use App\Models\District;
use App\Models\LandTypes;
use App\Models\PermitDetail;
use App\Models\LicenseAccCoupe;

class PermitEdit extends Component
{
    public $permitdetails = [];
    public $species = [];
    public $line_no = 1;
    public $permit;
    public $licenses;
    public $licenseAccounts;
    public $licenseId;


    public function mount($permit)
    {
        $this->species = Species::all();
        $this->districts = District::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $this->districts2 = District::all();
        $this->landtypes = LandTypes::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $this->permitdetails = PermitDetail::where('permit_id', $permit->id)->get()->toArray();
        $this->licenses = License::where('licensee_id', $permit->user->licensee->id)->orderBy('name','ASC')->pluck('name', 'id');
        $this->licenseAccounts = LicenseAccCoupe::where('license_id', $permit->license_no)->orderBy('account_no','DESC')->pluck('account_no', 'id');
        $this->licenseCoupes = LicenseAccCoupe::where('license_id', $permit->license_no)->orderBy('coupe_no','DESC')->pluck('coupe_no', 'id');
        $this->licenseId = $permit->license_no;

    }

    public function changeLicense()
    {
        $this->licenseAccounts = LicenseAccCoupe::where('license_id', $this->licenseId)->orderBy('account_no','DESC')->pluck('account_no', 'id');
        $this->licenseCoupes = LicenseAccCoupe::where('license_id', $this->licenseId)->orderBy('coupe_no','DESC')->pluck('coupe_no', 'id');

    } 

    // public function addEditDetail()
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

    public function removeEditDetail($index)
    {
        unset($this->permitdetails[$index]);
        $this->permitdetails = array_values($this->permitdetails);
    }


    public function render()
    {
        return view('livewire.permit-edit');
    }
}
