<?php

namespace App\Http\Livewire\PaymentReports;

use App\Models\District;
use App\Models\Licensee;
use App\Models\Permit;
use App\Models\PermitDetail;
use App\Models\Region;
use Livewire\Component;

class R6PermitLogsProduction extends Component
{
    use BaseReport;

    public $permits = [];
    public $landTypeList = [];
    public $landTypeId, $rilTotal = 0, $nonRilTotal = 0, $total = 0;

    public function mount()
    {
        $this->landTypeList = $this->getLandTypeList();

        $this->loadReport();
    }

    public function loadReport()
    {
        $this->permits = Permit::query()
            ->selectRaw("
                user_id, district_id,

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
            ->groupBy('user_id', 'district_id')
            ->when($this->landTypeId, function ($q) {
                $q->where('land_type_id', $this->landTypeId);
            })
            ->when($this->selectedYear, function ($q) {
                $q->whereYear('payment_date', $this->selectedYear);
            })
            ->when($this->selectedYear && $this->selectedMonth, function ($q) {
                $q->whereMonth('payment_date', $this->selectedMonth);
            })
            ->orderBy(
                Licensee::query()
                    ->select('licensees.name')
                    ->join('users', 'users.licensee_id', '=', 'licensees.id')
                    ->whereColumn('users.id', 'permits.user_id')
                    ->take(1)
            )
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
            ->get();

        $this->rilTotal = $this->permits->sum('ril_vol');
        $this->nonRilTotal = $this->permits->sum('non_ril_vol');
        $this->total = $this->rilTotal + $this->nonRilTotal;
    }

    public function render()
    {
        return view('livewire.payment-reports.r6-permit-logs-production');
    }
}
