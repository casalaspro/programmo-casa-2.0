<?php

namespace App\Http\Controllers;

use App\Models\User;
use Braintree\ClientToken;
use Illuminate\Http\Request;
use \Braintree\Gateway;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function index(){

        return view('payment');
    }

    public function generateBraintreeToken(Request $request)
    {
        $gateway = new Gateway([
            'environment' => 'sandbox', 
            'merchantId' => 'wvh37r4hkd8hjpgk',
            'publicKey' => 'y7shpktpvs5tdxky',
            'privateKey' => 'ce2d3305e688bfef4abcfa8bb5e46ef7',
        ]);
        // $user = User::find(11); // Sostituisci con la tua logica per ottenere l'utente corrente
        // $clientToken = $user->createToken('Token Name')->accessToken;

        // $clientToken = $gateway->clientToken()->generate([
        //     "customerId" => $aCustomerId
        // ]);
        // Ora puoi utilizzare $clientToken come necessario
        
        $clientToken = $gateway->clientToken()->generate();
        // $clientToken1 = $clientToken;
        // $payment_method_nonce = $request->payment_method_nonce;
        // @dd($payment_method_nonce);
        // echo(response()->json($request));

        return view('payment', compact('clientToken'));

    }

    public function payment(Request $request){
        // echo(response()->json($request->payment_method_nonce));
        @dump($request);

        $dataCorrente = Carbon::now()->toDateTimeString();

        $gateway = new Gateway([
            'environment' => 'sandbox', 
            'merchantId' => 'wvh37r4hkd8hjpgk',
            'publicKey' => 'y7shpktpvs5tdxky',
            'privateKey' => 'ce2d3305e688bfef4abcfa8bb5e46ef7',
        ]);

        $nonceFromTheClient = $request->payment_method_nonce;
        $deviceDataFromTheClient = $request->data;
        @dump($nonceFromTheClient);
        @dump($deviceDataFromTheClient);

        $result = $gateway->transaction()->sale([
            'amount' => 10.00,
            'paymentMethodNonce' => $nonceFromTheClient,
            'deviceData' => $dataCorrente,
            'options' => [
              'submitForSettlement' => True
            ]
        ]);

        // echo($result);

        return view( 'success_payment', compact('result'));
    }
}
