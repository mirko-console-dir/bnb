<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Apartment;
use App\View;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;


class ViewController extends Controller
{
    public function show($slug){
        $apartment = Apartment::where('slug', $slug)->firstOrFail();
        $visite = View::select( DB::raw('COUNT(*) as totale'), DB::raw('MONTH(created_at) as numero_mese') )
        ->where('apartment_id',$apartment->id )
        ->groupBy('numero_mese')
        ->orderBy('numero_mese', 'ASC')->get();


        $contatore = View::where('apartment_id', $apartment->id)->count('id');
        // $contatore = View::select(DB::raw('COUNT(*) as tot'))
        // ->where('apartment_id', $apartment->id)
        // ->groupBy('tot')->get();
        // ->groupBy('apartment_id');
        
        // $visitors = View::select( DB::raw('COUNT(*) as totale'), DB::raw('COUNT(apartment_id) as numero_visitatori'))
        // ->where('apartment_id', $apartment->id)
        // ->groupBy('numero_visitatori')->toArray();
        // $visitors = View::count('apartment_id', $apartment->id)->groupBy('apartment_id');
        // $visite_totali = View::select( DB::raw('COUNT(*)'), DB::raw('COUNT(apartment_id) as tot'))
        // ->where('apartment_id', $apartment->id)
        // ->groupBy('total');
        // dd($visite_totali);
        // $visite = View::select( DB::raw('COUNT(*) as totale'), DB::raw('MONTHNAME(created_at) as numero_mese') )
        // ->where('apartment_id',$apartment->id )
        // ->groupBy('numero_mese')
        // ->orderBy('numero_mese', 'ASC')->get();

        $data = [
            'apartment' => $apartment,
            'numero_visite' => $visite,
            'visite_totali' => $contatore
        ];
        return view('admin.statistic.show', $data);
    }
}
