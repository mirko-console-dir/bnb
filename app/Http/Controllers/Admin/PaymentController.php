<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Sponsor;
use Carbon\Carbon;

class PaymentController extends Controller
{   
    public function request(Apartment $apartment)
    {
        //gateway che mi serve per il pagamento
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $data = [
            //generare un token 
            'token' => $clientToken = $gateway->clientToken()->generate(),
            'apartment' => $apartment
        ];

        return view('admin.payment.request', $data);
    }

    public function payment(Request $request, Apartment $apartment)
    {
        $data = $request->all();

        //gateway
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $sponsor = Sponsor::find($data['sponsor']);


        //carta falsa:   4111 1111 1111 1111  scadenza: 02/22
        //transaction
        $result = $gateway->transaction()->sale([
            'amount' => $sponsor->price,
            'paymentMethodNonce' => $data['payment_method_nonce'],
            // 'deviceData' => $deviceDataFromTheClient,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        $status = false;
        //se il risultato é andato a buon fine
        if($result) {
            
            $status = true;
            $end = Carbon::now()->addDay($sponsor->duration / 24);
            $apartment->sponsors()->attach($data['sponsor'], ['end_date'=> $end ]);


        }

        return redirect()->route('conferma')->with('status', $status);
    }

    public function confirm()
    {
        return view('admin.payment.check');
    }
}
