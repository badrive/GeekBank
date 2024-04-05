<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Loan;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $connectedUser = User::where("id", auth()->user()->id)->first();
        $connectedUserCards = $connectedUser->cards;
        $isHavingLoan = $connectedUser->loan;
        return view("loans" ,  compact("isHavingLoan","connectedUserCards"));
    }


    public function take_loan(Request $request)
    {
        request()->validate([
            'amount' => 'required',
            "card_id" =>"required"
        ]);
        $connectedUser = User::where("id", auth()->user()->id)->first();

        if ($connectedUser && $connectedUser->balance() * 2 >= $request->amount && $connectedUser->loan == false) {
            
            $connectedUserCard = Card::where("id", $request->card_id)->first();
            $loanAmount = $request->amount;


            $newUserBalance = $connectedUserCard->balance + $loanAmount ;

            $connectedUserCard->balance = $newUserBalance;
            
            $connectedUser->loan = true ;

            $connectedUserCard->save();
            $connectedUser->save();


            Transaction::create([
                "card_id" => $connectedUserCard->id,
                "moment" => Carbon::now(),
                "indicator" => true,
                "amount" => $loanAmount
            ]);
            Loan::create([
                // "transaction_id" => null,
                "amount" => $loanAmount,
                "pay" => 0,
                "paid" => false
            ]);
            return back()->with('success', 'Transfer successful!');
            
        }
        else {
            // Return with an error message if the balance is insufficient
            $error = 'Insufficient balance or invalid card details.';
            if ($connectedUser && $connectedUser->balance() < $request->amount) {
                $error = 'Insufficient balance for the transfer.';
            }
            return back()->with('error', $error);
        }
    }
}
