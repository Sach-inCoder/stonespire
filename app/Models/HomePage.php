<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_description',
        'hero_button_text',
        'hero_button_url',

        'about_label',
        'about_experience',
        'about_title',
        'about_description',
        'about_description_2',
        'about_image',
        'about_button_text',
        'about_button_url',

        'quote_title',
        'quote_button_text',
        'quote_button_url',

        'solutions_subtitle',
        'solutions_title',

        'products_label',
        'products_title',
        'products_description',

        'location_title',
        'location_description',
        'location_label',
        'location_name',
        'location_map',

        'testimonials_title',
        'testimonials_description',

        'clients_label',
        'clients_title',

        'quality_title',
        'quality_subtitle',
        'quality_image',
    ];
}