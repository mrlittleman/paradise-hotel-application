<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

Route::middleware(['auth', 'role:recruiter'])->group(function () {
    Route::resource('jobs', JobController::class);
});

Route::middleware(['auth', 'role:candidate'])->group(function () {
    Route::get('jobs', [JobController::class, 'index']);
    Route::post('jobs/{job}/apply', [ApplicationController::class, 'store']);
});


require __DIR__.'/auth.php';
