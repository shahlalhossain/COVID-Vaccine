@extends('layout')

@section('title', __('Vaccine Status Check'))

@section('style')
    <style>
        .top-margin { margin-top: 60px; }
    </style>
@endsection

@section('content')
    <div class="row top-margin">
        <div class="col-12 pb-3 pt-3">
            <div class="card">
                <div class="card-header"><strong>COVID Vaccine Status Check</strong></div>
                <form action="{{ route('vaccine-status-check') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nid" class="col-sm-2"></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nid" name="nid" value="{{ isset($user->nid) ? $user->nid : '' }}" placeholder="Your National ID" required>
                                @if($errors->has('nid'))<span class="text-danger">{{ $errors->first('nid') }}</span>@endif
                            </div>
                            <div class="col-sm-4">
                                <input type="submit" class="btn btn-primary" value="Check">
                                <input name='reset' type="reset" value='Clear' class="btn btn-warning" />
                                <a href="{{ route('home') }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
