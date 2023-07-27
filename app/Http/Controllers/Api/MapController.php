<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;

class MapController extends Controller
{
    public function index($id) {
        $apartment = Apartment::where('id', $id)->firstOrFail();
        $lat = $apartment->latitude;
        $long = $apartment->longitude;
        // $fullAddress = $apartment->apartment_address->street . ' ' . $apartment->apartment_address->street_number . ' ' . $apartment->apartment_address->city . ' ' . $apartment->apartment_address->zip_code;
        $result = [
                'latitude' => $lat,
                'longitude' => $long,
                // 'fullAddress' => $fullAddress
            ];
            return response()->json($result, 200);
        
        
    }
}
