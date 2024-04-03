<?php

use App\Http\Controllers\backend\cardController;
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

// transition
Route::get('/transition', function () {
    return view('transition');
})->middleware(['auth', 'verified'])->name('transition');

// loans
Route::get('/loans', function () {
    return view('loans');
})->middleware(['auth', 'verified'])->name('loans');

// cards
Route::middleware(['auth', 'verified'])->group(function () {
    // cards
    Route::get('/cards', [cardController::class, 'index'])->name('cards');
    Route::post('/cards/store', [cardController::class, 'store'])->name('card.store');
    Route::delete('/cards/destroy/{card}', [cardController::class, 'destroy'])->name('card.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__ . '/auth.php';
