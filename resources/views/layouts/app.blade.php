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
    <body class="font-sans antialiased">
       <div class="antialiased bg-gray-50 dark:bg-gray-900">

                @include('layouts.sidebar')
                <x-navbar />
          <main class="p-4 md:ml-64 h-auto pt-20">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <!-- Page Heading -->
            @isset($header)
                <header >
                        {{ $header }}
                    </div>
                </header>
            @endisset
            <!-- Main Content -->
            <main>
              {{ $slot }}
            </main>
            </div>
          </main>
      </div>
    </body>
</html>
