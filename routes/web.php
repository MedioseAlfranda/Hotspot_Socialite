<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\RouterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});



// Untuk Route Utama
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('display-user', [App\Http\Controllers\HomeController::class, 'getIpAddress']);

// untuk  Route Login Register Route
Route::post('/user/register', [App\Http\Controllers\Auth\RegisterController::class, 'userRegister'])->name('user.register');
Route::get('/hotspot/users',[RouterController::class, 'hotspotUsers']);



// Untuk Route Koneksi Wifi 
Route::get('/subcription', [RouterController::class, 'subscription'])->name('user.subscription')->middleware('auth');
Route::get('/connecttoWifi', [RouterController::class, 'connecttoWifi']);


//Google Login 
Route::prefix('google')->name('google.')->group( function(){
    Route::get('auth', [App\Http\Controllers\Auth\GoogleController::class, 'loginwithgoogle'])->name('login');
    Route::get('callback', [App\Http\Controllers\Auth\GoogleController::class, 'callbackwithgoogle'])->name('callback');
});

//Facebook Login 
Route::prefix('facebook')->name('facebook.')->group( function(){
    Route::get('auth', [App\Http\Controllers\Auth\GoogleController::class, 'loginwithfacebook'])->name('login');
    Route::get('callback', [App\Http\Controllers\Auth\GoogleController::class, 'callbackwithfacebook'])->name('callback');
});

//Github Login 
Route::prefix('github')->name('github.')->group( function(){
    Route::get('auth', [App\Http\Controllers\Auth\GoogleController::class, 'loginwithGithub'])->name('login');
    Route::get('callback', [App\Http\Controllers\Auth\GoogleController::class, 'callbackwithgithub'])->name('callback');
});



// Untuk Route Authentikasi Socialite 
//Route::get('/auth/{provider}/callback',[App\Http\Controllers\Auth\SocialiteController::class,'handleProvideCallback']);
//Route::get('/auth/{provider}/', [App\Http\Controllers\Auth\SocialiteController::class,'redirectToProvider'])->name('social.redirect');



//Route::get('/auth/{provider}', [App\Http\Controllers\Auth\LoginController::class,'redirectToProvider']);
//Route::get('/auth/{provider}/callback', [App\Http\Controllers\Auth\LoginController::class,'handleProviderCallback']);