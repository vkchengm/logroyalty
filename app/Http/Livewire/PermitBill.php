<?php
namespace App\Http\Livewire;

use App\Models\Permit;
use App\Models\LogSize;
use App\Models\Species;
use Livewire\Component;
use App\Models\District;
use App\Models\Premiums;
use App\Models\LandTypes;
use App\Models\PermitLog;
use App\Models\Royalties;
use App\Models\PermitCharge;
use App\Models\PermitDetail;
use App\Notifications\PermitUpdated;
use Illuminate\Support\Facades\Notification;


class PermitBill extends Component
{
    public $permitdetails = [];
    public $additionalcharges;
    public $species = [];
    public $permit;
    public $grandTotal;
    public $grandVol;

    public function mount($permit)
    {
        $this->species = Species::all();
        $this->districts = District::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $this->districts2 = District::all();
        $this->landtypes = LandTypes::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $this->permitdetails = PermitDetail::where('permit_id', $permit->id)->get()->toArray();

        // $this->additionalcharges = [
        //     ['log_no'=>'', 'species_id'=>'', 'length'=>0, 'diameter_1'=>0, 'diameter_2'=>0, 'mean'=>0, 'defect_symbol'=>0, 'defect_length'=>0, 'defect_diameter'=>0]
        // ];

        $market = $permit->market; 
        $landTypeId = $permit->land_type_id;
        $method = $permit->logging_method;
        $license_type = $permit->user->licensee->type;

        $grandTotal = 0;
        $grandVol = 0;

        $newArray= array();
        foreach($this->permitdetails as $innerArray){
        //   $innerArray['mean']=($innerArray['diameter_1']+$innerArray['diameter_2'])/2; 
        //   $innerArray['vol']=round(3.14159*pow(($innerArray['mean']/100),2)*$innerArray['length'], 2); 
          $speciesId = $innerArray['species_id'];

          $royalty = Royalties::where('market', $market)
                          ->where('land_type_id', $landTypeId)
                          ->where('method', $method)
                          ->where('species_id', $speciesId)
                          ->get();

          if (count($royalty) == 1){
              $innerArray['royalty'] = $royalty->first()->amount; 
          }
          elseif (count($royalty) > 1){
              $logSize = LogSize::where('fr_size', '<' , $innerArray['mean'])
                                      ->where('to_size', '>=' , $innerArray['mean'])
                                      ->where('id', '!=' , 1)
                                      ->get();
              $logSizeId=$logSize->first()->id;
              $filtered = $royalty->where('log_size_id', $logSizeId);
              $filtered->all();
              $innerArray['royalty'] = $filtered->first()->amount;
          }
          else { 
              $innerArray['royalty'] = 0;
          }

          
          $premium = Premiums::where('land_type_id', $landTypeId)
                          ->where('license_type', $license_type)
                          ->get();

          if (count($premium) == 1){
              $innerArray['premium'] = $premium->first()->amount; 
          }
          elseif (count($premium) > 1){
              $logSize = LogSize::where('fr_size', '<' , $innerArray['mean'])
                                      ->where('to_size', '>=' , $innerArray['mean'])
                                      ->where('id', '!=' , 1)
                                      ->get();
              $logSizeId=$logSize->first()->id;
              $filtered = $premium->where('log_size_id', $logSizeId);
              $filtered->all();
              $innerArray['premium'] = $filtered->first()->amount;
          }
          else { 
              $innerArray['premium'] = 0;
          }



          $innerArray['amount'] = ($innerArray['vol']*$innerArray['royalty']) + ($innerArray['vol']*$innerArray['premium']); 
          $grandTotal = $grandTotal+$innerArray['amount'];
          $grandVol = $grandVol+$innerArray['vol'];
          $newArray[] = $innerArray;
        }
       
        $this->grandTotal = $grandTotal;
        $this->grandVol = $grandVol;

        $this->permitdetails = $newArray;

    }

    public function calculateDetail($index)
    {
        $grandTotal = 0;
        $grandVol = $this->grandVol;
        // $m3 = $this->permitdetails->sum()->vol;
        $newArray= array();
        foreach($this->permitdetails as $innerArray){
        //   $innerArray['mean']=($innerArray['diameter_1']+$innerArray['diameter_2'])/2; 
        //   $innerArray['vol']=round(3.14159*pow(($innerArray['mean']/100),2)*$innerArray['length'], 2); 
          $innerArray['amount'] = ($innerArray['vol']*$innerArray['royalty']) + ($innerArray['vol']*$innerArray['premium']); 
          $grandTotal = $grandTotal+$innerArray['amount'];
        //   $m3 = $m3 + $innerArray['vol'];
          $newArray[] = $innerArray;
        }
       
        $newadditionalcharges= array();
        if(!empty($this->additionalcharges)){
            foreach($this->additionalcharges as $additionalcharge){
                if ($additionalcharge['unit'] == 'Per M3' ){
                    $additionalcharge['total'] = $additionalcharge['amount']*$grandVol;    
                }
                else {
                    $additionalcharge['total'] = $additionalcharge['amount'];    
                }
                $grandTotal = $grandTotal+$additionalcharge['total'];
                $newadditionalcharges[] = $additionalcharge;
            }    
        }

        $this->grandTotal = $grandTotal;
        $this->permitdetails = $newArray;
        $this->additionalcharges = $newadditionalcharges;
    }

    public function calculateDetailRemoved()
    {
        $grandTotal = 0;
        $grandVol = $this->grandVol;
        $newArray= array();
        foreach($this->permitdetails as $innerArray){
          $innerArray['amount'] = ($innerArray['vol']*$innerArray['royalty']) + ($innerArray['vol']*$innerArray['premium']); 
          $grandTotal = $grandTotal+$innerArray['amount'];
        //   $m3 = $m3 + $innerArray['vol'];
          $newArray[] = $innerArray;
        }
       
        $newadditionalcharges= array();
        if(!empty($this->additionalcharges)){
            foreach($this->additionalcharges as $additionalcharge){
                if ($additionalcharge['unit'] == 'Per M3' ){
                    $additionalcharge['total'] = $additionalcharge['amount']*$grandVol;    
                }
                else {
                    $additionalcharge['total'] = $additionalcharge['amount'];    
                }
                $grandTotal = $grandTotal+$additionalcharge['total'];
                $newadditionalcharges[] = $additionalcharge;
            }    
        }

        $this->grandTotal = $grandTotal;
        $this->permitdetails = $newArray;
        $this->additionalcharges = $newadditionalcharges;
    }

    public function addCharges()
    {
        $this->additionalcharges[] = ['name'=>'', 'unit'=>'', 'description'=>'', 'amount'=>0, 'total'=>0];        
    }

    public function removeDetail($index)
    {
        unset($this->additionalcharges[$index]);
        $this->additionalcharges = array_values($this->additionalcharges);
        
        $this->calculateDetailRemoved();
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
                'royalty' => $detail['royalty'],
                'premium' => $detail['premium'],
                'amount' => $detail['amount'],
            ]);

            $grandVol = $grandVol + $detail['vol'];
            $grandTotal = $grandTotal+$detail['amount'];
        }

        if (isset($this->additionalcharges)) {
            foreach ($this->additionalcharges as $additionalcharge) {
                $added = PermitCharge::create([
                    'permit_id' => $this->permit->id,
                    'name' => $additionalcharge['name'],
                    'unit' => $additionalcharge['unit'],
                    'description' => $additionalcharge['description'],
                    'amount' => $additionalcharge['amount'],
                    'total' => $additionalcharge['total'],
                ]);

                $grandTotal = $grandTotal+$additionalcharge['total'];
            }
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
