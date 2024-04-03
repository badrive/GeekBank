<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Card;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PayServicesController extends Controller
{
    // public function index()
    // {
    //     $connectedUser = User::where("id", auth()->user()->id)->first();
    //     $connectedUserCards = $connectedUser->cards;
    //     $bills = Bill::all();
    //     return view("home.home",compact("connectedUser","connectedUserCards","bills"));
    // }

    public function pay_pills(Request $request , Bill $bill)
    {
        $connectedUser = User::where("id", auth()->user()->id)->first();
        $connectedUserCard = Card::where("id", $request->card_id)->first();

        if ($connectedUserCard && $connectedUserCard->balance >= $request->amount) {
            $newSold = $connectedUserCard->balance - $bill->amount;
            $connectedUserCard->balance = $newSold;
            $connectedUserCard->save();

            $bill->paid = true ; 
            $bill->save();

            Transaction::create([
                "card_id" => $request->card_id,
                "moment" => Carbon::now(),
                "indicator" => false,
                "amount" => $bill->amount
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
