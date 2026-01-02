<x-app-layout>
    @section('page_bg','hero-cover')
    @section('main_class','pt-2 md:pt-3 pb-10')

    <h2 class="mt-[64px] md:mt-[100px] mb-2 font-display text-2xl md:text-3xl text-white text-center">
        Proyek Baru
    </h2>

    <div class="py-12">
        <div class="container-lg">
            <div class="bg-white/95 shadow rounded-2xl p-6 max-w-4xl mx-auto">
                <form method="POST" action="{{ route('admin.portofolio.store') }}">
                    @include('admin.portofolio._form', ['submitLabel' => 'Buat Portofolio'])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>