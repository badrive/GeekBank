<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crypto') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6 ">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="text-gray-900 dark:text-gray-100 text-lg">
                {{ __('Crypto Coins') }}
            </div>

            <table class="w-full text-center mt-4">
                <thead class="w-full text-gray-900 dark:text-gray-400 text-lg">
                    <tr class="w-full flex py-2">
                        <th class="flex-1">Coin</th>
                        <th class="flex-1">Price</th>
                    </tr>
                </thead>

                <tbody class="w-full text-gray-900 dark:text-gray-100 text-lg">
                    @if ($cryptos)
                        @foreach ($cryptos as $crypto)
                            <tr class="w-full py-3 flex justify-around border-t border-gray-400">
                                <td class="flex-1 flex justify-center">
                                    <div class="flex text-start gap-2">
                                        <img width="30"
                                            src=" https://s2.coinmarketcap.com/static/img/coins/64x64/{{ $crypto['id'] }}.png">
                                        <span>{{ $crypto['name'] }}</span>
                                    </div>
                                </td>
                                <td class="flex-1">{{ number_format($crypto['quote']['USD']['price'], 4) }} $</td>
                            </tr>
                        @endforeach
                    @else
                        <p>Error: Failed to fetch data from CoinMarketCap API.</p>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
