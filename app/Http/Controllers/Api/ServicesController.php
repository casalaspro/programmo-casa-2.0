<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function bringServices(Request $request){
        $service = Service::all();
    
        return response()->json([
            'success' => true,
            'results' => $service
        ]);
    }
}
