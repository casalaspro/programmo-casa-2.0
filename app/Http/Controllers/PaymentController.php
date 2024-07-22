<?php

namespace App\Http\Controllers;

use App\Models\User;
use Braintree\ClientToken;
use Illuminate\Http\Request;
use \Braintree\Gateway;

class PaymentController extends Controller
{
    public function index(){

        return view('payment');
    }

    public function generateBraintreeToken()
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

        return view('payment', compact('clientToken'));

    }
}
