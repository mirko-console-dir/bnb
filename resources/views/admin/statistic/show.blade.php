@extends('layouts.app')

@section('title', 'BoolBnB | Dettaglio appartamento')

@section('content')
{{-- @php
    use Carbon\Carbon;
    $now = Carbon::now()->month;
    $months = [
        1 => 'Gennaio',
        2 => 'Febbraio',
        3 => 'Marzo',
        4 => 'Aprile',
        5 => 'Maggio',
        6 => 'Giugno',
        7 => 'Luglio',
        8 => 'Agosto',
        9 => 'Settembre',
        10 => 'Ottobre',
        11 => 'Novembre',
        12 => 'Dicembre'
    ];

    
    @endphp --}}
    <div class="main_container stat-margin">
        <div class="container-stat">
                <h2 class="app_stat">
                    {{$apartment->title}}
                </h2>
    
            <div class="apartment_info">
                <img class="img_stat" src="{{$apartment->main_img}}" alt="">
            </div>

            <div class="circle-tot">
                <i id="eye" class="fas fa-eye"></i>
                <p>Visite Totali:</p>
                <h3>
                    {{$visite_totali}}

                </h3>
            </div>
        
            <div class="canvas_3d" >
                <canvas id="myChart"  width="400" height="400"></canvas>
            </div>

        </div>

    </div>

        {{-- <h1>{{ $numero_visite}}</h1>
        <h1>Statistiche di {{ $apartment->title }}</h1>
        <select id="month">
                <option class="default" value="" hidden selected="">{{$months[$now]}}</option>
                    @for ($i = 1; $i <= $now; $i++)
                        
                        @foreach ($months as $key => $month)
                            @if ($key == $i)
                            <option value="{{$key}}">{{$month}}</option>
                            @endif
                        @endforeach
                    @endfor
            </select> --}}
@endsection
            

