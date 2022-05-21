<?php
namespace App\Http\Livewire;

use App\Models\Permit;
use App\Models\Prices;
use App\Models\LogSize;
use App\Models\Species;
use Livewire\Component;
use App\Models\District;
use App\Models\LandTypes;
use App\Models\PermitLog;
use App\Models\PermitDetail;
use App\Notifications\PermitUpdated;
use Illuminate\Support\Facades\Notification;


class PermitBill0 extends Component
{
    public $permitdetails = [];
    public $species = [];
    public $permit;
    public $grandTotal;

    public function mount($permit)
    {
        $this->species = Species::all();
        $this->districts = District::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $this->districts2 = District::all();
        $this->landtypes = LandTypes::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $this->permitdetails = PermitDetail::where('permit_id', $permit->id)->get()->toArray();

        $market = $permit->market; 
        $landTypeId = $permit->land_type_id;
        $method = $permit->logging_method;
        $grandTotal = 0;

        $newArray= array();
        foreach($this->permitdetails as $innerArray){
          $innerArray['mean']=($innerArray['diameter_1']+$innerArray['diameter_2'])/2; 
          $innerArray['vol']=round(3.14159*pow(($innerArray['mean']/100),2)*$innerArray['length'], 2); 

          $speciesId = $innerArray['species_id'];
          $price = Prices::where('market', $market)
                          ->where('land_type_id', $landTypeId)
                          ->where('method', $method)
                          ->where('species_id', $speciesId)
                          ->get();

          if (count($price) == 1){
              $innerArray['rate'] = $price->first()->price; 
          }
          elseif (count($price) > 1){
              $logSize = LogSize::where('fr_size', '<' , $innerArray['mean'])
                                      ->where('to_size', '>=' , $innerArray['mean'])
                                      ->where('id', '!=' , 1)
                                      ->get();
              $logSizeId=$logSize->first()->id;
              $filtered = $price->where('log_size_id', $logSizeId);
              $filtered->all();
              $innerArray['rate'] = $filtered->first()->price;
          }
          else { 
              $innerArray['rate'] = 0;
          }
          
          $innerArray['amount']=round($innerArray['vol']*$innerArray['rate']); 
          $grandTotal = $grandTotal+$innerArray['amount'];
          $newArray[] = $innerArray;
        }
       
        $this->grandTotal = $grandTotal;
        $this->permitdetails = $newArray;

    }

    public function calculateDetail($index)
    {
        $grandTotal = 0;
        $newArray= array();
        foreach($this->permitdetails as $innerArray){
          $innerArray['mean']=($innerArray['diameter_1']+$innerArray['diameter_2'])/2; 
          $innerArray['vol']=round(3.14159*pow(($innerArray['mean']/100),2)*$innerArray['length'], 2); 
          $innerArray['amount']=round($innerArray['vol']*$innerArray['rate']); 
          $grandTotal = $grandTotal+$innerArray['amount'];
          $newArray[] = $innerArray;
        }
       
        $this->grandTotal = $grandTotal;
        $this->permitdetails = $newArray;

    }


    public function updatebill()
    {
        $this->permit->status = 'billed';
        $this->permit->save();

        $deleted = PermitDetail::where('permit_id', $this->permit->id)->delete();
        $grandVol = 0;
        $grandTotal = 0;
        foreach ($this->permitdetails as $detail) {
            $added = PermitDetail::create([
                'permit_id' => $this->permit->id,
                'log_no' => $detail['log_no'],
                'species_id' => $detail['species_id'],
                'length' => $detail['length'],
                'diameter_1' => $detail['diameter_1'],
                'diameter_2' => $detail['diameter_2'],
                'mean' => $detail['mean'],
                'defect_symbol' => $detail['defect_symbol'],
                'defect_length' => $detail['defect_length'],
                'defect_diameter' => $detail['defect_diameter'],
                'vol' => $detail['vol'],
                'rate' => $detail['rate'],
                'amount' => $detail['amount'],
            ]);

            $grandVol = $grandVol + $detail['vol'];
            $grandTotal = $grandTotal+$detail['amount'];
        }

        $this->permit->billed_vol = $grandVol;
        $this->permit->billed_amount = $grandTotal;
        $this->permit->save();

        $log = PermitLog::create([
            'permit_id' => $this->permit->id,
            'user_name' => auth()->user()->name,
            'action' => 'billed',
            'system_info' => 'Total:'.$grandTotal,
        ]);

        $recipient = $this->permit->user;
        $tdpNo = 'TDP'.str_pad($this->permit->id, 6, '0', STR_PAD_LEFT);
        $subject = 'Permit No. '.$tdpNo.' has been billed';
        $line = 'Please proceed to payment.';
        $url = url('/permits/'.$this->permit->id);
        $recipient->notify(new PermitUpdated($subject, $line, $url));    

        
        return redirect()->route('permits.index');
    }


    public function render()
    {
        return view('livewire.permit-bill');
    }
}
