<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bills') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 mt-4">
                <div class="flex gap-6 items-center">
                    <div class=" text-gray-900 dark:text-gray-100 text-lg">
                        {{ __('Current Bills') }}
                    </div>
                    @if (session('error'))
                        <div class="text-red-500">
                            {{ __(session('error')) }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="text-green-500">
                            {{ __(session('success')) }}
                        </div>
                    @endif
                </div>

                <table class="w-full text-center mt-4">
                    <thead class="w-full text-gray-900 dark:text-gray-400 text-lg">
                        <tr class="w-full flex py-2">
                            <th class="flex-1">Name</th>
                            <th class="flex-1">Amount</th>
                            <th class="flex-1">Status</th>
                            <th class="flex-1"></th>
                        </tr>
                    </thead>

                    <tbody class="w-full text-gray-900 dark:text-gray-100 text-lg">
                        @foreach (Auth::user()->bills as $bill)
                            <tr class="w-full py-3 flex justify-around border-t border-gray-400">
                                <td class="flex-1">{{ $bill->name }}</td>
                                <td class="flex-1">{{ $bill->amount }}</td>
                                @if ($bill->paid)
                                    <td class="flex-1">
                                        <span class="bg-green-700/50 py-2 px-3 rounded">Paid</span>
                                    </td>
                                @else
                                    <td class="flex-1">
                                        <span class="bg-orange-700/50 py-2 px-3 rounded">Pending</span>
                                    </td>
                                @endif
                                <td class="flex-1">
                                    @if (!$bill->paid)
                                        <button type="button" onclick="deleteCard{{ $bill->id }}Modal.show()">
                                            {{ __('Pay') }}
                                        </button>
                                        <dialog id="deleteCard{{ $bill->id }}Modal">
                                            <div
                                                class="w-screen h-screen fixed inset-0 bg-black/50 grid place-items-center text-white z-10">
                                                <div class="w-[25%] relative bg-gray-800 pb-24 px-6 pt-8 rounded">
                                                    <form action="{{ route('bills.update', $bill) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <p class="block font-medium text-lg text-gray-700 dark:text-gray-300"
                                                            for="email">
                                                            Are sure you want to pay {{ $bill->name }} bill!
                                                        </p>
                                                        <div class="w-fit mt-4">

                                                            <x-input-label>{{ __('Choose a card') }}</x-input-label>
                                                        </div>
                                                        <select name="card_id" id="card_id"
                                                            class="bg-gray-900 rounded text-gray-900 dark:text-gray-100 mt-1 w-full">
                                                            @foreach (Auth::user()->active_cards as $card)
                                                                <option
                                                                    class="text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800"
                                                                    value="{{ $card->id }}">
                                                                    {{ implode(' ', str_split($card->number, 4)) }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <x-primary-button class="absolute right-6 bottom-7 mt-5">
                                                            {{ __('Confirm') }}
                                                        </x-primary-button>
                                                    </form>
                                                    <form method="dialog" class="absolute left-6 bottom-7 mt-5">
                                                        <x-danger-button>{{ __('Cancel') }}</x-danger-button>
                                                    </form>
                                                </div>
                                            </div>
                                        </dialog>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
