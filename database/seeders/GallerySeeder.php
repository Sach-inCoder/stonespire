<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [

            [
                'title' => 'Printing Solutions',
                'category' => 'printing',
                'image' => 'assets/images/gallery-1.png',
                'sort_order' => 1,
                'status' => true,
            ],

            [
                'title' => 'Self Adhesive Labels',
                'category' => 'labels',
                'image' => 'assets/images/self-adhesive.png',
                'sort_order' => 2,
                'status' => true,
            ],

            [
                'title' => 'Printed Products',
                'category' => 'products',
                'image' => 'assets/images/gallery-3.png',
                'sort_order' => 3,
                'status' => true,
            ],

            [
                'title' => 'Digital Printing',
                'category' => 'printing',
                'image' => 'assets/images/digital.png',
                'sort_order' => 4,
                'status' => true,
            ],

            [
                'title' => 'Barcode Labels',
                'category' => 'labels',
                'image' => 'assets/images/bar.png',
                'sort_order' => 5,
                'status' => true,
            ],

            [
                'title' => 'Label Products',
                'category' => 'products',
                'image' => 'assets/images/labels.png',
                'sort_order' => 6,
                'status' => true,
            ],

            [
                'title' => 'Custom Labels',
                'category' => 'labels',
                'image' => 'assets/images/custome.png',
                'sort_order' => 7,
                'status' => true,
            ],

            [
                'title' => 'Screen Printing',
                'category' => 'printing',
                'image' => 'assets/images/Screen Printing.png',
                'sort_order' => 8,
                'status' => true,
            ],

        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}