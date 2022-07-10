<?php

namespace App\Http\Livewire\PaymentReports;

use App\Models\District;
use App\Models\Permit;
use App\Models\Region;
use Livewire\Component;

class R10PermitProductionLogging extends Component
{
    use BaseReport;

    public $permits = [];
    public $landTypeList = [], $regionList = [], $districtList = [];
    public $landTypeId, $marketType, $selectedRegion, $selectedDistrict;
    public $exportTotal = 0, $processingTotal = 0, $total = 0;

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
            ->selectRaw("
                district_id,
                user_id,
                sum(case when market='Export' then billed_vol else 0 end) as export,
                sum(case when market='Local Processing' then billed_vol else 0 end) as processing
            ")
            ->groupBy('user_id', 'district_id')
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
            ->orderBy(
                Region::query()
                    ->select('regions.name')
                    ->join('districts', 'districts.region_id', '=', 'regions.id')
                    ->whereColumn('districts.id', 'Permits.district_id')
                    ->take(1)
            )
            ->orderBy(
                District::query()
                    ->select('name')
                    ->whereColumn('district_id', 'districts.id')
                    ->orderByDesc('name')
                    ->limit(1)
            )
            ->where('status', env('PERMIT_STATUS'))
            ->with(['district', 'district.region'])
            ->get();

        $this->exportTotal = $this->permits->sum('export');
        $this->processingTotal = $this->permits->sum('processing');
        $this->total = $this->exportTotal + $this->processingTotal;
    }

    public function render()
    {
        return view('livewire.payment-reports.r10-permit-production-logging');
    }
}
