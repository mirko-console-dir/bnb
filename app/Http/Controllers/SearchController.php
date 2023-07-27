<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Service;
use App\Apartment;

class SearchController extends Controller
{
    // metodi che restituisce se due cordinate sono all'interno di un raggio
    public function getDistance($latitude1, $longitude1, $latitude2, $longitude2) {  
      $earth_radius = 6371;
    
      $dLat = deg2rad($latitude2 - $latitude1);  
      $dLon = deg2rad($longitude2 - $longitude1);  
    
      $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);  
      $c = 2 * asin(sqrt($a));  
      $d = $earth_radius * $c;  
    
      return $d;  
    }

    public function searchAvanced(Request $request)
    {       
        // data input inseriti
        $data = $request->all();
        // dd($data);
        
        // da vedere se mi serve
        $services = Service::all();
        
        // ottieni tutti gli appartamenti di una citta
        $search_city = $data['city'];

        // test
        // $data['num_beds'] = 2;
        // $data['num_rooms'] = 2;
        // $data['num_baths'] = 2;
        // $data['mq'] = 2;
        // $data['services'] = array_values($data['services']);

        // array appartamenti ok
        $apartment_ok = [];

        // filtro appartamenti
        $apartments = DB::table('apartments')->where([
            ['city', 'LIKE', '%'. $search_city .'%'],
            ['num_beds', '>=', $data['num_beds']],
            ['num_rooms', '>=', $data['num_rooms']],
            ['num_baths', '>=', $data['num_baths']],
            ['mq','>=', $data['num_mq']],
            ['active', 0]
        ])->get();
        
        // filtra appartamenti
        foreach ($apartments as $apartment) {
            
            // ottieni id appartamento
            $id_apartment = $apartment->id;

            // ottieni tutti i servizi dell'appartamento
            $servizi_apartment = DB::table('apartment_service')->where([
                ['apartment_id', '=', $id_apartment]
            ])->get();

            // conteggio servizi trovati
            $trovati = 0;

            // se ha selezionato servizi
            if(isset($data['services'])){

                // cerca servizi corrispodenti
                foreach ($servizi_apartment as $service) {
                    if (in_array($service->service_id, $data['services'])) {
                        $trovati++;
                    }
                }

                if( $trovati == count($data['services']) ){
                    array_push($apartment_ok, $apartment);
                }
            }


        }

        if(!isset($data['services'])){

            $apartment_ok = $apartments;
        }

        // dd($apartment_ok);
        
        $data = [
            'apartments' => $apartment_ok,
            'city' => $search_city,
            'services' => $services
        ];
        
        // return view('guest.apartment.search', compact('apartments'));
        return view('guest.apartment.search', $data);

        // return response()->json($apartment_ok);

        // commento
    }
}
