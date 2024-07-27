<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\View;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Mockery\Undefined;

class ViewController extends Controller
{
    public function viewStorage(Request $request){
        // $date = Carbon::now()->format('Y-m-d h:m:s');
        $date = new DateTime(Carbon::now()->format('Y-m-d h:m:s'));
        $dateMin = new DateTime(Carbon::now()->subHours(24)->format('Y-m-d h:m:s'));
        $success = false;

        $content = $request->all();
        
        $ip = $content['ip'];
        $apartmentId = $content['apartmentId'];
        
        $views = View::where('ip_number', $ip)
            ->where('apartment_id', $apartmentId)
            ->get();

        $dateDB = '';
        $new_view = '';

        if(count($views) === 0){
            
            $new_view = new View();

            $new_view->apartment_id = $apartmentId;
            $new_view->ip_number = $ip; 
            $new_view->save();
        }else{
            foreach($views as $view){
                // $dateDB = $view->created_at;
                $dateDB = new DateTime($view->created_at);
                if($dateDB < $dateMin ){
                    $new_view = new View();

                    $new_view->apartment_id = $apartmentId;
                    $new_view->ip_number = $ip; 
                    $new_view->save();
                }
            }
        }

        // dd($content);

        return response()->json($views);
        // return view('welcome', compact('content'));
        // return $new_view;
    }

    public function showViews(Request $request){
        $content = $request->all();

        $apartmentId = $content['apartmentId'];

        $views = View::where('apartment_id', $apartmentId)->get();

        return response()->json(count($views));
    }
}
