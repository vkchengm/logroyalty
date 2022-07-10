<?php

namespace App\Http\Livewire\PaymentReports;

use App\Models\Licensee;
use App\Models\Permit;
use App\Models\PermitDetail;
use App\Models\Region;
use App\Models\Species;
use Livewire\Component;

class R5PermitLandUsedBySpecies extends Component
{
    use BaseReport;

    public $permits = [];
    public $landTypeList = [];
    public $landTypeId, $totalVol = 0, $totalRoyalty = 0;

    public function mount()
    {
        $this->landTypeList = $this->getLandTypeList();

        $this->loadReport();
    }

    public function loadReport()
    {

        $this->permits = Permit::query()
            ->when($this->landTypeId, function ($q) {
                $q->where('land_type_id', $this->landTypeId);
            })
            ->rightJoin('permit_details', 'permit_details.permit_id', '=', 'permits.id')
            ->addSelect([
                'district' => \App\Models\District::query()
                    ->whereColumn('permits.district_id', '=', 'districts.id')
                    ->select('name'),

                'region' => Region::query()
                    ->join('districts', 'districts.region_id', '=', 'regions.id')
                    ->whereColumn('districts.id', 'permits.district_id')
                    ->select('regions.name'),

                'licensee' =>  Licensee::query()
                    ->join('users', 'users.licensee_id', '=', 'licensees.id')
                    ->whereColumn('users.id', 'permits.user_id')
                    ->select('licensees.name'),
//
                'species' =>  Species::query()
                    ->whereColumn('permit_details.species_id', 'species.id')
                    ->select('species.name'),
            ])
            ->selectRaw('
                MONTH(payment_date) as month,
                YEAR(payment_date) as year,
                permit_details.vol
            ')
            ->oldest('region')
            ->oldest('district')
            ->oldest('licensee')
            ->oldest('species')
            ->latest('year')
            ->oldest('month')
            ->get();

        $this->totalVol = $this->permits->sum('vol');
    }

    public function render()
    {
        return view('livewire.payment-reports.r5-permit-land-used-by-species');
    }
}

