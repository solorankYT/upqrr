<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrScan;
use App\Http\Controllers\RatingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [RatingController::class, 'getUserRate'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/qr-code', [QrScan::class, 'generateQrCode'])->middleware(['auth', 'verified'])->name('qr.code');

Route::get('/rating/{user}', [RatingController::class, 'showRatingPage'])->name('rating.page');
Route::post('/rating/{user}', [RatingController::class, 'submitRating'])->name('rating.submit');
Route::get('/ratings/{user}', [RatingController::class, 'getRatings'])->name('rating.get');

require __DIR__.'/auth.php';
