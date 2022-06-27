<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use App\Models\Permit;
use Livewire\Component;
use App\Models\PermitLog;
use App\Models\HammerMark;
use App\Notifications\PermitUpdated;
use LivewireUI\Modal\ModalComponent;

class PermitAccept extends ModalComponent
{
    // public $kppms = [];
    public Permit $permit;
    public $permitLogRemark;
    public $hammermarks;

    public function mount(Permit $permit)
    {

        // $this->kppms = User::whereRelation('roles', 'title', 'KPPM')->get();

        $this->permit = $permit;

        // $this->hammermarks = 

        $this->hammermarks = HammerMark::where('district_id', $this->permit->district_id)->orderBy('name','ASC')->get();


        // $this->permitLogRemark = 'Testing';

    }

    public function update()
    {
        $this->validate();

        $this->permit->status = 'accepted';
        $this->permit->save();
        
        $log = PermitLog::create([
            'permit_id' => $this->permit->id,
            'user_name' => auth()->user()->name,
            'action' => 'accepted',
            'remark' => $this->permitLogRemark.' ',
            'system_info' => 'Inspection accepted',
        ]);

        $recipient = $this->permit->dfo;
        $tdpNo = 'TDP'.str_pad($this->permit->id, 6, '0', STR_PAD_LEFT);
        $subject = 'Permit No. '.$tdpNo.' inspection accepted';
        $line = 'This permit is pending for approval.';
        $url = url('/permits/'.$this->permit->id);
        $recipient->notify(new PermitUpdated($subject, $line, $url));    

        $this->closeModal();
        return redirect()->route('permits.index');

    }

    public function render()
    {
        return view('livewire.permit-accept');
    }

    public function rules(): array
    {
        return [
             'permit.scaled_date' => ['required', 'date'],
             'permit.name_of_scaler' => ['string'],
             'permit.hammer_mark_id' => ['integer'],
            ];
    }
}
