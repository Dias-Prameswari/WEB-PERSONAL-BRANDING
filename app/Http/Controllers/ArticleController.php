<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    // slug kategori => label kategori
    // UNTUK TAB KATEGORI
    private array $categories = [
        'storytelling-branding'      => 'Storytelling & Branding',
        'strategi-konten'            => 'Strategi Konten',
        'media-sosial-growth'        => 'Media Sosial & Growth',
        'iklan-distribusi'           => 'Iklan & Distribusi',
        'mentoring-karier-kreator'   => 'Mentoring & Karier Kreator',
        'event-update'               => 'Event & Update',
    ];

    // UNTUK TAB PORTOFOLIO

    // UNTUK TAB ARTIKEL & DETAIL ARTIKEL

    // Mengubah teks markdown sederhana (##, ###, -) jadi HTML rapi
    private function formatContent(string $content): string
    {
        // normalisasi newline
        $content = str_replace(["\r\n", "\r"], "\n", trim($content));

        $lines  = explode("\n", $content);
        $html   = '';
        $inList = false;

        foreach ($lines as $line) {
            $line = trim($line);

            // baris kosong
            if ($line === '') {
                if ($inList) {
                    $html  .= '</ul>';
                    $inList = false;
                }
                // $html .= '<br>'; // jarak antar paragraf
                continue;
            }

            // heading level 3
            if (str_starts_with($line, '### ')) {
                if ($inList) {
                    $html  .= '</ul>';
                    $inList = false;
                }
                $text = substr($line, 4);
                $html .= '<h3 class="text-white text-lg md:text-xl font-display mt-6 mb-2">'
                    . e($text)
                    . '</h3>';
                continue;
            }

            // heading level 2
            if (str_starts_with($line, '## ')) {
                if ($inList) {
                    $html  .= '</ul>';
                    $inList = false;
                }
                $text = substr($line, 3);
                $html .= '<h2 class="text-white text-xl md:text-2xl font-display mt-8 mb-3">'
                    . e($text)
                    . '</h2>';
                continue;
            }

            // bullet list
            if (str_starts_with($line, '- ')) {
                if (! $inList) {
                    $html  .= '<ul class="list-disc pl-5 space-y-1 mb-4">';
                    $inList = true;
                }
                $text = substr($line, 2);
                $html .= '<li class="text-white/85 text-sm md:text-base">'.e($text).'</li>';
                continue;
            }

            // paragraf biasa
            if ($inList) {
                $html  .= '</ul>';
                $inList = false;
            }

            $html .= '<p class="text-white/85 text-sm md:text-base leading-relaxed mb-3">'
                . e($line)
                . '</p>';
        }

        if ($inList) {
            $html .= '</ul>';
        }

        return $html;
    }

    // ================== HALAMAN /ARTIKEL (LIST SEMUA) ==================
    public function index()
    {
        $articles = Article::where('published', 1)
            ->orderBy('id', 'asc')
            ->get();

        return view('blog', [
            'categories'      => $this->categories,
            'articles'        => $articles,
            'currentCategory' => null, // buat highlight tab "Semua"
        ]);
    }

    // ================== HALAMAN /ARTIKEL/KATEGORI/{SLUG} ==================
    public function category(string $slug)
    {
        // cek slug kategori valid
        if (! isset($this->categories[$slug])) {
            abort(404);
        }

        // label di DB: "Storytelling & Branding", dll
        $label = $this->categories[$slug];

        $articles = Article::where('published', 1)
            ->where('category_slug', $label)
            ->orderBy('id', 'asc')
            ->get();

        return view('blog', [
            'categories'      => $this->categories,
            'articles'        => $articles,
            'currentCategory' => $slug,
        ]);
    }

    // ================== HALAMAN /ARTIKEL/PORTOFOLIO ==================
    public function portfolio()
    {
        $portofolio = Portofolio::where('published', 1)   // <-- pakai Portofolio
            ->orderBy('id', 'asc')
            ->get();

        return view('blog.portofolio', [
            'portofolio' => $portofolio,
        ]);
    }

    // ================== HALAMAN DETAIL /ARTIKEL/{SLUG} ==================
    public function show(string $slug)
    {
        // ambil artikel dari database
        $article = Article::where('slug', $slug)
            ->where('published', 1)
            ->firstOrFail();

        // label kategori untuk tampilan (misal: "Storytelling & Branding")
        $article->category_label = $this->categories[$article->category_slug] ?? $article->category_slug;

        // format content markdown → HTML
        $article->html = $this->formatContent($article->content ?? '');

        // artikel terkait: prioritaskan kategori yang sama
        $related = Article::where('published', 1)
            ->where('id', '!=', $article->id)
            ->where('category_slug', $article->category_slug)
            ->orderBy('id', 'asc')
            ->take(3)
            ->get();

        // kalau kurang dari 3, tambahkan artikel lain (kategori bebas)
        if ($related->count() < 3) {
            $extra = Article::where('published', 1)
                ->where('id', '!=', $article->id)
                ->whereNotIn('id', $related->pluck('id'))
                ->orderBy('id', 'asc')
                ->take(3 - $related->count())
                ->get();

            $related = $related->concat($extra);
        }

        return view('blog-detail', [
            'article'    => $article,
            'categories' => $this->categories,
            'related'    => $related,
        ]);
    }
}
