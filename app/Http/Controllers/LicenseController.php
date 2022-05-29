<?php

namespace App\Http\Controllers;

use App\Models\License;
use App\Models\Licensee;
use App\Http\Requests\StoreLicenseRequest;
use App\Http\Requests\UpdateLicensesRequest;

class LicenseController extends Controller
{
    public function index(Licensee $licensee)
    {
        $licenses = $licensee->licenses()->get();

        return view('licenses.index', compact('licenses'));
    }

    // public function create($id){
    //     return view('licenses.create', ['licensee' => $id]);
    // }

    // public function create(Licensee $licensee)
    // {
    //     return view('licenses.create', ['licensee' => $licensee]);
    // }

    public function create(Licensee $licensee)
    {
        return view('licenses.create', compact('licensee'));
    }


    public function store(Licensee $licensee, StoreLicenseRequest $request)
    {
        $request->persist($licensee);

        return redirect()->route('licensees.show', ['licensee' => $licensee]);
    }


    public function show(License $license)
    {
        return view('licenses.show', compact('license'));
    }


    public function edit(License $license)
    {
        return view('licenses.edit', compact('license'));
    }


    public function update(UpdateLicensesRequest $request, License $license)
    {
        $license->update($request->validated());

        return redirect()->route('licensees.show', ['licensee' => $license->licensee_id]);
    }


    public function destroy(License $license)
    {
        $license->licenseAccCoupes()->delete();

        $license->delete();

        return redirect()->route('licensees.show', ['licensee' => $license->licensee]);
    }
}
