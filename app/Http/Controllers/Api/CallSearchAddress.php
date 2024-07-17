<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CallSearchAddress extends Controller
{

    public function fetch(Request $request)
    {   

        // return response()->json($request->input("parametro"));
        // $address = 'roccasecca';
        $address = $request->input('parametro');
        // $response = Http::get('https://api.tomtom.com/search/2/search/'.$address.'.json?language=it&key=SmzJJ1e9vacLwiqfqgxPWAvQ7Ey33PfG')->json();
        $response = Http::get('https://api.tomtom.com/search/2/geocode/'.$address.'.json?storeResult=false&countrySet=ITA&lat=41.9027835&lon=12.4963655&view=Unified&key=SmzJJ1e9vacLwiqfqgxPWAvQ7Ey33PfG')->json();

        return response()->json([
            
            'response' => $response
            // 'nome' => 'Rocco'
        ]);
    }
}
