<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Message;
use App\Sponsor;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SliderController extends Controller
{
    public function index()
    {
         // chiamamo tutti i flat dal db
      // prendi solo quelli con la promo e end maggiore di now
        $now = Carbon::now();
        $apartmentPromo = DB::table("apartments")->select("*")->join('apartment_sponsor', 'apartments.id', '=', 'apartment_sponsor.apartment_id')->where('end_date', '>', $now)->get();
        $apartment = Apartment::all();
        
        $pivot_sponsor_apartment = DB::table('apartment_sponsor')->latest('end_date')->get();
        
        
        $data = [
            'pivot' => $pivot_sponsor_apartment,
            'apartmentSponsored' => $apartmentPromo
        ];



        // dd($apartmentPromo);

        // dd($pivot_sponsor_apartment);
        // dd($prova);
        // $sponsor_apartment = DB::table('apartment_sponsor')->where('apartment_id', $apartment->id)->latest('end_date')->first();
        // dd($apartment);
        return response()->json($data);
    }
}
