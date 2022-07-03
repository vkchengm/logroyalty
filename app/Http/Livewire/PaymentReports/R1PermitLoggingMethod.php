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
    public $month;
    public $months;
    public $yearList;
    public $monthList;
    public $testList;
    public $selectedYear;
    public $selectedMonth;
    public $result;
    // public $totalVol;
    // public $totalAmount;

    public $totalHelicopterVol;
    public $totalNonRilVol;
    public $totalRilVol;
    public $totalHelicopterAmount;
    public $totalNonRilAmount;
    public $totalRilAmount;
    public $totalVol;
    public $totalAmount;

    public function mount()
    {
        $this->result = Permit::select(DB::raw('YEAR(scaled_date) as year'))->distinct()->get();
        $this->yearList = $this->result->sortByDesc('year');

        $this->monthList = [
            1  => 'January',
            2  => 'February',
            3  => 'March',
            4  => 'April',
            5  => 'May',
            6  => 'June',
            7  => 'July',
            8  => 'August',
            9  => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
        ];

        $this->permits = Permit::selectRaw('year(scaled_date) year, month(scaled_date) month,
                                        sum(case when (logging_method="Helicopter") then billed_vol else 0 end) as helicopter_vol,
                                        sum(case when (logging_method="RIL") then billed_vol else 0 end) as ril_vol,
                                        sum(case when (logging_method="Non-RIL") then billed_vol else 0 end) as non_ril_vol,
                                        sum(case when (logging_method="Helicopter") then billed_vol else 0 end)+sum(case when (logging_method="Non-RIL") then billed_vol else 0 end)+sum(case when (logging_method="RIL") then billed_vol else 0 end) total_vol,

                                        sum(case when (logging_method="Helicopter") then billed_amount else 0 end) as helicopter_amount,
                                        sum(case when (logging_method="RIL") then billed_amount else 0 end) as ril_amount,
                                        sum(case when (logging_method="Non-RIL") then billed_amount else 0 end) as non_ril_amount,
                                        sum(case when (logging_method="Helicopter") then billed_amount else 0 end)+sum(case when (logging_method="Non-RIL") then billed_amount else 0 end)+sum(case when (logging_method="RIL") then billed_amount else 0 end) total_amount')

                                        ->groupBy('year','month')
                                        ->orderBy('year','desc')
                                        ->orderBy('month','asc')
                                        ->where('status', env('PERMIT_STATUS'))
                                        ->get();


        $this->totalHelicopterVol = number_format($this->permits->sum('helicopter_vol'));
        $this->totalNonRilVol = number_format($this->permits->sum('ril_vol'));
        $this->totalRilVol = number_format($this->permits->sum('non_ril_vol'));

        $this->totalHelicopterAmount = number_format($this->permits->sum('helicopter_amount'));
        $this->totalNonRilAmount = number_format($this->permits->sum('ril_amount'));
        $this->totalRilAmount = number_format($this->permits->sum('non_ril_amount'));

        $this->totalVol = number_format($this->permits->sum('total_vol'));
        $this->totalAmount = number_format($this->permits->sum('total_amount'));
    }


    public function updatedSelectedYear($selectedYear)
    {
        $this->changeOption();
    }

    public function updatedSelectedMonth($selectedMonth)
    {
        $this->changeOption();
    }

    public function changeOption()
    {
        if ($this->selectedYear != '')
        {
            $this->permits = Permit::selectRaw('year(scaled_date) year, month(scaled_date) month,
            sum(case when (logging_method="Helicopter") then billed_vol else 0 end) as helicopter_vol,
            sum(case when (logging_method="RIL") then billed_vol else 0 end) as ril_vol,
            sum(case when (logging_method="Non-RIL") then billed_vol else 0 end) as non_ril_vol,
            sum(case when (logging_method="Helicopter") then billed_vol else 0 end)+sum(case when (logging_method="Non-RIL") then billed_vol else 0 end)+sum(case when (logging_method="RIL") then billed_vol else 0 end) total_vol,

            sum(case when (logging_method="Helicopter") then billed_amount else 0 end) as helicopter_amount,
            sum(case when (logging_method="RIL") then billed_amount else 0 end) as ril_amount,
            sum(case when (logging_method="Non-RIL") then billed_amount else 0 end) as non_ril_amount,
            sum(case when (logging_method="Helicopter") then billed_amount else 0 end)+sum(case when (logging_method="Non-RIL") then billed_amount else 0 end)+sum(case when (logging_method="RIL") then billed_amount else 0 end) total_amount')

            ->whereYear('scaled_date', $this->selectedYear)
            ->when($this->selectedMonth, function ($q) {
                $q->whereMonth('scaled_date', $this->selectedMonth);
            })
            ->groupBy('year','month')
            ->orderBy('year','desc')
            ->orderBy('month','asc')
            ->where('status', env('PERMIT_STATUS'))
            ->get();

            // $this->permits = Permit::selectRaw('Year(scaled_date) year, Month(scaled_date) month, logging_method, billed_vol, billed_amount')
            //                         ->whereYear('scaled_date', $this->selectedYear)
            //                         ->get();        }
        }
        else
        {
            $this->permits = Permit::selectRaw('year(scaled_date) year, month(scaled_date) month,
            sum(case when (logging_method="Helicopter") then billed_vol else 0 end) as helicopter_vol,
            sum(case when (logging_method="RIL") then billed_vol else 0 end) as ril_vol,
            sum(case when (logging_method="Non-RIL") then billed_vol else 0 end) as non_ril_vol,
            sum(case when (logging_method="Helicopter") then billed_vol else 0 end)+sum(case when (logging_method="Non-RIL") then billed_vol else 0 end)+sum(case when (logging_method="RIL") then billed_vol else 0 end) total_vol,

            sum(case when (logging_method="Helicopter") then billed_amount else 0 end) as helicopter_amount,
            sum(case when (logging_method="RIL") then billed_amount else 0 end) as ril_amount,
            sum(case when (logging_method="Non-RIL") then billed_amount else 0 end) as non_ril_amount,
            sum(case when (logging_method="Helicopter") then billed_amount else 0 end)+sum(case when (logging_method="Non-RIL") then billed_amount else 0 end)+sum(case when (logging_method="RIL") then billed_amount else 0 end) total_amount')

            ->groupBy('year','month')
            ->orderBy('year','desc')
            ->orderBy('month','asc')
            ->where('status', env('PERMIT_STATUS'))
            ->get();


            // $this->totalHelicopterVol = number_format($this->permits->sum('helicopter_vol'));
            // $this->totalNonRilVol = number_format($this->permits->sum('ril_vol'));
            // $this->totalRilVol = number_format($this->permits->sum('non_ril_vol'));

            // $this->totalHelicopterAmount = number_format($this->permits->sum('helicopter_amount'));
            // $this->totalNonRilAmount = number_format($this->permits->sum('ril_amount'));
            // $this->totalRilAmount = number_format($this->permits->sum('non_ril_amount'));

            // $this->totalVol = number_format($this->permits->sum('total_vol'));
            // $this->totalAmount = number_format($this->permits->sum('total_amount'));
        }

        $this->totalHelicopterVol = number_format($this->permits->sum('helicopter_vol'));
        $this->totalNonRilVol = number_format($this->permits->sum('ril_vol'));
        $this->totalRilVol = number_format($this->permits->sum('non_ril_vol'));

        $this->totalHelicopterAmount = number_format($this->permits->sum('helicopter_amount'));
        $this->totalNonRilAmount = number_format($this->permits->sum('ril_amount'));
        $this->totalRilAmount = number_format($this->permits->sum('non_ril_amount'));

        $this->totalVol = number_format($this->permits->sum('total_vol'));
        $this->totalAmount = number_format($this->permits->sum('total_amount'));

        // if ($this->selectedYear != '')
        // {
        //         $this->permits = Permit::selectRaw('Year(scaled_date) year, Month(scaled_date) month, logging_method, billed_vol, billed_amount')
        //                             ->whereYear('scaled_date', $this->selectedYear)
        //                             ->get();        }
        // else
        // {
        //     $this->permits = Permit::selectRaw('Year(scaled_date) year, Month(scaled_date) month, logging_method, billed_vol, billed_amount')
        //                                 ->get();
        // }
    }


    public function render()
    {
        return view('livewire.payment-reports.r1-permit-logging-method');
    }
}
