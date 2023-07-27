@extends('layouts.app')

@section('title', 'BoolBnB | Dettaglio messaggi utente')

@section('content')
    <div class="main_container">

        <div>
            @if(strpos($apartmentsAll[$message->apartment_id]->main_img, 'https') !== false)
                <img style="height: 200px;" src="{{ $apartmentsAll[$message->apartment_id]->main_img }}" alt="{{$apartmentsAll[$message->apartment_id]->title}}">
            @else
                <img style="height: 200px;" src="{{ asset('storage/'.$apartmentsAll[$message->apartment_id]->main_img) }}" alt="{{$apartmentsAll[$message->apartment_id]->title}}">
            @endif
            <div>
                <h2>Appartamento: {{ $apartmentsAll[$message->apartment_id]->title }}</h2>
                <h2>Nome: {{ $message->sender_name }}</h2>
                <h2>Mail: {{ $message->sender_mail }}</h2>
                <h2>Richiesta informazioni: {{ $message->msg_txt }}</h2>
                <!-- <h2>{{ $message->status }}</h2> -->
            </div>

            <div>
                <a href="{{ route( 'message.index' ) }}"><button type="button">Torna Indietro</button></a>
            </div>
            
            <div >
                <form method="post" action="{{route('message.destroy', $message)}}">
                    @csrf
                    @method('DELETE')
                        <button type="submit">Elimina</button>
                </form>
            </div>
        </div>
    </div>
@endsection
