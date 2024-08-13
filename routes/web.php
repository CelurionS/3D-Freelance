<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfilePageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/3dartist', function () {
    return view('posts/show');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/{user}', [ProfilePageController::class, 'show'])->name('profile.show');
    Route::get('/3dartist', [PostController::class, 'allPosts'])->name('3dartist');
    
    


    Route::get('/dashboard', [ProfilePageController::class, 'show'])->name('dashboard');
    Route::post('/dashboard', [ProfilePageController::class, 'update'])->name('dashboard.update');
    Route::post('/dashboard/upload-artwork', [ProfilePageController::class, 'uploadArtwork'])->name('dashboard.uploadArtwork');


    Route::resource('posts', PostController::class);

    



});

require __DIR__.'/auth.php';
