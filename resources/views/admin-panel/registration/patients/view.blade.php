@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Patient View</h4>
            </div>
        </div>
        <div class="col-12 col-lg-7">
            <table class="table">
                <tr>
                    <td>Card Front</td>
                    <td>
                        <div class="image-review mb-3">
                            <img src="{{ asset('uploads/registration/patient/' . $patient->card_front) }}" alt="">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Card Back</td>
                    <td>
                        <div class="image-review mb-3">
                            <img src="{{ asset('uploads/registration/patient/' . $patient->card_back) }}" alt="">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Fullname</td>
                    <td>{{ $patient->fullname }}</td>
                </tr>
                <tr>
                    <td>Region</td>
                    <td>{{ $patient_region }}</td>
                </tr>
                <tr>
                    <td>Work Address</td>
                    <td>{{ $patient->address }}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{ $patient->phone }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
