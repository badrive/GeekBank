<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Loan;
use Illuminate\Http\Request;

class loanController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            "type" => "required",
            "card_id" => "required",
            "amount" => "required",
        ]);

        if ($request->amount <= 0) {
            return back()->with('error', "Invalid amount $request->amount !");
        }

        $card = Card::find($request->card_id);

        if ($card->balance * 2 < $request->amount) {
            return back()->with('error', "You need " . $request->amount - $card->balance . " Dh more!");
        }

        # create investment
        $investment = Loan::create([
            "card_id" => $card->id,
            "amount" => $request->amount,
            "type" => $request->type,
        ]);

        # create transaction
        $investment->transactions()->create([
            "card_id" => $card->id,
            "amount" => $request->amount,
            "indicator" => "-"
        ]);

        # update card balance
        $card->update([
            "balance" => $card->balance - $request->amount,
        ]);

        return back()->with('succsess', "Investment Success.");
    }
}
