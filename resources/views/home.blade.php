@extends('layout')

@section('title', __('Home'))

@section('style')
    <style>
        .top-margin { margin-top: 60px; }
    </style>
@endsection

@section('content')
    <div class="row top-margin pt-3">
        <div class="col-12 pb-3">
            <div class="card text-center">
                <div class="card-header">
                    <div class="card-title">
                        <h2>Register for COVID-19 Vaccine</h2>
                    </div>
                </div>
                <div class="card-body">
{{--                    <p style="font-size: 20px;">You will be needed</p>--}}
{{--                    <hr>--}}
{{--                    <img src="{{ asset('/assets/images/vaccine_doc.png') }}" alt="...">--}}
{{--                    <hr>--}}
{{--                    <br>--}}
                    <img src="{{ asset('/assets/images/register.png') }}" alt="...">
                    <a href="{{ route('register') }}" style="text-decoration: none;"><h4>Register Here</h4></a>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card text-center pb-3 mb-3">
                <div class="card-body">
                    <img src="{{ asset('/assets/images/check_status.png') }}" alt="...">
                    <a href="{{ route('vaccine-status') }}" style="text-decoration: none;"><h4>Check Status</h4></a>
                </div>
            </div>
        </div>
    </div>
@endsection
