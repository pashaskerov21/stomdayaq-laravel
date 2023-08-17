@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Tənzimləmələr</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.settings.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    @if ($errors->any())
                        <div class="col-12">
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible text-bg-danger border-0 fade show"
                                    role="alert">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    {{ $error }}
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="col-12">
                            <div class="alert alert-success alert-dismissible text-bg-success border-0 fade show" role="alert">
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                {{ session('success') }}
                            </div>
                        </div>
                    @endif
                    <div class="col-12 col-lg-6">
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            <li class="nav-item">
                                <a href="#tab_az" data-bs-toggle="tab" class="nav-link rounded-0 active">
                                    <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                    <span class="d-none d-md-block">az</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab_en" data-bs-toggle="tab" class="nav-link rounded-0">
                                    <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                    <span class="d-none d-md-block">en</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab_ru" data-bs-toggle="tab" class="nav-link rounded-0">
                                    <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                    <span class="d-none d-md-block">ru</span>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            @foreach ($settings->getSettingTranslate as $index=>$translate)
                                <div class="tab-pane show @if ($index == 0) active @endif" id="tab_{{$translate->lang}}">
                                    <div class="mb-3">
                                        <label class="form-label">title {{$translate->lang}}</label>
                                        <input type="text" class="form-control" name="title[]" value="{{$translate->title}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">address {{$translate->lang}}</label>
                                        <input type="text" class="form-control" name="address[]" value="{{$translate->address}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">description {{$translate->lang}}</label>
                                        <input type="text" class="form-control" name="description[]" value="{{$translate->description}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">keywords {{$translate->lang}}</label>
                                        <input type="text" class="form-control" name="keywords[]" value="{{$translate->keywords}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">author az</label>
                                        <input type="text" class="form-control" name="author[]" value="{{$translate->author}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">copyright {{$translate->lang}}</label>
                                        <input type="text" class="form-control" name="copyright[]" value="{{$translate->copyright}}">
                                    </div>
                                    <input type="hidden" name="lang[]" value="{{$translate->lang}}">
                                </div>
                            @endforeach
                        </div>
                        
                        
                    </div>
                    
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">logo</label>
                            <input type="file" class="form-control" name="logo">
                            <input type="hidden" name="logo_old" value="{{$settings->logo_old}}">
                            @if ($settings->logo_old)
                                <div class="image-review">
                                    <img src="{{asset('uploads/settings/'.$settings->logo_old)}}" alt="">
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">favicon</label>
                            <input type="file" class="form-control" name="favicon">
                            <input type="hidden" name="favicon_old" value="{{$settings->favicon_old}}">
                            @if ($settings->favicon_old)
                                <div class="image-review">
                                    <img src="{{asset('uploads/settings/'.$settings->favicon_old)}}" alt="">
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">address url</label>
                            <input type="text" class="form-control" name="address_url" value="{{$settings->address_url}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">mail</label>
                            <input type="text" class="form-control" name="mail" value="{{$settings->mail}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">phone</label>
                            <input type="text" class="form-control" name="phone" value="{{$settings->phone}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">facebook</label>
                            <input type="text" class="form-control" name="facebook" value="{{$settings->facebook}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">instagram</label>
                            <input type="text" class="form-control" name="instagram" value="{{$settings->instagram}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">youtube</label>
                            <input type="text" class="form-control" name="youtube" value="{{$settings->youtube}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">report total</label>
                            <input type="text" class="form-control" name="report_total" value="{{$settings->report_total}}">
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-lg w-100">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
