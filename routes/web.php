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
    // dd(request()->all());
    $tics = DB::table('tickets_archive')
                    ->select('status', DB::raw('count(*) as total'))
                    ->where('bookingMethod','Online')
                    ->where('tickets_archive.organization_id','LIKE',request()->organization_id)
                    // ->where('tickets_archive.organization_id','LIKE',request()->from)
                    // ->where('organization_id','LIKE',request()->to)
                    ->where('bookingMethod','Online')
                    ->groupBy('status')
                    ->get();

    $tics = $tics->map(function ($tic)  {
        return [
            'type'            => $tic->status,
            'total'            => $tic->total
        ];
    });
    // dd();
    return response()->json($tics);

})->name('getInternetTickets');

Route::get('/compLinesOnlineVsOffline', function () {

    $tics = DB::table('tickets_archive')
                ->where('tickets_archive.organization_id','LIKE',request()->organization_id)
                ->leftJoin('organizations', 'organizations.id', '=', 'tickets_archive.organization_id')
                ->select('organizations.name as orgname','bookingMethod')
                ->get()
                ->groupBy(['orgname','bookingMethod']);

    $results = [];

    foreach ($tics as $key => $value) {
        $results[][$key]= [
            'Offline' => (isset($value['Offline']))? count($value['Offline']) : 0,
            'Online' => (isset($value['Online']))? count($value['Online']) : 0,
        ];

    }
    return response()->json($results);

})->name('compLinesOnlineVsOffline');

Route::get('/best-seller-station/{type}', function ($type) {

    $tics = DB::table('tickets_archive')
                ->where('bookingMethod',$type)
                ->where('tickets_archive.organization_id','LIKE',request()->organization_id)
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
                ->where('organization_id','LIKE',request()->organization_id)
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
                ->where('organization_id','LIKE',request()->organization_id)
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
                ->where('tickets_archive.organization_id','LIKE',request()->organization_id)
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
                ->where('tickets_archive.organization_id','LIKE',request()->organization_id)
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
                ->where('tickets_archive.organization_id','LIKE',request()->organization_id)
                ->leftJoin('organizations', 'organizations.id', '=', 'tickets_archive.organization_id')
                ->where('bookingMethod','Online')
                // ->where('tickets_archive.organization_id',26)
                // ->whereNotNull('access_id')
                ->select('organizations.name',DB::raw('sum(totalamount) as total'))
                ->groupBy('tickets_archive.organization_id')
                ->orderBy('total','desc')
                ->get()
                ->take(10);

    return response()->json($tics);

})->name('OnlineSales');

Route::get('/get-offline-sales', function () {

    $tics = DB::table('tickets_archive')
                ->where('tickets_archive.organization_id','LIKE',request()->organization_id)
                ->leftJoin('organizations', 'organizations.id', '=', 'tickets_archive.organization_id')
                ->where('bookingMethod','Offline')
                ->whereNull('access_id')
                ->select('organizations.name',DB::raw('sum(totalamount) as total'))
                ->groupBy('tickets_archive.organization_id')
                ->orderBy('total','desc')
                ->get()
                ->take(10);

    return response()->json($tics);

})->name('OfflineSales');

Route::get('/top-destination-sales/{type}', function ($type) {

    $tics = DB::table('tickets_archive')
                ->where('tickets_archive.organization_id','LIKE',request()->organization_id)
                ->leftJoin('organizations', 'organizations.id', '=', 'tickets_archive.organization_id')
                ->leftJoin('cities as c1', 'c1.id', '=', 'tickets_archive.city_from')
                ->leftJoin('cities as c2', 'c2.id', '=', 'tickets_archive.city_to')
                ->where('bookingMethod',$type)
                ->select(DB::raw('CONCAT(c1.city_name," - ",c2.city_name) as linename'),DB::raw('count(*) as total'))
                ->groupBy('city_from','city_to')
                ->orderBy('total','desc')
                ->get()
                ->take(10);

    return response()->json($tics);

})->name('topDestinationSales');

Route::get('/get-collected-balance', function () {

    $tics = DB::table('user_card_balance')
                ->where('user_card_balance.organization_id','LIKE',request()->organization_id)
                ->leftJoin('organizations', 'organizations.id', '=', 'user_card_balance.organization_id')
                ->where('amount','>',0)
                ->select('organizations.name',DB::raw('sum(amount) as total'))
                ->groupBy('user_card_balance.organization_id')
                ->orderBy('total','desc')
                ->get()
                ->take(10);

    return response()->json($tics);

})->name('collectedBalance');
