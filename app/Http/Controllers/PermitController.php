<?php

namespace App\Http\Controllers;


use PDF;
// use Barryvdh\Snappy;

use App\Models\Permit;
use App\Models\Region;
use App\Models\District;
use App\Models\PermitLog;
use App\Models\PermitCharge;
use App\Models\PermitDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Db;
use App\Notifications\PermitUpdated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\StorePermitRequest;
use App\Http\Requests\UpdatePermitRequest;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\UpdatePermitBillRequest;
use Symfony\Component\HttpFoundation\Response;


class PermitController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('permit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permitsSaved = Permit::where('status', 'saved')
                            ->orwhere('status', 'rejected')                 
                            ->orwhere('status', 'disapproved') 
                            ->orderBy('updated_at', 'desc')                
                            ->get();

        $permitsSubmitted = Permit::where('status', 'submitted')->orderBy('updated_at', 'desc') ->get();
        $permitsAssigned = Permit::where('status', 'assigned')->orderBy('updated_at', 'desc') ->get();
        $permitsAccepted = Permit::where('status', 'accepted')->orderBy('updated_at', 'desc') ->get();
        $permitsApproved = Permit::where('status', 'approved')->orderBy('updated_at', 'desc') ->get();
        $permitsBilled = Permit::where('status', 'billed')->orderBy('updated_at', 'desc') ->get();
        $permitsPaid = Permit::where('status', 'paid')->orderBy('payment_date', 'desc') ->get();

        return view('permits.index', compact('permitsSaved', 'permitsSubmitted', 'permitsAssigned', 'permitsAccepted', 'permitsApproved', 'permitsBilled', 'permitsPaid'));
    }

    public function create()
    {
        return view('permits.create');
    }

    public function store(StorePermitRequest $request)
    {
        $permit = Permit::create($request->all());
        $totalVol = 0;
        if (isset($request->permitdetails)) {
            foreach ($request->permitdetails as $detail) {
                $line = $permit->permitDetails()->create($detail);
    
                $mean = ($line->diameter_1 + $line->diameter_2) / 2;
                $line->mean = $mean;
                
                $logvol = round(3.14159*pow(($mean/2/100),2)*$line->length, 2);        
                $defeatvol = round(3.14159*pow(($line->defect_diameter/2/100),2)*$line->defect_length, 2);
                $vol = $logvol - $defeatvol; 
                
                // $line->vol = round(3.14159*pow(($line->mean/2/100),2)*$line->length, 2); 
                $line->vol = $vol; 
    
    
                $line->save();
                $totalVol = $totalVol + $line->vol;
            }    
        }

        $log = PermitLog::create([
            'permit_id' => $permit->id,
            'user_name' => auth()->user()->name,
            'action' => 'saved',
            'system_info' => 'M3:'.$totalVol,

        ]);
        return redirect()->route('permits.index');
    }

    public function show(Permit $permit)
    {
        $permitdetails = PermitDetail::where('permit_id', $permit->id)->get();
        $permitlogs = PermitLog::where('permit_id', $permit->id)->orderByDesc('updated_at')->get();
        $permitcharges = PermitCharge::where('permit_id', $permit->id)->get();
        return view('permits.show', compact('permit', 'permitdetails', 'permitlogs', 'permitcharges'));

    }

    public function edit(Permit $permit)
    {
        return view('permits.edit', compact('permit'));
    }

    public function bill(Permit $permit)
    {
        return view('permits.bill', compact('permit'));
    }

    public function update(UpdatePermitRequest $request, Permit $permit)
    {
        $permit->update($request->all());

        $dfo = District::where('id', $permit->district->id)->first();
        $fo = Region::where('id', $dfo->region_id)->first();
        $permit->dfo_id = $dfo->dfo_id;
        $permit->fo_id = $fo->fo_id;

        $permit->save();

        $deleted = PermitDetail::where('permit_id', $permit->id)->delete();
        $totalVol = 0;

        if (isset($request->permitdetails)) {

            foreach ($request->permitdetails as $detail) {
                $mean = ($detail['diameter_1']+$detail['diameter_2']) / 2;

                $logvol = round(3.14159*pow(($mean/2/100),2)*$detail['length'], 2);            
                $defeatvol = round(3.14159*pow(($detail['defect_diameter']/2/100),2)*$detail['defect_length'], 2);
                $vol = $logvol - $defeatvol; 

                $totalVol = $totalVol+$vol;

                $added = PermitDetail::create([
                    'permit_id' => $permit->id,
                    'log_no' => $detail['log_no'],
                    'species_id' => $detail['species_id'],
                    'length' => $detail['length'],
                    'diameter_1' => $detail['diameter_1'],
                    'diameter_2' => $detail['diameter_2'],
                    'mean' => ($detail['diameter_1']+$detail['diameter_2']) / 2,

                    'defect_symbol' => $detail['defect_symbol'],
                    'defect_length' => $detail['defect_length'],
                    'defect_diameter' => $detail['defect_diameter'],

                    'vol' => $vol,
                ]);
            }
        }
        
        $log = PermitLog::create([
            'permit_id' => $permit->id,
            'user_name' => auth()->user()->name,
            'action' => 'saved',
            'system_info' => 'm3:'.$totalVol,
        ]);


        return redirect()->route('permits.index');

    }

    public function destroy(Permit $permit)
    {
        $permit->delete();

        return redirect()->route('permits.index');

    }

    public function submit($permitId)
    {
        $permit = Permit::find($permitId);
        $permit->update(['status'=>'submitted']);
        $log = PermitLog::create([
            'permit_id' => $permit->id,
            'user_name' => auth()->user()->name,
            'action' => 'submitted',
        ]);

        $recipient = $permit->dfo;
        $tdpNo = 'TDP'.str_pad($permit->id, 6, '0', STR_PAD_LEFT);
        $subject = 'Permit No. '.$tdpNo.' submitted';
        $line = 'Please assign a KPPM for this permit.';
        $url = url('/permits/'.$permit->id);
        $recipient->notify(new PermitUpdated($subject, $line, $url));    

        return redirect()->route('permits.index');

    }

    public function report()
    {
        return view('permits.report');
    }

    public function print($permitId)
    {
        $permit = Permit::find($permitId);

        $speciesSums = $permit->permitDetails->mapToGroups(function ($item, $key) {
            return [$item->species->name => $item['vol']];
        });

        $below29 = PermitDetail::where('permit_id', $permitId)
                                ->where('mean', '<', 30)
                                ->get();


        $between30to44 = PermitDetail::where('permit_id', $permitId)
                                ->whereBetween('mean', [30, 44.999])
                                ->get();

        $between45to59 = PermitDetail::where('permit_id', $permitId)
                                ->whereBetween('mean', [45, 59.999])
                                ->get();

        $above60 = PermitDetail::where('permit_id', $permitId)
                                ->where('mean', '>=', 60)
                                ->get();
    
        $tdpNo = 'TDP'.str_pad($permit->id, 6, '0', STR_PAD_LEFT);

        $pdf = PDF::loadView('pdf.permit-bill',[
            'tdpNo' => $tdpNo,
            'permit' => $permit,
            'speciesSums' => $speciesSums,
            'below29' => $below29,
            'between30to44' => $between30to44,
            'between45to59' =>$between45to59,
            'above60' => $above60,
            'index' => 1
        ]);

        $pdf->setOptions([
            'margin-top' => 10,
            'page-size' => 'a4',
            // 'frompage' => 2,
            'footer-right' => '[page]/[topage]'
            // 'orientation' => ''
        ]);

        return $pdf->stream($tdpNo.'_bill.pdf');
        // return $pdf->download($tdpNo.'_bill.pdf');
    }

}
