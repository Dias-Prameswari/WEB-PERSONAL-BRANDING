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
    <body class="font-sans antialiased text-ink">
        @php
            // navbar “mengambang” untuk halaman public tertentu
            $floating = request()->routeIs('home')
            || request()->routeIs('login')
            || request()->routeIs('register')
            || request()->routeIs('password.*')
            || request()->routeIs('verification.*') 
            || request()->routeIs('leads.create'); // /daftar
        @endphp

        {{-- Navbar di atas --}}
        @include('partials.navbar', ['floating' => $floating])
        
        {{-- Bungkus konten dengan bg beranda + padding top biar tak ketiban navbar --}}
    <div class="min-h-screen hero-cover {{ $floating ? 'pt-32' : 'pt-24' }} flex flex-col items-center">
        {{-- Card form tetap putih --}}
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white text-gray-900 shadow-md overflow-hidden sm:rounded-lg">
            @isset($slot)
                {{-- dipakai kalau file ini digunakan sebagai <x-guest-layout> --}}
                {{ $slot }}
            @else
                {{-- dipakai kalau file ini digunakan dengan @extends/@section --}}
                @yield('content')
            @endisset
        </div>
    </div>
    </body>
</html>
