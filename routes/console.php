<?php

use App\Models\User;
use Illuminate\Foundation\Inspiring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('card', function () {
    $string = "1234567890123456";
    $spacedString = preg_replace('/(.{4})/', '$1 ', $string); // Output: 1234 5678 90
    // dd($spacedString);
    $chunks = str_split($string, 4);
    $spacedString = implode(" ", str_split($string, 4)); // Output: 1234 5678 90
    dd($spacedString);
});


// Schedule::call(
//     function () {
//         request()->validate([
//             "amount"=>"required | min:1 "
//         ]);
//         $connectedUser = User::where("id", auth()->user()->id)->first();
//     }
// )->weekly()->mondays()->at("08:00");
