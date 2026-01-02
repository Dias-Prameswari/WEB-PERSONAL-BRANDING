@csrf

<div class="space-y-4">
    <div>
        <label class="block text-sm mb-1">Judul Proyek</label>
        <input type="text" name="title"
            value="{{ old('title', $item->title ?? '') }}"
            class="w-full border rounded-md px-3 py-2">
        @error('title')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
    </div>

    <div class="grid md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm mb-1">Kategori (slug)</label>
            <input type="text" name="category_slug"
                placeholder="misal: workshop, webinar, dsb."
                value="{{ old('category_slug', $item->category_slug ?? '') }}"
                class="w-full border rounded-md px-3 py-2">
        </div>

        @php
        $techsValue = old('techs');

        if ($techsValue === null && isset($item)) {
        // kalau $item->techs array, gabung jadi "Canva, Instagram"
        if (is_array($item->techs)) {
        $techsValue = implode(', ', $item->techs);
        } else {
        $techsValue = $item->techs;
        }
        }
        @endphp

        <div>
            <label class="block text-sm mb-1">Techs / Tools (opsional)</label>
            <input type="text" name="techs"
                placeholder="misal: Canva, Instagram Ads"
                value="{{ $techsValue }}"
                class="w-full border rounded-md px-3 py-2">
        </div>
    </div>

    <div>
        <label class="block text-sm mb-1">Deskripsi singkat</label>
        <textarea name="description" rows="4"
            class="w-full border rounded-md px-3 py-2">{{ old('description', $item->description ?? '') }}</textarea>
    </div>

    <div>
        <label class="block text-sm mb-1">Link (opsional)</label>
        <input type="text" name="link"
            placeholder="misal: https://contoh.com/studi-kasus"
            value="{{ old('link', $item->link ?? '') }}"
            class="w-full border rounded-md px-3 py-2">
    </div>

    <div>
        <label class="block text-sm mb-1">URL gambar</label>
        <input type="text" name="image_url"
            placeholder="misal: image/portofolio/proyek-1.jpg"
            value="{{ old('image_url', $item->image_url ?? '') }}"
            class="w-full border rounded-md px-3 py-2">
    </div>

    <div class="flex items-center gap-2">
        <input type="checkbox" id="published" name="published" value="1"
            @checked(old('published', $item->published ?? true))>
        <label for="published" class="text-sm">Tampilkan (Published)</label>
    </div>
</div>

<div class="mt-6 flex justify-end gap-3">
    <a href="{{ route('admin.portofolio.index') }}" class="text-sm text-gray-500 underline">
        Batal
    </a>
    <button class="btn-primary">
        {{ $submitLabel ?? 'Simpan' }}
    </button>
</div>