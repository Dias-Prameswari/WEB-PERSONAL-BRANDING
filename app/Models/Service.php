<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category_slug',
        'excerpt',
        'image_url',
        'published',

        // tambahan:
        'hero_intro',
        'hero_goal',
        'about',
        'highlights',
        'process',
        'results',
    ];
}
