<?php

namespace App\Http\Livewire\PaymentReports;

use App\Models\District;
use App\Models\Licensee;
use App\Models\Permit;
use App\Models\PermitDetail;
use App\Models\Region;
use Livewire\Component;

class R7PermitLogsProductionByMarket extends Component
{
    use BaseReport;

    public $permits = [];
    public $landTypeList = [], $landTypeId;
    public $marketTypeList = [], $marketType;
    public $total, $moreThan59, $between44to59, $between30to43, $lessThan30;

    public function mount()
    {
        $this->landTypeList = $this->getLandTypeList();
        $this->marketTypeList = $this->getMarketTypeList();

        $this->loadReport();
    }

    public function loadReport()
    {
        $this->permits = Permit::query()
            ->when($this->selectedYear, function ($q) {
                $q->whereYear('payment_date', $this->selectedYear);
            })
            ->when($this->selectedYear && $this->selectedMonth, function ($q) {
                $q->whereMonth('payment_date', $this->selectedMonth);
            })
            ->when($this->landTypeId, function ($q) {
                $q->where('land_type_id', $this->landTypeId);
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

                'more_than_59' => PermitDetail::query()
                    ->whereColumn('permits.id','permit_details.permit_id')
                    ->where('vol', '>', 59)
                    ->selectRaw('sum(vol)'),

                'between_44_to_59' => PermitDetail::query()
                    ->whereColumn('permits.id','permit_details.permit_id')
                    ->where('vol', '>=', 44)
                    ->where('vol', '<=', 59)
                    ->selectRaw('sum(vol)'),

                'between_30_to_43' => PermitDetail::query()
                    ->whereColumn('permits.id','permit_details.permit_id')
                    ->where('vol', '>=', 30)
                    ->where('vol', '<=', 43)
                    ->selectRaw('sum(vol)'),

                'less_than_30' => PermitDetail::query()
                    ->whereColumn('permits.id','permit_details.permit_id')
                    ->where('vol', '<', 30)
                    ->selectRaw('sum(vol)'),

                'total' => PermitDetail::query()
                    ->whereColumn('permits.id','permit_details.permit_id')
                    ->selectRaw('sum(vol)'),
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

        $this->moreThan59 = $this->permits->sum('more_than_59');
        $this->between44to59 = $this->permits->sum('between_44_to_59');
        $this->between30to43 = $this->permits->sum('between_30_to_43');
        $this->lessThan30 = $this->permits->sum('less_than_30');

        $this->total = $this->moreThan59 + $this->between30to43 + $this->between44to59 + $this->lessThan30;
    }

    public function render()
    {
        return view('livewire.payment-reports.r7-permit-logs-production-by-market');
    }
}
