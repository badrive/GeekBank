<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crypto') }}
        </h2>
    </x-slot>

    

    {{-- @if ($cryptos)
        <h1>Cryptocurrency List</h1>
        @foreach ($cryptos as $crypto)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                            <h2>{{ $crypto['name'] }}</h2>
                            <p>Price: {{ $crypto['quote']['USD']['price'] }}</p>
                            <img width="50" src=" https://s2.coinmarketcap.com/static/img/coins/64x64/{{ $crypto['id'] }}.png " alt="">
                            
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <p>Error: Failed to fetch data from CoinMarketCap API.</p>
        @endif --}}
        

        {{-- <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ __("You're logged from bills!") }}
                    </div>
                </div>
            </div>
        </div> --}}


        
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6 ">

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="text-gray-900 dark:text-gray-100 text-lg">
                {{ __('Recent crypto') }}
            </div>

            <table class="w-full text-center mt-4">
                <thead class="w-full text-gray-900 dark:text-gray-400 text-lg">
                    <tr class="w-full flex py-2 bg-black">
                        <th class="flex-1">Name</th>
                        <th class="flex-1">Amount</th>
                        <th class="flex-1">Type</th>
                        <th class="flex-1">Status</th>
                    </tr>
                </thead>
                
                <tbody class="w-full text-gray-900 dark:text-gray-100 text-lg">
                    @if ($cryptos)
                    @foreach ($cryptos as $crypto)
                        <tr
                            class="w-full py-3  justify-around border-t border-gray-400">
                            <td  class="flex-1 flex items-center justify-center">  
                                <img width="30" src=" https://s2.coinmarketcap.com/static/img/coins/64x64/{{ $crypto['id'] }}.png " alt="">             
                            </td>
                            
                            <td>
                                <p class="flex-1">{{ $crypto['name'] }}</p>     
                            </td>
    
                            <td>
                                <p class="flex-1">{{ $crypto['name'] }}</p>     
                            </td>
    
                            <td>
                                <p class="flex-1">{{ $crypto['name'] }}</p>     
                            </td>
                            
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
