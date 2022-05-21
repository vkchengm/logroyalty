<?php

namespace App\Observers;

use App\Models\Permit;
use App\Models\Region;
use App\Models\District;
use App\Notifications\PermitUpdated;

class PermitObserver
{
    /**
     * Handle the Permit "created" event.
     *
     * @param  \App\Models\Permit  $permit
     * @return void
     */
    public function created(Permit $permit)
    {
        // if (auth()->check()) {
        //     $permit->user_id = auth()->id();
        //     $permit->status = 'saved';
            
        //     $dfo = District::where('id', $permit->district_id)->first();
        //     $fo = Region::where('id', $dfo->region_id)->first();

        //     $permit->dfo_id = $dfo->dfo_id;
        //     $permit->fo_id = $fo->fo_id;

        //     $permit->save();
        // };

    }

    /**
     * Handle the Permit "updated" event.
     *
     * @param  \App\Models\Permit  $permit
     * @return void
     */
    public function updated(Permit $permit)
    {
        if ($permit->status == 'submitted') {
            $recipient = $permit->dfo;
            $tdpNo = 'TDP'.str_pad($permit->id, 6, '0', STR_PAD_LEFT);
            $subject = 'Permit No. '.$tdpNo.' submitted';
            $line = 'Please assign a KPPM for the permit.';
            $url = url('/permits/'.$permit->id);
            $recipient->notify(new PermitUpdated($subject, $line, $url));    
        } elseif ($permit->status == 'assigned') {
            $recipient = $permit->kppm;
            $tdpNo = 'TDP'.str_pad($permit->id, 6, '0', STR_PAD_LEFT);
            $subject = 'Permit No. '.$tdpNo.' assigned';
            $line = 'Please carry out an inspection for the permit.';
            $url = url('/permits/'.$permit->id);
            $recipient->notify(new PermitUpdated($subject, $line, $url));    
        } elseif ($permit->status == 'accepted') {
            $recipient = $permit->dfo;
            $tdpNo = 'TDP'.str_pad($permit->id, 6, '0', STR_PAD_LEFT);
            $subject = 'Permit No. '.$tdpNo.' inspection accepted';
            $line = 'Permit pending for approval.';
            $url = url('/permits/'.$permit->id);
            $recipient->notify(new PermitUpdated($subject, $line, $url));    
        } elseif ($permit->status == 'rejected') {
            $recipient = $permit->user;
            $tdpNo = 'TDP'.str_pad($permit->id, 6, '0', STR_PAD_LEFT);
            $subject = 'Permit No. '.$tdpNo.' inspection rejected';
            $line = 'Please rectify application according to KPPM and re-submit.';
            $url = url('/permits/'.$permit->id);
            $recipient->notify(new PermitUpdated($subject, $line, $url));    
        }  

        // $recipient = $permit->dfo;
        // $tdpNo = 'TDP'.str_pad($permit->id, 6, '0', STR_PAD_LEFT);
        // $subject = 'Permit No. '.$tdpNo.' submitted';
        // $line = 'Please assign a KPPM for the permit.';
        // $url = url('/permits/'.$permit->id);
        // $recipient->notify(new PermitUpdated($subject, $line, $url));
        
    }

    /**
     * Handle the Permit "deleted" event.
     *
     * @param  \App\Models\Permit  $permit
     * @return void
     */
    public function deleted(Permit $permit)
    {
        //
    }

    /**
     * Handle the Permit "restored" event.
     *
     * @param  \App\Models\Permit  $permit
     * @return void
     */
    public function restored(Permit $permit)
    {
        //
    }

    /**
     * Handle the Permit "force deleted" event.
     *
     * @param  \App\Models\Permit  $permit
     * @return void
     */
    public function forceDeleted(Permit $permit)
    {
        //
    }
}
