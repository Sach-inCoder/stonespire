<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\HomePage;
use App\Models\Product;
use App\Models\QualityFacility;
use App\Models\Service;
use App\Models\ServiceTag;
use App\Models\Slider;
use App\Models\Statistic;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HomepageSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | HOME PAGE DETAILS
        |--------------------------------------------------------------------------
        */

        HomePage::updateOrCreate(
            ['id' => 1],
            [
                'about_label' => 'About Us',

                'about_experience' => '16 Years of Industry Experience',

                'about_title' =>
                    'Leading Printing & Labeling Solutions Provider in India',

                'about_description' =>
                    'Founded in 2025, Stonespire Graphics Private Limited is an ISO-certified company and one of India\'s trusted printing solution providers. With more than 2+ years of experience, we specialize in panel overlays, self-adhesive labels, barcode labels, dome stickers, POS labels, aluminium labels and various commercial printing materials and auto mobile Graphics.',

                'about_description_2' =>
                    'Using advanced technologies such as screen, offset, flexo and digital printing, we deliver reliable, high-quality products backed by modern machinery, in-house testing and a skilled professional team.',

                'about_image' => 'assets/images/about.png',

                'about_button_text' => 'Know More',
                'about_button_url' => '/about',


                /*
                |--------------------------------------------------------------------------
                | QUOTE
                |--------------------------------------------------------------------------
                */

                'quote_title' =>
                    'Request a Quote For<br>Free Consultation',

                'quote_button_text' => 'REQUEST A QUOTE',
                'quote_button_url' => '/contact',


                /*
                |--------------------------------------------------------------------------
                | PRINTING SOLUTIONS
                |--------------------------------------------------------------------------
                */

                'solutions_subtitle' =>
                    'Your All Printing Needs Under A Single Roof',

                'solutions_title' =>
                    'Our Printing Solutions',


                /*
                |--------------------------------------------------------------------------
                | PRODUCT RANGE
                |--------------------------------------------------------------------------
                */

                'products_label' => 'OUR PRODUCTS',

                'products_title' => 'Our Product Range',

                'products_description' =>
                    'High-quality printing and labeling products for multiple industrial applications.',


                /*
                |--------------------------------------------------------------------------
                | LOCATION
                |--------------------------------------------------------------------------
                */

                'location_title' => 'Our Nationwide Presence',

                'location_description' =>
                    'Serving clients with reliable printing solutions from our strategic location.',

                'location_label' => 'Our Location',

                'location_name' => 'New Delhi',

                'location_map' => 'assets/images/map.png',


                /*
                |--------------------------------------------------------------------------
                | TESTIMONIALS
                |--------------------------------------------------------------------------
                */

                'testimonials_title' => 'What Our Clients Say',

                'testimonials_description' =>
                    'Trusted by businesses for reliable printing and labeling solutions.',


                /*
                |--------------------------------------------------------------------------
                | CLIENTS
                |--------------------------------------------------------------------------
                */

                'clients_label' => 'TRUSTED BY',

                'clients_title' => 'Our Clients',


                /*
                |--------------------------------------------------------------------------
                | QUALITY LAB
                |--------------------------------------------------------------------------
                */

                'quality_title' => 'In-House Testing Facilities',

                'quality_subtitle' => 'Quality Lab',

                'quality_image' => 'assets/images/techinal.png',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | HERO SLIDER
        |--------------------------------------------------------------------------
        */

        $sliders = [
            [
                'title' => null,
                'subtitle' => null,
                'description' => null,
                'image' => 'assets/images/slider-1.png',
                'button_text' => null,
                'button_url' => null,
                'sort_order' => 1,
                'status' => true,
            ],

            [
                'title' => null,
                'subtitle' => null,
                'description' => null,
                'image' => 'assets/images/slider-2.png',
                'button_text' => null,
                'button_url' => null,
                'sort_order' => 2,
                'status' => true,
            ],

            [
                'title' => null,
                'subtitle' => null,
                'description' => null,
                'image' => 'assets/images/slider-3.png',
                'button_text' => null,
                'button_url' => null,
                'sort_order' => 3,
                'status' => true,
            ],

            [
                'title' => null,
                'subtitle' => null,
                'description' => null,
                'image' => 'assets/images/slider-4.jpeg',
                'button_text' => null,
                'button_url' => null,
                'sort_order' => 4,
                'status' => true,
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::updateOrCreate(
                [
                    'image' => $slider['image'],
                ],
                $slider
            );
        }


        /*
        |--------------------------------------------------------------------------
        | STATISTICS
        |--------------------------------------------------------------------------
        */

        $statistics = [
            [
                'value' => '16 +',
                'label' => 'Years of Industry Experience',
                'icon' => 'fa-solid fa-award',
                'sort_order' => 1,
            ],

            [
                'value' => '50+',
                'label' => 'Satisfied Clients',
                'icon' => 'fa-solid fa-users',
                'sort_order' => 2,
            ],

            [
                'value' => '10+',
                'label' => 'Advanced Printing & Label Solutions',
                'icon' => 'fa-solid fa-print',
                'sort_order' => 3,
            ],

            [
                'value' => '4',
                'label' => 'ISO & Quality Certifications',
                'icon' => 'fa-solid fa-certificate',
                'sort_order' => 4,
            ],
        ];

        foreach ($statistics as $statistic) {
            Statistic::updateOrCreate(
                [
                    'label' => $statistic['label'],
                ],
                array_merge(
                    $statistic,
                    ['status' => true]
                )
            );
        }


        /*
        |--------------------------------------------------------------------------
        | SERVICES
        |--------------------------------------------------------------------------
        */

        $services = [
            [
                'name' => 'Screen Printing',
                'icon' => 'fa-solid fa-print',
                'image' => 'https://www.mdgraphics.in/wp-content/uploads/2026/03/screen-printing-CqE7-DLr.jpg',
                'short_description' =>
                    'High-durability prints for panel overlays, self-adhesive labels, dome stickers, warranty seals, and POS labels with exceptional color vibrancy.',
                'sort_order' => 1,
                'tags' => [
                    'MULTI-COLOR',
                    'PANEL OVERLAYS',
                    'DOME STICKERS',
                ],
            ],

            [
                'name' => 'Digital Printing',
                'icon' => 'fa-solid fa-print',
                'image' => 'https://www.mdgraphics.in/wp-content/uploads/2026/03/digital-printing-cvPwx2vh.jpg',
                'short_description' =>
                    'Variable data printing with rapid turnaround for short to medium runs. Perfect for prototypes, custom labels, and personalized packaging.',
                'sort_order' => 2,
                'tags' => [
                    'VARIABLE DATA',
                    'SHORT RUNS',
                    'HIGH DPI',
                ],
            ],

            [
                'name' => 'Flexo Printing',
                'icon' => 'fa-solid fa-gears',
                'image' => 'https://www.mdgraphics.in/wp-content/uploads/2026/03/flexo-printing-BPvBWTqz.jpg',
                'short_description' =>
                    'Roll-to-roll printing on flexible substrates including paper, polyester, vinyl, and polycarbonate films for high-volume label production.',
                'sort_order' => 3,
                'tags' => [
                    'ROLL-TO-ROLL',
                    'MULTI-SUBSTRATE',
                    'HIGH VOLUME',
                ],
            ],

            [
                'name' => 'Offset Printing',
                'icon' => 'fa-solid fa-copy',
                'image' => 'https://www.mdgraphics.in/wp-content/uploads/2026/03/offset-printing-DeUxRynW.jpg',
                'short_description' =>
                    'Multi-color precision for commercial prints, brochures, catalogues, owner\'s manuals, and high-run publicity materials with CMYK accuracy.',
                'sort_order' => 4,
                'tags' => [
                    'CMYK PRECISION',
                    'HIGH-RUN',
                    'COMMERCIAL GRADE',
                ],
            ],

            [
                'name' => 'Barcode Labels & Printing Ribbon',
                'icon' => 'fa-solid fa-barcode',
                'image' => 'https://www.mdgraphics.in/wp-content/uploads/2026/03/barcode-labels-MKZi8_Kn.jpg',
                'short_description' =>
                    'Thermal transfer and direct thermal barcode labels with printing ribbons. Complete solutions for tracking, inventory, and compliance labeling.',
                'sort_order' => 5,
                'tags' => [
                    'THERMAL TRANSFER',
                    'DIRECT THERMAL',
                    'RIBBON SUPPLY',
                ],
            ],
        ];

        foreach ($services as $serviceData) {

            $tags = $serviceData['tags'];

            unset($serviceData['tags']);

            $service = Service::updateOrCreate(
                [
                    'slug' => Str::slug($serviceData['name']),
                ],
                array_merge(
                    $serviceData,
                    [
                        'status' => true,
                    ]
                )
            );

            foreach ($tags as $index => $tagName) {

                ServiceTag::updateOrCreate(
                    [
                        'service_id' => $service->id,
                        'slug' => Str::slug($tagName),
                    ],
                    [
                        'name' => $tagName,
                        'status' => true,
                        'sort_order' => $index + 1,
                    ]
                );
            }
        }


        /*
        |--------------------------------------------------------------------------
        | PRODUCTS
        |--------------------------------------------------------------------------
        */

        $products = [
            [
                'name' => 'Panel Overlay',
                'image' => 'assets/images/panel-overlay.png',
                'sort_order' => 1,
            ],

            [
                'name' => 'Strips',
                'image' => 'assets/images/strips.png',
                'sort_order' => 2,
            ],

            [
                'name' => 'Barcode & Color Labels',
                'image' => 'assets/images/labels.png',
                'sort_order' => 3,
            ],

            [
                'name' => 'Self-Adhesive Labels',
                'image' => 'assets/images/self.png',
                'sort_order' => 4,
            ],

            [
                'name' => 'Dome Logo',
                'image' => 'assets/images/dome-logo.png',
                'sort_order' => 5,
            ],

            [
                'name' => 'Nickel Logo',
                'image' => 'assets/images/nickel.png',
                'sort_order' => 6,
            ],

            [
                'name' => 'Aluminium Labels',
                'image' => 'assets/images/aluminium.png',
                'sort_order' => 7,
            ],

            [
                'name' => 'SS Labels',
                'image' => 'assets/images/ss.png',
                'sort_order' => 8,
            ],

            [
                'name' => 'In-House Testing Facilities',
                'image' => 'assets/images/inhouse.png',
                'sort_order' => 9,
            ],

            [
                'name' => 'Barcode & Color Labels',
                'image' => 'assets/images/barcode.png',
                'sort_order' => 10,
            ],

            [
                'name' => 'Manual & Brochure',
                'image' => 'assets/images/broc.png',
                'sort_order' => 11,
            ],
        ];

        foreach ($products as $productData) {

            $slug = Str::slug($productData['name']);

            /*
             * Product #03 and #10 have the same name.
             * Use a unique slug for #10.
             */
            if ($productData['sort_order'] === 10) {
                $slug = 'barcode-color-labels-2';
            }

            Product::updateOrCreate(
                [
                    'slug' => $slug,
                ],
                [
                    'name' => $productData['name'],
                    'slug' => $slug,
                    'image' => $productData['image'],
                    'whatsapp_message' =>
                        'Hello Stonespire Graphics, I want an inquiry for '
                        . $productData['name'] . '.',
                    'sort_order' => $productData['sort_order'],
                    'featured' => true,
                    'status' => true,
                ]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | TESTIMONIALS
        |--------------------------------------------------------------------------
        */

        $testimonials = [
            [
                'name' => 'ANISH SACHDEVA',
                'message' =>
                    'Excellent print quality and very professional service from the team. Their quality and support have always been impressive.',
                'rating' => 4,
                'sort_order' => 1,
            ],

            [
                'name' => 'MANJU ANTIL',
                'message' =>
                    'Highly reliable company for durable labels and high-quality printing. Excellent service and professional team.',
                'rating' => 5,
                'sort_order' => 2,
            ],

            [
                'name' => 'PARVEEN GOSWAMI',
                'message' =>
                    'Premium quality labels with perfect finishing. Very professional service and excellent overall experience.',
                'rating' => 5,
                'sort_order' => 3,
            ],

            [
                'name' => 'RAHUL SHARMA',
                'message' =>
                    'Very professional service with excellent attention to detail. The quality of work has always been impressive.',
                'rating' => 5,
                'sort_order' => 4,
            ],

            [
                'name' => 'PRIYA GUPTA',
                'message' =>
                    'Great experience from start to finish. Quality, delivery and customer service were all excellent.',
                'rating' => 4,
                'sort_order' => 5,
            ],
        ];

        foreach ($testimonials as $testimonial) {

            Testimonial::updateOrCreate(
                [
                    'name' => $testimonial['name'],
                ],
                array_merge(
                    $testimonial,
                    ['status' => true]
                )
            );
        }


        /*
        |--------------------------------------------------------------------------
        | CLIENTS
        |--------------------------------------------------------------------------
        */

        $clients = [
            [
                'name' => 'Amber',
                'logo' => 'assets/images/client-1.webp',
                'sort_order' => 1,
            ],

            [
                'name' => 'IV Tech Electronics',
                'logo' =>
                    'assets/images/iv_tech_electronics_private_limited_logo.jpeg',
                'sort_order' => 2,
            ],

            [
                'name' => 'Daikin',
                'logo' => 'assets/images/logo-3.png',
                'sort_order' => 3,
            ],

            [
                'name' => 'Bosch',
                'logo' => 'assets/images/client-4.png',
                'sort_order' => 4,
            ],

            [
                'name' => 'Luminous',
                'logo' =>
                    'assets/images/luminous-logo-png_seeklogo-512774.png',
                'sort_order' => 5,
            ],

            [
                'name' => 'Longway',
                'logo' => 'assets/images/longway.png',
                'sort_order' => 6,
            ],
        ];

        foreach ($clients as $client) {

            Client::updateOrCreate(
                [
                    'name' => $client['name'],
                ],
                array_merge(
                    $client,
                    ['status' => true]
                )
            );
        }


        /*
        |--------------------------------------------------------------------------
        | QUALITY LAB
        |--------------------------------------------------------------------------
        */

        $facilities = [
            [
                'name' => 'Hot Air Oven',
                'image' => 'assets/images/hpt.png',
                'sort_order' => 1,
            ],

            [
                'name' => 'Ink Abrasion Machine',
                'image' => 'assets/images/new-6.png',
                'sort_order' => 2,
            ],

            [
                'name' => 'Gloss Meter',
                'image' => 'assets/images/new-7.png',
                'sort_order' => 3,
            ],

            [
                'name' => 'Peel Cum Bond Tester',
                'image' => 'assets/images/new-9.png',
                'sort_order' => 4,
            ],
        ];

        foreach ($facilities as $facility) {

            QualityFacility::updateOrCreate(
                [
                    'name' => $facility['name'],
                ],
                array_merge(
                    $facility,
                    ['status' => true]
                )
            );
        }
    }
}