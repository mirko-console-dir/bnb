@extends('layouts.app')

@section('title', 'BoolBnB | Dettaglio appartamento')

@section('content')
    <div class="main_container">

    <div class="up_container">
        <span><h2>Account > </h2> <h1>Appartamento</h1> <h1>{{$apartment->id}}</h1></span>
        <a href="{{ route( 'apartment.index' ) }}"><button type="button">Torna Indietro</button></a>
    </div>

        <div class="mid_container">
            {{-- PARTE SINISTRA--IMMAGINI --}}
            <section class="images_left">
                @if(strpos($apartment->main_img, 'https') !== false)
                    <img src="{{ $apartment->main_img }}" alt="{{$apartment->title}}">
                @else
                    <img src="{{ asset('storage/'.$apartment->main_img) }}" alt="{{$apartment->title}}">
                @endif
                @foreach($images as $image)
                    @if(strpos($image->src, 'https') !== false)
                        <img src="{{ $image->src }}" alt="foto appartamento">
                    @else
                        <img src="{{ asset('storage/'.$image->src) }}" alt="foto appartamento">
                    @endif
                @endforeach
            </section>
            {{-- PARTE SINISTRA--IMMAGINI --}}

            {{-- PARTE DESTRA--INFORMAZIONI --}}
            <section class="info_right">
                <h2>Informazioni Appartamento</h2>
                <h4>Nome Appartamento</h4>
                <h5>{{$apartment->title}}</h5>
                <div class="box_dati">
                    <div>
                        <h4>Superficie mq</h4>
                        <p>{{$apartment->mq}} mq</p>
                    </div>
                    <div>
                        <h4>Stanze</h4>
                        <p>{{$apartment->num_rooms}}</p>
                    </div>
                    <div>
                        <h4>Letti</h4>
                        <p>{{$apartment->num_beds}}</p>
                    </div>
                    <div>
                        <h4>Bagni</h4>
                        <p>{{$apartment->num_baths}}</p>
                    </div>
                </div>
                
                <!-- SERVIZI -->
                <div class="box_servizi">
                    <h4>Servizi</h4>
                    @foreach ($apartment->services as $service)
                        <p>{{$service->name}}</p>
                    @endforeach
                </div>

                <!-- POSIZIONE -->
                <div class="box_posizione">
                    <h4>Indirizzo</h4>
                    <p>{{$apartment->city}}, {{$apartment->province}}, {{$apartment->state}}</p>

                    <h4>Descrizione</h4>
                    <p>{{$apartment->description}}</p>

                    <h4>Coordinate Geografiche</h4>
                    <p>Latitudine: {{$apartment->latitude}}</p>
                    <p>Longitudine: {{$apartment->longitude}}</p>

                    <h4>Prezzo per notte</h4>
                    <p>{{$apartment->price}} €</p>
                </div>

                <!-- SPONSOR -->
                <div class="box_sponsor">
                    <h2>Sponsorizzazioni</h2>
                    <div>
                        {{-- <div>
                            <h4>Informazioni</h4>
                            <p>{{ ($sponsor == 1) ? "Su questo appartamento è attiva una sponsorizzazione" : "Su questo appartamento non è attiva una sponsorizzazione" }}</p>
                        </div>
                        @if($sponsor == 0)
                        <a href="{{route('sponsor.index', $apartment->slug)}}"><button type="button">Sponsorizza</button></a>
                        @endif --}}

                        @if ($sponsor)
                        <a class="mr-2" href="{{route('sponsor.index', $apartment->slug)}}"><button type="button" class="btn btn-warning">Sponsorizza</button></a>
                        @else
                            <h1>Il tuo appartmento é sponsorizzato</h1>
                        @endif
                    </div>
                    
                    <!-- DATI SPONSOR -->
                    {{-- @if($pivot == 1)
                    <div class="box_dati_sponsor">
                        <div>
                            <h4>Tipo</h4>
                            <p>{{ $sponsors[$apartment->sponsors[0]->pivot->sponsor_id]->description }}</p>
                        </div>
                        <div>
                            <h4>Data inizio</h4>
                            <p>{{ date("Y-m-d h:i:s", $sponsors[$apartment->sponsors[0]->pivot->sponsor_id]->end_date) }}</p>
                        </div>
                        <div>
                            <h4>Durata</h4>
                            <p>{{ $sponsors[$apartment->sponsors[0]->pivot->sponsor_id]->duration }}</p>
                        </div>
                        <div>
                            <h4>Data di fine</h4>
                            <p>{{ date("Y-m-d h:i:s", $sponsors[$apartment->sponsors[0]->pivot->sponsor_id]->end_date) }}</p>
                        </div>
                    </div>
                    @endif --}}
                </div>

                <div class="box_msg">
                    <div>
                        <h2>Messaggi</h2>
                        <div>
                            <h4>Informazioni</h4>
                            <p>Hai {{ count($messages) }} messaggi</p>
                        </div>
                    </div>
                    <a href="{{route('message.index')}}"><button type="button">I tuoi messaggi</button></a>
                </div>

                <div class="box_view">
                    <div>
                        <h2>Statistiche</h2>
                        <div>
                            <h4>Informazioni</h4>
                            <p>{{$visite_totali}} visualizzazioni</p>
                        </div>
                    </div>
                    <a href="{{route('statistic.show', $apartment->slug)}}"><button type="button">Statistiche</button></a>
                </div>
                
                <!-- <div id="map" style="height:90vh;">
                    {{-- questo solo per passaggio di valori --}}
                    <div id="dom-lat" style="display: none;">
                        <?php
                            echo $lat = $apartment->latitude; 
                        ?>
                    </div>
                    <div id="dom-lon" style="display: none;">
                        <?php
                            echo $lon = $apartment->longitude; 
                        ?>
                    </div>
                </div> -->
            </section>
            <div class="down">
                <form method="post" action="{{route('apartment.destroy', $apartment)}}">
                    @csrf
                    @method('DELETE')
                        <button type="submit">Elimina</button>
                </form>
                <a href="{{route('apartment.edit', $apartment->slug)}}"><button type="button">Modifica</button></a>
            </div>
        </div>
    </div>
@endsection


