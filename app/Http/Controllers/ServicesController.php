<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    // HALAMAN LIST /layanan
    public function services()
    {
        // ambil semua layanan yang published = 1
        $services = Service::where('published', 1)
            ->orderBy('id', 'asc')
            ->get();

        return view('service', compact('services'));
    }

    // HALAMAN DETAIL /layanan/{slug}
    public function show(string $slug)
    {
        // cari layanan berdasarkan slug
        $service = Service::where('slug', $slug)
            ->where('published', 1)
            ->firstOrFail();

        // pecah teks per baris jadi array
        $service->highlights_list = $service->highlights
            ? array_filter(preg_split('/\r\n|\r|\n/', trim($service->highlights)))
            : [];

        $service->process_list = $service->process
            ? array_filter(preg_split('/\r\n|\r|\n/', trim($service->process)))
            : [];

        $service->results_list = $service->results
            ? array_filter(preg_split('/\r\n|\r|\n/', trim($service->results)))
            : [];

        return view('service-detail', compact('service'));
    }
}
