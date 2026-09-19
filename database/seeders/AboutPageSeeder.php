<?php

namespace Database\Seeders;

use App\Models\AboutPage;
use App\Models\AboutTechnology;
use App\Models\AboutMission;
use Illuminate\Database\Seeder;

class AboutPageSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | About Page Settings
        |--------------------------------------------------------------------------
        */

        AboutPage::updateOrCreate(
            ['id' => 1],
            [
                // Banner
                'banner_title' => 'About us',

                // About Section
                'about_label' => 'About Us',
                'about_tagline' => 'Precision in Every Print',
                'about_title' => 'Reliable Printing & Labeling Solutions',

                'about_description' =>
                    'Stonespire Graphics Private Limited is a professional printing solutions company focused on delivering precision-driven, reliable and high-quality printing products for businesses and industries.',

                'about_description_2' =>
                    'Our expertise includes panel overlays, self-adhesive labels, barcode labels, dome stickers, POS labels, aluminium labels and automotive graphics. We combine modern printing techniques, quality materials and attention to detail to create solutions that meet specific product and branding requirements.',

                'about_image' => 'assets/images/about.png',
                'about_button_text' => 'Know More',

                // Technologies Section
                'technology_label' => 'Our Capabilities',
                'technology_title' => 'Printing Technologies Under One Roof',

                'technology_description' =>
                    'Our diverse printing technologies allow us to deliver customized solutions with precision, consistency and superior finishing for industrial and commercial applications.',

                // Vision / Values / Mission
                'vm_label' => 'What Drives Us',
                'vm_title' => 'Built on Purpose & Values',

                'vision_title' => 'Our Vision',

                'vision_description' =>
                    'To become a global leader in providing all types of label solutions by creating innovative products that make our customers\' products aesthetically appealing and competitive.',

                'values_title' => 'Our Values',

                'values_description' =>
                    'To manufacture and deliver quality products efficiently in a professional and flexible environment, on time and at the right cost, while continuously working towards becoming a world-class organization.',

                'mission_title' => 'Our Mission',

                // Quality Section
                'quality_label' => 'Quality & Innovation',
                'quality_title' => 'Quality That Speaks For Itself',

                'quality_description' =>
                    'Our in-house R&D and Quality Control systems are supported by qualified and experienced personnel who follow national and international standards.',

                'quality_description_2' =>
                    'We provide error-free, user-friendly products and services delivered on time and strictly according to customer designs and specifications at competitive prices.',

                'quality_image' => 'assets/images/quality.png',

                // CTA
                'cta_title' => 'Ready to Elevate Your Brand?',

                'cta_description' =>
                    'Partner with Stonespire Graphics Private Limited for world-class printing solutions that make your products stand out with quality, precision and innovation.',

                'cta_button_text' => 'Contact Us Today',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | Printing Technologies
        |--------------------------------------------------------------------------
        */

        



        /*
        |--------------------------------------------------------------------------
        | Mission Points
        |--------------------------------------------------------------------------
        */

        $missions = [

            'To produce world-class quality products',

            'To invest in new technology',

            'To create world-class infrastructure',

            'To adapt people-oriented culture',

            'To be best in quality, cost & delivery',

            'To continuously innovate & upgrade products',

        ];

        foreach ($missions as $index => $mission) {

            AboutMission::updateOrCreate(
                [
                    'title' => $mission,
                ],
                [
                    'sort_order' => $index + 1,
                    'status' => 1,
                ]
            );
        }
    }
}