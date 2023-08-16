@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Menyu Düzəliş et</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.menu.update', $menu->id) }}" method="POST">
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
                            @foreach ($menu->getMenu as $index => $m)
                                <li class="nav-item">
                                    <a href="#tab_{{ $m->lang }}" data-bs-toggle="tab"
                                        class="nav-link rounded-0 @if ($index == 0) active @endif">
                                        <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                        <span class="d-none d-md-block">{{ $m->lang }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach ($menu->getMenu as $index => $m)
                                <div class="tab-pane show @if ($index == 0) active @endif" id="tab_{{$m->lang}}">
                                    <div class="mb-3">
                                        <label class="form-label">name {{$m->lang}}</label>
                                        <input type="text" class="form-control" name="name[]" value="{{$m->name}}">
                                        <input type="hidden" name="lang[]" value="{{$m->lang}}">
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
