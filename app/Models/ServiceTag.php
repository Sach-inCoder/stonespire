<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceTag extends Model
{
    protected $fillable = [
        'service_id',
        'name',
        'slug',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}