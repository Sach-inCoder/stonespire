<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QualityFacility extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'sort_order',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}