<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index () {
        $income = 0;
        $expense = 0;
        foreach (auth()->user()->transactions as $transaction) {
            if ($transaction->indicator == "+") {
                $income += $transaction->amount;
            } else {
                $expense += $transaction->amount;
            }
        }
        return view('dashboard', compact("income", "expense"));
    }
}
