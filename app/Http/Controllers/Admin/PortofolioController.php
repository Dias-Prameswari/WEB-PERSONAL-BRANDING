<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q = $request->query('q');

        $items = Portofolio::when($q, function ($query) use ($q) {
            $query->where('title', 'like', "%{$q}%")
                ->orWhere('category_slug', 'like', "%{$q}%");
        })
            ->latest('id')
            ->paginate(10);

        return view('admin.portofolio.index', compact('items', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portofolio.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'     => ['required', 'string', 'max:255'],
            'category_slug' => ['nullable', 'string', 'max:100'],
            'description'   => ['required', 'string'],
            'techs'         => ['nullable', 'string'],
            'link'          => ['nullable', 'string', 'max:255'],
            'image_url'     => ['nullable', 'string', 'max:255'],
            'published'     => ['nullable', 'boolean'],
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['published'] = (bool)($data['published'] ?? false);

        if (!empty($data['techs'])) {
            $data['techs'] = array_filter(array_map('trim', explode(',', $data['techs'])));
        }

        Portofolio::create($data);

        return redirect()
            ->route('admin.portofolio.index')
            ->with('ok', 'Portofolio berhasil dibuat.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portofolio $portofolio)
    {
        return view('admin.portofolio.edit', ['item' => $portofolio]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portofolio $portofolio)
    {
        $data = $request->validate([
            'title'         => ['required', 'string', 'max:255'],
            'category_slug' => ['nullable', 'string', 'max:100'],
            'description'   => ['nullable', 'string'],
            'techs'         => ['nullable', 'string'],
            'link'          => ['nullable', 'string', 'max:255'],
            'image_url'     => ['nullable', 'string', 'max:255'],
            'published'     => ['nullable', 'boolean'],
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['published'] = (bool)($data['published'] ?? false);

        $portofolio->update($data);

        return redirect()
            ->route('admin.portofolio.index')
            ->with('ok', 'Portofolio berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portofolio $portofolio)
    {
        $portofolio->delete();

        return redirect()
            ->route('admin.portofolio.index')
            ->with('ok', 'Portofolio berhasil dihapus.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
}
