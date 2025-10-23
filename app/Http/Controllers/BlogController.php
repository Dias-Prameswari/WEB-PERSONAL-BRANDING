<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        // kamu sudah punya resources/views/blog.blade.php
        return view('blog');
    }

    public function portfolio()
    {
        // kalau belum ada view-nya, sementara pakai tampilan kosong
        return view('blog-portfolio'); // atau ganti ke view yang ada
    }

    public function category(string $slug)
    {
        // sementara bisa kirim slug ke view blog yang sama
        return view('blog', compact('slug'));
    }
}
