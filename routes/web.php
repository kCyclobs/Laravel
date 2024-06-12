<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\DirectorController;

//public route
Route::get('/', function () {
    return view('welcome');
});

//auth route 

Route::middleware(['auth','verified'])->group(function () {
    // Route::get('/profile', function () {
    //     return "Hello ". Auth::user()->name; });
    Route::get('/profile/setting',[UserController::class,'profile'])->name('dashboard');

    //AJAX upload image
    //Route::post('/profile/upload',[UserController::class,'upload']);

    //rout movie
    Route::get('/movie',[MovieController::class,'movie'])->name('movie');

    //rout actor
    Route::get('/actor',[ActorController::class,'actor'])->name('actor');

    //rout director
    Route::get('/director',[DirectorController::class,'director'])->name('director');
});

//Auth route + is Admin User
// Route::middleware(['auth','verified',IsAdmin::Class])->group(function () {
//     Route::get('/admin', function () {
//         return "welcome Admin";
//     });
// }); 
Route::middleware(['auth','verified',IsAdmin::Class])->group(function () {
    Route::get('/admin',[DashboardController::Class,'index']);
}); 