<?php

namespace App\Http\Controllers;

use App\Models\License;
use App\Models\Licensee;

use App\Models\Licenses;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreLicenseRequest;
use App\Http\Requests\UpdateLicenseRequest;

class LicenseController extends Controller
{
    public function index()
    {
        $licenses = License::all();

        return view('licenses.index', compact('licenses'));
    }

    // public function create($id){
    //     return view('licenses.create', ['licensee' => $id]);
    // }

    // public function create(Licensee $licensee)
    // {
    //     return view('licenses.create', ['licensee' => $licensee]);
    // }

    public function create()
    {
        return view('licenses.create');        
        
    }

    
    public function store(StoreLicenseRequest $request)
    {
        $license = License::create($request->validated());

        $license->licensee_id = '1234';
        $license->save();

        return redirect()->route('licensees.index');

    }

    
    public function show(License $license)
    {
        return view('licenses.show', compact('license'));
        
    }

    
    public function edit(License $license)
    {
        return view('licenses.edit', compact('license'));
        
    }

    
    public function update(UpdateLicenseRequest $request, License $license)
    {
        $license->update($request->validated());

        return redirect()->route('licenses.index');

    }

    
    public function destroy(License $license)
    {
        $license->delete();

        return redirect()->route('licenses.index');

    }
}
