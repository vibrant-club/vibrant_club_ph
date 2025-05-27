<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/profile', function () { return view('profile'); })->name('profile');
Route::put('/profile_update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
