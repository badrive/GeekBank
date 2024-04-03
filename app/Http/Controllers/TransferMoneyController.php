<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransferMoneyController extends Controller
{
    // public function index()
    // {
    //     $connectedUser = User::where("id", auth()->user()->id)->first();
    //     $connectedUserCards = $connectedUser->cards;
    //     return view("home.home", compact('connectedUserCards'));
    // }

    public function transfer(Request $request)
    {
        
        // $rib = Card::first();
        // dd($rib->rib);
        request()->validate(
            [
                'rib' => 'required', // Add more validation rules as needed for other fields
                'card_id' => 'required',
                'amount' => 'required|numeric|min:0', // Assuming amount should be numeric and greater than or equal to 0
            ],
            [
                'rib.required' => 'The recipient card number is required.',
                'card_id.required' => 'Your card ID is required.',
                'amount.required' => 'The amount is required.',
                'amount.min' => 'The amount must be a positive number.',
            ]
        );

        $cardTosend = Card::where("rib", $request->rib)->first();
        $connectedUserCard = Card::where("id", $request->card_id)->first();

        if ($connectedUserCard && $connectedUserCard->balance >= $request->amount) {
            $newBalanceTosend = $cardTosend->balance + $request->amount;
            $newBalanceUser = $connectedUserCard->balance - $request->amount;

            $cardTosend->balance = $newBalanceTosend;
            $connectedUserCard->balance = $newBalanceUser;

            $cardTosend->save();
            $connectedUserCard->save();
            Transaction::create([
                "card_id" => $request->card_id,
                "moment" => Carbon::now(),
                "indicator" => false,
                "amount" => $request->amount
            ]);
            Transaction::create([
                "card_id" => $cardTosend->id,
                "moment" => Carbon::now(),
                "indicator" => true,
                "amount" => $request->amount
            ]);
            return back()->with('success', 'Transfer successful!');
        }
        else {
            // Return with an error message if the balance is insufficient
            $error = 'Insufficient balance or invalid card details.';
            if ($connectedUserCard && $connectedUserCard->balance < $request->amount) {
                $error = 'Insufficient balance for the transfer.';
            }
            return back()->with('error', $error);
        }
    }
}
