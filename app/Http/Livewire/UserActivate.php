<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Licensee;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class UserActivate extends ModalComponent
{
    public $licensees = [];
    public User $user;

    public function mount(User $user)
    {
        $this->licensees = Licensee::all();
        // $this->kppms = User::whereRelation('districtkppm', 'district_id', $permit->district_id)->get();

        $this->user = $user;

    }

    public function update()
    {
        $this->validate();

        $this->user->is_activated = 1;
        // $this->user->licensee_id = 1;

        $this->user->save();
        
        // $log = PermitLog::create([
        //     'permit_id' => $this->permit->id,
        //     'user_name' => auth()->user()->name,
        //     'action' => 'assigned',
        //     'remark' => $this->permitLogRemark.' ',
        //     'system_info' => 'KPPM='.$this->permit->kppm->name,
        // ]);

        // $recipient = $this->permit->kppm;
        // $tdpNo = 'TDP'.str_pad($this->permit->id, 6, '0', STR_PAD_LEFT);
        // $subject = 'Permit No. '.$tdpNo.' assigned';
        // $line = 'Please carry out an inspection for this permit.';
        // $url = url('/permits/'.$this->permit->id);
        // $recipient->notify(new PermitUpdated($subject, $line, $url));    


        $this->closeModal();
        return redirect()->route('users.index-external');

    }

    public function render()
    {
        return view('livewire.user-activate');
    }

    public function rules(): array
    {
        return [
            'user.licensee_id' => ['required', 'int'],
            // 'permit.description' => ['string']
        ];
    }
}
