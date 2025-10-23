<x-app-layout>
    {{-- Background untuk SELURUH halaman (termasuk area navbar) --}}
    @section('page_bg', 'hero-cover')

    {{-- Spasi khusus halaman ini saja --}}
    @section('main_class', 'pt-2 md:pt-3 pb-10')

    
        <h2 class="mt-[64px] md:mt-[100px] mb-2 font-display text-2xl md:text-3xl text-white text-center">Dashboard</h2>
    
    <div class="py-12">
        <div class="container-lg">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                {{-- Kartu: Artikel/Blog --}}
                <a href="{{ route('blog.index') }}"
                   class="block rounded-2xl bg-white/95 hover:bg-white shadow-lg p-5 transition">
                    <div class="text-lg font-semibold mb-1">Kelola Artikel</div>
                    <p class="text-gray-600 text-sm">Tulis, edit, dan publikasikan artikel.</p>
                </a>

                {{-- Kartu: Portofolio --}}
                <a href="{{ route('blog.portfolio') }}"
                   class="block rounded-2xl bg-white/95 hover:bg-white shadow-lg p-5 transition">
                    <div class="text-lg font-semibold mb-1">Kelola Portofolio</div>
                    <p class="text-gray-600 text-sm">Update proyek/hasil pekerjaan.</p>
                </a>

                {{-- Kartu: Leads/Daftar Program --}}
                <!-- <a href="{{ route('leads.create') }}"
                   class="block rounded-2xl bg-white/95 hover:bg-white shadow-lg p-5 transition">
                    <div class="text-lg font-semibold mb-1">Form “Daftar Program”</div>
                    <p class="text-gray-600 text-sm">Buka formulir publik atau cek data (nanti).</p>
                </a> -->
                <!-- @auth
                    <a href="{{ auth()->check() ? route('leads.admin.index') : route('leads.create') }}"
                        class="inline-block px-4 py-3 rounded-xl bg-white shadow hover:shadow-md">
                        Form “Daftar Program”
                    </a>
                @endauth -->
                <a href="{{ auth()->check() ? route('leads.admin.index') : route('leads.create') }}"
                class="block rounded-2xl bg-white/95 hover:bg-white shadow-lg p-5 transition">
                <div class="text-lg font-semibold mb-1">Form “Daftar Program”</div>
                <p class="text-gray-600 text-sm">
                    {{ auth()->check() ? 'Lihat data pendaftar & export di dashboard.' : 'Buka formulir publik.' }}
                </p>
                </a>


                {{-- Kartu: Profil --}}
                @if(Route::has('profile.edit'))
                <a href="{{ route('profile.edit') }}"
                   class="block rounded-2xl bg-white/95 hover:bg-white shadow-lg p-5 transition">
                    <div class="text-lg font-semibold mb-1">Profil & Password</div>
                    <p class="text-gray-600 text-sm">Ubah nama, email, dan password admin.</p>
                </a>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
