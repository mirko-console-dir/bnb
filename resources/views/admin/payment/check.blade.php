@extends('layouts.app')

@section('content')
<div class="main_container">
    <div class="back_btn">
            {{-- BACK --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="26.845" height="18.792" viewBox="0 0 26.845 18.792">
                <path id="Tracciato_29" data-name="Tracciato 29" d="M11.4,23.792,13.288,21.9,7.141,15.738h21.7V13.054H7.141L13.3,6.893,11.4,5,2,14.4Z" transform="translate(-2 -5)" fill="#222"/>
            </svg>
            <a href="{{url('/')}}">Torna Indietro</a>
        </div>
<div id="check">

    <div class="container result">

    <div class="row d-flex justify-content-center">

        <div class="card col-8 pt-3 pb-3">

        <div class="card-body d-flex flex-column align-items-center">
            @if(session('status'))
                <h2>Pagamento riuscito <i style="color: green;" class="fas fa-check-circle"></i></h2>
                

                <div class="check-img">
                <img src="https://lh3.googleusercontent.com/proxy/kECnQtbWpFi54L-4bQS41LcpDPQQhHldx2lvpJ0S3x6-FOqV8T8bdKHNtNJAh9Pnk88P-NdZR7A5yADxLFw3RlOIuQKcoGi4knzWb1YyTUSi2ik2o22T" alt="">
                </div>
            @else
                <h2>Pagamento non riuscito</h2>
                <div class="check-img">

                <img style="width: 30px;" src="https://www.freeiconspng.com/uploads/error-icon-4.png" alt="">
                </div>
            @endif
            </div>

        </div>

    </div>





    </div>

</div>
</div>

@endsection