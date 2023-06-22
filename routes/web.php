<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
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

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'loginIndex')->name('login.index');
    Route::post('/login/store', 'loginStore')->name('login.post');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::controller(SignupController::class)->group(function () {
    Route::get('/signup', 'index')->name('signup.index');
    Route::post('/signup/post', 'create')->name('signup.post');
});

Route::get('/', function () {
    return view('landing.index');
})->middleware('auth');

Route::get('/explore', function () {
    return view('landing.explore');
})->middleware('auth');

Route::get('/message', function () {
    return view('landing.message');
})->middleware('auth');
