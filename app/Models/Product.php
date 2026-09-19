<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
        'short_description',
        'description',
        'final_content',
        'whatsapp_message',
        'sort_order',
        'featured',
        'status',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'status' => 'boolean',
    ];
    public function galleries()
    {
        return $this->hasMany(ProductGallery::class)
            ->orderBy('sort_order');
    }
}