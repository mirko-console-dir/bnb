@extends('layouts.app')


@section('content')
    
{{-- @include('partials.header') --}}
<div class="main_container" style="margin-bottom: 200px;">

  <div class= "container">
    {{ $apartment['title'] }}
            
    <form id="payment-form" action="{{ route("dati-pagamento", $apartment) }}" method="post">
    @csrf
    @method('POST')
      <div id="dropin-container"></div>
      <h3>Scegli il tipo di sponsorizzazione</h3>
      <ul style="margin: 20px 0;">
        <li>1: Standard 2,99€</li>
        <br>
        <li>2: Medium 5,99€</li>
        <br>
        <li>3: Gold 9,99€</li>
      </ul>
      <input type="number" name="sponsor">
      <input type="hidden" id="nonce" name="payment_method_nonce"/>
      <input type="submit" />
    </form>
  </div>
</div>
  <script>
    const form = document.getElementById('payment-form');
    braintree.dropin.create({
      authorization: '{{ $token }}',
      container: '#dropin-container'
      }, (error, dropinInstance) => {
        if (error) console.error(error);
          form.addEventListener('submit', event => {
            event.preventDefault();
            dropinInstance.requestPaymentMethod((error, payload) => {
              if (error) console.error(error);
              // Step four: when the user is ready to complete their
              //   transaction, use the dropinInstance to get a payment
              //   method nonce for the user's selected payment method, then add
              //   it a the hidden field before submitting the complete form to
              //   a server-side integration
              document.getElementById('nonce').value = payload.nonce;
              form.submit();
          });
        });
      });
    </script>

@endsection