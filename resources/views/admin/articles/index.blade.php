<x-app-layout>
  @section('page_bg','hero-cover')

  @section('main_class','pt-2 md:pt-3 pb-10')

  <h2 class="mt-[64px] md:mt-[100px] mb-2 font-display text-2xl md:text-3xl text-white text-center">
    Kelola Artikel
  </h2>

  <div class="py-12">
    <div class="container-lg">
      <div class="rounded-2xl bg-white/95 hover:bg-white shadow-lg p-5 transition">
        @if(session('ok'))
          <div class="mb-4 rounded bg-green-50 text-green-800 px-3 py-2">
            {{ session('ok') }}
          </div>
        @endif

        <div class="flex flex-col md:flex-row md:items-center gap-3 mb-4">
          <form method="get" class="flex-1">
            <input
              type="text" name="q" value="{{ $q }}"
              placeholder="Cari judul / kategori…"
              class="w-full rounded-xl border border-gray-200 px-4 py-2
                     focus:outline-none focus:ring-2 focus:ring-emerald-500">
          </form>

          <a href="{{ route('admin.articles.create') }}" class="btn-primary whitespace-nowrap">
            + Artikel Baru
          </a>
        </div>

        <div class="overflow-x-auto">
          <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-700">
              <tr>
                <th class="px-3 py-2 text-left font-semibold">#</th>
                <th class="px-3 py-2 text-left font-semibold">Judul</th>
                <th class="px-3 py-2 text-left font-semibold">Kategori</th>
                <th class="px-3 py-2 text-left font-semibold">Tanggal</th>
                <th class="px-3 py-2 text-left font-semibold">Status</th>
                <th class="px-3 py-2 text-right font-semibold">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($articles as $i => $a)
                <tr class="border-t hover:bg-gray-50/70">
                  <td class="px-3 py-2">{{ $articles->firstItem() + $i }}</td>
                  <td class="px-3 py-2">{{ $a->title }}</td>
                  <td class="px-3 py-2">{{ $a->category_slug }}</td>
                  <td class="px-3 py-2">{{ $a->date }}</td>
                  <td class="px-3 py-2">
                    {{ $a->published ? 'Published' : 'Draft' }}
                  </td>
                  <td class="px-3 py-2 text-right space-x-2">
                    <a href="{{ route('admin.articles.edit', $a) }}"
                       class="text-blue-600 text-xs underline">Edit</a>

                    <form action="{{ route('admin.articles.destroy', $a) }}"
                          method="POST"
                          class="inline"
                          onsubmit="return confirm('Hapus artikel ini?')">
                      @csrf
                      @method('DELETE')
                      <button class="text-red-600 text-xs underline">
                        Hapus
                      </button>
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="6" class="p-4 text-center text-gray-500">
                    Belum ada artikel.
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        <div class="mt-4">
          {{ $articles->withQueryString()->links() }}
        </div>
      </div>
    </div>
  </div>
</x-app-layout>