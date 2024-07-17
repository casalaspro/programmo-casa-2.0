<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //Dobbiamo, da front end, creare il messaggio ed inviare la richiesta attraverso axios a laravel per la creazione
    public function store(Request $request){
        // dd($request);
        $user_id = Apartment::where('user_id', $request->apartment_id)->pluck('user_id');

        // $request->validate([
        //     'name'=>'required|max:60|string',
        //     'surname'=>'required|max:60|string',
        //     'email_sender'=>'required|max:250|string',
        //     'text'=>'required|max:65535|string',
        //     'phone_number'=>'nullable|string',
        // ]);

        
       
        $form_data = $request->all();
        $form_data['user_id'] = $user_id;

        $new_message = Message::create($form_data);

        return response()->json([
            'success' => true,
            'results' => $new_message
        ]);
    }
}
