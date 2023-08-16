@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Banner Düzəliş et</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                    <div class="col-12 col-lg-7">
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            @foreach ($banner->getTexts as $index => $b)
                                <li class="nav-item">
                                    <a href="#tab_{{ $b->lang }}" data-bs-toggle="tab"
                                        class="nav-link rounded-0 @if ($index == 0) active @endif">
                                        <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                        <span class="d-none d-md-block">{{ $b->lang }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach ($banner->getTexts as $index => $b)
                                <div class="tab-pane show @if ($index == 0) active @endif" id="tab_{{$b->lang}}">
                                    <div class="mb-3">
                                        <label class="form-label">text {{$b->lang}}</label>
                                        <div class="quill-editor" style="height: 300px;">{!! $b->text !!}</div>
                                        <textarea name="text[]"  hidden></textarea>
                                        <input type="hidden" name="lang[]" value="{{$b->lang}}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="mb-3">
                            <label class="form-label">content status</label>
                            <select name="content_status" class="form-select">
                                <option {{$banner->content_status == '1' ? 'selected' : ''}} value="1">Aktiv</option>
                                <option {{$banner->content_status == '0' ? 'selected' : ''}} value="0">Passiv</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="mb-3">
                            <label class="form-label">image</label>
                            <input type="file" class="form-control" name="image">
                            @if ($banner->image_old)
                                <div class="image-review mb-3">
                                    <img src="{{asset('uploads/banner/'.$banner->image_old)}}" alt="">
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
