@extends('layouts.app')

@section('content')
<section class="bg-[var(--color-brand)] text-[var(--color-ink)] py-10">
  <div class="container-lg">
    <div class="flex items-center justify-center mb-6">
      <span class="inline-block h-[3px] w-24 bg-[var(--color-accent)] rounded-full"></span>
    </div>
    <h1 class="text-center text-3xl md:text-4xl font-semibold mb-6">Artikel & Insight</h1>

    @php $cats = config('blog.categories'); @endphp
    <div class="flex flex-wrap gap-3 justify-center">
      <a href="{{ route('blog.index') }}"
         class="px-4 py-2 rounded-full bg-white/10 hover:bg-white/15 border border-white/15">
        Semua
      </a>
      @foreach($cats as $slug => $label)
        <a href="{{ route('blog.category', ['slug' => $slug]) }}"
           class="px-4 py-2 rounded-full bg-white/10 hover:bg-white/15 border border-white/15">
          {{ $label }}
        </a>
      @endforeach
    </div>

    {{-- ... daftar artikelmu di sini ... --}}
  </div>
</section>
@endsection
