<?php

namespace App\Http\Controllers;

use App\Models\Licensee;
use App\Models\User;
use App\Models\Permit;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreLicenseeRequest;
use App\Http\Requests\UpdateLicenseeRequest;

class LicenseeController extends Controller
{
    public function index()
    {
        $licensees = Licensee::all();

        return view('licensees.index', compact('licensees'));
    }


    public function create()
    {
        return view('licensees.create');

    }


    public function store(StoreLicenseeRequest $request)
    {
        Licensee::create($request->validated());

        return redirect()->route('licensees.index');

    }


    public function show(Licensee $licensee)
    {
        return view('licensees.show', compact('licensee'));

    }


    public function edit(Licensee $licensee)
    {
        return view('licensees.edit', compact('licensee'));

    }


    public function update(UpdateLicenseeRequest $request, Licensee $licensee)
    {
        $licensee->update($request->validated());

        return redirect()->route('licensees.index');

    }


    public function destroy(Licensee $licensee)
    {
        $licensee->delete();

        return redirect()->route('licensees.show', ['licensee' => $licensee]);

    }
}
