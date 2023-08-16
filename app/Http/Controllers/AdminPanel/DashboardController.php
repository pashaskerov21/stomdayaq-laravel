<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Banner;
use App\Models\GalleryImages;
use App\Models\Partner;
use App\Models\PatientRegistration;
use App\Models\Report;
use App\Models\Worker;
use App\Models\WorkerRegistration;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $banners = Banner::where('destroy',0)->orderBy('sort')->get();
        $abouts = About::where('destroy',0)->orderBy('sort')->get();
        $partners = Partner::where('destroy',0)->orderBy('sort')->get();
        $workers = Worker::where('destroy',0)->orderBy('sort')->get();
        $galleryimages = GalleryImages::where('destroy',0)->orderBy('sort')->get();
        $reports = Report::where('destroy',0)->orderBy('sort')->get();
        $worker_register = WorkerRegistration::where('destroy',0)->get();
        $patient_register = PatientRegistration::where('destroy',0)->get();
        return view('admin-panel.dashboard.index', compact(['banners','abouts','partners','workers','galleryimages','reports','worker_register','patient_register']));
    }
}
