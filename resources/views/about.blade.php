@extends('layouts.site')

{{-- background untuk seluruh halaman tentang saya --}}
@section('page_bg', 'hero-cover')

@section('content')
{{-- SLIDE 1 - HERO --}}
<section class="relative overflow-hidden pt-40 md:pt-38 pb-16 md:pb-16 text-ink">
    {{-- Dekorasi: pola garis-kotak & radial glow --}}
    <div aria-hidden="true"
        class="pointer-events-none absolute inset-0 z-0">
        {{-- pola kiri bawah --}}
        <!-- <img src="{{ asset('image/beranda/pattern-4_30_11zon.jpg') }}"
            alt="pattern garis kotak bawah"
            class="hidden md:block absolute left-0 bottom-0 w-[240px] md:w-[260px] h-auto opacity-40 select-none"> -->
        {{-- radial glow kanan-atas --}}
        <div class="absolute right-[-140px] -top-10 md:-top-16 w-[620px] h-[320px] opacity-70 rotate-[-30deg]
            [background:radial-gradient(50%_50%_at_81%_56%,rgba(69,222,255,1)_0%,rgba(7,255,214,0)_100%)]">
        </div>
    </div>

    <div class="relative z-10">
        <div class="container-lg">
            {{-- judul kecil kiri --}}
            <div class="flex items-center gap-3">
                <span class="block h-[3px] w-10 rounded-full bg-[var(--color-accent)]"></span>
                <h2 class="text-white text-xl md:text-[28px] font-display leading-snug">
                    Triawanda Tirta Aditya, Content Creator Semarang
                </h2>
            </div>
        </div>
    </div>
</section>
{{-- END SLIDE 1 --}}

{{-- SLIDE 2 - DARI IDE KE AKSI + STATISTIK --}}
<section class="relative z-10 pb-16 md:pb-20">
    <div class="container-lg">
        <div class="grid gap-10 md:gap-12 md:grid-cols-[minmax(0,1.4fr)_minmax(0,1fr)] items-start">
            <div>
                {{-- Judul + garis hijau kiri --}}
                <div class="flex items-center gap-3 mb-4">
                    <span class="inline-block h-8 w-[3px] rounded-full bg-[var(--color-accent)]"></span>
                    <h2 class="text-white text-xl md:text-[28px] font-display leading-snug">
                        Dari Ide ke Aksi
                    </h2>
                </div>

                <p class="text-[15px] md:text-[17px] leading-relaxed text-white/85">
                    Triawanda Tirta Aditya adalah seorang content creator dan trainer digital marketing & branding sejak tahun 2020.
                    Sebagai seorang Founder dan CEO Taggallery Agency, ia telah dipercaya oleh berbagai perusahaan,
                    instansi pemerintah, hingga universitas untuk membawakan training dan pelatihan. Dengan pengalaman lebih dari 5+
                    tahun di bidang content creation dan digital marketing, ia memastikan setiap sesi training yang
                    dibawakan insightful, mudah dipahami, berdampak kepada audience dengan ciri khas metode penyampaiannya
                    yang santai dan fun.
                </p>
            </div>

            {{-- Statistik singkat --}}
            <div class="grid grid-cols-2 gap-4 md:gap-5">
                <div class="rounded-2xl bg-white/5 border border-white/10 px-4 py-5">
                    <x-heroicon-o-user-group class="w-6 h-6 text-emerald-300 mb-2" />
                    <div class="flex items-baseline gap-1 text-emerald-300">
                        <span class="text-2xl md:text-3xl font-semibold">500</span>
                        <span>
                            <x-heroicon-o-plus class="w-6 h-6" />
                        </span>
                    </div>
                    <p class="mt-1 text-sm md:text-[15px] text-white/80">
                        UMKM yang telah saya dampingi
                    </p>
                </div>

                <div class="rounded-2xl bg-white/5 border border-white/10 px-4 py-5">
                    <x-heroicon-o-building-office-2 class="w-6 h-6 text-emerald-300 mb-2" />
                    <div class="flex items-baseline gap-1 text-emerald-300">
                        <span class="text-2xl md:text-3xl font-semibold">50</span>
                        <span>
                            <x-heroicon-o-plus class="w-6 h-6" />
                        </span>
                    </div>
                    <p class="mt-1 text-sm md:text-[15px] text-white/80">
                        Perusahaan yang bekerja sama
                    </p>
                </div>

                <div class="rounded-2xl bg-white/5 border border-white/10 px-4 py-5">
                    <x-heroicon-o-presentation-chart-line class="w-6 h-6 text-emerald-300 mb-2" />
                    <div class="flex items-baseline gap-1 text-emerald-300">
                        <span class="text-2xl md:text-3xl font-semibold">1000</span>
                        <span>
                            <x-heroicon-o-plus class="w-6 h-6" />
                        </span>
                    </div>
                    <p class="mt-1 text-sm md:text-[15px] text-white/80">
                        Peserta workshop
                    </p>
                </div>

                <div class="rounded-2xl bg-white/5 border border-white/10 px-4 py-5">
                    <x-heroicon-o-hand-thumb-up class="w-6 h-6 text-emerald-300 mb-2" />
                    <div class="flex items-baseline gap-1 text-emerald-300">
                        <span class="text-2xl md:text-3xl font-semibold">97</span>
                        <span>
                            <x-heroicon-o-plus class="w-6 h-6" />
                        </span>
                    </div>
                    <p class="mt-1 text-sm md:text-[15px] text-white/80">
                        Tingkat kepuasan peserta
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-6" data-logo-carousel>
            <div class="overflow-hidden">
                <div class="flex items-center gap-6 md:gap-8" data-track>
                    @foreach ($logoo as $logo)
                    <div class="flex-shrink-0 h-14 w-14 md:h-16 md:w-16
                           rounded-full bg-white p-2
                           flex items-center justify-center shadow-md overflow-hidden">
                        <img
                            src="{{ asset('image/beranda/' . $logo) }}"
                            alt="Client Logo"
                            class="w-full h-full object-contain">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
{{-- END SLIDE 2 --}}

{{-- SLIDE 3 - METODE PRAKTIS YANG BERUJUNG OUTPUT --}}
<section class="relative z-10 pb-16 md:pb-20">
    <div aria-hidden="true"
        class="pointer-events-none absolute inset-0 z-0">
        {{-- pola kiri atas --}}
        <img src="{{ asset('image/beranda/pattern-3_29_11zon.jpg') }}"
            alt="pattern garis kotak atas"
            class="hidden md:block absolute left-0 top-10 md:top-0 w-[240px] md:w-[280px] h-auto opacity-35 select-none">
        <!-- {{-- pola kanan atas --}}
        <img src="{{ asset('image/beranda/pattern-3_29_11zon.jpg') }}"
            alt="" class="hidden md:block absolute right-0 top-0 w-[300px] h-auto opacity-50 mix-blend-screen"> -->
    </div>

    <div class="container-lg relative z-10">
        <div class="grid items-center gap-2 md:gap-2 md:grid-cols-[minmax(0,1fr)_minmax(0,1.2fr)]">
            {{-- Foto metode kerja --}}
            <figure class="mx-auto md:mx-0">
                <div class="about-photo w-full aspect-[4/3] md:aspect-auto md:w-[460px] md:h-[440px] overflow-hidden rounded-3xl">
                    <img
                        src="{{ asset('image/tentangsaya/foto-about-2_98_11zon.jpg') }}"
                        alt="Triawanda Tirta Aditya saat mendampingi peserta"
                        class="h-full w-full object-cover">
                </div>
            </figure>
            <div class="md:pl-4">
                {{-- Garis hijau di tengah --}}
                <div class="text-center mb-6 md:mb-8">
                    <div class="section-title-about-accent mb-4"></div>
                    <h2 class="text-white text-xl md:text-[28px] font-display leading-snug">
                        Metode Praktis yang Berujung Output
                    </h2>
                </div>

                <p class="text-[15px] md:text-[16px] leading-relaxed text-white/85 mb-5">
                    Saya memandu tim melalui empat langkah ringkas agar strategi tidak berhenti di kertas, tapi benar-benar berjalan di lapangan:
                </p>

                <ol class="space-y-3 text-white/90 text-[14px] md:text-[15px]">
                    <li class="flex gap-3">
                        <span class="mt-1 inline-flex h-7 w-7 items-center justify-center rounded-full bg-emerald-400/10 text-emerald-300 text-xs font-semibold">
                            <x-heroicon-o-magnifying-glass class="w-6 h-6" />
                        </span>
                        <p>
                            <span class="font-semibold text-white">
                                Analisis Cepat</span>
                            untuk memetakan tujuan, kanal, dan tantangan tim.
                        </p>
                    </li>
                    <li class="flex gap-3">
                        <span class="mt-1 inline-flex h-7 w-7 items-center justify-center rounded-full bg-emerald-400/10 text-emerald-300 text-xs font-semibold">
                            <x-heroicon-o-light-bulb class="w-6 h-6" />
                        </span>
                        <p>
                            <span class="font-semibold text-white">
                                Strategi Singkat</span>
                            untuk menetapkan posisi, pilar konten, dan kalender publikasi.
                        </p>
                    </li>
                    <li class="flex gap-3">
                        <span class="mt-1 inline-flex h-7 w-7 items-center justify-center rounded-full bg-emerald-400/10 text-emerald-300 text-xs font-semibold">
                            <x-heroicon-o-play class="w-6 h-6" />
                        </span>
                        <p>
                            <span class="font-semibold text-white">
                                Eksekusi Nyata</span>
                            berupa rencana 30 hari lengkap dengan template, kalender, dan panduan produksi.
                        </p>
                    </li>
                    <li class="flex gap-3">
                        <span class="mt-1 inline-flex h-7 w-7 items-center justify-center rounded-full bg-emerald-400/10 text-emerald-300 text-xs font-semibold">
                            <x-heroicon-o-chart-bar class="w-4 h-4" />
                        </span>
                        <p>
                            <span class="font-semibold text-white">
                                Evaluasi &amp; Review</span>
                            dengan indikator sederhana dan sesi tanya jawab /
                            klinik agar rencana benar-benar berjalan.
                        </p>
                    </li>
                </ol>
            </div>

        </div>
    </div>
</section>
{{-- END SLIDE 3 --}}

{{-- SLIDE 4 - HASIL NYATA YANG BISA LANGSUNG DIPAKAI --}}
<section class="relative z-10 pb-16 md:pb-20">
    <div aria-hidden="true"
        class="pointer-events-none absolute inset-0 z-0">
        {{-- pola kanan atas --}}
        <img src="{{ asset('image/beranda/pattern-2_28_11zon.jpg') }}"
            alt="" class="hidden md:block absolute right-0 top-0 w-[300px] h-auto opacity-50 mix-blend-screen">
    </div>
    <div class="container-lg relative z-10">
        <div class="grid gap-6  md:gap-8 md:grid-cols-[minmax(0,1.2fr)_minmax(0,1fr)] items-center">
            <div>
                {{-- Garis hijau di tengah --}}
                <div class="text-center mb-8">
                    <div class="section-title-about-accent mb-4"></div>
                    <h2 class="text-white text-xl md:text-[28px] font-display leading-snug">
                        Hasil Nyata yang Bisa Langsung Dipakai
                    </h2>
                </div>

                <p class="text-[15px] md:text-[17px] leading-relaxed text-white/85 mb-5">
                    Peserta tidak hanya pulang dengan ide, tapi juga paket lengkap untuk 30 hari ke depan:
                </p>

                <ul class="space-y-3 text-[14px] md:text-[15px] text-white/90">
                    <li class="flex gap-3">
                        <span class="mt-1 ">
                            <x-heroicon-o-check-circle class="w-6 h-6 text-emerald-300" />
                        </span>
                        <p>Slide materi yang dirancang sistematis dan mudah ditinjau ulang.</p>
                    </li>
                    <li class="flex gap-3">
                        <span class="mt-1 ">
                            <x-heroicon-o-check-circle class="w-6 h-6 text-emerald-300" />
                        </span>
                        <p>Worksheet dan contoh konten yang bisa langsung diadaptasi.</p>
                    </li>
                    <li class="flex gap-3">
                        <span class="mt-1 ">
                            <x-heroicon-o-check-circle class="w-6 h-6 text-emerald-300" />
                        </span>
                        <p>Kalender konten 30 hari siap pakai.</p>
                    </li>
                    <li class="flex gap-3">
                        <span class="mt-1 ">
                            <x-heroicon-o-check-circle class="w-6 h-6 text-emerald-300" />
                        </span>
                        <p>
                            Tersedia sesi klinik untuk memastikan implementasi berjalan baik.
                        </p>
                    </li>
                </ul>
            </div>

            {{-- Foto hasil / materi (opsional) --}}
            <figure class="mx-auto md:mx-0">
                <div class="about-photo w-full aspect-[4/3] md:aspect-auto md:w-[430px] md:h-[360px] overflow-hidden rounded-3xl">
                    <img
                        src="{{ asset('image/tentangsaya/foto-about-3_99_11zon.jpg') }}"
                        alt="Suasana peserta workshop yang sedang berdiskusi"
                        class="h-full w-full object-cover">
                </div>
            </figure>
        </div>
    </div>
</section>
{{-- END SLIDE 4 --}}

{{-- SLIDE 5 - KEAHLIAN YANG MENDORONG EKSEKUSI --}}
<section class="relative z-10 pb-16 md:pb-20">
    <div aria-hidden="true"
        class="pointer-events-none absolute inset-0 z-0">
        {{-- pola kiri atas --}}
        <img src="{{ asset('image/beranda/pattern-3_29_11zon.jpg') }}"
            alt="pattern garis kotak atas"
            class="hidden md:block absolute left-0 top-10 md:top-0 w-[240px] md:w-[280px] h-auto opacity-40 select-none">
    </div>

    <div class="container-lg relative z-10">
        <div class="grid items-center gap-2 md:gap-2 md:grid-cols-[minmax(0,1fr)_minmax(0,1.2fr)]">

            <figure class="mx-auto md:mx-0">
                <div class="about-photo w-full aspect-[4/3] md:aspect-auto md:w-[470px] md:h-[430px] overflow-hidden rounded-3xl">
                    <img
                        src="{{ asset('image/tentangsaya/foto-about-4_100_11zon.jpg') }}"
                        alt="Triawanda Tirta Aditya sedang presentasi"
                        class="h-full w-full object-cover">
                </div>
            </figure>

            <div class="md:pl-4">
                {{-- Garis hijau di tengah --}}
                <div class="text-center mb-6 md:mb-8">
                    <div class="section-title-about-accent mb-2"></div>
                    <h2 class="text-white text-xl md:text-[28px] font-display leading-snug">
                        Keahlian yang Mendorong Eksekusi
                    </h2>
                </div>


                <div class="grid gap-4 ">
                    <div class="rounded-2xl bg-white/5 border border-white/10 p-5 md:p-6">
                        <h3 class="text-lg font-semibold text-white mb-2">
                            Strategi yang Sederhana &amp; Praktis
                        </h3>
                        <p class="text-sm md:text-[15px] text-white/85">
                            Saya mengubah strategi besar menjadi langkah kecil yang dapat dilakukan segera oleh tim.
                        </p>
                    </div>

                    <div class="rounded-2xl bg-white/5 border border-white/10 p-5 md:p-6">
                        <h3 class="text-lg font-semibold text-white mb-2">
                            Storytelling yang Menggerakkan
                        </h3>
                        <p class="text-sm md:text-[15px] text-white/85">
                            Pendekatan storytelling saya membantu brand dan individu membangun narasi yang otentik dan menggerakkan audiens.
                        </p>
                    </div>

                    <div class="rounded-2xl bg-white/5 border border-white/10 p-5 md:p-6">
                        <h3 class="text-lg font-semibold text-white mb-2">
                            Pendekatan Edukatif &amp; Aplikatif
                        </h3>
                        <p class="text-sm md:text-[15px] text-white/85">
                            Semua disampaikan secara edukatif, interaktif, dan aplikatif, sehingga peserta paham cara kerja, bukan hanya konsep.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- END SLIDE 5 --}}

{{-- SLIDE 6 - KENAPA MEMILIH SAYA --}}
<section class="relative z-10 pb-16 md:pb-20">
    <div aria-hidden="true"
        class="pointer-events-none absolute inset-0 z-0">
        {{-- dekor pattern --}}
        <img src="{{ asset('image/beranda/pattern-8_34_11zon.jpg') }}"
            alt="pattern kanan"
            class="hidden md:block absolute right-0 bottom-0 w-[160px] h-auto opacity-30 select-none">

    </div>
    <div class="container-lg relative z-10">
        {{-- Garis hijau di tengah --}}
        <div class="text-center ,b-6 md:mb-8">
            <div class="section-title-about-accent mb-4"></div>
            <h2 class="text-white text-xl md:text-[28px] font-display leading-snug">
                Kenapa Memilih Saya
            </h2>
        </div>

        <div class="grid gap-5 md:grid-cols-2">
            <div class="rounded-2xl bg-slate-900/81 border border-white/10 shadow-lg p-5 md:p-6">
                <h3 class="text-base md:text-lg font-semibold text-white mb-2">
                    Materi Praktis dan Eksklusif
                </h3>
                <p class="text-sm md:text-[15px] text-white/85">
                    Topik yang saya bawakan bukan teori umum yang mudah ditemukan di internet,
                    tetapi hasil pengalaman nyata di lapangan.
                </p>
            </div>

            <div class="rounded-2xl bg-slate-900/81 border border-white/10 shadow-lg p-5 md:p-6">
                <h3 class="text-base md:text-lg font-semibold text-white mb-2">
                    Berbasis Proyek Nyata
                </h3>
                <p class="text-sm md:text-[15px] text-white/85">
                    Setiap workshop dan mentoring selalu dilengkapi studi kasus, simulasi, dan rencana
                    aksi 30 hari agar peserta langsung bisa praktik.
                </p>
            </div>

            <div class="rounded-2xl bg-slate-900/81 border border-white/10 shadow-lg p-5 md:p-6">
                <h3 class="text-base md:text-lg font-semibold text-white mb-2">
                    Dipercaya Banyak Institusi
                </h3>
                <p class="text-sm md:text-[15px] text-white/85">
                    Sejak 2020, saya telah dipercaya oleh puluhan organisasi pengusaha, universitas,
                    sekolah, hingga lembaga pemerintah.
                </p>
            </div>

            <div class="rounded-2xl bg-slate-900/81 border border-white/10 shadow-lg p-5 md:p-6">
                <h3 class="text-base md:text-lg font-semibold text-white mb-2">
                    Pendekatan Interaktif &amp; Mudah Dipahami
                </h3>
                <p class="text-sm md:text-[15px] text-white/85">
                    Gaya penyampaian saya sederhana, membumi, dan membuat peserta merasa terlibat
                    penuh sepanjang sesi.
                </p>
            </div>

            <div class="rounded-2xl bg-slate-900/81 border border-white/10 shadow-lg p-5 md:p-6 md:col-span-2">
                <h3 class="text-base md:text-lg font-semibold text-white mb-2">
                    Fokus pada Hasil Nyata
                </h3>
                <p class="text-sm md:text-[15px] text-white/85">
                    Bukan hanya diskusi, tapi peserta pulang dengan bekal yang siap diterapkan untuk
                    meningkatkan bisnis atau karier mereka.
                </p>
            </div>
        </div>
    </div>
</section>
{{-- END SLIDE 6 --}}

{{-- SLIDE 7: FOOTER --}}
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
                        Siap mengubah ilmu Digital Marketing jadi strategi nyata untuk bisnis Anda?
                        Yuk mulai bersama saya!
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
{{-- END SLIDE 7: FOOTER --}}

@endsection