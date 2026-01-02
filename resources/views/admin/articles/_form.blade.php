@csrf

<div class="space-y-4">
  <div>
    <label class="block text-sm mb-1">Judul</label>
    <input type="text" name="title"
           value="{{ old('title', $article->title ?? '') }}"
           class="w-full border rounded-md px-3 py-2">
    @error('title')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
  </div>

  <div>
    <label class="block text-sm mb-1">Kategori (slug)</label>
    <input type="text" name="category_slug"
           placeholder="misal: storytelling-branding"
           value="{{ old('category_slug', $article->category_slug ?? '') }}"
           class="w-full border rounded-md px-3 py-2">
    @error('category_slug')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
  </div>

  <div>
    <label class="block text-sm mb-1">Tanggal tampil</label>
    <input type="text" name="date"
           placeholder="contoh: 24 Juni 2024"
           value="{{ old('date', $article->date ?? '') }}"
           class="w-full border rounded-md px-3 py-2">
    @error('date')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
  </div>

  <div>
    <label class="block text-sm mb-1">Excerpt (ringkasan singkat)</label>
    <textarea name="excerpt" rows="3"
              class="w-full border rounded-md px-3 py-2">{{ old('excerpt', $article->excerpt ?? '') }}</textarea>
    @error('excerpt')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
  </div>

  <div>
    <label class="block text-sm mb-1">Isi artikel</label>
    <textarea name="content" rows="8"
              class="w-full border rounded-md px-3 py-2">{{ old('content', $article->content ?? '') }}</textarea>
  </div>

  <div>
    <label class="block text-sm mb-1">URL gambar</label>
    <input type="text" name="image_url"
           placeholder="misal: image/artikel/foto-1.jpg"
           value="{{ old('image_url', $article->image_url ?? '') }}"
           class="w-full border rounded-md px-3 py-2">
  </div>

  <div class="flex items-center gap-2">
    <input type="checkbox" id="published" name="published" value="1"
           @checked(old('published', $article->published ?? true))>
    <label for="published" class="text-sm">Tampilkan (Published)</label>
  </div>
</div>

<div class="mt-6 flex justify-end gap-3">
  <a href="{{ route('admin.articles.index') }}" class="text-sm text-gray-500 underline">
    Batal
  </a>
  <button class="btn-primary">
    {{ $submitLabel ?? 'Simpan' }}
  </button>
</div>
