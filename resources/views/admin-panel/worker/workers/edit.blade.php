@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Worker Düzəliş et</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.worker.update', $worker->id) }}" method="POST" enctype="multipart/form-data">
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
                    <div class="col-12 col-lg-6">
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            @foreach ($worker->getName as $index => $w)
                                <li class="nav-item">
                                    <a href="#tab_{{ $w->lang }}" data-bs-toggle="tab"
                                        class="nav-link rounded-0 @if ($index == 0) active @endif">
                                        <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                        <span class="d-none d-md-block">{{ $w->lang }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach ($worker->getName as $index => $w)
                                <div class="tab-pane show @if ($index == 0) active @endif" id="tab_{{$w->lang}}">
                                    <div class="mb-3">
                                        <label class="form-label">name {{$w->lang}}</label>
                                        <input type="text" class="form-control" name="name[]" value="{{$w->name}}">
                                        <input type="hidden" name="lang[]" value="{{$w->lang}}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="mb-3">
                            <label class="form-label">category</label>
                            <select name="category" class="form-select">
                                <option disabled selected>Seçin</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{$worker->category_id === $category->id ? 'selected' : ''}}>{{$category->getName->first()->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        <div class="mb-3">
                            <label class="form-label">image</label>
                            <input type="file" class="form-control" name="image">
                            @if ($worker->image_old)
                                <div class="image-review">
                                    <img src="{{asset('uploads/worker/'.$worker->image_old)}}" alt="">
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
