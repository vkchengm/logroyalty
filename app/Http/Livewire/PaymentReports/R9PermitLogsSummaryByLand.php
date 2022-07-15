<?php

namespace App\Http\Livewire\PaymentReports;

use App\Models\District;
use App\Models\Permit;
use App\Models\Region;
use Livewire\Component;

class R9PermitLogsSummaryByLand extends Component
{
    use BaseReport;

    public $permits = [];
    public $landTypeList = [], $regionList = [], $districtList = [];
    public $landTypeId, $marketType, $selectedRegion, $selectedDistrict;
    public $rilTotal = 0, $nonRilTotal = 0, $total = 0;

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
                YEAR(payment_date) as year, MONTH(payment_date) as month,

                sum(case when (logging_method='RIL' and billed_vol >= 60) then billed_vol else 0 end) as ril_vol_more_than_59,
                sum(case when (logging_method='Non-RIL' and billed_vol >= 60) then billed_vol else 0 end) as non_ril_vol_more_than_59,
                sum(case when (logging_method='Non-RIL' and billed_vol >= 60) then billed_vol else 0 end)+sum(case when (logging_method='RIL' and billed_vol >= 60) then billed_vol else 0 end) total_vol_more_than_59,

                sum(case when (logging_method='RIL' and billed_vol >= 45 and billed_vol <= 59) then billed_vol else 0 end) as ril_vol_between_45_to_59,
                sum(case when (logging_method='Non-RIL' and billed_vol >= 45 and billed_vol <= 59) then billed_vol else 0 end) as non_ril_vol_between_45_to_59,
                sum(case when (logging_method='Non-RIL' and billed_vol >= 45 and billed_vol <= 59) then billed_vol else 0 end)+sum(case when (logging_method='RIL' and billed_vol >= 45 and billed_vol <= 59) then billed_vol else 0 end) total_vol_between_45_to_59,

                sum(case when (logging_method='RIL' and billed_vol >= 30 and billed_vol <= 44) then billed_vol else 0 end) as ril_vol_between_30_to_44,
                sum(case when (logging_method='Non-RIL' and billed_vol >= 30 and billed_vol <= 44) then billed_vol else 0 end) as non_ril_vol_between_30_to_44,
                sum(case when (logging_method='Non-RIL' and billed_vol >= 30 and billed_vol <= 44) then billed_vol else 0 end)+sum(case when (logging_method='RIL' and billed_vol >= 30 and billed_vol <= 44) then billed_vol else 0 end) total_vol_between_30_to_44,

                sum(case when (logging_method='RIL' and billed_vol <= 29) then billed_vol else 0 end) as ril_vol_less_than_29,
                sum(case when (logging_method='Non-RIL' and billed_vol <= 29) then billed_vol else 0 end) as non_ril_vol_less_than_29,
                sum(case when (logging_method='Non-RIL' and billed_vol <= 29) then billed_vol else 0 end)+sum(case when (logging_method='RIL' and billed_vol <= 29) then billed_vol else 0 end) total_vol_less_than_29,

                sum(case when (logging_method='RIL') then billed_vol else 0 end) as ril_vol,
                sum(case when (logging_method='Non-RIL') then billed_vol else 0 end) as non_ril_vol,
                sum(case when (logging_method='Non-RIL') then billed_vol else 0 end)+sum(case when (logging_method='RIL') then billed_vol else 0 end) total_vol
            ")
            ->groupByRaw('district_id, YEAR(payment_date), MONTH(payment_date)')

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
                    ->whereColumn('districts.id', 'permits.district_id')
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

        $this->rilTotal = $this->permits->sum('ril_vol');
        $this->nonRilTotal = $this->permits->sum('non_ril_vol');
        $this->total = $this->rilTotal + $this->nonRilTotal;
    }

    public function render()
    {
        return view('livewire.payment-reports.r9-permit-logs-summary-by-land');
    }
}
