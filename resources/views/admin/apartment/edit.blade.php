@extends('layouts.app')

@section('title', 'BoolBnB | Modifica l\'appartamento')

@section('content')
    <div class="main_container">

        {{-- Controllo errori --}}
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form inserimento dati --}}
        <form class="form_box_edit" method="post" action="{{route('apartment.update', $apartment)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="images_left">
                {{-- Immagine principale --}}
                @if ($apartment->main_img)
                    <p>Immagine principale:</p>
                        @if(strpos($apartment->main_img, 'https') !== false)
                        <img src="{{ $apartment->main_img }}" alt="{{$apartment->title}}">
                        @else
                            <img src="{{ asset('storage/'.$apartment->main_img) }}" alt="{{$apartment->title}}">
                        @endif
                    <label for="InputFile">Sostituisci l'immagine</label>    
                @else
                    <p>Immagine non inserita</p>
                    <label for="InputFile">Carica un'immagine</label>
                @endif
                <div>
                    <input type="file" id="InputFile" name="main_img">
                </div>

                {{-- Foto galleria --}}
                <p>Seleziona tutte le immagini per la galleria delle foto</p>
                <label>Immagini presenti della galleria:</label>
                <div class="d-flex flex-wrap ">
                    @if (isset($images))
                        @foreach ($images as $image)
                            @if(strpos($apartment->main_img, 'https') !== false)
                                <img src="{{ $image->src }}" alt="{{$image->img_description}}">
                            @else
                                <div>
                                    <img src="{{ asset('storage/'.$image->src) }}" alt="{{$image->img_description}}">
                                </div>
                            @endif
                            {{-- @php dd($image->src) @endphp  --}}
                        @endforeach
                    @else
                        <p>Non sono presenti foto della galleria per qiesto appartamento</p>
                    @endif
                </div>
                
                <p>Se scegli di inserire almeno una foto, tutte quelle presenti precedemente verrano eliminate</p>
                <div>
                    <input type="file" id="InputFile" name="images[]" multiple>
                </div>
            </div>

            <div class="info_right">
                {{-- Titolo Appartamento --}}
                <section>
                    <label for="InputTitle">Titolo</label>
                    <input type="text" id="InputTitle" placeholder="Inserisci il titolo" name="title" value="{{$apartment->title}}">
                </section>

                {{-- Descrizione appartamento --}}
                <section>
                    <label for="InputDescription">Descrizione</label>
                    <textarea class="input_text" id="InputDescription" placeholder="Inserisci la descrizione dell'appartamento" cols="30" rows="10" name="content">{{$apartment->description}}</textarea>
                </section>

                {{-- Riga singola con Città - Regione - Stato --}}
                <section class="row_input">
                    <div>
                        <label for="InputCity">Città</label>
                        <input type="text" id="InputCity" placeholder="Inserisci la Città" name="city" value="{{$apartment->city}}">
                    </div>

                    <div>
                        <label for="InputProvince">Provincia</label>
                        <input type="text" id="InputProvince" placeholder="Inserisci la Provincia" name="province" value="{{$apartment->province}}">
                    </div>

                    <div>
                        <label for="InputStato">Stato</label>
                        <input type="text" id="InputStato" placeholder="Inserisci lo Stato" name="state" value="{{$apartment->state}}">
                    </div>
                </section>

                {{-- Riga singola con Num Stanze - Num Letti - Num Bagni - MQ --}}
                <section class="row_input">
                    <div>
                        <label for="NumRooms">Stanze</label>
                        <input type="number" id="NumRooms" name="num_rooms" value="{{$apartment->num_rooms}}">
                    </div>

                    <div>
                        <label for="NumBeds">Letti</label>
                        <input type="number" id="NumBeds" name="num_beds" value="{{$apartment->num_beds}}">
                    </div>

                    <div>
                        <label for="NumBaths">Bagni</label>
                        <input type="number" id="NumBaths" name="num_baths" value="{{$apartment->num_baths}}">
                    </div>

                    <div>
                        <label for="InputMq">Mq</label>
                        <input type="number" id="InputMq" name="mq" value="{{$apartment->mq}}">
                    </div>
                </section>

                {{-- Riga singola con Latitudine - Longitudine --}}
                    <!-- <div>
                        <label for="InputLatitude">Latitudine</label>
                        <input type="text" id="InputLatitude" placeholder="Inserisci la Latitudine" name="latitude" value="{{$apartment->latitude}}">
                    </div> -->

            {{-- Riga singola con Latitudine - Longitudine --}}
            <div class="form-row">
                <section>
                    <div>
                        <p>Per favore reinserire l'indirizzo manualmente ancora (obbligatorio).</p>
                        <label for="InputLatitude">Esempio modello: via milano 3, 20020 corsico MI </label>
                        <input type="text" id="InputIndirizzo" placeholder="Inserisici nome della via" name="andress" v-model='indirizzo' v-on:input="getPosition" value="{{old('andress')}}">
                    </div>

                    <div>
                        <!-- <label for="InputLatitude">Latitudine</label> -->
                        <input type="hidden" id="InputLatitude" placeholder="Inserisci la Latitude" name="latitude" v-model='latitude'>
                    </div>

                    <div>
                        <!-- <label for="InputLongitude">Longitudine</label> -->
                        <input type="hidden" id="InputLongitude" placeholder="Inserisci la Longitudine" name="longitude" v-model='longitude'>
                    </div>

                    {{-- Visibilita --}}
                    <div>
                        <label for="InputActive">Vuoi rendere visibile il tuo l'appartamento</label>    
                        <select name="active" class="custom-select mb-2 mr-sm-2 mb-sm-0" >
                            <option value="0" {{$apartment->active == '0' ? ' selected' : '' }}>Non visibile </option>
                            <option value="1" {{$apartment->active == '1' ? ' selected' : '' }}>Visibile</option>
                        </select>
                    </div>
                </section>

                {{-- servizi --}}            
                <section>
                    <label for="InputActive">Servizi disponibili</label>
                    @foreach ($services as $service)
                        <div class="service_box">
                            <label for="services">
                                {{$service->name}}
                            </label>
                            <input value="{{ $service->id }}" {{$apartment->services->contains($service->id) ? 'checked' : ''}} class="form-check-input" type="checkbox" id="services" name="services[]">
                        </div>
                    @endforeach
                </section>
            </div>

            <div class="bottone_edit">
                <button type="submit">Salva le modifiche</button>
                <a href="{{route('apartment.index')}}"><button>Annulla</button></a>
            </div>
        </form>
    </div>
@endsection
