@extends('layouts.app')

@section('title', 'BoolBnB | Messaggi Utente')

@section('content')
<div class="msg_container">

    @foreach($messages as $message)
    <section class="t_body">
        <div class="msg-img">
            <h4>Immagine appartamento: </h4>
            @if(strpos($apartmentsAll[$message->apartment_id]->main_img, 'https') !== false)
            <img src="{{ $apartmentsAll[$message->apartment_id]->main_img }}" alt="Anteprima img appartamento">
            @else
            <img src="{{ asset('storage/'.$apartmentsAll[$message->apartment_id]->main_img) }}" alt="Anteprima img appartamento">
            @endif
        </div>
        <div class="msg-title"><h4>Nome Appartamento: </h4><p>{{$apartmentsAll[$message->apartment_id]->title}}</p></div>
        <div class="msg-name"><h4>Nominativo Messaggio: </h4><p>{{ $message->sender_name }}</p></div>
        <div class="msg-mail"><h4>Mail Messaggio: </h4><p>{{ $message->sender_mail }}</p></div>
        <div class="msg-txt"><h4>Testo Messaggio</h4><p>{{ $message->msg_txt }}</p></div>
        <!-- <a class="msg-bottone" href="{{route('message.show', $message)}}">Visualizza</a> -->
    </section>
    @endforeach

</div>
@endsection
