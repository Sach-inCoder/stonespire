<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutPage;
use App\Models\AboutMission;
use App\Models\Service;
use App\Models\Statistic;

class AboutController extends Controller
{
    public function index(){
        $statistics = Statistic::where('status',1)->orderBy('sort_order')->get();
        $services = Service::where('status',1)->orderBy('sort_order')->get();
        $missions = AboutMission::where('status',1)->orderBy('sort_order')->get();
        $aboutPage = AboutPage::firstOrFail();
        return view('frontend.about',compact('statistics','services','missions','aboutPage'));
    }
}
