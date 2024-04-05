<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class investmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $investments = [];

        foreach (Investment::all() as $investment) {
            if ($investment->card->user) {
                $investments[] = $investment;
            }
        }
        return view('invest', compact('investments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "type" => "required",
            "card_id" => "required",
            "amount" => "required",
        ]);

        if ($request->amount <= 0) {
            return back()->with('error', "Invalid amount $request->amount !");
        }

        $card = Card::find($request->card_id);

        if ($card->balance < $request->amount) {
            return back()->with('error', "You need " . $request->amount - $card->balance . " Dh more!");
        }

        # create investment
        $investment = Investment::create([
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
