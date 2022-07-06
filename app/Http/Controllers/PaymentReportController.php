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
        return view('payment-reports.r3-permit-land-used-by-diameter');
    }

    public function r4PermitLandUsedByVolume()
    {
        return view('payment-reports.r4-permit-land-used-by-volume');
    }

    public function r5PermitLandUsedBySpecies()
    {
        return view('payment-reports.r5-permit-land-used-by-species');
    }

    public function r6PermitLogsProduction()
    {
        return view('payment-reports.r6-permit-log-production');
    }

    public function r7PermitLogsProductionByMarket()
    {
        return view('payment-reports.r7-permit-log-production-by-market');
    }

    public function r8PermitLogsProductionByRevenue()
    {
        return view('payment-reports.r8-permit-log-production-by-revenue');
    }

    public function r9PermitLogsSummaryByLand()
    {
        return view('payment-reports.r9-permit-logs-summary-by-land');
    }
}
