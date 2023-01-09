<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// user route
Route::middleware(['auth', 'user-role:user'])->group(function(){
    Route::get("/home", [HomeController::class, 'userhome'])->name('home');
});

//gecodis route
Route::middleware(['auth', 'user-role:gecodis'])->group(function(){
    Route::get("/gecodis/home", [HomeController::class, 'gecodishome'])->name('home.gecodis');
});

//admin route
Route::middleware(['auth', 'user-role:admin'])->group(function(){
    Route::get("/admin/home", [HomeController::class, 'adminhome'])->name('home.admin');
});