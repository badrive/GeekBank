<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased ">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex flex-row">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <div style="margin-left: 12vw; " class="flex flex-col w-full ">
                @if (isset($header))
                    <header style="padding: 10px; " class="bg-white dark:bg-gray-800 shadow flex items-center">

                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 ">
                            {{ $header }}
                        </div>

                        
                        <div class="text-white p-6">{{ Auth::user()->name }}</div>

                        
                        <div style="display: flex; flex-direction: row; gap: 10px;">

                           
                            
                            <div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
        
                                    <div :href="route('logout')"
                                        onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10 12H20M20 12L17 9M20 12L17 15" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M4 12C4 7.58172 7.58172 4 12 4M12 20C9.47362 20 7.22075 18.8289 5.75463 17" stroke="#ffffff" stroke-width="1.5" stroke-linecap="round"></path> </g></svg>
                                </div>
                                </form>

                            </div>
                        </div>

                    </header>
                @endif
    
                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>