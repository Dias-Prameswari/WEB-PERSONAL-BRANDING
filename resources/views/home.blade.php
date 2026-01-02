@extends('layouts.site')

{{-- background untuk seluruh halaman kontak --}}
@section('page_bg', 'hero-cover')

@section('content')
{{-- SLIDE 1: HERO --}}
<section class="hero-cover text-ink pt-20 md:pt-24 pb-14 md:pb-20">
  <div class="container-lg grid md:grid-cols-2 gap-10 items-center">
    {{-- Kiri: Teks --}}
    <div>
      <h1 class="font-display text-white text-[44px] md:text-[64px] leading-tight md:-mt-2">
        Triawanda Tirta<br />Aditya
      </h1>

      <p class="mt-5 max-w-md text-white/85">
        Praktisi Digital Marketing & Content Creator.
        Optimalkan potensi brand anda, bermodal ide berubah jadi aksi melalui Workshop and Training.
      </p>

      <div class="mt-7 flex flex-wrap gap-3">
        <a href="{{ route('contact') }}" class="btn-primary btn-raise">Minta Proposal</a>
        <a href="{{ route('blog.portofolio') }}" class="btn-outline btn-raise">Lihat Portofolio</a>
      </div>

      {{-- Dipercaya oleh --}}
      <div class="mt-10 flex items-start gap-6 md:gap-8">
        {{-- Kolom kiri: judul + deret logo bulat --}}
        <div class="shrink-0">
          <div class="text-white font-display">Dipercaya oleh</div>
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
      <img
        src="{{ asset('image/beranda/foto-ceo-cover_2_11zon-1.png') }}"
        alt="Triawanda Tirta Aditya"
        class="md:absolute md:right-0 md:bottom-[-99px] md:h-[640px] w-auto object-contain glow-teal" />
    </div>
  </div>
</section>
{{-- END SLIDE 1: HERO --}}

{{-- SLIDE 2: TENTANG SAYA --}}
<section id="tentang-saya"
  class="relative overflow-hidden py-16 md:py-20 text-ink">

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

    {{-- radial glow kanan-atas --}}
    <div class="absolute right-[-140px] -top-10 md:-top-16 w-[620px] h-[320px] opacity-70 rotate-[-30deg]
            [background:radial-gradient(50%_50%_at_81%_56%,rgba(69,222,255,1)_0%,rgba(7,255,214,0)_100%)]">
    </div>
  </div>

  <div class="relative z-10 container-lg py-12 md:py-20">
    {{-- Garis hijau di tengah --}}
    <div class="text-center">
      <div class="section-title-about-accent mb-4"></div>
      <h2 class="section-title-about">
        Praktisi Content Creator dan Digital Marketing
      </h2>
    </div>

    {{-- Grid konten: foto kiri, teks kanan --}}
    <div class="mt-8 md:mt-10 grid items-center gap-10 md:gap-14 grid-cols-1 md:grid-cols-2">
      {{-- Foto (kunci rasio agar tidak panjang) --}}
      <figure class="mx-auto md:mx-0">
        {{-- wrapper buat kunci rasio supaya foto tidak “panjang” --}}
        <div class="about-photo w-full aspect-[4/3] md:aspect-auto md:w-[480px] md:h-[480px]">
          <img
            src="{{ asset('image/beranda/foto-about_1_11zon.jpg') }}"
            alt="Triawanda Tirta Aditya saat memaparkan materi"
            class="h-full w-full object-cover">
        </div>
      </figure>

      {{-- Teks --}}
      <div>
        <p class="text-[16px] md:text-[18px] leading-7 text-white/90 font-medium max-w-[56ch]">
          Saya adalah Content Creator sekaligus Founder & CEO Taggallery Agency.
          Dipercaya lebih dari 20 Organisasi Pengusaha, Universitas, Corporate, SMK,
          dan Government untuk menjadi narasumber dan mentor di berbagai workshop.
          Saya Memberikan pelatihan berkelas yang materinya tidak banyak tersebar di internet,
          serta dominan sesi praktek base on real project.
        </p>

        <div class="mt-7 md:mt-8 flex flex-wrap items-center gap-4">
          <a href="{{ route('about') }}" class="btn-primary btn-raise
          inline-flex items-center gap-2 ">
            Selengkapnya
            <x-heroicon-o-arrow-right class="w-4 h-4" />
          </a>
          <a href="{{ route('blog.portofolio') }}" class="btn-outline btn-raise">Lihat Portofolio</a>
        </div>
      </div>
    </div>
  </div>
</section>
{{-- END SLIDE 2: TENTANG SAYA --}}

{{-- SLIDE 3: LAYANAN --}}
<section class="relative overflow-hidden py-16 md:py-20 text-ink">
  {{-- DEKOR: pakai gambar + radial glow, tidak mengganggu klik --}}
  <div class="pointer-events-none absolute inset-0 select-none z-0">
    {{-- radial glow kiri-atas (copy gaya slide-2) --}}
    <div class="absolute left-[-180px] top-[-0px] md:left-[-180px] md:top-[-26px]
            w-[945px] h-[850px] md:w-[1000px] md:h-[600px]
            opacity-64 rotate-[22deg]
            [background:radial-gradient(50%_50%_at_20%_52%,rgba(69,222,255,1)_0%,rgba(7,255,214,0)_68%)]">
    </div>

    {{-- garis kotak kanan (pakai PNG) --}}
    <img src="{{ asset('image/beranda/pattern-2_28_11zon.jpg') }}"
      alt="" class="hidden md:block absolute right-0 top-0 w-[300px] h-auto opacity-50 mix-blend-screen">
    <img src="{{ asset('image/beranda/pattern-1_27_11zon.jpg') }}"
      alt="" class="hidden md:block absolute right-0 top-[220px] w-[300px] h-auto opacity-50 mix-blend-screen">

  </div>

  <div class="container-lg">
    {{-- heading --}}
    <div class="text-center">
      <div class="section-title-accent mb-4"></div>
      <h2 class="section-title">Our Service</h2>
    </div>

    {{-- carousel --}}
    <div class="relative mt-10" data-carousel>
      {{-- tombol kiri --}}
      <button class="circle-nav absolute -left-7 md:-left-8 top-1/2 -translate-y-1/2 z-10"
        aria-label="Sebelumnya" data-prev>
        <!-- icon panah kiri -->
        <svg width="24" height="24" viewBox="0 0 24 24" aria-hidden="true">
          <path d="M14.5 6.5 9 12l5.5 5.5"
            fill="none" stroke="currentColor" stroke-width="2.2"
            stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </button>

      {{-- viewport --}}
      <div class="overflow-x-auto no-scrollbar snap-x-mandatory px-2" data-viewport>
        <div class="flex items-stretch gap-6 md:gap-8 min-w-full" data-track>
          @foreach ($services as $s)
          <article class="service-card service-card-hover shrink-0 snap-center
                            w-[86%] sm:w-[70%] md:w-[32%]">
            {{-- gambar stabil --}}
            <div class="service-media">
              <img src="{{ asset($s->image_url) }}" 
              alt="{{ $s->title }}" 
              class="service-img">
            </div>
            <div class="pt-5">
              <h3 class="text-xl md:text-2xl font-semibold">{{ $s->title }}</h3>
              <p class="mt-3 text-white/85 text-sm leading-relaxed">{{ $s->excerpt }}</p>
            </div>
          </article>
          @endforeach
        </div>
      </div>

      {{-- tombol kanan --}}
      <button class="circle-nav absolute -right-7 md:-right-8 top-1/2 -translate-y-1/2 z-10"
        aria-label="Berikutnya" data-next>
        <!-- icon panah kanan -->
        <svg width="24" height="24" viewBox="0 0 24 24" aria-hidden="true">
          <path d="M9.5 6.5 15 12l-5.5 5.5"
            fill="none" stroke="currentColor" stroke-width="2.2"
            stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </button>
    </div>

    {{-- CTA bawah --}}
    <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
      <a href="{{ route('contact') }}" class="btn-primary btn-raise">Konsultasi Gratis</a>
      <a href="{{ url('/layanan') }}" class="btn-outline btn-raise">Lihat Semua Layanan →</a>
    </div>
  </div>
</section>
{{-- END SLIDE 3: LAYANAN --}}

{{-- SLIDE 4: STORIES --}}
<section class="relative overflow-hidden py-16 md:py-20">
  {{-- DEKORASI BACKGROUND (garis kotak + glow) --}}
  <div class="pointer-events-none absolute inset-0 z-0 select-none">
    {{-- pola garis kanan (boleh pakai aset yang sama seperti slide 3) --}}
    <img src="{{ asset('image/beranda/pattern-2_28_11zon.jpg') }}"
      alt="" class="hidden md:block absolute right-0 top-0 w-[260px] h-auto opacity-70 mix-blend-screen">
    {{-- radial glow di belakang card --}}
    <div class="absolute right-[-140px] top-[80px] w-[520px] h-[320px] opacity-70 rotate-[-20deg]
                [background:radial-gradient(50%_50%_at_81%_56%,rgba(69,222,255,1)_0%,rgba(7,255,214,0)_100%)]">
    </div>
  </div>

  <div class="relative z-10 container-lg">
    {{-- JUDUL SECTION --}}
    <div class="mb-8 md:mb-10">
      <div class="flex items-center gap-3">
        <span class="block h-[3px] w-10 rounded-full bg-[var(--color-accent)]"></span>
        <h2 class="text-white text-xl md:text-[28px] font-display leading-snug">
          Cerita dari Sesi Pelatihan &amp; Pendampingan
        </h2>
      </div>
    </div>

    {{-- CAROUSEL CERITA --}}
    <div class="relative" data-carousel="stories">
      {{-- tombol kiri --}}
      <button class="circle-nav absolute -left-5 md:-left-8 top-1/2 -translate-y-1/2 z-10"
        aria-label="Cerita sebelumnya" data-prev>
        <svg width="24" height="24" viewBox="0 0 24 24" aria-hidden="true">
          <path d="M14.5 6.5 9 12l5.5 5.5"
            fill="none" stroke="currentColor" stroke-width="2.2"
            stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </button>

      {{-- viewport --}}
      <div class="overflow-x-auto no-scrollbar snap-x-mandatory" data-viewport>
        <div class="flex items-stretch gap-6 min-w-full pr-4" data-track>
          @foreach ($stories as $story)
          <article class="snap-center shrink-0 w-[92%] md:w-full">
            <div class="service-card service-card-hover backdrop-blur-sm border border-white/10
                  rounded-[32px] px-4 py-5 md:px-8 md:py-7
                  flex flex-col md:flex-row items-stretch gap-6 md:gap-8">
              {{-- FOTO --}}
              <div class="md:w-[40%]">
                <div class="story-media">
                  <img src="{{ asset($story->image_url) }}"
                    alt="{{ $story->title }}"
                    class="story-img">
                </div>
              </div>

              {{-- TEKS --}}
              <div class="md:w-[60%] flex flex-col justify-between">
                <div>
                  <h3 class="text-white text-xl md:text-2xl font-semibold">
                    {{ $story->title }}
                  </h3>
                  <p class="mt-3 text-sm md:text-base text-white/85 leading-relaxed">
                    {{ $story->description }}
                  </p>
                </div>

                <div class="mt-4">
                  <a href="{{ route('blog.portofolio') }}"
                    class="inline-flex items-center gap-2 px-5 py-2 rounded-full
                      border border-white/70 text-sm font-medium text-white
                      hover:bg-white hover:text-[var(--color-brand)] transition">
                    Selengkapnya
                    <span aria-hidden="true">→</span>
                  </a>
                </div>
              </div>
            </div>
          </article>
          @endforeach
        </div>

      </div>

      {{-- tombol kanan --}}
      <button class="circle-nav absolute -right-5 md:-right-8 top-1/2 -translate-y-1/2 z-10"
        aria-label="Cerita berikutnya" data-next>
        <svg width="24" height="24" viewBox="0 0 24 24" aria-hidden="true">
          <path d="M9.5 6.5 15 12l-5.5 5.5"
            fill="none" stroke="currentColor" stroke-width="2.2"
            stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </button>
    </div>

    {{-- CTA BAWAH --}}
    <div class="mt-10 flex justify-center">
      <a href="{{ route('contact') }}" class="btn-primary btn-raise">
        Hubungi Saya →
      </a>
    </div>
  </div>
</section>
{{-- END SLIDE 4: STORIES --}}

{{-- SLIDE 5: TESTIMONI KLIEN --}}
<section class="relative overflow-hidden py-16 md:py-20">
  {{-- DEKORASI BACKGROUND --}}
  <div class="pointer-events-none absolute inset-0 z-0 select-none">
    {{-- pola garis kiri (boleh pakai pattern yang sama dengan slide 2) --}}
    <img src="{{ asset('image/beranda/pattern-3_29_11zon.jpg') }}"
      alt="" class="hidden md:block absolute left-0 top-0 w-[260px] h-auto opacity-60 mix-blend-screen">
    <img src="{{ asset('image/beranda/pattern-4_30_11zon.jpg') }}"
      alt="" class="hidden md:block absolute left-0 top-[220px] w-[260px] h-auto opacity-50 mix-blend-screen">

    {{-- radial glow di belakang card --}}
    <div class="absolute right-[-120px] top-[120px] w-[520px] h-[320px] opacity-70 rotate-[-18deg]
                [background:radial-gradient(50%_50%_at_81%_56%,rgba(69,222,255,1)_0%,rgba(7,255,214,0)_100%)]">
    </div>
  </div>

  <div class="relative z-10 container-lg">
    {{-- JUDUL --}}
    <div class="text-center mb-3">
      <div class="section-title-accent mb-4"></div>
      <h2 class="section-title">
        Suara Klien, Bukti Nyata
      </h2>
      <p class="mt-3 text-sm md:text-base text-white/80 max-w-2xl mx-auto">
        Dengarkan langsung pengalaman mereka setelah bekerja sama dengan saya.
      </p>
    </div>

    {{-- CAROUSEL TESTIMONI --}}
    <div class="relative mt-10" data-carousel="testimonials">
      {{-- tombol kiri --}}
      <button class="circle-nav absolute -left-7 md:-left-8 top-1/2 -translate-y-1/2 z-10"
        aria-label="Testimoni sebelumnya" data-prev>
        <svg width="24" height="24" viewBox="0 0 24 24" aria-hidden="true">
          <path d="M14.5 6.5 9 12l5.5 5.5"
            fill="none" stroke="currentColor" stroke-width="2.2"
            stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </button>

      {{-- viewport --}}
      <div class="overflow-x-auto no-scrollbar snap-x-mandatory px-2" data-viewport>
        <div class="flex items-stretch gap-6 md:gap-8 min-w-full" data-track>
          @foreach ($testimonials as $t)
          <article class="service-card service-card-hover shrink-0 snap-center
                            w-[86%] sm:w-[70%] md:w-[32%] flex flex-col justify-between">
            {{-- Logo + nama klien --}}
            <div>
              <div class="flex items-center gap-3">
                <div class="h-11 w-11 rounded-full bg-white flex items-center justify-center overflow-hidden">
                  <img src="{{ asset($t['logo']) }}" alt="{{ $t['client'] }}" class="h-9 w-9 object-contain">
                </div>
                <p class="text-sm font-semibold text-white/90 leading-snug">
                  {{ $t['client'] }}
                </p>
              </div>

              {{-- isi testimoni --}}
              <p class="mt-4 text-sm text-white/85 leading-relaxed">
                {{ $t['quote'] }}
              </p>
            </div>

            {{-- rating --}}
            <div class="mt-5 flex items-center justify-between">
              <div class="flex items-center gap-1 text-yellow-400">
                @for ($i = 0; $i < 5; $i++)
                  <svg class="w-4 h-4" viewBox="0 0 20 20" aria-hidden="true">
                  <path d="M10 1.5 12.59 7l5.41.44-4.11 3.53 1.27 5.53L10 13.9 4.84 16.5 6.11 11 2 7.44 7.41 7 10 1.5Z"
                    fill="currentColor" />
                  </svg>
                  @endfor
              </div>
              <div class="text-sm font-semibold text-white/85">
                {{ $t['rating'] }}
              </div>
            </div>
          </article>
          @endforeach
        </div>
      </div>

      {{-- tombol kanan --}}
      <button class="circle-nav absolute -right-7 md:-right-8 top-1/2 -translate-y-1/2 z-10"
        aria-label="Testimoni berikutnya" data-next>
        <svg width="24" height="24" viewBox="0 0 24 24" aria-hidden="true">
          <path d="M9.5 6.5 15 12l-5.5 5.5"
            fill="none" stroke="currentColor" stroke-width="2.2"
            stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </button>
    </div>
  </div>
</section>
{{-- END SLIDE 5: TESTIMONI KLIEN --}}

{{-- SLIDE 6: ARTIKEL & INSIGHT --}}
<section class="relative overflow-hidden py-16 md:py-20">
  {{-- DEKORASI BACKGROUND --}}
  <div class="pointer-events-none absolute inset-0 z-0 select-none">
    {{-- pola garis kiri bawah --}}
    <img src="{{ asset('image/beranda/pattern-5_31_11zon.jpg') }}"
      alt="" class="hidden md:block absolute left-0 bottom-0 w-[275px] h-auto opacity-55 mix-blend-screen">

    {{-- radial glow kanan atas --}}
    <div class="absolute right-[-140px] top-[-40px] w-[520px] h-[320px] opacity-70 rotate-[-18deg]
                [background:radial-gradient(50%_50%_at_81%_56%,rgba(69,222,255,1)_0%,rgba(7,255,214,0)_100%)]">
    </div>
  </div>

  <div class="relative z-10 container-lg grid items-center gap-10 md:gap-14
              md:grid-cols-[minmax(0,45%)_minmax(0,55%)]">
    {{-- KIRI: JUDUL + TEKS --}}
    <div class="space-y-4 md:space-y-6">
      <div class="flex items-center gap-3">
        <span class="section-title-about-accent-vertical"></span>
        <h2 class="font-display text-white text-3xl md:text-4xl">
          Artikel &amp; Insight
        </h2>
      </div>

      <p class="text-sm md:text-base text-white/80 max-w-md">
        Inspirasi dan insight terbaru seputar branding, bisnis, dan tren industri kreatif.
      </p>

      <a href="{{ url('/artikel') }}"
        class="btn-primary btn-raise inline-flex items-center gap-2">
        Lihat Semua Artikel
        <span aria-hidden="true">→</span>
      </a>
    </div>

    {{-- KANAN: CARD ARTIKEL (CAROUSEL) --}}
    <div class="relative" data-carousel="articles">
      {{-- tombol kiri (di samping kartu) --}}
      <button class="circle-nav absolute -left-5 md:-left-7 top-1/2 -translate-y-1/2 z-10"
        aria-label="Artikel sebelumnya" data-prev>
        <svg width="24" height="24" viewBox="0 0 24 24" aria-hidden="true">
          <path d="M14.5 6.5 9 12l5.5 5.5"
            fill="none" stroke="currentColor" stroke-width="2.2"
            stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </button>

      <div class="overflow-x-auto no-scrollbar snap-x-mandatory" data-viewport>
        <div class="flex items-stretch gap-6 min-w-full pr-4" data-track>
          @foreach ($articles as $article)
          @php
      $category = $categoryLabels[$article->category_slug] ?? $article->category_slug;
    @endphp
          <article class="snap-center shrink-0 w-[92%] md:w-[420px] lg:w-[460px] mx-auto">
            <div class="service-card  service-card-hover p-0 rounded-[32px] overflow-hidden flex flex-col article-card">
              {{-- GAMBAR + LABEL KATEGORI --}}
              <div class="relative h-52 md:h-64 w-full flex-shrink-0">
                <img src="{{ asset($article->image_url) }}"
                  alt="{{ $article->title }}"
                  class="w-full h-full object-cover">
                <div class="absolute left-4 top-4">
                  <span class="inline-flex items-center rounded-full px-4 py-1 text-xs font-semibold
                                 bg-[var(--color-accent)] text-white shadow">
                    {{ $category }}
                  </span>
                </div>
              </div>

              {{-- KONTEN TEKS --}}
              <div class="px-5 pb-5 pt-4 md:px-7 md:pb-7 md:pt-5 flex flex-col flex-1">
                <div class="text-xs md:text-sm text-white/70">
                  {{ $article->date }}
                </div>

                <h3 class="mt-2 text-white text-base md:text-lg font-semibold leading-snug">
                  {{ $article->title }}
                </h3>

                <p class="mt-3 text-xs md:text-sm text-white/85 leading-relaxed flex-1 article-excerpt">
                  {{ $article->excerpt }}
                </p>

                <div class="mt-5">
                  <a href="{{ route('blog.show', $article->slug) }}"
                    class="inline-flex items-center gap-2 px-5 py-2 rounded-full
                              bg-[var(--color-accent)] text-sm font-semibold text-white
                              hover:brightness-110 transition">
                    Selengkapnya
                    <span aria-hidden="true">→</span>
                  </a>
                </div>
              </div>
            </div>
          </article>
          @endforeach
        </div>
      </div>

      {{-- tombol kanan --}}
      <button class="circle-nav absolute -right-5 md:-right-7 top-1/2 -translate-y-1/2 z-10"
        aria-label="Artikel berikutnya" data-next>
        <svg width="24" height="24" viewBox="0 0 24 24" aria-hidden="true">
          <path d="M9.5 6.5 15 12l-5.5 5.5"
            fill="none" stroke="currentColor" stroke-width="2.2"
            stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </button>
    </div>
  </div>
</section>
{{-- END SLIDE 6: ARTIKEL & INSIGHT --}}

{{-- SLIDE 7: TIM KREATIF DI BALIK LAYAR --}}
<section class="relative overflow-hidden py-16 md:py-20">
  {{-- DEKORASI BACKGROUND --}}
  <div class="pointer-events-none absolute inset-0 z-0 select-none">
    {{-- pola garis kiri (boleh reuse pattern tim sebelumnya) --}}
    <img src="{{ asset('image/beranda/pattern-2_28_11zon.jpg') }}"
      alt="" class="hidden md:block absolute left-0 top-0 w-[260px] h-auto opacity-55 mix-blend-screen">

    {{-- radial glow kanan atas --}}
    <div class="absolute right-[-120px] top-[-20px] w-[520px] h-[320px] opacity-70 rotate-[-18deg]
                [background:radial-gradient(50%_50%_at_81%_56%,rgba(69,222,255,1)_0%,rgba(7,255,214,0)_100%)]">
    </div>
  </div>

  <div class="relative z-10 container-lg">
    {{-- JUDUL --}}
    <div class="text-center mb-8 md:mb-10">
      <div class="section-title-accent mb-4"></div>
      <h2 class="section-title">
        Tim Kreatif di Balik Layar
      </h2>
    </div>

    {{-- WRAPPER CARD BESAR + CAROUSEL --}}
    <div class="relative mt-4" data-carousel="team">
      {{-- tombol kiri di samping panel --}}
      <button class="circle-nav absolute -left-7 md:-left-10 top-1/2 -translate-y-1/2 z-20"
        aria-label="Anggota tim sebelumnya" data-prev>
        <svg width="24" height="24" viewBox="0 0 24 24" aria-hidden="true">
          <path d="M14.5 6.5 9 12l5.5 5.5"
            fill="none" stroke="currentColor" stroke-width="2.2"
            stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </button>

      {{-- panel besar --}}
      <div class="overflow-x-auto no-scrollbar snap-x-mandatory px-8 md:px-12" data-viewport>

        <div class="flex items-stretch gap-6 min-w-full" data-track>
          @php
          // item pertama = CEO
          $ceo = $teamMembers[0] ?? null;
          // sisanya dibagi per 3 orang per slide
          $otherMembers = array_slice($teamMembers, 1);
          $groupedMembers = array_chunk($otherMembers, 3);
          @endphp

          {{-- SLIDE 1: khusus CEO, pakai desain besar yang sekarang --}}
          @if ($ceo)
          <article class="snap-center shrink-0 w-full">
            <div class="mx-auto max-w-4xl bg-slate-900/82 rounded-[40px] md:rounded-[48px]
                    px-6 py-10 md:px-10 md:py-12 shadow-xl flex justify-center">
              <div class="bg-[#C4F4E4] rounded-[32px] px-7 py-9 md:px-10 md:py-10
                      w-full max-w-xs text-center text-slate-900">
                {{-- foto bulat --}}
                <div class="mx-auto mb-6 h-40 w-40 md:h-44 md:w-44 rounded-full overflow-hidden bg-slate-200">
                  <img src="{{ asset($ceo['photo']) }}"
                    alt="{{ $ceo['name'] }}"
                    class="h-full w-full object-cover object-[center_top] {{ $ceo['photo_class'] ?? '' }}">
                </div>

                {{-- nama & role --}}
                <div class="space-y-1 mb-6">
                  <h3 class="text-lg md:text-xl font-semibold">
                    {{ $ceo['name'] }}
                  </h3>
                  <p class="text-sm md:text-base text-slate-700">
                    {{ $ceo['role'] }}
                  </p>
                </div>

                {{-- sosmed --}}
                <div class="mt-4 flex items-center justify-center gap-4">
                  <a href="#" aria-label="WhatsApp" class="icon-chip">
                    <x-heroicon-o-phone class="w-5 h-5" />
                  </a>
                  <a href="#" aria-label="Instagram" class="icon-chip">
                    <x-si-instagram class="w-5 h-5" />
                  </a>
                  <a href="#" aria-label="Email" class="icon-chip">
                    <x-heroicon-o-envelope class="w-5 h-5" />
                  </a>
                  <a href="#" aria-label="TikTok" class="icon-chip">
                    <x-si-tiktok class="w-5 h-5" />
                  </a>
                </div>
              </div>
            </div>
          </article>
          @endif

          {{-- SLIDE 2,3,... : isi 3 kartu kecil per slide --}}
          @foreach ($groupedMembers as $group)
          <article class="snap-center shrink-0 w-full">
            <div class="mx-auto max-w-4xl bg-slate-900/82 rounded-[40px] md:rounded-[48px]
                    px-6 py-10 md:px-10 md:py-12 shadow-xl flex justify-center">
              <div class="flex flex-col sm:flex-row justify-center gap-6 md:gap-8">
                @foreach ($group as $member)
                <div class="bg-[#C4F4E4] rounded-[32px] px-7 py-9 md:px-8 md:py-9
                      w-full sm:w-[260px] text-center text-slate-900 shadow-xl">
                  {{-- foto bulat --}}
                  <div class="mx-auto mb-6 h-40 w-40 md:h-44 md:w-44 rounded-full overflow-hidden bg-slate-200">
                    <img src="{{ asset($member['photo']) }}"
                      alt="{{ $member['name'] }}"
                      class="h-full w-full object-cover object-[center_top] {{ $member['photo_class'] ?? '' }}">
                  </div>

                  {{-- nama & role --}}
                  <div class="space-y-1 mb-4">
                    <h3 class="text-base md:text-lg font-semibold">
                      {{ $member['name'] }}
                    </h3>
                    <p class="text-xs md:text-sm text-slate-700">
                      {{ $member['role'] }}
                    </p>
                  </div>

                  {{-- sosmed --}}
                  <div class="mt-2 flex items-center justify-center gap-3">
                    <a href="#" aria-label="WhatsApp" class="icon-chip">
                      <x-heroicon-o-phone class="w-4 h-4" />
                    </a>
                    <a href="#" aria-label="Instagram" class="icon-chip">
                      <x-si-instagram class="w-4 h-4" />
                    </a>
                    <a href="#" aria-label="Email" class="icon-chip">
                      <x-heroicon-o-envelope class="w-4 h-4" />
                    </a>
                    <a href="#" aria-label="TikTok" class="icon-chip">
                      <x-si-tiktok class="w-4 h-4" />
                    </a>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </article>
          @endforeach

        </div>
      </div>

      {{-- tombol kanan --}}
      <button class="circle-nav absolute -right-7 md:-right-10 top-1/2 -translate-y-1/2 z-20"
        aria-label="Anggota tim berikutnya" data-next>
        <svg width="24" height="24" viewBox="0 0 24 24" aria-hidden="true">
          <path d="M9.5 6.5 15 12l-5.5 5.5"
            fill="none" stroke="currentColor" stroke-width="2.2"
            stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </button>
    </div>
  </div>
</section>
{{-- END SLIDE 7: TIM KREATIF --}}

{{-- SLIDE 8: FAQ --}}
<section class="pt-16 pb-24 md:pt-20 md:pb-28">
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
</section>
{{-- END SLIDE 8: FAQ --}}

{{-- SLIDE 9: KONTAK --}}
<section class="pt-24 pb-24 md:pt-28 md:pb-28">
  <div class="container-lg relative">
    {{-- Pattern kiri atas --}}
    <img src="{{ asset('image/kontak/pattern-1_52_11zon.jpg') }}"
      alt=""
      class="hidden md:block absolute left-0 top-0 w-[260px] h-auto opacity-25 mix-blend-screen">

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
</section>
{{-- END SLIDE 9: KONTAK --}}

{{-- SLIDE 10: ANGKA & LOGO CLIENT --}}
<section class="relative overflow-hidden py-16 md:py-20">
  {{-- dekor pattern --}}
  <div class="pointer-events-none absolute inset-0 z-0 select-none">
    <img src="{{ asset('image/beranda/pattern-8_34_11zon.jpg') }}"
      alt=""
      class="hidden md:block absolute right-0 bottom-0 w-[160px] h-auto opacity-45 mix-blend-screen">
  </div>

  <div class="relative z-10 container-lg text-center">
    {{-- Judul utama --}}
    <div class="section-title-accent mb-4 mx-auto"></div>
    <h2 class="section-title">
      Bukti Nyata Lewat Angka
    </h2>
    <p class="mt-3 text-sm md:text-base text-white/80 max-w-2xl mx-auto">
      Perjalanan profesional yang telah membangun kepercayaan dan memberikan hasil nyata.
    </p>

    {{-- Angka-angka --}}
    <div class="mt-10 grid grid-cols-1 sm:grid-cols-3 gap-8 md:gap-10">
      <div>
        <div class="text-3xl md:text-4xl font-semibold text-white">
          <span class="text-[var(--color-accent)]">5</span> thn
        </div>
        <p class="mt-2 text-sm md:text-base text-white/80">
          Mentor digital marketing
        </p>
      </div>

      <div>
        <div class="text-3xl md:text-4xl font-semibold text-white">
          <span class="text-[var(--color-accent)]">1000</span>+
        </div>
        <p class="mt-2 text-sm md:text-base text-white/80">
          Ikut workshop
        </p>
      </div>

      <div>
        <div class="text-3xl md:text-4xl font-semibold text-white">
          <span class="text-[var(--color-accent)]">50</span>+
        </div>
        <p class="mt-2 text-sm md:text-base text-white/80">
          Perusahaan yang sudah bekerjasama
        </p>
      </div>
    </div>

    {{-- Dipercaya oleh --}}
    <div class="mt-12">
      <div class="section-title-accent mb-4 mx-auto"></div>
      <h3 class="text-xl md:text-2xl font-display text-white">
        Dipercaya oleh
      </h3>
      <p class="mt-2 text-sm md:text-base text-white/80">
        Dipercaya oleh berbagai institusi dan merek ternama.
      </p>

      <div class="mt-6 flex flex-wrap justify-center gap-4 md:gap-5">
        @foreach ($logos as $logo)
        <div class="h-14 w-14 md:h-16 md:w-16 rounded-full bg-white flex items-center justify-center shadow-md">
          <img src="{{ asset("image/beranda/$logo") }}"
            alt="Client logo"
            class="max-h-12 max-w-12 object-contain">
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
{{-- END SLIDE 10: ANGKA & LOGO CLIENT --}}

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
            Banyak instansi sudah membuktikan, sekarang giliran Anda!
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

{{-- Script Turnstile --}}
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

@endsection