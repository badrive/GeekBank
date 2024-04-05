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
                    

                    {{-- content --}}

                    <div class="">
                        <h1 class="p-3">Send money </h1>
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
                        <form class="flex flex-row gap-3" action="{{ route('transfer') }}" method="post">
                            @csrf
                            @method('PUT')
                            <input class="rounded-lg bg-transparent" type="text" name="rib" id="" placeholder="enter rib">
                            <input class="rounded-lg bg-transparent" type="number" name="amount" id="" placeholder="enter amount">
                            <select class="rounded-lg bg-transparent" name="card_id" id="">
                                @foreach ($connectedUserCards as $connectedUserCard)
                                    <option class="text-black" value="{{ $connectedUserCard->id }}">card{{ $connectedUserCard->id }}</option>
                                @endforeach
                            </select>
                            <button class="p-2 rounded-lg bg-white hover:bg-slate-200 text-gray-800" type="submit">send</button>
                        </form>
                
                    </div>

                    {{-- end --}}


                </div>
            </div>
        </div>
    </div>

 

    

</x-app-layout>
