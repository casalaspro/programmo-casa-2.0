<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrivateApartmentController extends Controller
{
    //
    public function index(){
        $apartments = Apartment::all();

        $userid = Auth::id();

        $apartments =Apartment::where('user_id',$userid)->get();

        return view('admin.userindex.index', compact('apartments'));
    }

    public function show(Apartment $apartment){

        return view('admin.apartments.show',compact('apartment'));
    }

    
}
