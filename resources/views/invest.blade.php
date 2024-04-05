<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Invest') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col gap-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex gap-6 items-center">
                    <div class=" text-gray-900 dark:text-gray-100 text-lg">
                        {{ __('Invest now') }}
                    </div>
                    @if (session('error'))
                        <div class="text-red-500">
                            {{ __(session('error')) }}
                        </div>
                    @endif
                    @if (session('succsess'))
                        <div class="text-green-500">
                            {{ __(session('succsess')) }}
                        </div>
                    @endif
                </div>

                <form action="{{ route('investments.store') }}" method="post" class="flex gap-6 items-end mt-4">
                    @csrf
                    <div class="flex-1">
                        <x-input-label>{{ __('Card') }}</x-input-label>
                        <select name="card_id" id="card_id"
                            class="bg-gray-900 rounded text-gray-900 dark:text-gray-100 mt-1 w-full">
                            @foreach (Auth::user()->active_cards as $card)
                                <option class="text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800"
                                    value="{{ $card->id }}">{{ implode(' ', str_split($card->number, 4)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex-1">
                        <x-input-label>{{ __('Amount') }}</x-input-label>
                        <x-text-input id="amount" class="block mt-1 bg-transparent w-full" type="number"
                            name="amount" required />
                    </div>

                    <div class="flex-1">
                        <x-input-label>{{ __('Type') }}</x-input-label>
                        <select name="type" id="type"
                            class="bg-gray-900 rounded text-gray-900 dark:text-gray-100 mt-1 w-full">
                            <option class="text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800" value="short">
                                {{ __('short') }}</option>
                            <option class="text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800" value="medium">
                                {{ __('medium') }}</option>
                            <option class="text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800" value="long">
                                {{ __('long') }}</option>
                        </select>
                    </div>

                    <div>
                        <x-primary-button>{{ __('invest') }}</x-primary-button>
                    </div>
                </form>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-gray-900 dark:text-gray-100 text-lg">
                    {{ __('Current Investment') }}
                </div>

                <table class="w-full text-center mt-4">
                    <thead class="w-full text-gray-900 dark:text-gray-400 text-lg">
                        <tr class="w-full flex justify-around py-2">
                            <th class="flex-1">Date</th>
                            <th class="flex-1">Amount</th>
                            <th class="flex-1">Type</th>
                            <th class="flex-1">Status</th>
                            <th class="flex-1">Profit</th>
                        </tr>
                    </thead>

                    <tbody class="w-full text-gray-900 dark:text-gray-100 text-lg">
                        @foreach ($investments as $investment)
                            <tr
                                class="w-ful flex items-center py-3 text-center justify-around border-t border-gray-400">
                                <td class="flex-1 flex justify-center">
                                    <div class="flex flex-col text-start">
                                        <span>{{ $investment->created_at->toFormattedDateString() }}</span>
                                        <span
                                            class="opacity-[87.5%]">{{ $investment->created_at->toTimeString() }}</span>
                                    </div>
                                </td>
                                <td class="flex-1">{{ $investment->amount }}</td>
                                <td class="flex-1">{{ $investment->type }}</td>
                                @if ($investment->paid)
                                    <td class="flex-1">
                                        <span class="bg-green-700/50 py-2 px-3 rounded">completed</span>
                                    </td>
                                @else
                                    <td class="flex-1">
                                        <span class="bg-orange-700/50 py-2 px-3 rounded">in progrees</span>
                                    </td>
                                @endif
                                <td class="flex-1">{{ $investment->profit }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
