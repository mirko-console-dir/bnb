@extends('layouts.app')

@section('title', 'BoolBnB | Scelta sponsorizzazione')

@section('content')
    <div class="main_container">
        <div class="box_ap_spons">
            <h3>Stai sponsorizzando questo appartamento:</h3>
            @if(strpos($apartment->main_img, 'https') !== false)
                <img src="{{ $apartment->main_img }}" alt="{{$apartment->title}}">
            @else
                <img src="{{ asset('storage/'.$apartment->main_img) }}" alt="{{$apartment->title}}">
            @endif
            <h4>{{$apartment->title}}</h4>
        </div>
        <div class="container_sponsor">
            @foreach($sponsors as $sponsor)
                <div class="box_sponsor_type">
                    <h2>Durata sponsorizzazione: {{$sponsor->duration}} ore</h2>
                    <h2>Costo: {{$sponsor->price}} €</h2>
                    <h4>{{$sponsor->description}}</h4>
                    <a href="{{route('richiesta-pagamento', $apartment)}}">SPONSORIZZA</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection