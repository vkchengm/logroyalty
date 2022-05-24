<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Permit;
use Livewire\Component;
use App\Models\PermitLog;
use App\Notifications\PermitUpdated;
use LivewireUI\Modal\ModalComponent;

class PermitPay extends ModalComponent
{
    // public $kppms = [];
    public Permit $permit;
    public $permitLogRemark;

    public function mount(Permit $permit)
    {
        $this->permit = $permit;
    }

    public function update()
    {
        $this->validate();

        $this->permit->status = 'paid';
        $this->permit->save();

        $log = PermitLog::create([
            'permit_id' => $this->permit->id,
            'user_name' => auth()->user()->name,
            'action' => 'paid',
            'remark' => $this->permitLogRemark.' ',
            'system_info' => 'Paid On:'.$this->permit->payment_date.' Receipt No.:'.$this->permit->receipt_no,
            // 'system_info' => 'Paid On:'.$this->permit->payment_date.' Valid:'.$this->permit->valid_from.'-'.$this->permit->valid_to,
        ]);

        $recipient = $this->permit->user;
        $tdpNo = 'TDP'.str_pad($this->permit->id, 6, '0', STR_PAD_LEFT);
        $subject = 'Permit No. '.$tdpNo.' has been paid';
        $line = 'Permit Bill is ready to be downloaded. Please print out the bill and bring it to HQ for Signing.';
        $url = url('/permits/'.$this->permit->id);
        $recipient->notify(new PermitUpdated($subject, $line, $url));    

        $recipient = $this->permit->dfo;
        $tdpNo = 'TDP'.str_pad($this->permit->id, 6, '0', STR_PAD_LEFT);
        $subject = 'Permit No. '.$tdpNo.' has been paid';
        $line = 'Payment Notification. Please instruct KPPM for further actions';
        $url = url('/permits/'.$this->permit->id);
        $recipient->notify(new PermitUpdated($subject, $line, $url));    

        $recipient = $this->permit->kppm;
        $tdpNo = 'TDP'.str_pad($this->permit->id, 6, '0', STR_PAD_LEFT);
        $subject = 'Permit No. '.$tdpNo.' has been paid';
        $line = 'Payment Notification. Please be ready for marking.';
        $url = url('/permits/'.$this->permit->id);
        $recipient->notify(new PermitUpdated($subject, $line, $url));    

        $recipient = $this->permit->district->region->ppw;
        $tdpNo = 'TDP'.str_pad($this->permit->id, 6, '0', STR_PAD_LEFT);
        $subject = 'Permit No. '.$tdpNo.' has been paid';
        $line = 'Payment Notification.';
        $url = url('/permits/'.$this->permit->id);
        $recipient->notify(new PermitUpdated($subject, $line, $url));    

        $this->closeModal();
        return redirect()->route('permits.index');

    }

    public function render()
    {
        return view('livewire.permit-pay');
    }

    public function rules(): array
    {
        return [
            'permit.receipt_no' => ['string'],
            'permit.fcf_receipt_no' => ['string'],
            'permit.payment_date' => ['date'],
            // 'permit.valid_from' => ['date'],
            // 'permit.valid_to' => ['date']
        ];
    }
}
