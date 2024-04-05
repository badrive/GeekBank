<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class cryptoController extends Controller
{
    public function index()
    {
        $apiKey = 'd6cb83c7-a49b-4cf9-b970-189eac2cc7d7';
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?CMC_PRO_API_KEY=' . $apiKey;

        $response = Http::get($url);

        if ($response->successful()) {
            $cryptos = $response->json();
            $cryptos = $cryptos['data'];
        } else {
            return response()->json(['error' => 'Failed to fetch data from CoinMarketCap API'], $response->status());
        }
        $user = Auth::user();
        return view("crypto", compact('cryptos', 'user'));
    }
}
