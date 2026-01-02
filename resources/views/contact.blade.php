@extends('layouts.site')

{{-- background untuk seluruh halaman kontak --}}
@section('page_bg', 'hero-cover')

@section('content')
{{-- slide 1 --}}
<div class="pt-32 pb-12 md:pt-40 md:pb-16">
    <div class="container-lg">
        {{-- Pattern kiri atas --}}
        <img src="{{ asset('image/kontak/pattern-1_52_11zon.jpg') }}"
            alt=""
            class="pointer-events-none select-none absolute -left-0 w-60 opacity-25 hidden md:block">
        {{-- Pattern kanan bawah --}}
        <img src="{{ asset('image/kontak/pattern-2_53_11zon.jpg') }}"
            alt=""
            class="pointer-events-none select-none absolute -bottom-150 w-60 opacity-25 hidden md:block">

        {{-- Kartu besar biru seperti di desain --}}
        <div class="relative bg-slate-900/81 rounded-3xl shadow-2xl p-8 md:p-10 lg:p-12">
            <div class="flex flex-col md:flex-row gap-10 md:gap-12 items-stretch">
                {{-- KIRI: info kontak --}}
                <div class="md:w-1/2 flex flex-col justify-between gap-8">
                    <div>
                        <h1 class="text-4xl md:text-5xl font-display text-sky-300 mb-4">
                            Kontak
                        </h1>

                        <div class="md:ml-8 lg:ml-10">
                            <h2 class="text-xl md:text-2xl font-display text-white mb-4">
                                Mari Bekerja Sama
                            </h2>
                            <p class="text-sm md:text-base text-white max-w-xl">
                                Jelaskan secara singkat tujuan, jobdesk, atau informasi
                                lain yang ingin kamu sampaikan kepada pengunjung.
                                Gunakan bagian ini untuk mengundang mereka menghubungi kamu.
                            </p>
                        </div>
                    </div>

                    {{-- Box info (telepon, email, instagram, youtube, tiktok) --}}
                    <div class="space-y-4">
                        <div class="flex items-center gap-4 bg-slate-800/80 rounded-2xl px-4 py-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-sky-500/90 text-white text-lg">
                                <x-heroicon-o-phone class="w-5 h-5" />
                            </div>
                            <div>
                                <p class="text-xs text-slate-300/70">Nomor Telepon</p>
                                <p class="text-sm md:text-base text-slate-50">
                                    +62 896-704-1350
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 bg-slate-800/80 rounded-2xl px-4 py-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-sky-500/90 text-white text-lg">
                                <x-heroicon-o-envelope class="w-5 h-5" />
                            </div>
                            <div>
                                <p class="text-xs text-slate-300/70">Email</p>
                                <p class="text-sm md:text-base text-slate-50">
                                    tagalleryagency@gmail.com
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 bg-slate-800/80 rounded-2xl px-4 py-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-sky-500/90 text-white text-lg">
                                <x-si-instagram class="w-5 h-5" />
                            </div>
                            <div>
                                <p class="text-xs text-slate-300/70">Instagram</p>
                                <p class="text-sm md:text-base text-slate-50">
                                    @triawandaaditya
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 bg-slate-800/80 rounded-2xl px-4 py-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-sky-500/90 text-white text-lg">
                                <x-si-youtube class="w-5 h-5" />
                            </div>
                            <div>
                                <p class="text-xs text-slate-300/70">Youtube</p>
                                <p class="text-sm md:text-base text-slate-50">
                                    @taggallery5513
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 bg-slate-800/80 rounded-2xl px-4 py-3">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-sky-500/90 text-white text-lg">
                                <x-si-tiktok class="w-5 h-5" />
                            </div>
                            <div>
                                <p class="text-xs text-slate-300/70">TikTok</p>
                                <p class="text-sm md:text-base text-slate-50">
                                    @tagallery
                                </p>
                            </div>
                        </div>


                    </div>

                </div>

                {{-- KANAN: form kontak (kartu gelap dengan shadow) --}}
                <div class="md:w-1/2">
                    <div class="bg-slate-950/95 rounded-3xl shadow-xl px-6 py-7 sm:px-8 sm:py-8">
                        <!-- <h3 class="text-xl font-semibold text-white mb-4">
                            Kirim Pesan
                        </h3> -->

                        {{-- Alert sukses & error global --}}
                        @if(session('ok'))
                        <div class="mb-4 rounded-2xl bg-emerald-500/10 border border-emerald-400/40 text-emerald-100 px-3 py-2 text-sm">
                            {{ session('ok') }}
                        </div>
                        @endif

                        @if($errors->any())
                        <div class="mb-4 rounded-2xl bg-red-500/10 border border-red-500/60 text-red-100 px-3 py-2 text-sm">
                            Ada yang perlu diperbaiki. Silakan cek isian di bawah.
                        </div>
                        @endif

                        <form
                            id="contact-form"
                            method="POST"
                            action="{{ route('contact.send') }}"
                            class="space-y-4">
                            @csrf
                            {{-- honeypot --}}
                            <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off">

                            {{-- Nama Lengkap --}}
                            <div>
                                <label class="block text-xs font-medium text-slate-200 mb-1">
                                    Nama Lengkap
                                </label>
                                <input
                                    name="name"
                                    value="{{ old('name') }}"
                                    required
                                    class="w-full rounded-full border border-slate-700 bg-slate-900/80 text-slate-50 text-sm px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 placeholder:text-slate-400"
                                    placeholder="Brian Clark">
                                @error('name')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div>
                                <label class="block text-xs font-medium text-slate-200 mb-1">
                                    Alamat Email
                                </label>
                                <input
                                    type="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    class="w-full rounded-full border border-slate-700 bg-slate-900/80 text-slate-50 text-sm px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 placeholder:text-slate-400"
                                    placeholder="example@youremail.com">
                                @error('email')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Nomor Telepon (opsional, cuma tampilan dulu) --}}
                            <div>
                                <label class="block text-xs font-medium text-slate-200 mb-1">
                                    Nomor Telepon
                                </label>
                                <input
                                    type="tel"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    class="w-full rounded-full border border-slate-700 bg-slate-900/80 text-slate-50 text-sm px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 placeholder:text-slate-400"
                                    placeholder="+62 123 - 4567">
                                {{-- kalau nanti divalidasi bisa pakai @error('phone') di sini --}}
                            </div>

                            {{-- Kategori (pakai field subject di backend) --}}
                            <div>
                                <label class="block text-xs font-medium text-slate-200 mb-1">
                                    Kategori
                                </label>
                                <input
                                    name="subject"
                                    value="{{ old('subject') }}"
                                    required
                                    class="w-full rounded-full border border-slate-700 bg-slate-900/80 text-slate-50 text-sm px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 placeholder:text-slate-400"
                                    placeholder="mis. Mentoring">
                                @error('subject')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Pesan --}}
                            <div>
                                <label class="block text-xs font-medium text-slate-200 mb-1">
                                    Pesan
                                </label>
                                <textarea
                                    name="message"
                                    rows="4"
                                    required
                                    class="w-full rounded-2xl border border-slate-700 bg-slate-900/80 text-slate-50 text-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 placeholder:text-slate-400 resize-none"
                                    placeholder="Tulis pesan Anda di sini...">{{ old('message') }}</textarea>
                                @error('message')
                                <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Turnstile (opsional) --}}
                            <div class="mt-2">
                                <div class="cf-turnstile" data-sitekey="{{ env('TURNSTILE_SITE_KEY') }}"></div>
                            </div>

                            <button class="btn-primary w-full mt-4">
                                Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end slide 1 --}}

{{-- slide 2 --}}
<div class="pt-10 pb-24">
    <div class="container-lg">
        {{-- Judul --}}
        <div class="text-center mb-10 md:mb-12">
            <div class="section-title-about-accent mb-4"></div>
            <h2 class="text-3xl md:text-4xl font-display text-white">
                Informasi kontak tambahan
            </h2>
            <p class="mt-3 text-sm md:text-base text-slate-300 max-w-2xl mx-auto">
                Selain form utama, Anda juga bisa hubungi saya lewat kontak di bawah ini.
                Pilih yang paling gampang buat Anda, saya siap merespons.
            </p>
        </div>

        <div class="flex flex-col md:flex-row gap-10 md:gap-14 items-stretch">
            {{-- FOTO KIRI --}}
            <div class="md:w-[45%]">
                <div class="overflow-hidden rounded-3xl shadow-2xl border border-slate-800/70">
                    {{-- GANTI nama file sesuai foto kamu di folder public/image/kontak --}}
                    <img src="{{ asset('image/kontak/foto-kontak_50_11zon.jpg') }}"
                        alt="Foto narasumber"
                        class="h-118 object-cover">
                </div>
            </div>

            {{-- KARTU-KARTU KONTAK KANAN --}}
            <div class="flex-1 space-y-5">
                {{-- Ngobrol Langsung --}}
                <div class="bg-slate-900/80 rounded-3xl px-6 py-5 border border-sky-500/40 flex flex-col sm:flex-row sm:items-center gap-4">
                    <div class="flex h-11 w-11 items-center justify-center rounded-full bg-sky-500 text-white shrink-0">
                        <x-heroicon-o-phone class="w-5 h-5" />
                    </div>
                    <div>
                        <h3 class="text-base md:text-lg font-semibold text-white">
                            Ngobrol Langsung
                        </h3>
                        <p class="text-xs md:text-sm text-slate-200/80">
                            Ingin respon cepat? Hubungi saya langsung lewat telepon atau WhatsApp.
                        </p>
                        <p class="mt-2 text-sm md:text-base font-medium text-slate-50">
                            +62 896-7074-1260
                        </p>
                    </div>
                </div>

                {{-- Kirim Pesan via Email --}}
                <div class="bg-slate-900/80 rounded-3xl px-6 py-5 border border-sky-500/40 flex flex-col sm:flex-row sm:items-center gap-4">
                    <div class="flex h-11 w-11 items-center justify-center rounded-full bg-sky-500 text-white shrink-0">
                        <x-heroicon-o-envelope class="w-5 h-5" />
                    </div>
                    <div>
                        <h3 class="text-base md:text-lg font-semibold text-white">
                            Kirim Pesan via Email
                        </h3>
                        <p class="text-xs md:text-sm text-slate-200/80">
                            Untuk kebutuhan formal atau kirim dokumen, Anda bisa kontak saya lewat email.
                        </p>
                        <p class="mt-2 text-sm md:text-base font-medium text-slate-50">
                            taggalleryagency@gmail.com
                        </p>
                    </div>
                </div>

                {{-- Chat Sekarang --}}
                <div class="bg-slate-900/80 rounded-3xl px-6 py-5 border border-sky-500/40 flex flex-col sm:flex-row sm:items-center gap-4">
                    <div class="flex h-11 w-11 items-center justify-center rounded-full bg-sky-500 text-white shrink-0">
                        <x-heroicon-o-chat-bubble-left-right class="w-5 h-5" />
                    </div>
                    <div>
                        <h3 class="text-base md:text-lg font-semibold text-white">
                            Chat Sekarang
                        </h3>
                        <p class="text-xs md:text-sm text-slate-200/80">
                            Lebih nyaman lewat chat? Silakan hubungi saya lewat platform
                            sosial media atau DM.
                        </p>
                        <button class="btn-primary mt-3">
                            Chat sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end slide 2 --}}

{{-- slide 3 --}}
<div class="pt-10 pb-24">
    <div class="container-lg">
        {{-- Kartu besar FAQ --}}
        <div class="relative bg-slate-900/81 rounded-3xl shadow-2xl px-6 py-10 md:px-12 md:py-12 overflow-hidden">
            {{-- pattern kiri --}}
            <img src="{{ asset('image/kontak/pattern-1_52_11zon.jpg') }}"
                alt=""
                class="pointer-events-none select-none absolute left-0 top-0 h-65 opacity-20 hidden md:block">
            {{-- pattern kanan --}}
            <img src="{{ asset('image/kontak/pattern-2_53_11zon.jpg') }}"
                alt=""
                class="pointer-events-none select-none absolute right-0 bottom-0 h-65 opacity-20 hidden md:block">

            <div class="relative z-10">
                {{-- Judul --}}
                <div class="text-center max-w-2xl mx-auto mb-10 md:mb-12">
                    <div class="section-title-about-accent mb-4"></div>
                    <h2 class="text-3xl md:text-4xl font-display text-white">
                        Pertanyaan yang Sering Diajukan
                    </h2>
                </div>

                {{-- List FAQ --}}
                <div class="max-w-2xl mx-auto space-y-4">
                    {{-- ITEM 1 - default TERBUKA --}}
                    <div class="faq-item rounded-2xl bg-slate-950/90 border border-sky-500/40 px-5 py-4 shadow-md">
                        <button type="button"
                            class="faq-toggle flex w-full items-center justify-between gap-4"
                            data-faq-target="faq-1">
                            <p class="text-sm md:text-base font-semibold text-slate-50 text-left">
                                Apakah saya akan berkomunikasi langsung dengan Anda?
                            </p>
                            <span class="flex h-7 w-7 items-center justify-center rounded-full bg-sky-500 text-white shrink-0">
                                {{-- icon plus/minus --}}
                                <x-heroicon-o-plus class="w-4 h-4 faq-icon-plus hidden" />
                                <x-heroicon-o-minus class="w-4 h-4 faq-icon-minus" />
                            </span>
                        </button>
                        <div id="faq-1"
                            class="faq-answer mt-2 text-xs md:text-sm leading-relaxed text-slate-200/90
                                    overflow-hidden transition-all duration-300 ease-out
                                    max-h-40 opacity-100 faq-open">
                            Ya. Anda akan berkomunikasi langsung dengan saya mulai dari tahap briefing, persiapan materi,
                            hingga evaluasi setelah acara. Saya dapat dihubungi melalui WhatsApp atau email dan biasanya
                            merespons maksimal dalam 24 jam pada hari kerja.
                        </div>
                    </div>

                    {{-- ITEM 2 --}}
                    <div class="faq-item rounded-2xl bg-slate-950/90 border border-sky-500/40 px-5 py-4 shadow-md">
                        <button type="button"
                            class="faq-toggle flex w-full items-center justify-between gap-4"
                            data-faq-target="faq-2">
                            <p class="text-sm md:text-base font-semibold text-slate-50 text-left">
                                Durasi workshop paling efisien diadakan berapa lama ?
                            </p>
                            <span class="flex h-7 w-7 items-center justify-center rounded-full bg-sky-500 text-white shrink-0">
                                <x-heroicon-o-plus class="w-4 h-4 faq-icon-plus" />
                                <x-heroicon-o-minus class="w-4 h-4 faq-icon-minus hidden" />
                            </span>
                        </button>
                        <div id="faq-2"
                            class="faq-answer mt-2 text-xs md:text-sm leading-relaxed text-slate-200/90
                                    overflow-hidden transition-all duration-300 ease-out
                                    max-h-0 opacity-0">
                            Format paling singkat biasanya 3 jam untuk sesi pengenalan dan praktik dasar. Untuk program
                            yang lebih mendalam, seperti pendampingan project atau penyusunan kurikulum, durasi dapat
                            disesuaikan antara 1 hingga 5 hari sesuai kebutuhan instansi.
                        </div>
                    </div>

                    {{-- ITEM 3 --}}
                    <div class="faq-item rounded-2xl bg-slate-950/90 border border-sky-500/40 px-5 py-4 shadow-md">
                        <button type="button"
                            class="faq-toggle flex w-full items-center justify-between gap-4"
                            data-faq-target="faq-3">
                            <p class="text-sm md:text-base font-semibold text-slate-50 text-left">
                                Apa output yang dibawa pulang peserta?
                            </p>
                            <span class="flex h-7 w-7 items-center justify-center rounded-full bg-sky-500 text-white shrink-0">
                                <x-heroicon-o-plus class="w-4 h-4 faq-icon-plus" />
                                <x-heroicon-o-minus class="w-4 h-4 faq-icon-minus hidden" />
                            </span>
                        </button>
                        <div id="faq-3"
                            class="faq-answer mt-2 text-xs md:text-sm leading-relaxed text-slate-200/90
                                    overflow-hidden transition-all duration-300 ease-out
                                    max-h-0 opacity-0">
                            Peserta pulang dengan pemahaman praktis, materi dan worksheet yang bisa langsung digunakan,
                            serta rencana aksi untuk bisnis atau karier mereka. Selain itu, mereka juga mendapatkan
                            kesempatan membangun networking dengan pelaku usaha dan profesional lain di kelas.
                        </div>
                    </div>

                    {{-- ITEM 4 --}}
                    <div class="faq-item rounded-2xl bg-slate-950/90 border border-sky-500/40 px-5 py-4 shadow-md">
                        <button type="button"
                            class="faq-toggle flex w-full items-center justify-between gap-4"
                            data-faq-target="faq-4">
                            <p class="text-sm md:text-base font-semibold text-slate-50 text-left">
                                Apakah Anda bisa diundang ke luar kota?
                            </p>
                            <span class="flex h-7 w-7 items-center justify-center rounded-full bg-sky-500 text-white shrink-0">
                                <x-heroicon-o-plus class="w-4 h-4 faq-icon-plus" />
                                <x-heroicon-o-minus class="w-4 h-4 faq-icon-minus hidden" />
                            </span>
                        </button>
                        <div id="faq-4"
                            class="faq-answer mt-2 text-xs md:text-sm leading-relaxed text-slate-200/90
                                    overflow-hidden transition-all duration-300 ease-out
                                    max-h-0 opacity-0">
                            Bisa. Saya melayani kerja sama di berbagai kota di Indonesia. Penyesuaian biaya transportasi
                            dan akomodasi akan dibahas sejak awal, sesuai lokasi dan durasi kegiatan.
                        </div>
                    </div>

                    {{-- ITEM 5 --}}
                    <div class="faq-item rounded-2xl bg-slate-950/90 border border-sky-500/40 px-5 py-4 shadow-md">
                        <button type="button"
                            class="faq-toggle flex w-full items-center justify-between gap-4"
                            data-faq-target="faq-5">
                            <p class="text-sm md:text-base font-semibold text-slate-50 text-left">
                                Apakah materi workshop bisa disesuaikan dengan kebutuhan instansi kami?
                            </p>
                            <span class="flex h-7 w-7 items-center justify-center rounded-full bg-sky-500 text-white shrink-0">
                                <x-heroicon-o-plus class="w-4 h-4 faq-icon-plus" />
                                <x-heroicon-o-minus class="w-4 h-4 faq-icon-minus hidden" />
                            </span>
                        </button>
                        <div id="faq-5"
                            class="faq-answer mt-2 text-xs md:text-sm leading-relaxed text-slate-200/90
                                    overflow-hidden transition-all duration-300 ease-out
                                    max-h-0 opacity-0">
                            Tentu. Sebelum acara, kita akan melakukan sesi konsultasi singkat untuk memahami profil
                            peserta, tujuan acara, dan konteks industri Anda. Dari situ, materi, contoh kasus, dan
                            latihan akan disesuaikan agar lebih relevan dan aplikatif.
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- end slide 3 --}}

{{-- slide 4 --}}
<div class="pb-24">
    <div class="container-lg">
        <div
            class="relative bg-slate-900/81 rounded-3xl shadow-2xl px-6 py-10 md:px-12 md:py-12 flex flex-col md:flex-row gap-10 items-stretch">

            {{-- KIRI: teks & info kontak --}}
            <div class="md:w-[45%] space-y-5">
                <div class="flex items-center gap-3 mb-1">
                    <div class="section-title-about-accent-vertical"></div>
                    <h2 class="text-3xl md:text-4xl font-display text-white">
                        Lokasi Kantor
                    </h2>
                </div>
                <p class="text-lg md:text-xl text-slate-100">
                    Semarang, Indonesia
                </p>

                <div class="mt-3 space-y-3 text-sm md:text-base text-slate-200">
                    {{-- WhatsApp --}}
                    <div class="flex items-center gap-3">
                        <span
                            class="flex h-9 w-9 items-center justify-center rounded-full bg-sky-500/90 text-white">
                            <x-si-whatsapp class="w-4 h-4" />
                        </span>
                        <span>+62 896-7074-1260</span>
                    </div>

                    {{-- Email --}}
                    <div class="flex items-center gap-3">
                        <span
                            class="flex h-9 w-9 items-center justify-center rounded-full bg-sky-500/90 text-white">
                            <x-heroicon-o-envelope class="w-4 h-4" />
                        </span>
                        <span>taggalleryagency@gmail.com</span>
                    </div>

                    {{-- Alamat --}}
                    <div class="flex items-start gap-3">
                        <span
                            class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-sky-500/90 text-white">
                            <x-heroicon-o-map-pin class="w-4 h-4" />
                        </span>

                        <span class="mt-0.5 leading-relaxed text-sm md:text-base text-slate-200">
                            Perumahan Graha Estetika, Jl. Ceria Tengah No G3,
                            Pedalangan, Kec. Banyumanik,
                            Kota Semarang, Jawa Tengah 50268
                        </span>

                    </div>
                </div>
            </div>

            {{-- KANAN: peta --}}
            <div class="flex-1">
                <div class="overflow-hidden rounded-3xl shadow-2xl border border-slate-800/70 bg-slate-950">
                    {{-- GANTI iframe DI BAWAH INI DENGAN iframe DARI GOOGLE MAPS --}}
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.5252274416453!2d110.429186609904!3d-7.0649329929081635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708f0064f2c2b7%3A0xbc411cc77c50ba3d!2sTAG%20Gallery%20Agency!5e0!3m2!1sen!2sid!4v1764009163019!5m2!1sen!2sid"
                        width="600"
                        height="450"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end slide 4 --}}

{{-- slide 5 --}}
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

                <a href="#contact-form"
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
{{-- end slide 5 --}}

{{-- Script Turnstile --}}
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

@endsection