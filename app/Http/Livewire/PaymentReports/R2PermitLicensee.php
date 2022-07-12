<?php

namespace App\Http\Livewire\PaymentReports;

use App\Models\User;
use App\Models\Permit;
use App\Models\Region;
use App\Models\Licensee;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\District;
use App\Models\PermitDetail;
use Illuminate\Support\Facades\DB;

class R2PermitLicensee extends Component
{
    use BaseReport;

    public $permits, $totalVol;
    public $licenseeList, $districtList, $regionList;
    public $regionId, $districtId, $licenseeId;

    public function mount()
    {
        $this->licenseeList = $this->getLicenseeList();
        $this->districtList = $this->getDistrictList();
        $this->regionList = $this->getRegionList();

        $this->loadReport();
    }

    public function updatedRegionId($value)
    {
        $this->districtList = $this->getDistrictList($this->regionId);
    }

    public function loadReport()
    {
        $this->permits = Permit::query()
            ->selectRaw("
                user_id, district_id,
                sum(case when (logging_method='RIL') then billed_vol else 0 end) as ril_vol,
                sum(case when (logging_method='Non-RIL') then billed_vol else 0 end) as non_ril_vol,
                sum(case when (logging_method='Non-RIL') then billed_vol else 0 end)+sum(case when (logging_method='RIL') then billed_vol else 0 end) total_vol
            ")
            ->groupBy('user_id', 'district_id')
            ->when($this->licenseeId, function ($q) {
                $q->where('user_id', $this->licenseeId);
            })
            ->when($this->districtId || $this->regionId, function ($q) {
               if ($this->districtId) {
                   $q->where('district_id', $this->districtId);

               } elseif ($this->regionId) {
                   $districtIds = District::query()
                       ->where('region_id', $this->regionId)
                       ->select('id');

                   $q->whereIn('district_id', $districtIds);
               }
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
                    ->whereColumn('users.id', 'Permits.user_id')
                    ->take(1)
            )
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
            ->get();

        $this->totalVol = number_format($this->permits->sum('total_vol'));
    }

    public function render()
    {
        return view('livewire.payment-reports.r2-permit-licensee');
    }
}
