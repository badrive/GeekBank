<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Transition') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex gap-6 items-center">
                        <div class=" text-gray-900 dark:text-gray-100 text-lg">
                            {{ __('Transfer Money') }}
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

                    <form action="{{ route('transfer') }}" method="post" class="flex gap-6 items-end mt-4">
                        @csrf
                        @method('PUT')
                        <div class="flex-1">
                            <x-input-label>{{ __('From') }}</x-input-label>
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
                            <x-input-label>{{ __('To') }}</x-input-label>
                            <x-text-input id="rib" class="block mt-1 bg-transparent w-full" type="number"
                                name="rib" required />
                        </div>

                        <div class="flex-1">
                            <x-input-label>{{ __('Amount') }}</x-input-label>
                            <x-text-input id="amount" class="block mt-1 bg-transparent w-full" type="number"
                                name="amount" required />
                        </div>

                        <div>
                            <x-primary-button>{{ __('Send') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
