<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(){
        $user_id = Auth::id();
        $messages = Message::whereHas('apartment', function ($query) use ($user_id) { $query->where('user_id', $user_id); })->get();
        return view('admin.messages.index', compact('messages'));
    }

    public function show(Message $message, Apartment $apartments){
        $apartment = Apartment::where('id', $message->apartment_id)->get();
        return view('admin.messages.show', compact('message', 'apartment'));
    }
}
