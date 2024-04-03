<?php

namespace Database\Seeders;

use App\Models\Bill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bill::insert([
            [
                "name"=>"wifi",
                "amount"=>"20",
            ],

            [
                "name"=>"electicity",
                "amount"=>"70",
            ]
        ]);
    }
}
