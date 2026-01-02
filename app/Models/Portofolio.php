<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    // use HasFactory;
    protected $table = 'portfolios';

    protected $fillable = [
        'title',
        'slug',
        'category_slug',
        'description',
        'techs',
        'link',
        'image_url',
        'published',
    ];

    protected $casts = [
        'published' => 'boolean',
        'techs'     => 'array',
    ];
}
