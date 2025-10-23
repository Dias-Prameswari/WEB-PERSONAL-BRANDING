<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? config('app.name', 'CEO Personal Branding') }}</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="min-h-screen bg-white text-gray-900 antialiased font-sans">
  @hasSection('navbar')
  {{-- Navbar kustom dari halaman (mis. Home) --}}
  @yield('navbar')
  @else
  {{-- Header default untuk halaman lain --}}
  <!-- <header class="border-b bg-black/25 backdrop-blur-md">
    <div class="container-lg flex items-center justify-between py-4">
      <a href="{{ url('/') }}" class="font-semibold text-white">CEO Personal Branding</a>
      <nav class="flex gap-6 text-sm text-white">
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/tentang-saya') }}">Tentang</a>
        <a href="{{ url('/layanan') }}">Layanan</a>
        <a href="{{ url('/artikel') }}">Artikel</a>
        <a href="{{ url('/kontak') }}">Kontak</a>
      </nav>
    </div>
  </header> -->
    @include('partials.navbar', ['floating' => false])
  @endif

  <main>
    @yield('content')
  </main>



</body>

</html>