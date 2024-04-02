<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//bills
Route::get('/bills', function () {
    return view('bills');
})->middleware(['auth', 'verified'])->name('bills');

//crypto
Route::get('/crypto', function () {
    return view('crypto');
})->middleware(['auth', 'verified'])->name('crypto');

//invest
Route::get('/invest', function () {
    return view('invest');
})->middleware(['auth', 'verified'])->name('invest');

Route::get('/cards', function () {
    return view('cards');
})->middleware(['auth', 'verified'])->name('cards');

Route::get('/transition', function () {
    return view('transition');
})->middleware(['auth', 'verified'])->name('transition');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
