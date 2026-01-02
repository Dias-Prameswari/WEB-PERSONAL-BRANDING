@extends('layouts.site')

@section('page_bg', 'hero-cover')

@section('content')

{{-- SLIDE 1: HERO BESAR + HIGHLIGHT --}}
<section class="relative z-10 pt-32 pb-16 md:pt-40 md:pb-20 text-white">
    <div class="container-lg">
        <div
            class="relative overflow-hidden rounded-[32px] bg-slate-900/90 border border-white/10
                   px-6 py-8 md:px-12 md:py-10 shadow-xl">

            {{-- dekor mirip FAQ / halaman lain --}}
            <img src="{{ asset('image/beranda/pattern-2_28_11zon.jpg') }}"
                alt=""
                class="hidden md:block absolute right-0 top-0 w-[260px] h-auto opacity-25">
            <img src="{{ asset('image/beranda/pattern-3_29_11zon.jpg') }}"
                alt=""
                class="hidden md:block absolute left-0 bottom-0 w-[220px] h-auto opacity-25">

            <div class="relative z-10 grid gap-8 md:gap-10
                        md:grid-cols-[minmax(0,1.6fr)_minmax(0,1.2fr)] items-start">

                {{-- KIRI: judul + intro + CTA --}}
                <div>
                    <div class="flex items-center gap-3 mb-3">
                        <span class="inline-block h-8 w-[3px] rounded-full bg-[var(--color-accent)]"></span>
                        <p class="text-2xl md:text-[30px] tracking-wide text-sky-300  font-display">
                            Layanan
                        </p>
                    </div>

                    <h1 class="text-2xl md:text-[28px] font-display  text-white mb-4 leading-snug">
                        {{ $service->title }}
                    </h1>

                    <p class="text-sm md:text-[15px] text-white/85 leading-relaxed mb-3">
                        {{ $service->hero_intro }}
                    </p>
                    <p class="text-sm md:text-[15px] text-white/80 leading-relaxed mb-6">
                        {{ $service->hero_goal }}
                    </p>

                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('contact') }}" class="btn-primary btn-raise">
                            Diskusikan kebutuhan Anda
                        </a>
                        <a href="{{ route('services') }}" class="btn-outline btn-raise inline-flex items-center gap-2">
                            <x-heroicon-o-arrow-left class="w-4 h-4" />
                            Kembali ke semua layanan
                        </a>
                    </div>
                </div>

                {{-- KANAN: card kecil highlight (mirip FAQ style) --}}
                <div class="grid gap-3">
                    @foreach ($service->highlights_list as $item)
                    <div
                        class="rounded-2xl bg-slate-950/70 border border-sky-500/30
                                   px-4 py-3 flex items-start gap-3">
                        <span
                            class="mt-1 inline-flex h-6 w-6 flex-shrink-0
                                       items-center justify-center rounded-full
                                       bg-emerald-400 text-slate-900 text-xs font-bold">
                            ✓
                        </span>
                        <p class="text-sm md:text-[15px] text-white/85 leading-relaxed">
                            {{ $item }}
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
{{-- END SLIDE 1 --}}

{{-- SLIDE 2: TENTANG LAYANAN (layout mirip "Dari Ide ke Aksi") --}}
<section class="relative z-10 pb-16 md:pb-20">
    <div aria-hidden="true"
        class="pointer-events-none absolute inset-0 z-0">
        {{-- pola kiri --}}
        <img src="{{ asset('image/beranda/pattern-3_29_11zon.jpg') }}"
            alt="pattern garis kotak atas"
            class="hidden md:block absolute left-0 top-10 md:top-0
                    w-[240px] md:w-[280px] h-auto opacity-35 select-none">
        {{-- pola kanan --}}
        <img src="{{ asset('image/beranda/pattern-2_28_11zon.jpg') }}"
            alt=""
            class="hidden md:block absolute right-0 bottom-0
                    w-[260px] h-auto opacity-30 select-none">
    </div>

    <div class="container-lg relative z-10">
        <div class="grid gap-10 md:gap-12
                    md:grid-cols-[minmax(0,1.4fr)_minmax(0,1fr)] items-center">
            {{-- KIRI: teks --}}
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <span class="inline-block h-8 w-[3px] rounded-full bg-[var(--color-accent)]"></span>
                    <h2 class="text-white text-xl md:text-[28px] font-display leading-snug">
                        Apa yang Akan Anda Dapatkan
                    </h2>
                </div>

                <p class="text-[15px] md:text-[16px] leading-relaxed text-white/85">
                    {{ $service->about }}
                </p>
            </div>

            {{-- KANAN: foto --}}
            @if (!empty($service->image_url))
            <figure class="mx-auto md:mx-0">
                <div
                    class="about-photo w-full aspect-[4/3] md:aspect-auto
                               md:w-[460px] md:h-[440px] overflow-hidden rounded-3xl
                               border border-white/10 shadow-xl">
                    <img
                        src="{{ asset($service->image_url) }}"
                        alt="{{ $service->title }}"
                        class="h-full w-full object-cover">
                </div>
            </figure>
            @endif
        </div>
    </div>
</section>
{{-- END SLIDE 2 --}}

{{-- SLIDE 3: PROSES & HASIL (pakai 2 card seperti slide "Hasil Nyata") --}}
<section class="relative z-10 pb-16 md:pb-20">
    <div aria-hidden="true"
        class="pointer-events-none absolute inset-0 z-0">
        <img src="{{ asset('image/beranda/pattern-2_28_11zon.jpg') }}"
            alt=""
            class="hidden md:block absolute right-0 top-0
                    w-[280px] h-auto opacity-40 mix-blend-screen">
    </div>

    <div class="container-lg relative z-10">
        <div class="grid gap-8 md:gap-10 md:grid-cols-2 items-start">
            {{-- PROSES --}}
            <div class="rounded-3xl bg-white/5 border border-white/10 p-6 md:p-8 shadow-lg">
                <h2 class="text-white text-xl md:text-[24px] font-display mb-4">
                    Bagaimana Cara Saya Bekerja
                </h2>
                <ul class="space-y-3 text-sm md:text-[15px] text-white/90">
                    @foreach ($service->process_list as $item)
                    <li class="flex gap-3">
                        <span class="mt-1">
                            <x-heroicon-o-clock class="w-5 h-5 text-sky-300" />
                        </span>
                        <p>{{ $item }}</p>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- HASIL --}}
            <div class="rounded-3xl bg-white/5 border border-white/10 p-6 md:p-8 shadow-lg">
                <h2 class="text-white text-xl md:text-[24px] font-display mb-4">
                    Perubahan yang Bisa Anda Harapkan
                </h2>
                <ul class="space-y-3 text-sm md:text-[15px] text-white/90">
                    @foreach ($service->results_list as $item)
                    <li class="flex gap-3">
                        <span class="mt-1">
                            <x-heroicon-o-check-circle class="w-5 h-5 text-emerald-300" />
                        </span>
                        <p>{{ $item }}</p>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
{{-- END SLIDE 3 --}}

{{-- SLIDE 4: FOOTER --}}
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
{{-- END SLIDE 4: FOOTER --}}

@endsection