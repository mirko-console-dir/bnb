@extends('layouts.app')

@section('title', 'BoolBnB | Crea un nuovo appartamento')

@section('content')
    <div class="main_container">

        {{-- Controllo errori --}}
        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form inserimento dati --}}
        <form class="form_box" method="post" action="{{route('apartment.store')}}" enctype="multipart/form-data">
            @csrf
            @method('POST')

            {{-- Titolo Appartamento --}}
            <section>
                <label for="InputTitle">Titolo</label>
                <input type="text" id="InputTitle" placeholder="Inserisci il titolo" name="title" value="{{old('title')}}">
            </section>

            {{-- Descrizione appartamento --}}
            <section>
                <label for="InputDescription">Descrizione</label>
                <textarea class="input_text" id="InputDescription" placeholder="Inserisci la descrizione dell'appartamento" cols="30" rows="10" name="description">{{old('description')}}</textarea>
            </section>

            <!-- QUELLO DELLA CHAT DI DANIEL E FUNZIONA-->
            <section class="row_input">
                <div>
                    <label for="InputVia">Via/Piazza</label>
                    <input type="text" id="InputVia" placeholder="Inserisci cap" name="via" value="{{old('via')}}" v-model='via' v-on:input="getPosition">
                </div>
                <div>
                    <label for="InputVia">Numero civico</label>
                    <input type="text" id="InputVia" placeholder="Inserisci il numero civico" name="numero_civico" value="{{old('numero_civico')}}" v-model='numero_civico' v-on:input="getPosition">
                </div>
                <div>
                    <label for="InputVia">CAP</label>
                    <input type="number" id="InputVia" placeholder="Inserisci il numero civico" name="cap" value="{{old('cap')}}" v-model='CAP' v-on:input="getPosition">
                </div>
                <div>
                    <label for="InputCity">Città</label>
                    <input type="text" id="InputCity" placeholder="Inserisci la Città" name="city" value="{{old('city')}}" v-model='citta' v-on:input="getPosition">
                </div>
                <div>
                    <label for="InputProvince">Provincia</label>
                        <input type="text" id="InputProvince" placeholder="Inserisci la Provincia" name="provincia" value="{{old('provincia')}}" v-model='provincia' v-on:input="getPosition">
                </div>
                <div>
                    <label for="InputStato">Stato</label>
                    <input type="text" id="InputStato" placeholder="Inserisci lo Stato" name="state" value="{{old('provincia','Italia')}}" v-model='stato' v-on:input="getPosition">
                </div>
            </section>

            {{-- Riga singola con Latitudine - Longitudine --}}
            <section>
                <div>
                    <label for="InputLatitude">Latitudine</label>
                    <input type="text" id="InputLatitude" placeholder="Inserisci la Latitude" name="latitude" v-model='latitude'>
                </div>
                <div>
                    <label for="InputLongitude">Longitudine</label>
                    <input type="text" id="InputLongitude" placeholder="Inserisci la Longitudine" name="longitude" v-model='longitude'>
                </div>
                <div>
                    <label for="Input indirizzo">Indirizzo</label>
                    <input type="text" id="Input indirizzo" placeholder="Inserisci l'indirizzo" name="indirizzo" v-model='indirizzo'>
                </div>
            </section>
            <!-- QUELLO DELLA CHAT DI DANIEL E FUNZIONA-->

            {{-- Riga singola con Num Stanze - Num Letti - Num Bagni - MQ --}}
            <section class="row_input">
                <div>
                    <label for="NumRooms">Stanze</label>
                    <input type="number" id="NumRooms" name="num_rooms" placeholder="Numero Stanze">
                </div>

                <div>
                    <label for="NumBeds">Letti</label>
                    <input type="number" id="NumBeds" name="num_beds" placeholder="Numero Letti">
                </div>

                <div>
                    <label for="NumBaths">Bagni</label>
                    <input type="number" id="NumBaths" name="num_baths" placeholder="Numero Bagni">
                </div>

                <div>
                    <label for="InputMq">Mq</label>
                    <input type="number" id="InputMq" name="mq" placeholder="Metriquadri">
                </div>
            </section>

            <section>
                {{-- Immagine principale --}}
                <div>
                    <label for="InputFile">Immagine principale (obbligatoria)</label>
                    <input type="file" id="InputFile" name="main_img">
                </div>
                {{-- Foto galleria --}}
                <div class="gallery">
                    <label>Carica le foto dell'appartamento (facoltativa)</p>
                    <input type="file" id="InputFile" name="images[]" multiple>
                </div>
            </section>

            <section>
                {{-- Prezzo Appartamento --}}
                <div>
                    <label for="InputPrice">Prezzo per notte</label>
                    <input type="number" id="InputPrice" placeholder="Inserisci il Prezzo" name="price">
                </div>
                {{-- Visibilita --}}
                <div>
                    <label for="InputActive">Vuoi rendere visibile il tuo l'appartamento</label>    
                    <select name="active">
                        <option value="0" {{old('active') == '0' ? ' selected' : '' }}>Non visibile </option>
                        <option value="1" {{old('active') == '1' ? ' selected' : '' }}>Visibile</option>
                    </select>
                </div>
            </section>

            {{-- servizi --}}            
            <section>
                <label for="InputActive">Servizi disponibili: </label>    
                
                @foreach ($services as $service)
                    <div class="service_box">
                        <label for="services">
                            {{$service->name}}
                        </label>
                        <input type="checkbox" value="{{$service->id}}" id="services" name="services[]"
                            @if ($service->id == old('services'))
                                selected="selected"
                            @endif>
                    </div>
                @endforeach
            </section>

            <div class="bottone"><button type="submit">Aggiungi</button></div>
        </form>
        
    </div>
@endsection


