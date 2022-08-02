<?php

namespace App\Http\Livewire\PaymentReports;

use App\Models\District;
use App\Models\Licensee;
use App\Models\Permit;
use App\Models\PermitCharge;
use App\Models\PermitDetail;
use App\Models\Region;
use Livewire\Component;

class R8PermitLogsProductionByRevenue extends Component
{
    use BaseReport;

    public $permits = [];
    public $landTypeList = [], $regionList = [], $districtList = [];
    public $landTypeId, $marketType, $selectedRegion, $selectedDistrict;
    public $totalVolume = 0, $totalPremium = 0, $totalRoyalty = 0, $totalPPM = 0, $totalFCF = 0, $total = 0;

    public function mount()
    {
        $this->landTypeList = $this->getLandTypeList();
        $this->regionList = $this->getRegionList();
        $this->districtList = $this->getDistrictList();

        $this->loadReport();
    }

    public function loadReport()
    {
        $this->permits = Permit::query()
            ->where('status', env('PERMIT_STATUS'))

            ->when($this->selectedYear, function ($q) {
                $q->whereYear('payment_date', $this->selectedYear);
            })
            ->when($this->selectedYear && $this->selectedMonth, function ($q) {
                $q->whereMonth('payment_date', $this->selectedMonth);
            })
            ->when($this->landTypeId, function ($q) {
                $q->where('land_type_id', $this->landTypeId);
            })
            ->when($this->selectedDistrict || $this->selectedRegion, function ($q) {
                if ($this->selectedDistrict) {
                    $q->where('district_id', $this->selectedDistrict);

                } elseif ($this->selectedRegion) {
                    $districtIds = District::query()
                        ->where('region_id', $this->selectedRegion)
                        ->select('id');

                    $q->whereIn('district_id', $districtIds);
                }
            })
            ->when($this->marketType, function ($q) {
                $q->where('market', $this->marketType);
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

                'volume' => PermitDetail::query()
                    ->whereColumn('permits.id','=', 'permit_details.permit_id')
                    ->selectRaw('sum(vol)'),

                'royalty' => PermitDetail::query()
                    ->whereColumn('permits.id','=', 'permit_details.permit_id')
                    ->selectRaw('sum(royalty)'),

                'premium' => PermitDetail::query()
                    ->whereColumn('permits.id','=', 'permit_details.permit_id')
                    ->selectRaw('sum(premium)'),

                'ppm' => PermitCharge::query()
                    ->whereColumn('permits.id', '=', 'permit_charges.permit_id')
                    ->where('permit_charges.unit', 'PPM')
                    ->selectRaw('sum(amount)'),

                'fcf' => PermitCharge::query()
                    ->whereColumn('permits.id', '=', 'permit_charges.permit_id')
                    ->where('permit_charges.unit', 'FCF')
                    ->selectRaw('sum(amount)'),
            ])
            ->selectRaw('
                id,
                user_id
            ')
            ->selectRaw('
                MONTH(payment_date) as month,
                YEAR(payment_date) as year
            ')
            ->groupBy('user_id', 'permits.id')
            ->orderByRaw('YEAR(payment_date) desc')
            ->orderByRaw('MONTH(payment_date)')
            ->oldest('licensee')
            ->oldest('region')
            ->oldest('district')
            ->get();

        $this->totalVolume = $this->permits->sum('volume');
        $this->totalRoyalty = $this->permits->sum('royalty');
        $this->totalPPM = $this->permits->sum('ppm');
        $this->totalPremium = $this->permits->sum('premium');
        $this->totalFCF = $this->permits->sum('fcf');

        $this->total = $this->totalVolume + $this->totalRoyalty + $this->totalPPM + $this->totalPremium + $this->totalFCF;
    }

    public function render()
    {
        return view('livewire.payment-reports.r8-permit-logs-production-by-revenue');
    }
}
