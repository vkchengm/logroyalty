<?php

namespace App\Http\Livewire\PaymentReports;

use App\Models\District;
use App\Models\LandTypes;
use App\Models\Licensee;
use App\Models\Permit;
use App\Models\Region;

trait BaseReport
{
    public $yearList, $monthList;
    public $selectedYear, $selectedMonth;

    public function hydrateBaseReport()
    {
        $this->yearList = array_filter(
            Permit::query()
                ->selectRaw('YEAR(payment_date) as year')
                ->distinct()
                ->latest('year')
                ->pluck('year')
                ->toArray()
        );

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
    }

    public function getRegionList()
    {
        return Region::query()
            ->oldest('name')
            ->pluck('name', 'id')
            ->toArray();
    }

    public function getDistrictList($regionId = null)
    {
        return District::query()
            ->when($regionId, function ($q) use ($regionId) {
                $q->where('region_id', $regionId);
            })
            ->oldest('name')
            ->pluck('name', 'id')
            ->toArray();
    }

    public function getLandTypeList()
    {
        return LandTypes::query()
            ->whereIn('id', Permit::query()->distinct()->select('land_type_id'))
            ->pluck('name', 'id')
            ->toArray();
    }

    public function getLicenseeList()
    {
        return Licensee::query()
            ->leftJoin('users', 'users.licensee_id', '=', 'licensees.id')
            ->whereNotNull('users.id')
            ->whereIn('users.id',Permit::query()->select('user_id'))
            ->oldest('licensees.name')
            ->pluck('licensees.name', 'users.id')
            ->toArray();
    }

    public function getMarketTypeList()
    {
        return Permit::query()
            ->distinct()
            ->select('market')
            ->pluck('market', 'market')
            ->toArray();
    }

    public function getMonth($monthNumber)
    {
        return data_get($this->monthList, $monthNumber, $monthNumber);
    }

    public function updated($key, $value)
    {
        $this->loadReport();
    }

    public function loadReport()
    {}
}
