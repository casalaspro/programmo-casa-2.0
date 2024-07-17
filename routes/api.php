<?php

use App\Http\Controllers\Api\ApartmentController;
use App\Http\Controllers\Api\CallSearchAddress;
use App\Http\Controllers\Api\MessageController;
use App\Http\Controllers\Api\ServicesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/address', [CallSearchAddress::class, 'fetch']);
Route::get('/apartments', [ApartmentController::class, 'index']);
Route::get('/apartments/{apartment:id}', [ApartmentController::class, 'show']);
Route::get('/search', [ApartmentController::class, 'search']);

Route::post('/advanced', [ApartmentController::class, 'advancedSearch']);
Route::post('/messages', [MessageController::class, 'store']);
Route::get('/suggestions', [CallSearchAddress::class, 'fetch']);
Route::get('/services', [ServicesController::class, 'bringServices']);