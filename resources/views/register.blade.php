@extends('layout')

@section('title', __('Register'))

@section('style')
    <style>
        .top-margin { margin-top: 60px; }
    </style>
@endsection

@section('content')
    <div class="row top-margin">
        <div class="col-12 pb-3 pt-3">

            @if (session('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            @endif

            <div class="card">
                <div class="card-header"><strong>COVID Vaccine Registration</strong></div>
                <form action="{{ route('registration') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label text-right">Full Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Your Full Name" required>
                                @if($errors->has('name'))<span class="text-danger">{{ $errors->first('name') }}</span>@endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nid" class="col-sm-2 col-form-label text-right">National ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nid" name="nid" value="{{ old('nid') }}" min="4" max="6" placeholder="Your National ID: 4-6 Digit" required>
                                @if($errors->has('nid'))<span class="text-danger">{{ $errors->first('nid') }}</span>@endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mobile" class="col-sm-2 col-form-label text-right">Mobile Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="mobile" name="mobile" value="{{ old('mobile') }}" min="11" max=11" placeholder="Your Mobile Number: 11 Digit" required>
                                @if($errors->has('mobile'))<span class="text-danger">{{ $errors->first('mobile') }}</span>@endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label text-right">Email Address</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Your Email Address" required>
                                @if($errors->has('email'))<span class="text-danger">{{ $errors->first('email') }}</span>@endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="vaccine_center_id" class="col-sm-2 col-form-label text-right">Vaccine Center</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="vaccine_center_id" name="vaccine_center_id" required>
                                    <option value="" selected>Select Vaccine Center</option>
                                    @foreach($vaccineCenters as $key => $vaccineCenter)
                                        <option value="{{ $key }}">{{ $vaccineCenter }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{ route('home') }}" class="btn btn-danger">Cancel</a>
                        <input name='reset' type="reset" value='Reset' class="btn btn-warning" />
                        <input type="submit" class="btn btn-primary" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
