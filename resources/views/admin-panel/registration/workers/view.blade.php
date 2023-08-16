@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Worker View</h4>
            </div>
        </div>
        <div class="col-12 col-lg-7">
            <table class="table">
                <tr>
                    <td>Image</td>
                    <td>
                        <div class="image-review mb-3">
                            <img src="{{ asset('uploads/registration/worker/' . $worker->image) }}" alt="">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Fullname</td>
                    <td>{{ $worker->fullname }}</td>
                </tr>
                <tr>
                    <td>Region</td>
                    <td>{{ $worker_region }}</td>
                </tr>
                <tr>
                    <td>Work Address</td>
                    <td>{{ $worker->work_address }}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{ $worker->phone }}</td>
                </tr>
                <tr>
                    <td>Mail</td>
                    <td>{{ $worker->mail }}</td>
                </tr>
                <tr>
                    <td>Application Area</td>
                    <td>
                        <div class="areas">
                            @foreach ($worker->getWorkerArea as $area)
                                <div class="mb-2">{{ $area->getArea->first()->getName->first()->name }}</div>
                            @endforeach
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
