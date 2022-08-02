<?php

namespace App\Http\Livewire\PaymentReports;

use App\Models\Permit;
use App\Models\Region;
use App\Models\Species;
use Livewire\Component;
use App\Models\District;
use App\Models\LandTypes;
use App\Models\PermitDetail;
use Illuminate\Support\Facades\DB;

class R1PermitLoggingMethod extends Component
{
    use BaseReport;

    public $permits = [];
    public $totalRilVol = 0, $totalNonRilVol = 0, $totalVol = 0;

    public function mount()
    {
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
            ->selectRaw("
                year(payment_date) as year,
                month(payment_date) as month,
                sum(case when (logging_method='RIL') then billed_vol else 0 end) as ril_vol,
                sum(case when (logging_method='Non-RIL') then billed_vol else 0 end) as non_ril_vol,
                (sum(case when (logging_method='Non-RIL') then billed_vol else 0 end) + sum(case when (logging_method='RIL') then billed_vol else 0 end)) as total_vol
            ")
            ->groupBy(['month', 'year'])
            ->latest('year')
            ->oldest('month')
            ->get();

        $this->totalRilVol = $this->permits->sum('ril_vol');
        $this->totalNonRilVol = $this->permits->sum('non_ril_vol');
        $this->totalVol = $this->permits->sum('total_vol');;
    }

    public function render()
    {
        return view('livewire.payment-reports.r1-permit-logging-method');
    }
}
