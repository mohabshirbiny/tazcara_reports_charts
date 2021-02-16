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

Route::get('/getInternetTickets', 'DashboardReportsController@getInternetTickets')->name('getInternetTickets');

Route::get('/compLinesOnlineVsOffline', 'DashboardReportsController@compLinesOnlineVsOffline')->name('compLinesOnlineVsOffline');

Route::get('/best-seller-station/{type}', 'DashboardReportsController@stationBestSeller')->name('stationBestSeller');

Route::get('/top-organizations-trips', 'DashboardReportsController@topOrganizationsTrips')->name('topOrganizationsTrips');

Route::get('/best-organizations-stations', 'DashboardReportsController@topOrganizationsStations')->name('topOrganizationsStations');

Route::get('/best-seller-ticket-types', 'DashboardReportsController@BestSellerTicketTypes')->name('BestSellerTicketTypes');

Route::get('/tickets-reservation-methods', 'DashboardReportsController@ticketsReservationMethods')->name('ticketsReservationMethods');

Route::get('/get-online-sales', 'DashboardReportsController@OnlineSales')->name('OnlineSales');

Route::get('/get-offline-sales', 'DashboardReportsController@OfflineSales')->name('OfflineSales');

Route::get('/top-destination-sales/{type}', 'DashboardReportsController@topDestinationSales')->name('topDestinationSales');

Route::get('/get-collected-balance', 'DashboardReportsController@collectedBalance')->name('collectedBalance');
