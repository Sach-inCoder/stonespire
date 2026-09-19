<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'name',
        'short_description',
        'description',
        'image',
        'icon',
        'sort_order',
        'slug',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
    public function tags()
    {
        return $this->hasMany(ServiceTag::class)
            ->where('status', true)
            ->orderBy('sort_order');
    }
}
