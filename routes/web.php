<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get('/reports', function () {
    $organizations = DB::table('organizations')
                                ->select('name','id')
                                ->get();
    return view('reports',compact('organizations'));
});

Route::get('/getInternetTickets', function () {

    $tics = DB::table('tickets_archive')
                    ->select('status', DB::raw('count(*) as total'))
                    ->where('bookingMethod','Online')
                    ->groupBy('status')
                    ->get();


    $tics = $tics->map(function ($tic)  {
        return [
            'type'            => $tic->status,
            'total'            => $tic->total
        ];
    });

    return response()->json($tics);

})->name('getInternetTickets');

Route::get('/compLinesOnlineVsOffline', function () {

    $tics = DB::table('tickets_archive')
                ->leftJoin('organizations', 'organizations.id', '=', 'tickets_archive.organization_id')
                // ->select('organizations.name as types','tickets_archive.id')
                // ->where('bookingMethod','Online')
                // ->get()
                ->groupBy('organizations.name')->toSql();


     dd($tics);

    return response()->json($tics);

})->name('compLinesOnlineVsOffline');

Route::get('/best-seller-station/{type}', function ($type) {

    $tics = DB::table('tickets_archive')
                ->where('bookingMethod',$type)
                // ->where('tickets_archive.organization_id',26)
                ->leftJoin('stations', 'stations.id', '=', 'tickets_archive.station')
                // ->leftJoin('organizations', 'organizations.id', '=', 'tickets_archive.organization_id')
                ->select('stations.name',DB::raw('count(*) as total'))
                ->groupBy('tickets_archive.station')
                ->orderBy('total','desc')
                ->get()
                ->take(10);
                // ->toArray();

    //  dd($tics);

    return response()->json($tics);

})->name('stationBestSeller');

Route::get('/top-organizations-trips', function () {

    $tics = DB::table('trips')
                // ->where('tickets_archive.organization_id',26)
                ->leftJoin('organizations', 'organizations.id', '=', 'trips.organization_id')
                ->select('organizations.name',DB::raw('count(*) as total'))
                ->groupBy('trips.organization_id')
                ->orderBy('total','desc')
                ->get()
                ->take(10);

    return response()->json($tics);

})->name('topOrganizationsTrips');

Route::get('/best-organizations-stations', function () {

    $tics = DB::table('stations')
                // ->where('tickets_archive.organization_id',26)
                ->leftJoin('organizations', 'organizations.id', '=', 'stations.organization_id')
                ->select('organizations.name',DB::raw('count(*) as total'))
                ->groupBy('stations.organization_id')
                ->orderBy('total','desc')
                ->get()
                ->take(10);

    return response()->json($tics);

})->name('topOrganizationsStations');

Route::get('/best-seller-ticket-types', function () {

    $tics = DB::table('tickets_archive')
                // ->where('tickets_archive.organization_id',26)
                ->where('trips.id','!=',null)
                ->leftJoin('trips', 'trips.id', '=', 'tickets_archive.trip_id')
                ->leftJoin('trip_classes', 'trip_classes.id', '=', 'trips.trip_class')
                ->select('trip_classes.name',DB::raw('count(*) as total'))
                ->groupBy('trips.trip_class')
                ->orderBy('total','desc')
                ->get()
                ->take(10);

    return response()->json($tics);

})->name('BestSellerTicketTypes');

Route::get('/tickets-reservation-methods', function () {

    $tics = DB::table('tickets_archive')
                // ->where('tickets_archive.organization_id',26)
                ->leftJoin('access_list', 'access_list.id', '=', 'tickets_archive.access_id')
                ->select('access_list.title',DB::raw('count(*) as total'))
                ->groupBy('tickets_archive.access_id')
                ->orderBy('total','desc')
                ->get()
                ->take(10);
                $tics = $tics->map(function($method)
                {
                    if (is_null($method->title) ) {
                        return [
                            'title' => 'موقع تذكرة',
                            'total' => $method->total
                        ];
                    }else{
                        return [
                            'title' => $method->title,
                            'total' => $method->total
                        ];
                    }
                });
    return response()->json($tics);

})->name('ticketsReservationMethods');

Route::get('/get-online-sales', function () {

    $tics = DB::table('tickets_archive')

                ->leftJoin('organizations', 'organizations.id', '=', 'tickets_archive.organization_id')
                ->where('bookingMethod','Online')
                // ->where('tickets_archive.organization_id',26)
                ->whereNotNull('access_id')
                ->select('organizations.name',DB::raw('sum(totalamount) as total'))
                ->groupBy('tickets_archive.organization_id')
                ->orderBy('total','desc')
                ->get()
                ->take(10);

    return response()->json($tics);

})->name('OnlineSales');

Route::get('/get-offline-sales', function () {

    $tics = DB::table('tickets_archive')

                ->leftJoin('organizations', 'organizations.id', '=', 'tickets_archive.organization_id')
                ->where('bookingMethod','Offline')
                // ->where('tickets_archive.organization_id',26)
                ->whereNull('access_id')
                ->select('organizations.name',DB::raw('sum(totalamount) as total'))
                ->groupBy('tickets_archive.organization_id')
                ->orderBy('total','desc')
                ->get()
                ->take(10);

    return response()->json($tics);

})->name('OfflineSales');
