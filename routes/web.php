<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::view('/my_profile', 'profile')->name('my_profile');
    Route::put('/profile_update', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/campaigns', [CampaignController::class, 'store'])->name('campaigns.store');
    Route::delete('/campaigns/{id}', [CampaignController::class, 'destroy'])->name('campaigns.destroy');
});

// Public profile by vibrant_username
Route::get('/username/{vibrant_username}', [ProfileController::class, 'showPublicProfile'])->name('profile.public');
