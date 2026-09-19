<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    protected $fillable = [
        'banner_title',

        'about_label',
        'about_tagline',
        'about_title',
        'about_description',
        'about_description_2',
        'about_image',
        'about_button_text',

        'technology_label',
        'technology_title',
        'technology_description',

        'stats_title',

        'vm_label',
        'vm_title',

        'vision_title',
        'vision_description',

        'values_title',
        'values_description',

        'mission_title',

        'quality_label',
        'quality_title',
        'quality_description',
        'quality_description_2',
        'quality_image',

        'cta_title',
        'cta_description',
        'cta_button_text',
    ];
    public function missions()
    {
        return $this->hasMany(AboutMission::class);
    }
}