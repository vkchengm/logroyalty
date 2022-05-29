<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAccountCoupeRequest;
use App\Http\Requests\UpdateAccountCoupeRequest;
use App\Models\License;
use App\Models\LicenseAccCoupe;
use Illuminate\Http\Request;

class LicenseAccountCoupeController extends Controller
{
    public function index()
    {

    }

    public function show()
    {

    }

    public function create(License $license)
    {
        $landTypes = \App\Models\LandTypes::pluck('name', 'id')->toArray();

        return view('account-coupe.create', compact('license', 'landTypes'));
    }

    public function store(License $license, CreateAccountCoupeRequest $request)
    {
        $request->persist($license);

        return redirect()->route('licensees.show', $license->licensee);
    }

    public function edit(LicenseAccCoupe $licenseAccCoupe)
    {
        $landTypes = \App\Models\LandTypes::pluck('name', 'id')->toArray();

        $licensee = data_get($licenseAccCoupe->license, 'licensee');

        return view('account-coupe.edit', compact('licenseAccCoupe', 'landTypes', 'licensee'));
    }

    public function update(LicenseAccCoupe $licenseAccCoupe, UpdateAccountCoupeRequest $request)
    {
        $request->persist($licenseAccCoupe);

        $licensee = data_get($licenseAccCoupe->license, 'licensee');

        return redirect()->route('licensees.show', $licensee);
    }

    public function destroy(LicenseAccCoupe $licenseAccCoupe)
    {
        $licenseAccCoupe->delete();

        return redirect()->back();
    }
}
