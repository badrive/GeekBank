<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Bills') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
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

                    @foreach ($bills as $bill)
                        <div class="flex gap-5 text-[23px] items-center">
                            <p>{{ $bill->name }}</p>
                            <p>{{ $bill->amount }}</p>
                            <p>{{ $bill->paid ? 'Paid' : 'Not Paid' }}</p>
                            <form action="{{ route('pay_pills', $bill) }}" class="flex gap-4" method="post">
                                @csrf
                                @method('PUT')
                                <select name="card_id" id="">
                                    @foreach ($connectedUserCards as $connectedUserCard)
                                        <option value="{{ $connectedUserCard->id }}">Card{{ $connectedUserCard->id }}
                                        </option>
                                    @endforeach
                                </select>
                                <button
                                    class="{{ $bill->paid ? 'hidden' : 'flex' }} w-[100px] h-[28px] rounded bg-green-600 items-center justify-center"
                                    type="submit">Pay</button>
                                <h1 class="{{ $bill->paid ? 'flex' : 'hidden' }}" >Paid</h1>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
