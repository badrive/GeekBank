<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Loans') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                <div class="flex gap-6 items-center">
                    <div class=" text-gray-900 dark:text-gray-100 text-lg">
                        {{ __('Take Loan') }}
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

                <form action="{{ route('take_loan') }}" method="post"
                    class="flex gap-6 items-end mt-4 {{ $isHavingLoan ? 'hidden' : 'flex' }}">
                    @csrf
                    @method('PUT')
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

                    <div>
                        <x-primary-button>{{ __('get') }}</x-primary-button>
                    </div>
                </form>
            </div>


        </div>
    </div>
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-[40px]">take Loan</h1>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('take_loan') }}" method="post" class=" flex items-center gap-6 {{ $isHavingLoan ? "hidden" : "flex" }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <input class="w-[250px] h-[40px]" type="number" placeholder="enter how much you want"
                                name="amount">
                            <p class="bg-yellow-600 flex w-[fit-content] items-center justify-center text-[14px]">(You
                                can get a loan of
                                200%
                                of your balance as MAX)
                            </p>
                        </div>
                        <select name="card_id" id="">
                            @foreach ($connectedUserCards as $connectedUserCard)
                                <option value="{{ $connectedUserCard->id }}">Card{{ $connectedUserCard->id }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="w-[120px] h-[30px] rounded-lg bg-green-500">get Loan</button>
                    </form>

                    <h1 class="{{ $isHavingLoan ? "flex" : "hidden" }}">You Can't get another loan until paying the previous one</h1>
                </div>
            </div>
        </div>
    </div> --}}

</x-app-layout>
