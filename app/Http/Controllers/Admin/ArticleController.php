<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q = $request->query('q');

        $articles = Article::when($q, function ($query) use ($q) {
                $query->where('title', 'like', "%{$q}%")
                      ->orWhere('category_slug', 'like', "%{$q}%");
            })
            ->latest('id')
            ->paginate(10);

        return view('admin.articles.index', compact('articles', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $data = $request->validate([
            'title'         => ['required', 'string', 'max:255'],
            'category_slug' => ['required', 'string', 'max:100'], // misal: storytelling-branding
            'date'          => ['required', 'string', 'max:50'],  // "24 Juni 2024"
            'excerpt'       => ['required', 'string'],
            'content'       => ['nullable', 'string'],
            'image_url'     => ['nullable', 'string', 'max:255'], // contoh: image/artikel/foto-1.jpg
            'published'     => ['nullable', 'boolean'],
        ]);

        $data['slug'] = Str::slug($data['title']);               // slug otomatis dari judul
        $data['published'] = (bool)($data['published'] ?? false);

        Article::create($data);

        return redirect()
            ->route('admin.articles.index')
            ->with('ok', 'Artikel berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title'         => ['required', 'string', 'max:255'],
            'category_slug' => ['required', 'string', 'max:100'],
            'date'          => ['required', 'string', 'max:50'],
            'excerpt'       => ['required', 'string'],
            'content'       => ['nullable', 'string'],
            'image_url'     => ['nullable', 'string', 'max:255'],
            'published'     => ['nullable', 'boolean'],
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['published'] = (bool)($data['published'] ?? false);

        $article->update($data);

        return redirect()
            ->route('admin.articles.index')
            ->with('ok', 'Artikel berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
         $article->delete();

        return redirect()
            ->route('admin.articles.index')
            ->with('ok', 'Artikel berhasil dihapus.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    
}
