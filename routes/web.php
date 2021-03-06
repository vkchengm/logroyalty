<?php

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PermitController;
use App\Http\Controllers\PricesController;
use App\Http\Controllers\LogSizeController;
use App\Http\Controllers\HammerMarkController;
use App\Http\Controllers\RegionsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SpeciesController;
use App\Http\Controllers\LicenseeController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\PremiumsController;
use App\Http\Controllers\DistrictsController;
use App\Http\Controllers\LandTypesController;
use App\Http\Controllers\RoyaltiesController;
use App\Http\Controllers\LicenseMasterController;
use App\Http\Controllers\LicenseAccountCoupeController;
use App\Http\Controllers\PaymentReportController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::group(['namespace' => 'App\Http\Controllers', 'prefix' => 'admin',
// 'as' => 'admin.', 'middleware' => ['auth:sanctum', 'verified']], function()
// {
//    Route::get('/', ['UsersController', 'index']);
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('welcome');
})->name('welcome');

// Route::middleware(['auth:sanctum', 'verified'])->get('/pdf', function () {
//     $html = '<h1>Hello PDF</h1>';
//     $pdf = PDF::loadHtml($html);
//     return $pdf->stream('hello.pdf');
// })->name('pdf');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/settings', function () {
    return view('settings');
})->name('settings');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/permits/create-plantation', [PermitController::class, 'createPlantation'])->name('permits.create-plantation');
    Route::get('/permits/create-converted', [PermitController::class, 'createConverted'])->name('permits.create-converted');

    Route::put('/permit/print/{id}', [PermitController::class, 'print'])->name('permits.print');

    Route::put('/permit/submit/{id}', [PermitController::class, 'submit'])->name('permits.submit');
    Route::put('/permit/accept/{id}', [PermitController::class, 'accept'])->name('permits.accept');
    Route::put('/permit/reject/{id}', [PermitController::class, 'reject'])->name('permits.reject');
    Route::put('/permit/approve/{id}', [PermitController::class, 'approve'])->name('permits.approve');
    Route::put('/permit/disapprove/{id}', [PermitController::class, 'disapprove'])->name('permits.disapprove');
    Route::put('/permits/{permit}/updatebill', [PermitController::class, 'updatebill'])->name('permits.updatebill');

    Route::get('/users/index-internal', [UsersController::class, 'indexinternal'])->name('users.index-internal');
    Route::get('/users/index-external', [UsersController::class, 'indexexternal'])->name('users.index-external');
    Route::get('/users/{user}/edit-internal', [UsersController::class, 'editinternal'])->name('users.edit-internal');
    Route::get('/users/{user}/edit-external', [UsersController::class, 'editexternal'])->name('users.edit-external');

    Route::put('/users/{user}/updateinternal', [UsersController::class, 'updateinternal'])->name('users.updateinternal');
    Route::put('/users/{user}/updateexternal', [UsersController::class, 'updateexternal'])->name('users.updateexternal');

    // Route::get('/users/delete/{id}','StudDeleteController@destroy');
    Route::delete('/users/{user}/destroyexternal', [UsersController::class, 'destroyexternal'])->name('users.destroyexternal');
    Route::delete('/users/{user}/destroyinternal', [UsersController::class, 'destroyinternal'])->name('users.destroyinternal');
    // Route::put('/user/activate/{id}', [UsersController::class, 'activate'])->name('users.activate');

    Route::get('/hammermarks/deactivate/{id}', [HammerMarkController::class, 'deactivate'])->name('hammermarks.deactivate');
    Route::get('/hammermarks/activate/{id}', [HammerMarkController::class, 'activate'])->name('hammermarks.activate');

    Route::get('/permits/{permit}/bill', [PermitController::class, 'bill'])->name('permits.bill');
    Route::get('/permits/report', [PermitController::class, 'report'])->name('permits.report');

    Route::group(['prefix' => 'reports'], function () {
        Route::get('/permit-summary', [ReportsController::class, 'permitsummary'])->name('reports.permit-summary');
        Route::get('/r1-permit-logging-method', [ReportsController::class, 'r1PermitLoggingMethod'])->name('reports.r1-permit-logging-method');
        Route::get('/r2-permit-licensee', [ReportsController::class, 'r2PermitLicensee'])->name('reports.r2-permit-licensee');
        Route::get('/r3-permit-landtype-diameter', [ReportsController::class, 'r3PermitLandTypeDiameter'])->name('reports.r3-permit-landtype-diameter');
    });

    Route::group(['prefix' => 'payment-reports'], function () {
        Route::get('/r1-permit-logging-method', [PaymentReportController::class, 'r1PermitLoggingMethod'])->name('payment-reports.r1-permit-logging-method');
        Route::get('/r2-permit-licensee', [PaymentReportController::class, 'r2PermitLicensee'])->name('payment-reports.r2-permit-licensee');
        Route::get('/r3-permit-land-used-by-diameter', [PaymentReportController::class, 'r3PermitLandUsedByDiameter'])->name('payment-reports.r3-permit-land-used-diameter');
        Route::get('/r4-permit-land-used-by-volume', [PaymentReportController::class, 'r4PermitLandUsedByVolume'])->name('payment-reports.r4-permit-land-used-volume');
        Route::get('/r5-permit-land-species-volume', [PaymentReportController::class, 'r5PermitLandUsedBySpecies'])->name('payment-reports.r5-permit-land-species-volume');
        Route::get('/r6-permit-logs-production', [PaymentReportController::class, 'r6PermitLogsProduction'])->name('payment-reports.r6-permit-logs-production');
        Route::get('/r7-permit-logs-production-by-market', [PaymentReportController::class, 'r7PermitLogsProductionByMarket'])->name('payment-reports.r7-permit-logs-production-by-market');
        Route::get('/r8-permit-logs-production-by-revenue', [PaymentReportController::class, 'r8PermitLogsProductionByRevenue'])->name('payment-reports.r8-permit-log-production-by-revenue');
        Route::get('/r9-permit-logs-summary-by-land', [PaymentReportController::class, 'r9PermitLogsSummaryByLand'])->name('payment-reports.r9-permit-logs-summary-by-land');
        Route::get('/r10-permit-production-logging', [PaymentReportController::class, 'r10PermitProductionLogging'])->name('payment-reports.r10-permit-production-logging');
        Route::get('/r11-permit-land-by-region', [PaymentReportController::class, 'r11PermitLandByRegion'])->name('payment-reports.r11-permit-land-by-region');
        Route::get('/rk3-permit-receipt-listing', [PaymentReportController::class, 'rk3PermitReceiptListing'])->name('payment-reports.rk3-permit-receipt-listing');
    });

    Route::post('/getFos', [UsersController::class, 'getFos'])->name('getFos');

    // Route::resource('licenses', LicenseController::class)->parameters([
    //     'create' => 'id'
    // ]);
    // Route::get('/licenses/{licensee}/create', [LicenseController::class, 'create']);
    // Route::get('/licenses/{id}/create', 'licenses@create');

    Route::resource('licensees.licenses', LicenseController::class)->shallow();
    Route::resource('licenses.licenseAccCoupe', LicenseAccountCoupeController::class)->shallow();
    Route::resources([
        'licensees'=> LicenseeController::class,
        'users'=> UsersController::class,
        'regions'=> RegionsController::class,
        'species'=> SpeciesController::class,
        'logsizes' => LogSizeController::class,
        'hammermarks' => HammerMarkController::class,
        'landtypes'=> LandTypesController::class,
        'prices'=> PricesController::class,

        'royalties'=> RoyaltiesController::class,
        'premiums'=> PremiumsController::class,

        'districts'=> DistrictsController::class,
        // 'reports'=> ReportsController::class,
        'permits'=> PermitController::class,
        'licensemasters'=> LicenseMasterController::class,
    ]);
});

