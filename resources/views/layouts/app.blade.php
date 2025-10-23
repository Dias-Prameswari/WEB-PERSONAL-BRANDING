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
        <div class="min-h-screen @yield('page_bg')">
            @include('layouts.navigation')

            {{-- Header transparan + teks putih --}}
            @if (isset($header))
                <header>
                    <div class="container-lg">
                        <div class="text-white text-xl font-semibold">
                            {{ $header }}
                        </div>
                    </div>
                </header>
            @elseif (View::hasSection('header'))
                <header>
                    <div class="container-lg">
                        <div class="text-white text-xl font-semibold">
                            @yield('header')
                        </div>
                    </div>
                </header>
            @endif

            @php
                // halaman yang navbar-nya mengambang -> butuh padding-top ekstra
                $floatRoutes = request()->routeIs('home') ||
                                request()->routeIs('login') ||
                                request()->routeIs('dashboard') ||
                                request()->routeIs('profile.*');
            @endphp

            <!-- Page Content -->
            <main  class="@yield('main_class')">
                @isset($slot)
                    {{ $slot }}
                @else
                    @yield('content')
                @endisset
            </main>
        </div>
    </body>
</html>
