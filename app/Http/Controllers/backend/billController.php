<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Card;
use Illuminate\Http\Request;

class billController extends Controller
{
    public function index()
    {
        return view("bills");
    }

    public function update(Request $request, Bill $bill)
    {
        $card = Card::find($request->card_id);

        if ($card->balance < $bill->amount) {
            return back()->with('error', 'You need ' . $bill->amount - $card->balance . ' Dh');
        }

        $card->balance -= $bill->amount;
        $card->save();

        $bill->paid = true;
        $bill->save();

        $bill->transaction()->create([
            "card_id" => $card->id,
            "amount" => $bill->amount,
            "indicator" => "-"
        ]);

        return back()->with('success', 'Bill ' . $bill->name . ' paid successfully!');
    }
}
