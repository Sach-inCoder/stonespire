<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'category',
        'short_description',
        'content',
        'author',
        'quote',
        'quote_author',
        'read_time',
        'sort_order',
        'featured',
        'status',
        'published_at',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'status' => 'boolean',
        'published_at' => 'date',
    ];
}