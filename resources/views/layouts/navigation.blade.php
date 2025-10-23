<!-- @include('partials.navbar', ['floating' => false]) -->
 <!-- @include('partials.navbar', ['floating' => request()->routeIs('home')]) -->

@php
    $floating =
        request()->routeIs('home') ||
        request()->routeIs('login') ||
        request()->routeIs('register') ||
        request()->routeIs('password.*') ||
        request()->routeIs('verification.*') ||
        request()->routeIs('leads.create') ||
        request()->routeIs('leads.index')  ||
        request()->routeIs('leads.admin.*') ||
        request()->routeIs('dashboard') ||
        request()->routeIs('profile') ||
        request()->routeIs('profile.*');
@endphp

@include('partials.navbar', ['floating' => $floating])

