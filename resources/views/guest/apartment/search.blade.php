@extends('layouts.app')

@section('title', 'BoolBnB | Appartamenti trovati')

@section('content')
    <div class="main_container">

        <div class="back_btn">
            {{-- BACK --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="26.845" height="18.792" viewBox="0 0 26.845 18.792">
                <path id="Tracciato_29" data-name="Tracciato 29" d="M11.4,23.792,13.288,21.9,7.141,15.738h21.7V13.054H7.141L13.3,6.893,11.4,5,2,14.4Z" transform="translate(-2 -5)" fill="#222"/>
            </svg>
            <a href="{{url('/')}}">Torna Indietro</a>
        </div>

        <div class="main_search">
            
            {{-- BOX RISULTATI RICERCA APPARTAMENTI --}}
            <div class="search_box">

                <div class="adv_search clearfix" :class="(advancedSearch == true) ? 'active' : ''">
                    <h3 v-on:click="showSrc">Ricerca avanzata</h3>
                    <form action="{{ route('searchAvanced') }}" method="GET">
                        @csrf
                        @method('GET')

                        <h4>Caratteristiche minime stanze</h4>

                        <div class="src_box">
                            <div class="row">
                                <label for="SrcBeds">Numero letti</label>
                                <input name="num_beds" type="number" id="SrcBeds" value="1" min="1">
                            </div>
    
                            <div class="row">
                                <label for="SrcRooms">Numero stanze</label>
                                <input name="num_rooms" type="number" id="SrcRooms" value="1" min="1">
                            </div>
                        </div>

                        <div class="src_box">
                            <div class="row">
                                <label for="SrcBaths">Numero bagni</label>
                                <input name="num_baths" type="number" id="SrcBaths" value="1" min="1">
                            </div>
    
                            <div class="row">
                                <label for="SrcMq">Metri quadrati</label>
                                <input name="num_mq" type="number" id="SrcMq" value="1" min="1">
                            </div>

                            <div class="row">
                                <input name="city" type="hidden" value="{{$city}}">
                            </div>
                        </div>

                        <hr>

                        <h4>Servizi disponibili</h4>
                        <div class="src_box services">
                            @foreach ($services as $service)
                                <div class="form-check">
                                    <input value="{{ $service->id }}" type="checkbox" id="services" name="services[]">
                                    <label for="services">
                                        {{$service->name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="src_btn">Cerca</button>
                    </form>
                </div>

                @foreach ($apartments as $apartment)    
                    <div class="box">

                        {{-- IMMAGINE APPARTAMENTO --}}
                        <div class="apt_img">
                            <a href="{{route('guest.apartment.show', $apartment->slug)}}">
                                <img src="{{$apartment->main_img}}" alt="{{$apartment->title}}">
                            </a>
                        </div>

                        {{-- DIVIDER --}}
                        <div class="divider">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1" height="110" viewBox="0 0 1 121">
                                <path id="Separator" d="M582,746.953v120" transform="translate(-581.5 -746.453)" fill="none" stroke="#909090" stroke-linecap="round" stroke-width="1" stroke-dasharray="0.5 12"/>
                            </svg>
                        </div>

                        {{-- DESCRIZIONE APPARTAMENTO --}}
                        <div class="apt_description">
                            <a href="{{route('guest.apartment.show', $apartment->slug)}}">
                                <h4>{{$apartment->title}}</h4>
                            </a>
                            <p class="views">32 visualizzazioni</p>

                            <p class="rooms">{{$apartment->mq}} mq - {{$apartment->num_rooms}} stanze - {{$apartment->num_beds}} letti - {{$apartment->num_baths}} bagni</p>

                            <div class="price_box">
                                <p>Prezzo di una notte in appartamento</p>
                                <h3>{{intval($apartment->price)}} €</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
    
            {{-- MAPPA --}}
            <div id ="map" class="map_box"></div> 
                
                @php
                    // dd($apartments);
                @endphp
                {{-- questo solo per passaggio di valori --}}
                <div id="dom-ap" style="display: none;">
                    <?php
                        echo json_encode ( $apartments);
                    ?>
                </div>
                <p id="dom-city" style="display: none;">
                    <?php
                        echo $city; 
                    ?>
                </p>
                <script>

                    var apartments = document.getElementById("dom-ap").textContent;
                    var city = document.getElementById("dom-city").textContent;
                    
                    // console.log(city);

                    // trasforma stringa a array json
                    var apartments = JSON.parse(apartments);
                    // console.log(apartments);
    
                    axios
                        .get('https://api.tomtom.com/search/2/geocode/'+city+'.json?key=3Lb6xSAA2aORuhekPk7epa88Y9SpvSla')
                        .then( response  => {
                            // centro della mappa
                            console.log(apartments);
                            var HQ = response.data.results[0].position;
                            

                            // visualizzazione della mappa
                            var map = tt.map({
                                key: '3Lb6xSAA2aORuhekPk7epa88Y9SpvSla',
                                container: 'map',
                                center: HQ,
                                zoom: 14
                            });


                            // crea maker per ogni posizioni (latitudine e longitudine)
                            apartments.forEach( apartment => {
                                
                                // crea casella di testo di info con testo personalizzabile
                                var popup = new tt.Popup({ anchor: 'top' }).setText(apartment.title);

                                var position = { lat: apartment.latitude, lng: apartment.longitude }

                                console.log(position);
                                
                                // aggiungi maker sulla mappa
                                var marker = new tt.Marker().setLngLat(position).addTo(map);
                                
                                // testo descritivo del maker
                                // marker.setPopup(popup).togglePopup();

                            });
                        })
                        .catch(error => console.error('error city', error));

                </script>

                {{-- SCRIPT PER TESTING --}}
                {{-- <script>

                    var indirizzo = 'Corso Galileo Ferraris, 35, 10121 Torino TO';
                    
                    axios
                        .get('https://api.tomtom.com/search/2/geocode/'+indirizzo+'.json?key=3Lb6xSAA2aORuhekPk7epa88Y9SpvSla')
                        .then( response  => {
                            // centro della mappa
                            console.log(response.data.results);
                            
                            var data = response.data.results
                            var count = 0;
                            var position = null;
                            
                            while(count < data.length){
                                if(data[count].type == "Point Address"){
                                     position = data[count].position;
                                    //  return data[count].position;
                                } else {
                                    count++;
                                }           
                            }

                            // return null;

                            var HQ = position;
                            console.log(position);

                            // visualizzazione della mappa
                            var map = tt.map({
                                key: '3Lb6xSAA2aORuhekPk7epa88Y9SpvSla',
                                container: 'map',
                                center: HQ,
                                zoom: 16
                            });

                            var marker = new tt.Marker().setLngLat(position).addTo(map);

                        })
                        .catch(error => console.error('error city', error)); 

                </script> --}}
        </div>

    </div>
@endsection