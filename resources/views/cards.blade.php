<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cards') }}
        </h2>
    </x-slot>


    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex gap-8 flex-wrap justify-">
                    @if (Auth::user()->cards->where('visibility', '==', '1')->count() < 2)
                        <button type="button" onclick="addCardModal.show()"
                            class="inline-flex flex-col justify-center items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                            <svg class="dark:text-gray-800 text-gray-200 mb-4" width="24" height="24"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path
                                    d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                            </svg>
                            <span>Add</span>
                            <span>card</span>
                        </button>
                        <dialog id="addCardModal">
                            <div
                                class="w-screen h-screen fixed inset-0 bg-black/50 grid place-items-center text-white z-10">
                                <div class="w-[25%] relative bg-gray-800 pb-24 px-6 pt-8 rounded">
                                    <form action="{{ route('card.store') }}" method="POST">
                                        @csrf
                                        <p class="block font-medium text-lg text-gray-700 dark:text-gray-300"
                                            for="email">
                                            Are sure you want to request new Card!
                                        </p>
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

                    @foreach (Auth::user()->cards as $card)
                        @if ($card->visibility)
                            <div class="bg-blue-500 px-9 py-7 rounded-2xl text-white flex flex-col gap-6 group/card">
                                <div class="flex items-center justify-between">
                                    <svg width="37" height="36" viewBox="0 0 37 36" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M29.8744 0H7.05262L0 21.706L18.463 35.121L36.93 21.706L29.8744 0ZM18.464 27.506L7.24261 19.353L11.5284 6.161H25.3986L29.6844 19.353L18.464 27.506Z"
                                            fill="white" />
                                        <path d="M13.1763 19.326L18.464 23.167L23.7517 19.326H13.1763Z"
                                            fill="white" />
                                    </svg>

                                    <button type="button" onclick="deleteCard{{ $card->id }}Modal.show()"> <svg
                                            class="group-hover/card:block hidden" fill="#fff" fill-opacity=".875"
                                            width="24" height="24" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 448 512">
                                            <path
                                                d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                        </svg>
                                    </button>
                                    <dialog id="deleteCard{{ $card->id }}Modal">
                                        <div
                                            class="w-screen h-screen fixed inset-0 bg-black/50 grid place-items-center text-white z-10">
                                            <div class="w-[25%] relative bg-gray-800 pb-24 px-6 pt-8 rounded">
                                                <form action="{{ route('card.destroy', $card) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <p class="block font-medium text-lg text-gray-700 dark:text-gray-300"
                                                        for="email">
                                                        Are sure you want to delete this Card!
                                                    </p>
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

                                </div>
                                <p class="text-3xl">{{ implode(' ', str_split($card->number, 4)) }}</p>
                                <div class="flex gap-10">
                                    @foreach (['Balance' => $card->balance . ' Dh', 'Exepire in' => $card->date->format('m/d'), 'Cvv' => $card->code] as $key => $value)
                                        <div>
                                            <p class="opacity-[87.5%]">{{ $key }}</p>
                                            <p class="text-xl">{{ $value }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
