<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Braintree;
use Illuminate\Http\Request;
use Braintree\Configuration;
// use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function createToken(){

        $gateway = new Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => '5s7rc3rfb2vps7gq',
            'publicKey' => '2gkcdcmjcs3m47qw',
            'privateKey' => 'bfb58a8f63353d5096a183ec21c2cb27'
        ]);

        $clientToken = $gateway->clientToken()->generate();
        return view('admin.braintree.payment', compact('clientToken'));
       
    }

    public function createTransition(Request $request){

        
        $gateway = new Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => '5s7rc3rfb2vps7gq',
            'publicKey' => '2gkcdcmjcs3m47qw',
            'privateKey' => 'bfb58a8f63353d5096a183ec21c2cb27'
        ]);

        $result = $gateway->transaction()->sale([
            // implementare la cifra
            'amount' => '10.00',
            'paymentMethodNonce' => $request->payment_method_nonce,
            'options' => [
              'submitForSettlement' => True
            ]
          ]);
          dd($result);

        //   return view('admin.braintree.payment', compact('clientToken'));
    }

    public function collectInfos(Request $request){
        dd($request);
    }

    
}
