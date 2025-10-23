@extends('layouts.app')

{{-- Navbar bergaya pill di atas hero --}}
@section('navbar')
<!-- <div class="absolute inset-x-0 top-6 z-50">
  <div class="container-lg">
    <div class="nav-pill mx-auto w-fit px-5 py-3 text-ink flex items-center gap-6" data-nav>
      {{-- Logo teks TTA warna mint --}}
      <span class="font-bold tracking-wide text-[var(--color-logo-tta)] pr-2 select-none">
        TTA
      </span>

      
      <span class="nav-highlight" data-nav-hi>
      </span>

      <a href="{{ url('/') }}" class="nav-link"
        @if(url()->current() === url('/')) data-active @endif>Beranda</a>

      <a href="{{ url('/tentang-saya') }}" class="nav-link"
        @if(request()->is('tentang-saya')) data-active @endif>Tentang Saya</a>

      <a href="{{ url('/layanan') }}" class="nav-link"
        @if(request()->is('layanan')) data-active @endif>Layanan</a>

      <a href="{{ url('/artikel') }}" class="nav-link"
        @if(request()->is('artikel') || request()->is('artikel/*')) data-active @endif>Artikel</a>

      <a href="{{ url('/kontak') }}" class="nav-link"
        @if(request()->is('kontak')) data-active @endif>Kontak</a>


    </div>
  </div>
</div> -->
   @include('partials.navbar', ['floating' => true])
@endsection

@section('content')
{{-- SECTION: HERO --}}
<section class="hero-cover text-ink pt-20 md:pt-24 pb-14 md:pb-20">
  <div class="container-lg grid md:grid-cols-2 gap-10 items-center">
    {{-- Kiri: Teks --}}
    <div>
      <h1 class="font-display text-white text-[44px] md:text-[64px] leading-tight md:-mt-2">
        Triawanda Tirta<br />Aditya
      </h1>

      <p class="mt-5 max-w-md text-white/85">
        Partner terpercaya untuk konten, kampanye digital, dan publikasi dalam satu agensi.
      </p>

      <div class="mt-7 flex flex-wrap gap-3">
        <a href="{{ route('contact') }}" class="btn-primary btn-raise">Minta Proposal</a>
        <a href="{{ route('blog.portfolio') }}" class="btn-outline btn-raise">Lihat Portofolio</a>
      </div>

      {{-- Dipercaya oleh --}}
      <div class="mt-10 flex items-start gap-6 md:gap-8">
        {{-- Kolom kiri: judul + deret logo bulat --}}
        <div class="shrink-0">
          <div class="text-white font-semibold">Dipercaya oleh</div>
          @php
          $logos = [
          'logo-testimoni-1.png',
          'logo-testimoni-2.jpg',
          'logo-testimoni-3.png',
          'logoclient-1.png',
          'logoclient-2.png',
          'logoclient-3.png',
          'logoclient-4.png',
          'logoclient-7.jpg',
          'logoclient-8.png',
          'logoclient-9.png',
          'logoclient-10.png',
          'logoclient-11.png',
          'logoclient-12.png',
          'logoclient-13.png',
          'logoclient-14.png',
          'logoclient-15.png',
          'logoclient-16.jfif',
          'logoclient-17.jpg',
          'logoclient-18.png',
          'logoclient-19.jpg'
          ];
          @endphp

          <div class="mt-3 logo-carousel" data-logo-carousel>
            <div class="logo-track-step logo-track-gap hover:pause-anim" data-track>
              @foreach($logos as $logo)
              <span class="logo-pill-sm logo-pill">
                <img src="{{ asset("image/beranda/$logo") }}" alt="Client" class="logo-img">
              </span>
              @endforeach
            </div>
          </div>
        </div>

        {{-- Garis vertikal pemisah --}}
        <div class="hidden md:block h-16 w-px bg-white/25">
        </div>

        {{-- Kolom kanan: teks keterangan --}}
        <p class="text-white/90 max-w-xs">
          Dipercaya oleh banyak institusi dan brand ternama.
        </p>
      </div>

    </div>


    {{-- Kanan: Foto CEO + glow --}}
    <div class="relative md:h-[540px]">
      {{-- Spacer untuk memberi ruang di layar kecil --}}
      <!-- <div class="aspect-[3/4] md:aspect-auto md:h-[520px]"></div> -->

      <img
        src="{{ asset('image/beranda/foto-ceo-cover.png') }}"
        alt="Triawanda Tirta Aditya"
        class="md:absolute md:right-0 md:bottom-0-[-24px] md:h-[640px] w-auto object-contain glow-teal" />
    </div>
  </div>
</section>

{{-- SECTION: TENTANG SAYA di beranda --}}
@include('partials.about-slide2')

{{-- SECTION: LAYANAN (slide 3) --}}
@include('partials.services-slide3')

@endsection