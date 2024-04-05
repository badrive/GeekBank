<?php

use App\Models\Investment;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

function investment_schedule(string $type)
{
    $times = 10;
    $percentages = [
        "short" => 15 / 100,
        "medium" => 25 / 100,
        "long" => 50 / 100,
    ];
    $percentage = $percentages[$type];

    foreach (Investment::where("paid", 0)->where('type', $type)->get() as $investment) {
        dump($investment->id);

        # create investment
        $investment->profit += $investment->amount * $percentage;
        $investment->paid += $investment->amount * $percentage * $times == $investment->profit;
        $investment->save();

        $investment->card->balance += $investment->amount * $percentage;
        $investment->card->save();

        # create transaction
        $investment->transactions()->create([
            "card_id" => $investment->card->id,
            "amount" => $investment->amount * $percentage,
            "indicator" => "+"
        ]);
    }
}

Schedule::call(fn() => investment_schedule('short'))->everyFiveSeconds();
Schedule::call(fn() => investment_schedule('medium'))->everyMinute();
Schedule::call(fn() => investment_schedule('long'))->everyFiveMinutes();
