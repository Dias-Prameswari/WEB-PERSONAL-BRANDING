@extends('layouts.site')

@section('page_bg', 'hero-cover')

@section('content')

<section class="relative z-10 pt-32 pb-10 md:pt-40 md:pb-14 text-white">
  <!-- <div class="pt-32 pb-12 md:pt-40 md:pb-16"> -->
  {{-- Dekorasi: pola garis-kotak & radial glow --}}
  <div aria-hidden="true"
    class="pointer-events-none absolute inset-0 z-0">

    {{-- pola kiri atas --}}
    <img src="{{ asset('image/beranda/pattern-3_29_11zon.jpg') }}"
      alt="pattern garis kotak atas"
      class="hidden md:block absolute left-0 top-10 md:top-0 w-[240px] md:w-[280px] h-auto opacity-40 select-none">

    {{-- pola kiri bawah --}}
    <img src="{{ asset('image/beranda/pattern-4_30_11zon.jpg') }}"
      alt="pattern garis kotak bawah"
      class="hidden md:block absolute left-0 bottom-1 md:bottom-1 w-[240px] md:w-[280px] h-auto opacity-40 select-none">

  </div>

  <div class="container-lg">
    <div class="flex items-center justify-center mb-6">
      <span class="inline-block h-[3px] w-24 bg-[var(--color-accent)] rounded-full"></span>
    </div>
    <h1 class="text-center text-3xl md:text-4xl font-display mb-6 text-white">
      Artikel & Insight
    </h1>

    {{-- TAB KATEGORI --}}
    <div class="flex flex-wrap gap-3 justify-center text-white text-sm">
      {{-- Tab "Semua" --}}
      <a href="{{ route('blog.index') }}"
        class="px-4 py-2 rounded-full border
         {{ $currentCategory ? 'bg-white/5 border-white/20' : 'bg-[var(--color-accent)] border-[var(--color-accent)]' }}">
        Semua
      </a>

      {{-- Tab per kategori --}}
      @foreach($categories as $slug => $label)
      <a href="{{ route('blog.category', $slug) }}"
        class="px-4 py-2 rounded-full border
           {{ $currentCategory === $slug ? 'bg-[var(--color-accent)] border-[var(--color-accent)]' : 'bg-white/5 border-white/20' }}">
        {{ $label }}
      </a>
      @endforeach

      {{-- Tombol Portofolio (bukan kategori) --}}
      <a href="{{ route('blog.portofolio') }}"
        class="px-4 py-2 rounded-full border bg-white/5 border-white/20 hover:bg-white/10">
        Portofolio
      </a>
    </div>

    {{-- LIST ARTIKEL --}}
    <div class="mt-10 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
      @foreach($articles as $article)
      <article class="service-card service-card-hover rounded-3xl overflow-hidden bg-slate-900/80 border border-white/10 flex flex-col">
        <div class="h-44 md:h-52">
          <img src="{{ asset($article->image_url) }}"
            alt="{{ $article->title }}"
            class="w-full h-full object-cover">
        </div>
        <div class="p-5 md:p-6 flex-1 flex flex-col">
          <div class="text-xs text-white/70 mb-1">{{ $article->date }}</div>
          <h2 class="text-sm md:text-base font-semibold text-white leading-snug">
            {{ $article->title }}
          </h2>
          <p class="mt-3 text-xs md:text-sm text-white/80 line-clamp-3">
            {{ $article->excerpt }}
          </p>
          <div class="mt-4">
            <a href="{{ route('blog.show', $article->slug) }}"
              class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[var(--color-accent)] text-xs font-semibold text-white">
              Selengkapnya →
            </a>
          </div>
        </div>
      </article>
      @endforeach
    </div>
  </div>
  <!-- </div> -->
</section>

{{-- SLIDE 11: FOOTER --}}
<section>
  <div class="pb-3 md:pb-4">
    <div class="container-lg space-y-10">

      {{-- CTA hijau: "Siap mengubah konten..." --}}
      <div class="relative bg-slate-900/81 rounded-[2.5rem] px-6 py-10 md:px-16 md:py-12 text-center text-white overflow-hidden">
        {{-- pattern kiri --}}
        <img src="{{ asset('image/kontak/pattern-1_52_11zon.jpg') }}"
          alt=""
          class="pointer-events-none select-none hidden md:block absolute left-0 top-0 h-full opacity-25">
        {{-- pattern kanan --}}
        <img src="{{ asset('image/kontak/pattern-2_53_11zon.jpg') }}"
          alt=""
          class="pointer-events-none select-none hidden md:block absolute right-0 top-0 h-full opacity-25">

        <div class="relative z-10 max-w-3xl mx-auto">
          <p class="text-2xl md:text-3xl font-semibold leading-snug">
            Siap mengubah ilmu Digital Marketing jadi strategi nyata untuk bisnis Anda? Yuk mulai bersama saya!
          </p>

          <a href="{{ route('contact') }}"
            class="inline-flex items-center gap-2 rounded-full bg-emerald-400 text-slate-900 font-semibold px-6 py-2.5 mt-8 text-sm md:text-base hover:bg-emerald-300 transition">
            Konsultasi Gratis
            <x-heroicon-o-arrow-right class="w-4 h-4" />
          </a>
        </div>
      </div>

      {{-- footer mini --}}
      <div class="pt-4 md:pt-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12 text-slate-200 text-sm">

          {{-- Kolom 1: logo + follow --}}
          <div class="flex items-start gap-8">
            {{-- logo ceo, digeser sedikit ke kiri --}}
            <div class="-ml-2 md:-ml-4 flex-shrink-0">
              <img
                src="{{ asset('image/logo-ceo.png') }}"
                alt="logo taggallery agency ceo"
                class="h-9 w-auto">
            </div>

            {{-- teks & sosmed --}}
            <div class="space-y-2">
              <p class="font-semibold mb-2">Ikuti Saya</p>

              <div class="space-y-2">
                <div class="flex items-center gap-2">
                  <x-si-whatsapp class="w-4 h-4" />
                  <span>+62 896-7074-1260</span>
                </div>
                <div class="flex items-center gap-2">
                  <x-si-tiktok class="w-4 h-4" />
                  <span>@taggallery</span>
                </div>
                <div class="flex items-center gap-2">
                  <x-si-instagram class="w-4 h-4" />
                  <span>@triawandaaditya</span>
                </div>
                <div class="flex items-center gap-2">
                  <x-si-youtube class="w-4 h-4" />
                  <span>@taggallery5513</span>
                </div>
                <div class="flex items-center gap-2">
                  <x-heroicon-o-envelope class="w-4 h-4" />
                  <span>taggalleryagency@gmail.com</span>
                </div>
              </div>
            </div>
          </div>

          {{-- Kolom 2: menu --}}
          <div class="space-y-4">
            <p class="font-semibold">Halaman</p>
            <nav class="space-y-2">
              <a href="{{ route('home') }}" class="block hover:text-sky-300 transition">Beranda</a>
              <a href="{{ route('about') }}" class="block hover:text-sky-300 transition">Tentang Saya</a>
              <a href="{{ route('services') }}" class="block hover:text-sky-300 transition">Layanan</a>
              <a href="{{ route('blog.index') }}" class="block hover:text-sky-300 transition">Artikel</a>
              <a href="{{ route('contact') }}" class="block hover:text-sky-300 transition">Kontak</a>
            </nav>
          </div>

          {{-- Kolom 3: alamat --}}
          <div class="space-y-4">
            <p class="font-semibold">Lokasi</p>
            <div class="flex items-start gap-3">
              <span class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-sky-500/90 text-white mt-0.5">
                <x-heroicon-o-map-pin class="w-4 h-4" />
              </span>
              <p class="leading-relaxed">
                Perumahan Graha Estetika, Jl. Ceria Tengah No G3, Pedalangan,
                Kec. Banyumanik, Kota Semarang, Jawa Tengah 50268
              </p>
            </div>
          </div>
        </div>

        {{-- garis bawah + copyright --}}
        <div class="border-t 
            border-slate-600/60 
            mt-6 md:mt-8 
            pt-4 pb-2 
            flex flex-col 
            md:flex-row 
            items-center 
            justify-between 
            gap-2 text-xs 
            md:text-sm 
            text-slate-300/80">
          <p class="text-center md:text-left">
            &copy; {{ date('Y') }} Triwanda Trias Aditya Taggallery Agency. Semua Hak Dilindungi.
          </p>

          <div class="flex items-center gap-4">
            <a href="#" class="hover:text-sky-300 transition">Kebijakan Privasi</a>
            <span class="hidden md:inline-block text-slate-500">|</span>
            <a href="#" class="hover:text-sky-300 transition">Syarat &amp; Ketentuan</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- END SLIDE 11: FOOTER --}}

@endsection