@php
  // data layanan (bisa dipindah ke controller jika nanti dinamis)
  $services = [
    [
      'title' => 'Pembicara & Workshop',
      'desc'  => 'Berbagi pengalaman untuk mendukung ekosistem digital Indonesia. Pelatihan seputar digital marketing, content creation, dan strategi branding.',
      'img'   => asset('image/layanan/foto-layanan-1.jpg'),
    ],
    [
      'title' => 'Brand Ambassador & Kolaborasi Promosi',
      'desc'  => 'Membantu brand menciptakan kampanye yang menarik dan berkesan dengan pendekatan natural sekaligus strategis.',
      'img'   => asset('image/layanan/foto-layanan-2.jpg'),
    ],
    [
      'title' => 'Mentoring',
      'desc'  => 'Pendampingan personal untuk UMKM, brand, maupun individu agar mampu merancang strategi digital, storytelling, dan personal branding.',
      'img'   => asset('image/layanan/foto-layanan-3.jpg'),
    ],
  ];
@endphp

<section class="relative overflow-hidden py-16 md:py-20 text-ink services-cover">
  {{-- DEKOR: pakai gambar + radial glow, tidak mengganggu klik --}}
  <div class="pointer-events-none absolute inset-0 select-none z-0">
    {{-- radial glow kiri-atas (copy gaya slide-2) --}}
    <div class="absolute left-[-180px] top-[-0px] md:left-[-180px] md:top-[-26px]
            w-[945px] h-[850px] md:w-[1000px] md:h-[600px]
            opacity-64 rotate-[22deg]
            [background:radial-gradient(50%_50%_at_20%_52%,rgba(69,222,255,1)_0%,rgba(7,255,214,0)_68%)]">
    </div>

    {{-- garis kotak kanan (pakai PNG) --}}
    <img src="{{ asset('image/beranda/Group-39.png') }}"
         alt="" class="hidden md:block absolute right-0 top-0 w-[300px] h-auto opacity-80 mix-blend-screen">
    <img src="{{ asset('image/beranda/Group-40.png') }}"
         alt="" class="hidden md:block absolute right-0 top-[220px] w-[300px] h-auto opacity-70 mix-blend-screen">

  </div>


  <div class="container-lg">
    {{-- heading --}}
    <div class="text-center">
      <div class="section-title-accent mb-4"></div>
      <h2 class="section-title">Layanan Kreatif Digital</h2>
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
                stroke-linecap="round" stroke-linejoin="round"/>
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
                    <img src="{{ $s['img'] }}" alt="{{ $s['title'] }}" class="service-img">
                </div>
              <div class="pt-5">
                <h3 class="text-xl md:text-2xl font-semibold">{{ $s['title'] }}</h3>
                <p class="mt-3 text-white/85 text-sm leading-relaxed">{{ $s['desc'] }}</p>
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
                stroke-linecap="round" stroke-linejoin="round"/>
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
