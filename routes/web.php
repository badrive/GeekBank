<?php

use App\Http\Controllers\backend\billController;
use App\Http\Controllers\backend\cardController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\backend\investmentController;
use App\Http\Controllers\frontend\cryptoController;
use App\Http\Controllers\frontend\dashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransferMoneyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// transition

Route::get('/transition', function () {
    return view('transition');
})->middleware(['auth', 'verified'])->name('transition');

// loans
Route::get('/loans',[LoanController::class,"index"])->middleware(['auth', 'verified'])->name('loans');

// loans
Route::put('/transactions/send', [TransferMoneyController::class, "transfer"])->middleware(['auth', 'verified'])->name('transfer');

// cards
Route::middleware(['auth', 'verified'])->group(function () {
    // dashboard
    Route::get('/dashboard', [dashboardController::class, "index"])->name('dashboard');

    // crypto
    Route::get('/crypto', [cryptoController::class, "index"])->name('crypto');

    // cards
    Route::get('/cards', [cardController::class, 'index'])->name('cards');
    Route::post('/cards/store', [cardController::class, 'store'])->name('card.store');
    Route::delete('/cards/destroy/{card}', [cardController::class, 'destroy'])->name('card.destroy');

    // investments
    Route::get('/investments', [investmentController::class, 'index'])->name('investments');
    Route::post('/investments/store', [investmentController::class, 'store'])->name('investments.store');

    //bills
    Route::get('/bills', [billController::class, "index"])->name('bills');
    Route::put('/bills/update/{bill}', [billController::class, "update"])->name('bills.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get("/home",[LoanController::class,"index"]);

Route::put("/home/loan",[LoanController::class,"take_loan"])->name("take_loan");

require __DIR__ . '/auth.php';
