<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Landing\HomeController;
use App\Http\Controllers\Landing\PostController;
use App\Http\Controllers\TestUploadImageController;
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

Route::get('/', function () {
    return "Sek Digenakno Cah:v";
})->name('home.index');

Route::controller(SignupController::class)->group(function () {
    Route::get('/signup', 'index')->name('signup.index');
    Route::post('/signup/post', 'create')->name('signup.post');
});

// Route::get('/', [HomeController::class, 'index'])->middleware('auth');

Route::get('/explore', function () {
    return view('landing.explore');
})->middleware('auth');

Route::get('/message', function () {
    return view('landing.message.index');
})->middleware('auth');

Route::get('/message/lukman', function () {
    return view('landing.message.single-message');
})->middleware('auth');

Route::get('/setting/privacy', function () {
    return view('landing.setting.privacy');
})->middleware('auth');

Route::get('/setting/push-notification', function () {
    return view('landing.setting.push-notification');
})->middleware('auth');

Route::get('/setting/email-notification', function () {
    return view('landing.setting.email-notification');
})->middleware('auth');

Route::get('/setting/edit-profile', function () {
    return view('landing.setting.edit-profile');
})->middleware('auth');

Route::get('/your-activity/interaction/likes', function () {
    return view('landing.your-activity.interactions.likes');
})->middleware('auth');

Route::get('/your-activity/interaction/comments', function () {
    return view('landing.your-activity.interactions.comments');
})->middleware('auth');

Route::get('/your-activity/interaction/story', function () {
    return view('landing.your-activity.interactions.story');
})->middleware('auth');

Route::get('/profile/post', function () {
    return view('landing.profile.post');
})->middleware('auth');

Route::controller(TestUploadImageController::class)->group(function () {
    Route::get('/rendy/pacarnya/ponyo', 'index')->name('post.index');
    Route::post('/post/store', 'post')->name('post');
});

Route::controller(PostController::class)->group(function () {
    Route::post('/store/image', 'storeImage')->name('store.image');
    Route::post('/store/caption', 'storeCaption')->name('store.caption');
});