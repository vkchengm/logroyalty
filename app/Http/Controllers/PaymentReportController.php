<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentReportController extends Controller
{
    public function r1PermitLoggingMethod()
    {
        return view('payment-reports.r1-permit-logging-method');
    }

    public function r2PermitLicensee()
    {
        return view('payment-reports.r2-permit-licensee');
    }

    public function r3PermitLandUsedByDiameter()
    {
        return view('payment-reports.r3-permit-land-used-by-volume');
    }
}
