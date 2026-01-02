@php
    $floating = (
            // halaman publik tertentu
            request()->routeIs('home') ||
            request()->routeIs('login') ||
            request()->routeIs('register') ||
            request()->routeIs('password.*') ||
            request()->routeIs('verification.*') ||

            // form /daftar
            request()->routeIs('leads.create') ||

            // area dashboard / admin
            request()->routeIs('dashboard') ||
            request()->routeIs('profile.*') ||

            // /admin/leads
            request()->routeIs('leads.admin.*') ||

            // /admin/artikel
            request()->routeIs('admin.articles.*') ||
            request()->routeIs('admin.portofolio.*') || 

            // halaman konten biasa
            request()->routeIs('contact') ||
            request()->routeIs('about') ||
            request()->routeIs('blog.*') ||
            request()->routeIs('services.*') ||
            request()->routeIs('services')
    );

@endphp

@include('partials.navbar', ['floating' => $floating])