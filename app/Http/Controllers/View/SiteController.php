<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\ApplicationArea;
use App\Models\Banner;
use App\Models\GalleryCategory;
use App\Models\GalleryImages;
use App\Models\Menu;
use App\Models\Partner;
use App\Models\Region;
use App\Models\Report;
use App\Models\Settings;
use App\Models\Worker;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        $lang = ['az' => '/', 'ru' => '/ru/', 'en' => '/en/',];
        $settings = Settings::findOrFail(1);
        $menues = Menu::where('destroy',0)->orderBy('sort')->get();
        $areas = ApplicationArea::where('destroy',0)->orderBy('sort')->get();
        $regions = Region::where('destroy', 0)->orderBy('sort')->get();
        $banners = Banner::where('destroy',0)->orderBy('sort')->get();
        $abouts = About::where('destroy',0)->orderBy('sort')->get();
        $partners = Partner::where('destroy',0)->orderBy('sort')->get();
        $workers = Worker::where('destroy',0)->orderBy('sort')->get();
        $gallerycategories = GalleryCategory::where('destroy',0)->orderBy('sort')->get();
        $galleryimages = GalleryImages::where('destroy',0)->orderBy('sort')->get();
        $reports = Report::where('destroy',0)->orderBy('sort')->get();
        return view('site.index', compact(['lang','settings','menues','areas','regions','banners','abouts','partners','workers','gallerycategories','galleryimages','reports']));
    }
}
