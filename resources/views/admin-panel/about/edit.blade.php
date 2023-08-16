@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">About Düzəliş et</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.about.update', $about->id) }}" method="POST">
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
                        <div class="mb-3">
                            <label class="form-label">title</label>
                            <input type="text" class="form-control" name="title" value="{{$about->title}}">
                        </div>
                    </div>
                    <div class="col-12 col-lg-7">
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            @foreach ($about->getText as $index => $a)
                                <li class="nav-item">
                                    <a href="#tab_{{ $a->lang }}" data-bs-toggle="tab"
                                        class="nav-link rounded-0 @if ($index == 0) active @endif">
                                        <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                        <span class="d-none d-md-block">{{ $a->lang }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach ($about->getText as $index => $a)
                                <div class="tab-pane show @if ($index == 0) active @endif" id="tab_{{$a->lang}}">
                                    <div class="mb-3">
                                        <label class="form-label">text {{$a->lang}}</label>
                                        <div class="quill-editor" style="height: 300px;">{!! $a->text !!}</div>
                                        <textarea name="text[]"  hidden></textarea>
                                        <input type="hidden" name="lang[]" value="{{$a->lang}}">
                                    </div>
                                </div>
                            @endforeach
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
