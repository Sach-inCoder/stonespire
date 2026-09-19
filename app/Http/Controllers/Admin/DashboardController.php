<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Product;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\Testimonial;
use App\Models\Client;
use App\Models\ContactPageQuery;
use App\Models\Statistic;
use App\Models\QualityFacility;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $stats = [

            'slider' => [
                'count' => Slider::count(),
                'label' => 'Sliders',
                'path' => route('admin.sliders.index'),
            ],
            'services' => [
                'count' => Service::count(),
                'label' => 'Services',
                'path' => route('admin.services.index'),
            ],

            'products' => [
                'count' => Product::count(),
                'label' => 'Products',
                'path' => route('admin.products.index'),
            ],

            'blogs' => [
                'count' => Blog::count(),
                'label' => 'Blogs',
                'path' => route('admin.blogs.index'),
            ],

            'galleries' => [
                'count' => Gallery::count(),
                'label' => 'Gallery',
                'path' => route('admin.galleries.index'),
            ],

            'testimonials' => [
                'count' => Testimonial::count(),
                'label' => 'Testimonials',
                'path' => route('admin.testimonials.index'),
            ],

            'clients' => [
                'count' => Client::count(),
                'label' => 'Clients',
                'path' => route('admin.clients.index'),
            ],

            'statistics' => [
                'count' => Statistic::count(),
                'label' => 'Statistics',
                'path' => route('admin.statistics.index'),
            ],

            'qualityFacilities' => [
                'count' => QualityFacility::count(),
                'label' => 'Quality Facilities',
                'path' => route('admin.quality-facilities.index'),
            ],
            'queries' => [
                'count' => ContactPageQuery::count(),
                'label' => 'Queries',
                'path' => route('admin.queries'),
            ],

        ];
        return view('admin.dashboard', compact('stats'));
    }
}
