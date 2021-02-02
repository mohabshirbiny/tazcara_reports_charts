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
    return view('reports');
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
