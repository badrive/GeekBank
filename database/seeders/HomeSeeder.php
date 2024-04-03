<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::insert([
        //     [
        //         "name"=>"Yahya",
        //         "email"=>"yahyajmilou06@gmail.com",
        //         "phone"=>"0717480227",
        //         "city"=>"casa",
        //         "gender"=>"male",
        //         "password"=>"salam1234"
        //     ],
        //     [
        //         "name"=>"Ilyass",
        //         "email"=>"ilyass06@gmail.com",
        //         "phone"=>"0712345678",
        //         "city"=>"casa",
        //         "gender"=>"male",
        //         "password"=>"salam2234"
        //     ]
        //     ]);
        Card::insert([
            [
                // "user_id" => '1',
                "number" => "203040",
                "code" => "1010",
                "date" => Carbon::now()->getTimestamp(),
                "rib" => "10",
                "active" => true,
                "visibility" => true,
                "balance" => 1500,
            ],
            [
                // "user_id" => '2',
                "number" => "203030",
                "code" => "1010",
                "date" => Carbon::now()->getTimestamp(),
                "rib" => "20",
                "active" => true,
                "visibility" =>true,
                "balance" => 1500,
            ]
        ]);
    }
}
