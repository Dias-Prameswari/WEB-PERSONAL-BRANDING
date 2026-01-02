@php
// kategori untuk dropdown Artikel
$blogCats = collect(config('blog.categories'))
->map(fn($label, $slug) => ['label' => $label, 'slug' => $slug])
->values()
->all();

// default false jika tidak dikirim dari layout
$floating = $floating ?? false;

// Artikel aktif hanya saat di route blog.*
$artikelActive = request()->routeIs('blog.*');
@endphp

@if($floating)
<div class="absolute inset-x-0 top-6 z-50">
  <div class="container-lg">
    <div class="nav-pill mx-auto w-fit px-5 py-3 text-ink flex items-center gap-6" data-nav style="overflow:visible">
      @else
      <header class="border-b bg-black/25 backdrop-blur-md">
        <div class="container-lg">
          <div class="nav-pill mx-auto md:mx-0 w-full md:w-fit px-5 py-3 text-ink flex items-center gap-6" data-nav style="overflow:visible">
            @endif

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center pr-4 select-none">
              <img
                src="{{ asset('image/logo-ceo.png') }}"
                alt="Triawanda Tirta Aditya - Taggallery Agency"
                class="h-4 w-auto md:h-5 md:w-auto">
            </a>

            {{-- gelembung highlight --}}
            <span class="nav-highlight" data-nav-hi></span>

            {{-- Link utama --}}
            <a href="{{ route('home') }}"
              class="nav-link {{ request()->routeIs('home') ? 'nav-link-hover' : '' }}"
              @if(request()->routeIs('home')) data-active @endif>Beranda</a>

            <a href="{{ route('about') }}"
              class="nav-link {{ request()->routeIs('about') ? 'nav-link-hover' : '' }}"
              @if(request()->routeIs('about')) data-active @endif>Tentang Saya</a>

            <a href="{{ route('services') }}"
              class="nav-link {{ request()->routeIs('services') ? 'nav-link-hover' : '' }}"
              @if(request()->routeIs('services')) data-active @endif>Layanan</a>

            {{-- Dropdown ARTIKEL (tanpa Leads) --}}
            <div class="relative group">
              <a href="{{ route('blog.index') }}"
                class="nav-link {{ $artikelActive ? 'nav-link-hover' : '' }}"
                @if($artikelActive) data-active @endif
                aria-haspopup="true">Artikel</a>

              <div class="absolute left-0 top-full pt-2
           opacity-0 translate-y-1 pointer-events-none
           group-hover:opacity-100 group-hover:translate-y-0 group-hover:pointer-events-auto
           transition duration-150 z-50">
                <div class="min-w-[240px] dropdown-panel">
                  <a href="{{ route('blog.index') }}" class="dropdown-item">Semua Artikel</a>
                  <a href="{{ route('blog.portofolio') }}" class="dropdown-item">Portofolio</a>
                  <div class="menu-sep"></div>
                  @foreach($blogCats as $c)
                  <a href="{{ route('blog.category', ['slug' => $c['slug']]) }}" class="dropdown-item">
                    {{ $c['label'] }}
                  </a>
                  @endforeach
                  {{-- <== TIDAK ADA link Leads di sini --}}
                </div>
              </div>
            </div>

            <a href="{{ route('contact') }}"
              class="nav-link {{ request()->routeIs('contact') ? 'nav-link-hover' : '' }}"
              @if(request()->routeIs('contact')) data-active @endif>Kontak</a>

            {{-- AUTH AREA --}}
            @auth
            <div class="relative group">
              <button class="nav-link flex items-center gap-2" aria-haspopup="true">
                {{ Auth::user()->name ?? 'Akun' }}
                <svg class="w-4 h-4 opacity-70" viewBox="0 0 20 20" fill="currentColor">
                  <path d="M5.23 7.21a.75.75 0 011.06.02L10 11.127l3.71-3.896a.75.75 0 111.08 1.04l-4.24 4.46a.75.75 0 01-1.08 0L5.21 8.27a.75.75 0 01.02-1.06z" />
                </svg>
              </button>

              <div class="absolute right-0 top-full pt-2
           opacity-0 translate-y-1 pointer-events-none
           group-hover:opacity-100 group-hover:translate-y-0 group-hover:pointer-events-auto
           transition duration-150 z-50">
                <div class="min-w-[220px] dropdown-panel">
                  <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                  @if(Route::has('profile.edit'))
                  <a href="{{ route('profile.edit') }}" class="dropdown-item">Profil</a>
                  @endif
                  <a href="{{ route('leads.admin.index') }}" class="dropdown-item">Leads</a> {{-- Link admin di sini --}}
                  <div class="dropdown-sep"></div>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="dropdown-item w-full text-left">Keluar</button>
                  </form>
                </div>
              </div>
            </div>
            @else
            <div class="flex items-center gap-2">
              <a href="{{ route('login') }}" class="nav-link">Masuk</a>
              <a href="{{ route('leads.create') }}" class="nav-link">Daftar</a>
            </div>
            @endauth

          </div> {{-- .nav-pill --}}
        </div> {{-- .container-lg --}}
        @if($floating)
    </div> {{-- .absolute --}}
    @else
    </header>
    @endif