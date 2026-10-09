<?php

use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BannerController::class, 'home']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [BannerController::class, 'index'])
        ->name('dashboard');

    Route::get('/banners/create', [BannerController::class, 'create'])
        ->name('banners.create');

    Route::post('/banner',[BannerController::class,'store'])
    ->name('banners.store');
    
     Route::get('/banners/edit{id}', [BannerController::class, 'edit'])
        ->name('banners.edit');
    
        Route::put('/banners/update/{id}', [BannerController::class, 'update'])
    ->name('banners.update');

    Route::delete('/banners/delete/{id}', [BannerController::class, 'delete'])
    ->name('banners.delete');

});