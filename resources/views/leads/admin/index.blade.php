<x-app-layout>
  {{-- sama persis dengan dashboard --}}
  @section('page_bg','hero-cover')

  @section('main_class','pt-2 md:pt-3 pb-10')

  <h2 class="mt-[64px] md:mt-[100px] mb-2 font-display text-2xl md:text-3xl text-white text-center">
    Leads
  </h2>

  <div class="py-12">
    <div class="container-lg">
      <div class="rounded-2xl bg-white/95 hover:bg-white shadow-lg p-5 transition">
        <div class="flex flex-col md:flex-row md:items-center gap-3 mb-4">
          <form method="get" class="flex-1">
            <input
              type="text" name="q" value="{{ $q }}"
              placeholder="Cari nama/email/phone..."
              class="w-full rounded-xl border border-gray-200 px-4 py-2
                     focus:outline-none focus:ring-2 focus:ring-emerald-500">
          </form>

          <a href="{{ route('leads.admin.export') }}" class="btn-primary whitespace-nowrap">
            Export CSV
          </a>
        </div>

        <div class="overflow-x-auto">
          <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-700">
              <tr>
                <th class="px-3 py-2 font-semibold text-left">#</th>
                <th class="px-3 py-2 font-semibold text-left">Nama</th>
                <th class="px-3 py-2 font-semibold text-left">Email</th>
                <th class="px-3 py-2 font-semibold text-left">Phone</th>
                <th class="px-3 py-2 font-semibold text-left">Program</th>
                <th class="px-3 py-2 font-semibold text-left">Tanggal</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($leads as $i => $l)
              <tr class="border-t hover:bg-gray-50/70">
                <td class="px-3 py-2">{{ $leads->firstItem() + $i }}</td>
                <td class="px-3 py-2">{{ $l->name }}</td>
                <td class="px-3 py-2">{{ $l->email }}</td>
                <td class="px-3 py-2">{{ $l->phone }}</td>
                <td class="px-3 py-2">{{ $l->program }}</td>
                <td class="px-3 py-2">{{ $l->created_at?->format('d M Y H:i') }}</td>
              </tr>
              @empty
              <tr>
                <td class="p-4 text-center text-gray-500" colspan="6">Belum ada data</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>

        {{-- pagination tailwind --}}
        <div class="mt-4">
          {{ $leads->withQueryString()->links() }}
        </div>
      </div>
    </div>
  </div>
</x-app-layout>