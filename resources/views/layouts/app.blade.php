<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/> <!--Replace with your tailwind.css once created-->
        <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

        @livewireStyles

        <!-- Scripts -->
        <script defer src="{{ mix('js/app.js') }}"></script>
    </head>
    <body class="font-sans antialiased">

        <div class="bg-gray-100">

           {{-- @livewire('navigation-menu') --}}

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            <div class="continer mx-auto w-full mt-4 bg-white">
                <div class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-4 gap-1 px-4 sm:px-2 md:px-4 lg:px-4">

                    <!-- Aside Main menu -->
                    <div class="sm:col-span-1 md:col-span-3 lg:col-span-1">
                        @include('aside-nav-menu')
                    </div>

                    <!-- Page Content -->
                    <div class="sm:col-span-1 md:col-span-3 lg:col-span-3">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </body>
</html>
