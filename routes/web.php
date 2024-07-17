<?php

use App\Http\Controllers\Admin\SponsorshipController;
use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PrivateApartmentController;
use App\Http\Controllers\ProfileController;
use App\Models\Apartment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth','verified'])
->name('admin.')
->prefix('admin')
->group(function(){
    
    Route::get('/dashboard', function () {
        $userid = Auth::id();
        $apartments = Apartment::where('user_id',$userid)->get();

        return view('admin.dashboard',compact('apartments'));
    })->name('dashboard');

    Route::resource('userindex',PrivateApartmentController::class);
    
    Route::resource('users', UserController::class);
    
    Route::resource('sponsorship',SponsorshipController::class);
    
    Route::resource('apartments',ApartmentController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('sponsorships',SponsorshipController::class);
    
    // Added a route that uses the method delete to bring the parameter {apartment} to forceDestroy() in the ApartmentController 
    Route::delete('apartments/{apartment}/force', [ApartmentController::class, 'forceDestroy'])->name('apartments.forceDestroy');
    
    Route::post('apartments/{apartment}/restore', [ApartmentController::class, 'restore'])->name('apartments.restore');

    Route::get('messages',[ MessageController ::class, 'index'])->name('messages');
    Route::get('messages/{message}',[ MessageController ::class, 'show'])->name('messages.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
