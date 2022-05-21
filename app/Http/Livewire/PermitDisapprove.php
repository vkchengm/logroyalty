<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use App\Models\Permit;
use Livewire\Component;
use App\Models\PermitLog;
use App\Notifications\PermitUpdated;
use LivewireUI\Modal\ModalComponent;

class PermitDisapprove extends ModalComponent
{
    // public $kppms = [];
    public Permit $permit;
    public $permitLogRemark;

    public function mount(Permit $permit)
    {

        // $this->kppms = User::whereRelation('roles', 'title', 'KPPM')->get();

        $this->permit = $permit;

        // $this->permitLogRemark = 'Testing';

    }

    public function update()
    {
        // $this->validate();

        $this->permit->status = 'disapproved';
        $this->permit->save();
        
        $log = PermitLog::create([
            'permit_id' => $this->permit->id,
            'user_name' => auth()->user()->name,
            'action' => 'disapproved',
            'remark' => $this->permitLogRemark.' ',
            'system_info' => 'Permit disapproved',
        ]);

        $recipient = $this->permit->user;
        $tdpNo = 'TDP'.str_pad($this->permit->id, 6, '0', STR_PAD_LEFT);
        $subject = 'Permit No. '.$tdpNo.' has been disapproved';
        $line = $this->permitLogRemark.'. Please update and re-submit!';
        $url = url('/permits/'.$this->permit->id);
        $recipient->notify(new PermitUpdated($subject, $line, $url));    


        $this->closeModal();
        return redirect()->route('permits.index');

    }

    public function render()
    {
        return view('livewire.permit-disapprove');
    }

    public function rules(): array
    {
        return [
            // 'permit.kppm_id' => ['required', 'int'],
        ];
    }
}
