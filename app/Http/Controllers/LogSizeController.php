<?php

namespace App\Http\Controllers;

use App\Models\LogSize;
use App\Http\Requests\StoreLogSizeRequest;
use App\Http\Requests\UpdateLogSizeRequest;
use Illuminate\Support\Facades\Gate;

class LogSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logsizes = LogSize::all();

        return view('logsizes.index', compact('logsizes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('logsizes.create');        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLogSizeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLogSizeRequest $request)
    {
        LogSize::create($request->validated());

        return redirect()->route('logsizes.index');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LogSize  $logSize
     * @return \Illuminate\Http\Response
     */
    public function show(LogSize $logsize)
    {
        return view('logsizes.show', compact('logsize'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LogSize  $logSize
     * @return \Illuminate\Http\Response
     */
    public function edit(LogSize $logsize)
    {
        return view('logsizes.edit', compact('logsize'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLogSizeRequest  $request
     * @param  \App\Models\LogSize  $logSize
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLogSizeRequest $request, LogSize $logsize)
    {
        $logsize->update($request->validated());

        return redirect()->route('logsizes.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LogSize  $logSize
     * @return \Illuminate\Http\Response
     */
    public function destroy(LogSize $logsize)
    {
        $logsize->delete();

        return redirect()->route('logsizes.index');

    }
}
