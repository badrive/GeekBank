<?php

use App\Http\Controllers\backend\cardController;
use App\Http\Controllers\BillsController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransferMoneyController;
use App\Models\Bill;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//bills
Route::get('/bills', function () {
    $connectedUser = User::where("id", auth()->user()->id)->first();
        $connectedUserCards = $connectedUser->cards;
        $bills = Bill::all();
        return view("bills",compact("connectedUser","connectedUserCards","bills"));
})->middleware(['auth', 'verified'])->name('bills');

Route::put('/payBills/{bill}',[BillsController::class,"pay_pills"])->name("pay_pills");

//crypto
Route::get('/crypto', function () {


        $apiKey = 'd6cb83c7-a49b-4cf9-b970-189eac2cc7d7';
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?CMC_PRO_API_KEY=' . $apiKey;

        
        $response = Http::get($url);
        
        if ($response->successful()) {
            $cryptos = $response->json();
            $cryptos = $cryptos['data'];
            // dd($cryptos);
        } else {
            return response()->json(['error' => 'Failed to fetch data from CoinMarketCap API'], $response->status());
        }
        // dd($cryptos);
        $user = Auth::user();
        return view("crypto", compact('cryptos', 'user'));
})->middleware(['auth', 'verified'])->name('crypto');

//invest
Route::get('/invest', function () {
    return view('invest');
})->middleware(['auth', 'verified'])->name('invest');

// transition

Route::get('/transition', function () {

    $connectedUser = User::where("id", auth()->user()->id)->first();
    $connectedUserCards = $connectedUser->cards;
    return view('transition',compact("connectedUser" , "connectedUserCards"));
})->middleware(['auth', 'verified'])->name('transition');

// loans
Route::get('/loans',[LoanController::class,"index"])->middleware(['auth', 'verified'])->name('loans');

// loans
Route::put('/transactions/send', [TransferMoneyController::class,"transfer"])->middleware(['auth', 'verified'])->name('transfer');

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

Route::get("/home",[LoanController::class,"index"]);

Route::put("/home/loan",[LoanController::class,"take_loan"])->name("take_loan");

require __DIR__ . '/auth.php';
