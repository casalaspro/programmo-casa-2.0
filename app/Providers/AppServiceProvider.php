<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Braintree_Configuration;
use \Braintree\Gateway;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        
        // Braintree_Configuration::environment(env('BRAINTREE_ENV'));
        // Braintree_Configuration::merchantId(env('BRAINTREE_MERCHANT_ID'));
        // Braintree_Configuration::publicKey(env('BRAINTREE_PUBLIC_KEY'));
        // Braintree_Configuration::privateKey(env('BRAINTREE_PRIVATE_KEY'));

        // $gateway = new BraintreeGateway([
        //     'environment' => 'sandbox',
        //     'merchantId' => 'use_your_merchant_id',
        //     'publicKey' => 'use_your_public_key',
        //     'privateKey' => 'use_your_private_key'
        //   ]);

        // $braintree = new Gateway([
        //     'environment' => 'sandbox', 
        //     'merchantId' => 'wvh37r4hkd8hjpgk',
        //     'publicKey' => 'y7shpktpvs5tdxky',
        //     'privateKey' => 'ce2d3305e688bfef4abcfa8bb5e46ef7',
        // ]);

        // $clientToken = $braintree->clientToken()->generate([
        //     "customerId" => $aCustomerId
        // ]);
    }
}
