<!-- @php($title = 'Tentang Saya')
@extends('layouts.app')

@section('content')
  <section class="relative overflow-hidden bg-[var(--color-brand)] text-[var(--color-ink)]">
    {{-- Radial glow kanan-atas --}}
    <div aria-hidden="true" class="pointer-events-none absolute inset-0">
      <div class="absolute right-[-120px] -top-32 w-[760px] h-[760px] opacity-70 rotate-[-30deg]
                  [background:radial-gradient(50%_50%_at_81%_56%,rgba(69,222,255,1)_0%,rgba(7,255,214,0)_100%)]">
      </div>
    </div>

    <div class="container-lg grid grid-cols-1 md:grid-cols-2 items-center gap-12 py-16 md:py-24">
      {{-- Foto --}}
      <figure class="relative mx-auto md:mx-0">
        <img
          src="{{ Vite::asset('resources/images/rectangle-33.jpg') }}"
          alt="Triawanda Tirta Aditya saat memaparkan materi"
          class="w-full max-w-[520px] rounded-[28px] object-cover glow-teal shadow-2xl"
        >
      </figure>

      {{-- Teks --}}
      <div class="relative">
        <div class="text-center md:text-left">
          <div class="flex items-center justify-center md:justify-start mb-4">
            <span class="inline-block h-[3px] w-24 bg-[var(--color-accent)] rounded-full"></span>
          </div>
          <h2 class="text-3xl md:text-5xl font-semibold leading-tight">
            Spesialis Strategi Konten
          </h2>
        </div>

        <p class="mt-6 text-lg md:text-xl font-semibold max-w-[52ch]">
          Saya adalah Content Creator sekaligus Founder Taggallery Agency (berdiri sejak 2021).
          Fokus saya membantu bisnis lokal dan institusi mengubah konten jadi pertumbuhan nyata.
          Sejak 2020, saya terlibat di berbagai program pemerintah dan brand besar dengan membangun
          kerangka kerja konten yang konsisten, terukur, dan berorientasi hasil.
        </p>

        <div class="mt-8 flex flex-wrap items-center gap-4">
          <a href="{{ url('/kontak') }}" class="btn-primary btn-raise">Minta Proposal</a>
          <a href="{{ url('/#portofolio') }}" class="btn-outline btn-raise">Lihat Portofolio</a>
        </div>
      </div>
    </div>
  </section>
@endsection -->
