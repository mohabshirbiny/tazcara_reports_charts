<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardReportsController extends Controller
{

    public function getInternetTickets(){
        $from = (request()->from)? request()->from : '2000-01-01';
        $to = (request()->to)? request()->to : date("Y-m-d");

        $lastSearch = $this->checkChartsArchive('getInternetTickets',request()->organization_id,$from,$to);

        if ($lastSearch) {
            return response()->json( json_decode($lastSearch));
        }

        $tics = DB::table('tickets_archive')
                        ->select('status', DB::raw('count(*) as total'))
                        ->where('bookingMethod','Online')
                        ->where('tickets_archive.organization_id','LIKE',request()->organization_id)
                        ->where('tickets_archive.travelDate','>=',$from)
                        ->where('tickets_archive.travelDate','<=',$to)
                        ->where('bookingMethod','Online')
                        ->groupBy('status')
                        ->get();
        
        $tics = collect($tics);
        
        $tics = $tics->map(function ($tic)  {
            return [
                'type'            => $tic->status,
                'total'            => $tic->total
            ];
        });
        
        $this->saveChartsArchive('getInternetTickets',request()->organization_id,$from,$to,$tics);

        return response()->json($tics);
    }

    public function compLinesOnlineVsOffline(){

        $from = (request()->from)? request()->from : '2000-01-01';
        $to = (request()->to)? request()->to : date("Y-m-d");
        
        $lastSearch = $this->checkChartsArchive('compLinesOnlineVsOffline',request()->organization_id,$from,$to);

        if ($lastSearch) {
            return response()->json( json_decode($lastSearch));
        }
        
        $tics = DB::table('tickets_archive')
                    ->where('tickets_archive.organization_id','LIKE',request()->organization_id)
                    ->where('tickets_archive.travelDate','>=',$from)
                    ->where('tickets_archive.travelDate','<=',$to)
                    ->leftJoin('organizations', 'organizations.id', '=', 'tickets_archive.organization_id')
                    ->select('organizations.name as orgname','bookingMethod')
                    ->get();

        $results = [];
        
        $tics = collect($tics)->groupBy('orgname');
        
        $tics = $tics->map(function($q){
            return $q->groupBy('bookingMethod');
        });

        foreach ($tics as $key => $value) {
            $results[][$key]= [
                'Offline' => (isset($value['Offline']))? count($value['Offline']) : 0,
                'Online' => (isset($value['Online']))? count($value['Online']) : 0,
            ];

        }
        
        $this->saveChartsArchive('compLinesOnlineVsOffline',request()->organization_id,$from,$to,$results);

        return response()->json($results);
    }

    public function stationBestSeller($type){
        $from = (request()->from)? request()->from : '2000-01-01';
        $to = (request()->to)? request()->to : date("Y-m-d");

        $lastSearch = $this->checkChartsArchive('stationBestSeller',request()->organization_id,$from,$to);

        if ($lastSearch) {
            return response()->json( json_decode($lastSearch));
        }

        $tics = DB::table('tickets_archive')
                    ->where('bookingMethod',$type)
                    ->where('tickets_archive.organization_id','LIKE',request()->organization_id)
                    ->where('tickets_archive.travelDate','>=',$from)
                    ->where('tickets_archive.travelDate','<=',$to)
                    ->leftJoin('stations', 'stations.id', '=', 'tickets_archive.station')
                    // ->leftJoin('organizations', 'organizations.id', '=', 'tickets_archive.organization_id')
                    ->select('stations.name',DB::raw('count(*) as total'))
                    ->groupBy('tickets_archive.station')
                    ->orderBy('total','desc')
                    ->get()
                    ->take(10);
                    // ->toArray();

        //  dd($tics);

        $this->saveChartsArchive('stationBestSeller',request()->organization_id,$from,$to,$tics);

        return response()->json($tics);
    }

    public function topOrganizationsTrips(){

        $lastSearch = $this->checkChartsArchive('topOrganizationsTrips',request()->organization_id,'','');

        if ($lastSearch) {
            return response()->json( json_decode($lastSearch));
        }

        $tics = DB::table('trips')
                ->where('organization_id','LIKE',request()->organization_id)
                ->leftJoin('organizations', 'organizations.id', '=', 'trips.organization_id')
                ->select('organizations.name',DB::raw('count(*) as total'))
                ->groupBy('trips.organization_id')
                ->orderBy('total','desc')
                ->get()
                ->take(10);
               
        $this->saveChartsArchive('topOrganizationsTrips',request()->organization_id,'','',$tics);

        return response()->json($tics);
    }

    public function topOrganizationsStations(){

        $lastSearch = $this->checkChartsArchive('topOrganizationsStations',request()->organization_id,'','');

        if ($lastSearch) {
            return response()->json( json_decode($lastSearch));
        }

        $tics = DB::table('stations')
                ->where('organization_id','LIKE',request()->organization_id)
                ->leftJoin('organizations', 'organizations.id', '=', 'stations.organization_id')
                ->select('organizations.name',DB::raw('count(*) as total'))
                ->groupBy('stations.organization_id')
                ->orderBy('total','desc')
                ->get()
                ->take(10);

        $this->saveChartsArchive('topOrganizationsStations',request()->organization_id,'','',$tics);

        return response()->json($tics);
    }

    public function BestSellerTicketTypes(){

        $from = (request()->from)? request()->from : '2000-01-01';
        $to = (request()->to)? request()->to : date("Y-m-d");

        $lastSearch = $this->checkChartsArchive('BestSellerTicketTypes',request()->organization_id,$from,$to);

        if ($lastSearch) {
            return response()->json( json_decode($lastSearch));
        }

        $tics = DB::table('tickets_archive')
                    ->where('tickets_archive.organization_id','LIKE',request()->organization_id)
                    ->where('tickets_archive.travelDate','>=',$from)
                    ->where('tickets_archive.travelDate','<=',$to)
                    ->where('trips.id','!=',null)
                    ->leftJoin('trips', 'trips.id', '=', 'tickets_archive.trip_id')
                    ->leftJoin('trip_classes', 'trip_classes.id', '=', 'trips.trip_class')
                    ->select('trip_classes.name',DB::raw('count(*) as total'))
                    ->groupBy('trips.trip_class')
                    ->orderBy('total','desc')
                    ->take(10)
                    ->get();


        $this->saveChartsArchive('BestSellerTicketTypes',request()->organization_id,$from,$to,$tics);

        return response()->json($tics);
    }

    public function ticketsReservationMethods(){

        $from = (request()->from)? request()->from : '2000-01-01';
        $to = (request()->to)? request()->to : date("Y-m-d");

        $lastSearch = $this->checkChartsArchive('ticketsReservationMethods',request()->organization_id,$from,$to);

        if ($lastSearch) {
            return response()->json( json_decode($lastSearch));
        }

        $tics = DB::table('tickets_archive')
                    ->where('tickets_archive.organization_id','LIKE',request()->organization_id)
                    ->where('tickets_archive.travelDate','>=',$from)
                    ->where('tickets_archive.travelDate','<=',$to)
                    ->leftJoin('access_list', 'access_list.id', '=', 'tickets_archive.access_id')
                    ->select('access_list.title',DB::raw('count(*) as total'))
                    ->groupBy('tickets_archive.access_id')
                    ->orderBy('total','desc')
                    ->take(10)
                    ->get();
        
        $tics = collect($tics);

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

            $this->saveChartsArchive('ticketsReservationMethods',request()->organization_id,$from,$to,$tics);

        return response()->json($tics);
    }

    public function OnlineSales(){

        $from = (request()->from)? request()->from : '2000-01-01';
        $to = (request()->to)? request()->to : date("Y-m-d");

        $lastSearch = $this->checkChartsArchive('OnlineSales',request()->organization_id,$from,$to);

        if ($lastSearch) {
            return response()->json( json_decode($lastSearch));
        }

        $tics = DB::table('tickets_archive')
                    ->where('tickets_archive.organization_id','LIKE',request()->organization_id)
                    ->where('tickets_archive.travelDate','>=',$from)
                    ->where('tickets_archive.travelDate','<=',$to)
                    ->leftJoin('organizations', 'organizations.id', '=', 'tickets_archive.organization_id')
                    ->where('bookingMethod','Online')
                    // ->where('tickets_archive.organization_id',26)
                    // ->whereNotNull('access_id')
                    ->select('organizations.name',DB::raw('sum(totalamount) as total'))
                    ->groupBy('tickets_archive.organization_id')
                    ->orderBy('total','desc')
                    ->take(10)
                    ->get();

        $this->saveChartsArchive('OnlineSales',request()->organization_id,$from,$to,$tics);
                
        return response()->json($tics);

    }

    public function OfflineSales(){

        $from = (request()->from)? request()->from : '2000-01-01';
        $to = (request()->to)? request()->to : date("Y-m-d");

        $lastSearch = $this->checkChartsArchive('OfflineSales',request()->organization_id,$from,$to);

        if ($lastSearch) {
            return response()->json( json_decode($lastSearch));
        }

        $tics = DB::table('tickets_archive')
                    ->where('tickets_archive.organization_id','LIKE',request()->organization_id)
                    ->where('tickets_archive.travelDate','>=',$from)
                    ->where('tickets_archive.travelDate','<=',$to)
                    ->leftJoin('organizations', 'organizations.id', '=', 'tickets_archive.organization_id')
                    ->where('bookingMethod','Offline')
                    ->whereNull('access_id')
                    ->select('organizations.name',DB::raw('sum(totalamount) as total'))
                    ->groupBy('tickets_archive.organization_id')
                    ->orderBy('total','desc')
                    ->take(10)
                    ->get();

        $this->saveChartsArchive('OfflineSales',request()->organization_id,$from,$to,$tics);

        return response()->json($tics);

    }

    public function topDestinationSales($type){

        $from = (request()->from)? request()->from : '2000-01-01';
        $to = (request()->to)? request()->to : date("Y-m-d");

        $lastSearch = $this->checkChartsArchive('topDestinationSales',request()->organization_id,$from,$to);

        if ($lastSearch) {
            return response()->json( json_decode($lastSearch));
        }

        $tics = DB::table('tickets_archive')
                    ->where('tickets_archive.organization_id','LIKE',request()->organization_id)
                    ->where('tickets_archive.travelDate','>=',$from)
                    ->where('tickets_archive.travelDate','<=',$to)
                    ->leftJoin('organizations', 'organizations.id', '=', 'tickets_archive.organization_id')
                    ->leftJoin('cities as c1', 'c1.id', '=', 'tickets_archive.city_from')
                    ->leftJoin('cities as c2', 'c2.id', '=', 'tickets_archive.city_to')
                    ->where('bookingMethod',$type)
                    ->select(DB::raw('CONCAT(c1.city_name," - ",c2.city_name) as linename'),DB::raw('count(*) as total'))
                    ->groupBy('city_from','city_to')
                    ->orderBy('total','desc')
                    ->take(10)
                    ->get();

        $this->saveChartsArchive('topDestinationSales',request()->organization_id,$from,$to,$tics);

        return response()->json($tics);

    }

    public function collectedBalance(){

        $lastSearch = $this->checkChartsArchive('collectedBalance',request()->organization_id,'','');

        if ($lastSearch) {
            return response()->json( json_decode($lastSearch));
        }

        $tics = DB::table('user_card_balance')
                    ->where('user_card_balance.organization_id','LIKE',request()->organization_id)
                    ->leftJoin('organizations', 'organizations.id', '=', 'user_card_balance.organization_id')
                    ->where('amount','>',0)
                    ->select('organizations.name',DB::raw('sum(amount) as total'))
                    ->groupBy('user_card_balance.organization_id')
                    ->orderBy('total','desc')
                    ->get()
                    ->take(10);

        $this->saveChartsArchive('collectedBalance',request()->organization_id,'','',$tics);

        return response()->json($tics);

    }

    public function getRegisteredClients(){

                    
        $lastSearch = $this->checkChartsArchive('getRegisteredClients',request()->organization_id,'','');

        if ($lastSearch) {
            return response()->json( json_decode($lastSearch));
        }

        $registeredUsers = DB::table('users')
                            // ->where('tickets_archive.organization_id','LIKE',request()->organization_id)
                            ->where('type','!=','Employee')
                            ->count();   
                            
        $onlineUsers = DB::table('tickets_archive')
                            ->where('tickets_archive.organization_id','LIKE',request()->organization_id)
                            ->where('credit','=',1)
                            ->count();        
                        
        $offlineUsers = DB::table('offline_user')
                        ->where('offline_user.organization_id','LIKE',request()->organization_id)
                        ->count();

        $results[] = [
            'type'  => 'مسجل',
            'total' => $registeredUsers,
        ];
        $results[] = [
            'type'  => 'من المحطة',
            'total' => $offlineUsers,
        ];
        
        $results[] = [
            'type'  => 'اونلاين',
            'total' => $onlineUsers,
        ];

        $this->saveChartsArchive('getRegisteredClients',request()->organization_id,'','',$results);

        return response()->json($results);

    }

    public function mostUsedPaymentMethod(){

        $from = (request()->from)? request()->from : '2000-01-01';
        $to = (request()->to)? request()->to : date("Y-m-d");

        $lastSearch = $this->checkChartsArchive('mostUsedPaymentMethod',request()->organization_id,$from,$to);

        if ($lastSearch) {
            return response()->json( json_decode($lastSearch));
        }
        
        
        // get cash and fawry paid tickets
        $nonCreditTickets = DB::table('tickets_archive')
                            ->where('tickets_archive.organization_id','LIKE',request()->organization_id)
                            ->where('tickets_archive.travelDate','>=',$from)
                            ->where('tickets_archive.travelDate','<=',$to)
                            ->where('credit',0)
                            ->groupBy('bookingMethod')
                            ->select(('bookingMethod'),DB::raw('count(*) as total'))
                            ->get();
                            
        $creditTickets = DB::table('tickets_archive')
                            ->where('tickets_archive.organization_id','LIKE',request()->organization_id)
                            ->where('tickets_archive.travelDate','>=',$from)
                            ->where('tickets_archive.travelDate','<=',$to)
                            ->where('credit',1)
                            ->where('bookingMethod','Online')

                            ->leftJoin('user_card_balance', 'user_card_balance.ticket_ref_code', '=', 'tickets_archive.ref_code')
                            ->leftJoin('user_card_type', 'user_card_balance.card_id', '=', 'user_card_type.id')
                            // ->where('user_card_balance.card_id',36)
                            ->groupBy('user_card_type.type')
                            ->select(('user_card_type.name'),DB::raw('count(*) as total'))
                            ->get();
                    
                            // dd($creditTickets);

        $nonCreditTickets = collect($nonCreditTickets);
        $creditTickets = collect($creditTickets);
        $results[] = [
            'type'  => 'كاش',
            'total' => $nonCreditTickets->where('bookingMethod','Offline')->first()->total,
        ];
        $results[] = [
            'type'  => 'فيزا',
            'total' => $nonCreditTickets->where('bookingMethod','Online')->first()->total,
        ];
        
        foreach ($creditTickets as $key => $user_card_type) {

            $results[] =[
                'type' => $user_card_type->name,
                'total' => $user_card_type->total,
            ];
        }
        

        $this->saveChartsArchive('mostUsedPaymentMethod',request()->organization_id,$from,$to,$results);

        return response()->json($results);

    }

    ////////////

    public function checkChartsArchive($chart_type,$organization_id,$date_from,$date_to){
        $archivedChartResult = DB::table('charts_archive')
                    ->where('chart_type',$chart_type)
                    ->where('organization_id',$organization_id)
                    ->where('date_from',$date_from)
                    ->where('date_to',$date_to)
                    ->first();

        if ($archivedChartResult) {
            return $archivedChartResult->result;
        } else {
            return 0;
        }
    }

    public function saveChartsArchive($chart_type,$organization_id,$date_from,$date_to,$result){
        DB::table('charts_archive')->insert([
            'chart_type' => $chart_type,
            'organization_id' => $organization_id,
            'date_from' => $date_from,
            'date_to' => $date_to,
            'result' => json_encode($result),
        ]);
    }
}
