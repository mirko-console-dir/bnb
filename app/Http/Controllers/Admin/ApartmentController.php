<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use App\Apartment;
use App\Image;
use App\Message;
use App\Service;
use App\Sponsor;
use App\View;
use App\User;
use Carbon\Carbon;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $apartments = Apartment::all();
        $sponsors = Sponsor::all();
        $services = Service::all();
        //paginate = quanti elementi voglio vedere... ho messo 2 come numero a caso
        $apartments = Apartment::where('user_id', '=', Auth::id())->get();
        $users = User::where('id', Auth::id())->firstOrFail();
        // $apartments = Apartment::all();



        $data = [
            'apartments' => $apartments,
            'sponsors' => $sponsors,
            'services' => $services,
            'user' => $users
        ];
        return view('admin.apartment.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();

        $data = [
            'services' => $services
        ];

        return view('admin.apartment.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        
        // nuovo appartamento
        $newApartment = new Apartment();
        $newApartment->slug = Str::slug($data['title']);

        $newApartment->province = $data['provincia'];
        $newApartment->andress = $data['indirizzo'];
        
        // array base        
        $idUser = Auth::id();
        $services = Service::all();
        $images = Image::all();
        
        $newApartment->user_id =$idUser;
        // dd($data);

        // immagine principale
        if(array_key_exists('main_img', $data))
        {
            // salvataggio immagine
            $path = Storage::put('main_images', $data['main_img']);
            // dd($path);
            // percorso file
            $data['main_img'] = $path;
            $newApartment->main_img = $data['main_img'];

        }

        // salvataggio dati appartamento
        $newApartment->fill($data);
        $newApartment->save();

        if(array_key_exists('images', $data))
        {           
            // salvataggio immagini
            foreach ($data['images'] as $image) {
                $path = Storage::put('image_gallery', $image);
                
                // salva immagine sul database
                $image = new Image();
                $image->src = $path.$image;
                $image->src = str_replace( "[]", "",$image->src);
                
                // crea nuova relazione
                $newApartment->images()->saveMany([$image]);
            }
            

            // dd($data['images']);
            
        }

        // salvaggio servizi
        if (array_key_exists('services', $data)) {
            $newApartment->services()->sync($data['services']);
        }

        // ritorna view
        return redirect()->route('apartment.index')->with("status",'L\'appartamento è stato creato con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $apartment = Apartment::where('slug', $slug)->firstOrFail();
        $users = User::where('id', Auth::id())->firstOrFail();
        $messages = Message::where('apartment_id', $apartment->id)->get();
        // $sponsors = Sponsor::all();
        $images = Image::where('apartment_id', $apartment->id)->get();
        $visitor = View::where('apartment_id', $slug)->count();
        // dd($apartment->sponsors);
        // if(count($apartment->sponsors) == 0){
        //     // dd('appartamento non sponsorizzato');
        //     $pivot_app_spons = 0;
        // } else {
        //     // dd('appartamento sponsorizzato');
        //     $pivot_app_spons = $apartment->sponsors[0]->pivot->status;
        // }
        // // $pivot_app_spons = Sponsor::with('apartment_id');
        // // $duration = $apartment->sponsors[0]->pivot->duration;
        // // dd( date("Y-m-d h:i:s", strtotime('-($duration) hours', $sponsors[$apartment->sponsors[0]->pivot->sponsor_id]->end_date)));
        // $data = [
        //     'apartment' => $apartment,
        //     'visitor' => $visitor,
        //     'sponsors' => $sponsors,
        //     'images' => $images,
        //     'messages' => $messages,
        //     'pivot' => $pivot_app_spons
        // ];

        $contatore = View::where('apartment_id', $apartment->id)->count('id');

        $sponsor = DB::table('apartment_sponsor')->where('apartment_id', $apartment->id)->latest('end_date')->first();
        if( $sponsor != null )
        {
            ($sponsor->end_date > Carbon::now()) ? $sponsor = false : $sponsor = true ;
        }
        else 
        {
            $sponsor = true;
        }

        if( Auth::id() == $apartment->user_id ){

            $data = [
                'apartment' => $apartment,
                'visitor' => $visitor,
                'sponsor' => $sponsor,
                'images' => $images,
                'messages' => $messages,
                'user' => $users,
                'visite_totali' => $contatore
                // 'pivot' => $pivot_app_spons
            ];
            
            return view('admin.apartment.show', $data);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $apartment = Apartment::where('slug', $slug)->firstOrFail();
        $images_prev = Image::where('apartment_id', $apartment->id)->get();
        $services = Service::all();

        $data = [
            'apartment' => $apartment,
            'services' => $services,
            'images' => $images_prev
        ];

        return view('admin.apartment.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apartment $apartment)
    {

        $data = $request->all();
        $apartment->slug = Str::slug($data['title']);

        // immagini
        if(array_key_exists('main_img', $data))
        {
            // cancella foto presistente immagine
            Storage::delete('main_images', $apartment->main_img);
            
            // salvataggio immagine
            $path = Storage::put('main_images', $data['main_img']);
            
            // percorso file
            $data['main_img'] = $path;
            $apartment->main_img = $data['main_img'];

        }

        if(array_key_exists('images', $data))
        {
            // prendo id del appartamento
            $num = $apartment->id;
            // cerca immagini associati
            $images_prev = Image::where('apartment_id', $num)->get();
            // patch della alleria
            $path =  "image_gallery/";
            
            // cancellazione tutte le immagini dal server
            foreach ($images_prev as $image) {
                $name_img = str_replace( $path, "",$image->src);
                $name_img = str_replace( "[]", "",$image->src);
                Storage::delete('main_images', $name_img);
            }

            $apartment->images()->delete();
            
            // salvataggio immagini
            foreach ($data['images'] as $image) {
                $path = Storage::put('image_gallery', $image);
                // salva immagine sul database
                $image = new Image();
                $image->src = $path.$image;
                $image->src = str_replace( "[]", "",$image->src);
                
                // crea nuova relazione
                $apartment->images()->saveMany([$image]);
            }
            

            // dd($data['images']);
            
        }

        //validation 
    
        //need riderect into update
        $apartment->update($data);

        
        //PER TAB PONTE CON SERVICES
        if(array_key_exists('services', $data)){
            $apartment->services()->sync($data['services']);
        }
        //                          nome rotta a scelta
        return redirect()->route('apartment.index', $apartment)->with("status",'L\'appartamento è stato aggiornato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        
        // cancella foto principale
        Storage::delete('main_images', $apartment->main_img);
            
        // cerca immagini associati
        $images_prev = Image::where('apartment_id', $apartment->id)->get();
            
        // patch della alleria
        $path =  "image_gallery/";
            
        // cancellazione tutte le immagini dal server
        foreach ($images_prev as $image) {
            $name_img = str_replace( $path, "",$image->src);
            $name_img = str_replace( "[]", "",$image->src);
            Storage::delete('main_images', $name_img);
        }

        // delete service and sponsor tab ponte
        $apartment->services()->sync([]);
        $apartment->sponsors()->sync([]);

        // cancellazioni relazioni model
        $apartment->messages()->delete();
        $apartment->views()->delete();
        $apartment->images()->delete();
        $apartment->delete();
        return redirect()->route('apartment.index')->with("status",'L\'appartamento è stato cancellato con successo');
    }
}