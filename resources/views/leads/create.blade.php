<x-guest-layout>
  <h1 class="text-xl font-semibold mb-4">Daftar Program / Newsletter</h1>

  @if(session('ok'))
  <div class="mb-4 rounded bg-green-50 text-green-800 px-3 py-2">
    {{ session('ok') }}
  </div>
  @endif

  @if ($errors->any())
  <div class="mb-4 rounded bg-red-50 text-red-700 px-3 py-2">
    Ada yang perlu diperbaiki. Cek input kamu ya.
  </div>
  @endif

  <form method="POST" action="{{ route('leads.store') }}" class="space-y-4">
    @csrf
    {{-- honeypot --}}
    <input type="text" name="website" class="hidden" tabindex="-1" autocomplete="off">

    <div>
      <label class="block text-sm mb-1">Nama</label>
      <input name="name" class="w-full border rounded-md" value="{{ old('name') }}" required>
      @error('name')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
    </div>

    <div>
      <label class="block text-sm mb-1">Email</label>
      <input type="email" name="email" class="w-full border rounded-md" value="{{ old('email') }}" required>
      @error('email')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
    </div>

    <div>
      <label class="block text-sm mb-1">No. WhatsApp (opsional)</label>
      <input name="phone" class="w-full border rounded-md" value="{{ old('phone') }}">
    </div>

    <div>
      <label class="block text-sm mb-1">Minat</label>
      <select name="program" class="w-full border rounded-md">
        <option value="">Pilih salah satu…</option>

        <option value="Newsletter" @selected(old('program')==='Newsletter' )>
          Newsletter
        </option>

        <option value="Pelatihan Branding" @selected(old('program')==='Pelatihan Branding' )>
          Pelatihan Branding
        </option>

        <option value="Konsultasi 1:1" @selected(old('program')==='Konsultasi 1:1' )>
          Konsultasi 1:1
        </option>

        <option value="Lainnya" @selected(old('program')==='Lainnya' )>
          Lainnya
        </option>
      </select>

      @error('program')
      <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>


    <div>
      <label class="block text-sm mb-1">Pesan (opsional)</label>
      <textarea name="message" rows="3" class="w-full border rounded-md"
        placeholder="Kalau memilih 'Lainnya', jelaskan minat atau kebutuhan Anda di sini.">{{ old('message') }}</textarea>
    </div>

    {{-- Turnstile --}}
    <div class="cf-turnstile" data-sitekey="{{ env('TURNSTILE_SITE_KEY') }}"></div>
    {{-- Script CDN wajib setelah widget --}}
    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

    <button class="btn-primary w-full">Kirim</button>
    <p class="mt-3 text-xs text-gray-500">
      Kami hanya menggunakan data ini untuk menghubungi Anda terkait program/layanan.
      Kami tidak membagikan data kepada pihak ketiga.
    </p>
  </form>

</x-guest-layout>