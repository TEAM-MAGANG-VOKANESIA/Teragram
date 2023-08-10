<?php

use App\Http\Controllers\API\V1\Auth\LoginController;
use App\Http\Controllers\API\V1\Auth\RegisterController;
use App\Http\Controllers\API\V1\HomeController;
use App\Http\Controllers\API\V1\PostController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(LoginController::class)->prefix('/v1')->group(function () {
    Route::post('/login/store', 'store')->name('login.store.api');
});

Route::controller(RegisterController::class)->prefix('/v1')->group(function () {
    Route::post('/register/store', 'store')->name('register.store.api');
});

Route::controller(HomeController::class)->prefix('/v1')->group(function () {
    Route::get('/home', 'index')->name('home.api');
});

Route::controller(PostController::class)->prefix('/v1')->middleware('auth:sanctum')->group(function () {
    Route::post('/upload/post', 'store')->name('upload.store.api');
});