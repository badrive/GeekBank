# GeekBank Web Application Exercise

## Introduction

In this exercise, you will be developing a web application called GeekBank using the Laravel framework. GeekBank is a virtual bank application that allows users to sign up, manage their accounts, perform transactions, and more.

## Requirements

### Sign Up

-   Users should be able to sign up with the following information:
    -   Name
    -   Email
    -   Password
    -   Phone
    -   Gender
    -   City
-   Upon successful signup, the system should generate a unique credit card for the user with the following details:
    -   Card Number
    -   CVC (Card Verification Code)
    -   Expiration Date (MM/YY format)
    -   Unique ID (RIB)
-   Users should receive a welcome email upon successful signup.

### Main View

-   Upon logging in, users should see a sidebar and main content area.
-   The initial balance for each user upon signup is 1500 DH.
    HomePage : cotain balance of each wallet they have
-   The sidebar should contain the following options:

    -   Transfer Money: Allows users to send money to a specific account using the account's RIB. Transactions should be recorded in a transaction history.
    -   My Cards: Users can view their credit cards, block/delete existing cards, or request additional cards. Each user can have a maximum of 2 cards, and they can distribute their balance between the two cards.
    -   Pay Service: Users can pay for services such as electricity or Wi-Fi. Each transaction should be recorded in the transaction history.
    -   Settings: Users can update their profile information.

-   Loan: Users can request a loan up to 200% of their current balance. They can only have one active loan at a time and cannot request another until the first loan is paid off.
-   every minute the user account pay 10% of the loan until the loan is fully paid off

-   Investment Options: Users can invest their funds in various investment options :
-   user will chose between shortInvestement - mediumInvestment - longInvestement
-   shortInvestement : return a 15% from the fund evry 5 sec 10 times
-   mediumInvestment : return a 25% from the fund evry 1 minuts 10 times
-   shortInvestement : return a 50% from the fund evry 5 minuts 10 times

-   Using CoinMarket Api Fetch Crypto data and make a option to buy crypto or sell it and display each crypto balance

History Page : of each transaction

You are required to implement the above features using Laravel. Ensure proper validation, security measures, and a user-friendly interface. Submit your project code along with any necessary documentation.

Happy coding!

frontend
    dashboardController
    settingsController
backend
    userController
    cardController




<!-- * transfer blade -->

"
@extends('layouts.index')

@section('content')
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form>

    <h1>send money </h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form action="{{ route('salam') }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="rib" id="" placeholder="enter rib">
        <input type="number" name="amount" id="" placeholder="enter amount">
        <select name="card_id" id="">
            @foreach ($connectedUserCards as $connectedUserCard)
                <option value="{{ $connectedUserCard->id }}">card{{ $connectedUserCard->id }}</option>
            @endforeach
        </select>
        <button type="submit">send</button>
    </form>
@endsection
"

<!-- & Services blade -->

"
@extends('layouts.index')

@section('content')
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-dropdown-link :href="route('logout')"
            onclick="event.preventDefault();
                    this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
    </form>

    <h1 class="text-[30px]">Pay Bills</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @foreach ($bills as $bill)
        <div class="flex gap-5 text-[23px] items-center">
            <p>{{ $bill->name }}</p>
            <p>{{ $bill->amount }}</p>
            <p>{{ $bill->paid ? 'Paid' : 'Not Paid' }}</p>
            <form action="{{ route("pay_pills",$bill) }}" class="flex gap-4" method="post">
                @csrf
                @method("PUT")
                <select name="card_id" id="">
                    @foreach ($connectedUserCards as $connectedUserCard)
                        <option value="{{ $connectedUserCard->id }}">Card{{ $connectedUserCard->id }}</option>
                    @endforeach
                </select>
                <button class="{{ $bill->paid ? 'hidden' : 'flex' }} w-[100px] h-[28px] rounded bg-green-600 items-center justify-center" type="submit">Pay</button>
            </form>
        </div>
    @endforeach
@endsection

"


<!-- ! Transfer Function -->


<!--~ Route::put("/send",[HomeController::class,"transfer"])->name("salam"); -->

"
    public function index()
    {
        $connectedUser = User::where("id", auth()->user()->id)->first();
        $connectedUserCards = $connectedUser->cards;
        return view("home.home", compact('connectedUserCards'));
    }

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
"


<!-- ^ services function -->

"
    public function index()
    {
        $connectedUser = User::where("id", auth()->user()->id)->first();
        $connectedUserCards = $connectedUser->cards;
        $bills = Bill::all();
        return view("home.home",compact("connectedUser","connectedUserCards","bills"));
    }

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
"