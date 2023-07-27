@extends('layouts.app')

@section('title', 'BoolBnB | Messaggio inviato')

@section('content')

<div class="main_container">
    <div class="back_btn">
            {{-- BACK --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="26.845" height="18.792" viewBox="0 0 26.845 18.792">
                <path id="Tracciato_29" data-name="Tracciato 29" d="M11.4,23.792,13.288,21.9,7.141,15.738h21.7V13.054H7.141L13.3,6.893,11.4,5,2,14.4Z" transform="translate(-2 -5)" fill="#222"/>
            </svg>
            <a href="{{url('/')}}">Torna Indietro</a>
        </div>
    @if(session('status') == 'ok')
        <h2>messaggio inviato correttamente</h2>
    @endif
</div>

@endsection