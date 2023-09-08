<?php

use App\Http\Controllers\API\V1\Auth\LoginController;
use App\Http\Controllers\API\V1\Auth\RegisterController;
use App\Http\Controllers\API\V1\ChatController;
use App\Http\Controllers\API\V1\HomeController;
use App\Http\Controllers\API\V1\PostController;
use App\Http\Controllers\API\V1\StoryController;
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

Route::controller(HomeController::class)->prefix('/v1')->middleware('auth:sanctum')->group(function () {
    Route::get('/home', 'index')->name('home.api');
});

Route::controller(PostController::class)->prefix('/v1')->middleware('auth:sanctum')->group(function () {
    Route::post('/upload/post', 'store')->name('post.store.api');
    Route::post('/post/comment', 'storeComment')->name('store.comment.api');
    Route::post('/show/comment', 'showComment')->name('show.comment.api');
    Route::post('/like/post', 'like')->name('like.post.api');
    Route::post('/delete/post', 'deletePost')->name('post.delete.api');
});

Route::controller(ChatController::class)->prefix('/v1')->middleware('auth:sanctum')->group(function () {
    Route::get('/get/message', 'index')->name('get.message.api');
    Route::get('/get/single/message/{id}', 'show')->name('get.single.message.api');
    Route::post('/post/message', 'store')->name('message.store.api');
    Route::post('/search/user', 'searchUser')->name('user.search.api');
    Route::post('/edit/message', 'editMessage')->name('edit.message.api');
    Route::delete('/delete/message/{messageId}', 'deleteMessage')->name('delete.message.api');
});

Route::controller(StoryController::class)->prefix('/v1')->middleware('auth:sanctum')->group(function () {
    Route::get('/get/story', 'index')->name('get.story.api');
    Route::post('/post/story', 'store')->name('post.story.api');
    Route::get('/show/story/{id}', 'show')->name('show.story.api');
    Route::post('/delete/story', 'destroy')->name('delete.story.api');
});