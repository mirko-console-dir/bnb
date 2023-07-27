@extends('layouts.app')

@section('title', 'BoolBnB | Contatta l\'host')

@section('content')
<div class="main_container login_box">

    <div class="auth_content">
        {{-- TITOLO FORM CONTATTI HOST --}}
        <h2>Contatta l'host</h2>

        <div class="auth_box">
            <form action="{{ route('guest.message.sent') }}" method="POST">
                @csrf
                @method('POST')

                <div class="hidden-form">
                    <input name="status" type="hidden" value="1">
                    <input name="apartment_id" type="hidden" value="{{$apartment_id->id}}">
                </div>

                <div class="row">
                    <label for="nomeUtente">Nome e Cognome</label>
                    <input name="sender_name" type="text" class="form-control" id="nomeUtente">
                </div>

                <div class="row">
                    <label for="Inputemail">Email</label>
                    <input name="sender_mail" type="email" class="form-control" id="Inputemail">
                </div>

                <div class="row">
                    <label for="Inputmessaggio">Richiesta</label>
                    <textarea name="msg_txt" class="form-area" id="Inputmessaggio" rows="5">Salve, la contatto perchè sono interessato/a a soggiornare presso il suo appartamento,

                    </textarea>
                </div>

                <button type="submit">Invia il messaggio</button>
            </form>
        </div>
    </div>
</div>
@endsection