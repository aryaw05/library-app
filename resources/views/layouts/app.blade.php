<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ config("app.name", "Laravel") }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
            rel="stylesheet"
        />

        <!-- Scripts -->
        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>
    <body class="font-sans antialiased">
        @if (session("success"))
            <x-success-toast :message="session('success')" />
        @endif

        @if (session("error"))
            <x-error-toast :message="session('error')" />
        @endif

        <div class="antialiased bg-gray-50 dark:bg-gray-900">
            @include("layouts.sidebar")
            <x-navbar />
            <main class="p-4 md:ml-64 h-auto pt-20">
                <!-- Page Heading -->
                @isset($header)
                    <header class="col-span-full">
                        {{ $header }}
                    </header>
                @endisset

                <!-- Main Content -->
                <main>
                    {{ $slot }}
                </main>
            </main>
        </div>
    </body>
</html>
