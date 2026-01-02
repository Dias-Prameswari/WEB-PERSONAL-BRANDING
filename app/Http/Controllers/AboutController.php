<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about()
    {
        // LOGO CLIENT (slide 2)
        $logoo = [
            'logo-testimoni-1_24_11zon.jpg',
            'logo-testimoni-2_25_11zon.jpg',
            'logo-testimoni-3_26_11zon.jpg',
            'logoclient-1_5_11zon.jpg',
            'logoclient-2_6_11zon.jpg',
            'logoclient-3_7_11zon.jpg',
            'logoclient-4_8_11zon.jpg',
            'logoclient-5_9_11zon.jpg',
            'logoclient-6_10_11zon.jpg',
            'logoclient-7_11_11zon.jpg',
            'logoclient-8_12_11zon.jpg',
            'logoclient-9_13_11zon.jpg',
            'logoclient-10_14_11zon.jpg',
            'logoclient-11_15_11zon.jpg',
            'logoclient-12_16_11zon.jpg',
            'logoclient-13_17_11zon.jpg',
            'logoclient-14_18_11zon.jpg',
            'logoclient-15_19_11zon.jpg',
            'logoclient-16_20_11zon.jpg',
            'logoclient-17_21_11zon.jpg',
            'logoclient-18_22_11zon.jpg',
            'logoclient-19_23_11zon.jpg',
        ];

        return view('about', compact(
            'logoo',
        ));
    }
}