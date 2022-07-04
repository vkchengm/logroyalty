<?php

namespace App\Http\Livewire\PaymentReports;

use App\Models\Licensee;
use App\Models\Permit;
use App\Models\PermitDetail;
use App\Models\Region;
use Livewire\Component;

class R4PermitLandUsedByVolume extends Component
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
            ])
            ->selectRaw('
                MONTH(payment_date) as month,
                YEAR(payment_date) as year
            ')
            ->oldest('district')
            ->latest('year')
            ->oldest('month')
            ->oldest('licensee')
            ->oldest('region')
            ->get();

        $this->totalVol = $this->permits->sum('billed_vol');
        $this->totalRoyalty = $this->permits->sum('billed_amount');
    }

    public function render()
    {
        return view('livewire.payment-reports.r4-permit-land-used-by-volume');
    }
}
