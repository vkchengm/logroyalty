<?php

namespace App\Http\Livewire\PaymentReports;

use App\Models\Licensee;
use App\Models\Permit;
use App\Models\PermitDetail;
use App\Models\Region;
use Livewire\Component;

class R3PermitLandUsedByVolume extends Component
{
    use BaseReport;

    public $permits = [];
    public $landTypeList = [];
    public $landTypeId, $totalVol = 0;
    public $total, $moreThan59, $between44to59, $between30to43, $lessThan30;

    public function mount()
    {
        $this->landTypeList = $this->getLandTypeList();

        $this->loadReport();
    }

    public function loadReport()
    {
        $this->permits = Permit::query()
            ->when($this->landTypeId, function ($q) {
                $q->where('land_type_id', $this->landTypeId);
            })
            ->addSelect([
                'mean' => \App\Models\PermitDetail::query()
                    ->whereColumn('permits.id','=', 'permit_details.permit_id')
                    ->selectRaw('sum(mean)'),

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

//                sum(case when mean >= 60 then mean else 0 end) as 'more_than_59',
                'more_than_59' => PermitDetail::query()
                    ->whereColumn('permits.id','permit_details.permit_id')
                    ->where('mean', '>', 59)
                    ->selectRaw('sum(mean)'),

                //                sum(case when mean >= 44 and mean <= 59 then mean else 0 end) as 'between_44_to_59',
                'between_44_to_59' => PermitDetail::query()
                    ->whereColumn('permits.id','permit_details.permit_id')
                    ->where('mean', '>=', 44)
                    ->where('mean', '<=', 59)
                    ->selectRaw('sum(mean)'),

//                sum(case when mean >= 30 and mean <= 43 then mean else 0 end) as 'between_30_to_43',
                'between_30_to_43' => PermitDetail::query()
                    ->whereColumn('permits.id','permit_details.permit_id')
                    ->where('mean', '>=', 30)
                    ->where('mean', '<=', 43)
                    ->selectRaw('sum(mean)'),

//                sum(case when mean <= 30 then mean else 0 end) as 'less_than_30'
                'less_than_30' => PermitDetail::query()
                    ->whereColumn('permits.id','permit_details.permit_id')
                    ->where('mean', '<', 30)
                    ->selectRaw('sum(mean)'),
            ])
            ->selectRaw('
                MONTH(payment_date) as month,
                YEAR(payment_date) as year
            ')
            ->latest('year')
            ->oldest('month')
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
        return view('livewire.payment-reports.r3-permit-land-used-by-volume');
    }
}
