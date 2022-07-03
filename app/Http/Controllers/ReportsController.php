<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTdpRequest;
use App\Http\Requests\UpdateTdpRequest;
use App\Models\Tdp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ReportsController extends Controller
{
    public function index()
    {
        $tdps = Report::all();

        return view('reports.index', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReportRequest $request)
    {
        Tdp::create($request->validated());

        return redirect()->route('reports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        return view('reports.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        return view('reports.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        $report->update($request->validated());

        return redirect()->route('reports.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        $report->delete();

        return redirect()->route('reports.index');
    }

    public function permitsummary()
    {
        return view('reports.permit-summary');
    }

    public function r2permitlicensee()
    {
        return view('reports.r2-permit-licensee');
    }

    public function r3permitlandtypediameter()
    {
        return view('reports.r3-permit-landtype-diameter');
    }

    public function permitloggingmethodbasic()
    {
        $result = Permit::select(DB::raw('YEAR(scaled_date) as year'))->distinct()->get();
        $yearList = $this->result->sortByDesc('year');

        $monthList = [];

        $permits = Permit::all();

        $totalVol = number_format($this->permits->sum('billed_vol'));
        $totalAmount = number_format($this->permits->sum('billed_amount'));

        return view('reports.permit-logging-method-basic');
    }

    public function r1PermitLoggingMethod()
    {
        return view('reports.r1-permit-logging-method');
    }

}
