<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Apartment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\View;
use App\Service;
use App\Image;
use App\User;


class ApartmentController extends Controller
{
        public function index(){

            $apartments = Apartment::all();
            $users = User::where('id', Auth::id())->firstOrFail();

            
            $data = [
                'apartments' => $apartments,
                'user' => $users
            ];

        return view('guest.apartment.index', $data);
        }

        public function show( $slug ) {
            // $ip = Request()->ip();
            $prova = Apartment::all();

            $apartment = Apartment::where('slug', $slug)->firstOrFail();
            $apartment_selected = $apartment->id;

            $img = Image::where('apartment_id', $apartment_selected)->get()->toArray();
            // dd($img_apartment);
            // dd($img);
            // $images = Image::all();

            // $selected = Image::where();


            // dd(Auth::user());
            if( !Auth::user() || Auth::user()->id != $apartment->user_id)
            {
                    
                    $apartment->addView();
                    // $visita = new View();                    
                    // $visita->ip_address = Request()->ip();

                    // $apartment->views()->save( $visita );                   
            }

            // dd($apartment->pivot->status);

            $contatore = View::where('apartment_id', $apartment->id)->count('id');
            


            $data = [
                'apartment' => $apartment,
                'images' => $img,
                'visite_totali' => $contatore
            ];


            
            return view('guest.apartment.show', $data)->with('apartment_selected', $apartment_selected);
        }

        //inizio test search
        public function search()
        {
            $services = Service::all();

            $search_text = $_GET['query'];
            $apartments = Apartment::where('city','LIKE','%'. $search_text .'%')->get();
            $data = [
                'apartments' => $apartments,
                'city' => $search_text,
                'services' => $services
            ];
            // return view('guest.apartment.search', compact('apartments'));
            return view('guest.apartment.search', $data);

        }

        public function homeSearch()
        {
            
            $services = Service::all();

            $search_text = $_GET['city'];
            $apartments = Apartment::where('city','LIKE','%'. $search_text .'%')->get();

            $data = [
                'apartments' => $apartments,
                'city' => $search_text,
                'services' => $services
            ];
            // return view('guest.apartment.search', compact('apartments'));
            return view('guest.apartment.search', $data);

        }
        //fine test search
}
