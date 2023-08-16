@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 col-xl-6">
            <a href="{{route('admin.banner.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>Banner</h3>
                    <h3>{{$banners->count()}}</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-xl-6">
            <a href="{{route('admin.about.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>About</h3>
                    <h3>{{$abouts->count()}}</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-xl-6">
            <a href="{{route('admin.partner.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>Partners</h3>
                    <h3>{{$partners->count()}}</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-xl-6">
            <a href="{{route('admin.worker.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>Workers</h3>
                    <h3>{{$workers->count()}}</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-xl-6">
            <a href="{{route('admin.gallery.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>Gallery Images</h3>
                    <h3>{{$galleryimages->count()}}</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-xl-6">
            <a href="{{route('admin.report.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>Report</h3>
                    <h3>{{$reports->count()}}</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-xl-6">
            <a href="{{route('admin.report.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>Registration</h3>
                    <h3>{{$worker_register->count() + $patient_register->count()}}</h3>
                </div>
            </a>
        </div>
    </div>
@endsection
