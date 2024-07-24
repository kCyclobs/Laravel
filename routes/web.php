<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\IsAdmin;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PasswordController;
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
   // Route::post('/profile/upload',[UserController::class,'upload']);
    Route::post('/profile/upload', [UserController::class,'upload']);

    //rout movie
    Route::get('/movie',[MovieController::class,'movie'])->name('Movie');
    Route::get('/movie/{id}',[MovieController::class,'movie_detail'])->name('Movie Detail');

    //rout actor
    Route::get('/actor/detail/{id}',[ActorController::class,'actor'])->name('Actor Detail');
    Route::get('/actor',[ActorController::class,'actor_list'])->name('Actor');

    //rout director
    Route::get('/director/detail/{id}',[DirectorController::class,'director'])->name('Director Detail');
    Route::get('/director',[DirectorController::class,'director_list'])->name('Director');

    //update profile
    Route::get('/profile/update/{user}', [UserController::class, 'edit'])->name('edit');
    Route::post('/profile/save', [UserController::class, 'save'])->name('save');

    //change pw
    Route::get('/change-password', [PasswordController::class, 'showChangePasswordForm'])->name('password.change');
    Route::post('/change-password', [PasswordController::class, 'changePassword'])->name('password.update');

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