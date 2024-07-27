<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Sponsorship;
use Braintree;
use Illuminate\Http\Request;
use Braintree\Configuration;
use Carbon\Carbon;

// use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function createToken(Request $request){
        // dd($request->input('sponsorship'));
        if($request){
            $selectedSponsorship = $request->input('sponsorship');
            $selectedApartmentIid = $request->input('apartment-id');
            $gateway = new Braintree\Gateway([
                'environment' => 'sandbox',
                'merchantId' => '5s7rc3rfb2vps7gq',
                'publicKey' => '2gkcdcmjcs3m47qw',
                'privateKey' => 'bfb58a8f63353d5096a183ec21c2cb27'
            ]);

            $clientToken = $gateway->clientToken()->generate();
            return view('admin.braintree.payment', compact('clientToken', 'selectedSponsorship', 'selectedApartmentIid'));
        }
    }

    public function createTransition(Request $request, Sponsorship $sponsorship){

        // dd($request);
        $selectedSponsorshipId = $request->input('sponsorship');
        $selectedApartmentId = $request->input('apartment-id');

        $sponsorship = Sponsorship::where('id', $selectedSponsorshipId)->first();
        $price = $sponsorship->price;
        
        $gateway = new Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => '5s7rc3rfb2vps7gq',
            'publicKey' => '2gkcdcmjcs3m47qw',
            'privateKey' => 'bfb58a8f63353d5096a183ec21c2cb27'
        ]);

        $result = $gateway->transaction()->sale([
            // implementare la cifra
            'amount' => $price,
            'paymentMethodNonce' => $request->payment_method_nonce,
            'options' => [
              'submitForSettlement' => True
            ]
          ]);
          if($result->success){
            $now = Carbon::now();
            
            
            $sponsorship = Sponsorship::findOrFail($selectedSponsorshipId);
            $sponsorship_duration = $sponsorship->duration;
            $end_datetime = $now->addHours($sponsorship_duration);

            $apartment = Apartment::findOrFail($selectedApartmentId);
            // dd($sponsorship, $apartment);
            $apartment_sponsorship = $apartment->sponsorships();
            $apartment_sponsorship->attach($sponsorship, ['end_datetime' => $end_datetime]);
            $apartment->save();
            // manca che controlli se ci sono sponsorizzazioni attive. Se trova sponsorizzazioni attive si va a sommare le ore a loro anzichè alla data di oggi. In alternativa la si fa partire da $now.
          }
          dd($result);

        //   return view('admin.braintree.payment', compact('clientToken'));
    }

    public function collectInfos(Request $request){
        dd($request);
    }

    
}
