<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Product;
use App\Models\QualityFacility;
use App\Models\Service; 
use App\Models\Slider;
use App\Models\Statistic;   
use App\Models\Testimonial;
use App\Models\HomePage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sliders = Slider::select(['image'])->where('status',1)->orderBy('sort_order')->limit(5)->get();
        $statistics = Statistic::where('status',1)->orderBy('sort_order')->limit(4)->get();
        $services = Service::where('status',1)->orderBy('sort_order')->limit(6)->get();
        $products = Product::where('status',1)->orderBy('sort_order')->limit(10)->get();
        $testimonials = Testimonial::where('status',1)->orderBy('sort_order')->limit(8)->get();
        $clients = Client::where('status',1)->orderBy('sort_order')->limit(8)->get();
        $facilities = QualityFacility::where('status',1)->orderBy('sort_order')->limit(6)->get();
        $homePage = HomePage::find(1);
        return view('frontend.home',compact(
            'sliders',
            'statistics',
            'services',
            'products',
            'testimonials',
            'clients',
            'facilities',
            'homePage'
        ));
    }
}
