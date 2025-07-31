<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::get('/daily-quote', function () {
    $response = Http::get('https://zenquotes.io/api/today');
    return response()->json($response->json());
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/new_campaigns', [HomeController::class, 'new_campaigns'])->name('new_campaigns');

    Route::view('/my_profile', 'profile')->name('my_profile');
    Route::put('/profile_update', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/campaigns', [CampaignController::class, 'store'])->name('campaigns.store');
    Route::get('/my_pending_campaigns', [CampaignController::class, 'showMyPendingCampaigns'])->name('my_pending_campaigns');
});



Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/approve_campaigns', [CampaignController::class, 'showPendingApproval'])->name('approve_campaigns');
    Route::delete('/campaigns/{id}', [CampaignController::class, 'destroy'])->name('campaigns.destroy');
    Route::patch('/campaigns/{id}/approve', [CampaignController::class, 'approve'])->name('campaigns.approve');
    Route::patch('/campaigns/{id}/decline', [CampaignController::class, 'decline'])->name('campaigns.decline');
});






// Public profile by vibrant_username
Route::get('/username/{vibrant_username}', [ProfileController::class, 'showPublicProfile'])->name('profile.public');
