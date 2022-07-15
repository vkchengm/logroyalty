<?php

namespace App\Http\Livewire\PaymentReports;

use App\Models\District;
use App\Models\Licensee;
use App\Models\Permit;
use App\Models\Region;
use Livewire\Component;

class R11PermitLandByRegion extends Component
{
    use BaseReport;

    public $permits = [];
    public $landTypeList = [], $landTypeId;
    public $totalVolume = 0, $totalRoyalty = 0, $total = 0;

    public function mount()
    {
        $this->landTypeList = $this->getLandTypeList();

        $this->loadReport();
    }

    public function loadReport()
    {
        $this->permits = Permit::query()
            ->selectRaw("
                user_id,
                district_id,
                YEAR(payment_date) as year, MONTH(payment_date) as month,
                sum(billed_vol) as volume,
                sum(billed_amount) as royalty
            ")
        ->groupByRaw('district_id, user_id, YEAR(payment_date), MONTH(payment_date)')
        ->when($this->selectedYear, function ($q) {
            $q->whereYear('payment_date', $this->selectedYear);
        })
        ->when($this->selectedYear && $this->selectedMonth, function ($q) {
            $q->whereMonth('payment_date', $this->selectedMonth);
        })
        ->when($this->landTypeId, function ($q) {
            $q->where('land_type_id', $this->landTypeId);
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
        ->orderBy(
            Licensee::query()
                ->select('licensees.name')
                ->join('users', 'users.licensee_id', '=', 'licensees.id')
                ->whereColumn('users.id', 'permits.user_id')
                ->take(1)
        )
        ->where('status', env('PERMIT_STATUS'))
        ->with(['district', 'district.region', 'user.licensee'])
        ->get();

        $this->totalVolume = $this->permits->sum('volume');
        $this->totalRoyalty = $this->permits->sum('royalty');
    }

    public function render()
    {
        return view('livewire.payment-reports.r11-permit-land-by-region');
    }
}
