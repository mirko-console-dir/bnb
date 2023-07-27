<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Apartment;
use App\View;
use Illuminate\Support\Facades\DB;
class ViewController extends Controller
{
    public function show($slug){

        $apartment = Apartment::where('slug', $slug)->firstOrFail();
        // $visite = View::select( DB::raw('COUNT(*) as totale'), DB::raw('MONTH(created_at) as numero_mese') )
        // ->where('apartment_id',$apartment->id )
        // ->groupBy('numero_mese')
        // ->orderBy('numero_mese', 'ASC')->get();
        
        // dd($apartment);
        // dd($visite);
        $visite = View::select( DB::raw('COUNT(*) as totale'), DB::raw('MONTHNAME(created_at) as numero_mese') )
        ->where('apartment_id',$apartment->id )
        ->groupBy('numero_mese')
        ->orderBy('numero_mese', 'ASC')->get();
        $data = [
            'apartment' => $apartment,
            'numero_visite' => $visite,
        ];
        return response()->json($data);
        
            
    }

    public function index(){
        return View::all();
    }


}