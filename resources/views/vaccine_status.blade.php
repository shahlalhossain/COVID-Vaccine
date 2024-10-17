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
                <div class="card-header"><strong>COVID Vaccine Status</strong></div>

                @if (isset($error))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">{{ $error }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                @endif
                @if (isset($success))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">{{ $success }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                @endif

                @if(isset($user))
                    <div class="card-body">
                        <table class="table table-sm table-hover table-bordered">
                            <tbody>
                            <tr>
                                <th class="text-right" style="width: 50%">Name:</th>
                                <td class="text-left" style="width: 50%">{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th class="text-right" style="width: 50%">Mobile:</th>
                                <td class="text-left" style="width: 50%">{{ $user->mobile }}</td>
                            </tr>
                            <tr>
                                <th class="text-right" style="width: 50%">Email:</th>
                                <td class="text-left" style="width: 50%">{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th class="text-right" style="width: 50%">National ID:</th>
                                <td class="text-left" style="width: 50%">{{ $user->nid }}</td>
                            </tr>
                            @if($user->vaccineAppointment)
                                <tr>
                                    <th class="text-right" style="width: 50%">Status:</th>
                                    <td class="text-left" style="width: 50%">
                                        @if($user->vaccineAppointment->vaccine_status && ucwords($user->vaccineAppointment->vaccine_status) == 'Scheduled')
                                            <span class="badge badge-pill badge-primary" style="font-size: 15px;">{{ ucwords($user->vaccineAppointment->vaccine_status) }}</span>
                                        @elseif($user->vaccineAppointment->vaccine_status && ucwords($user->vaccineAppointment->vaccine_status) == 'Vaccinated')
                                            <span class="badge badge-rounded badge-success" style="font-size: 15px;">{{ ucwords($user->vaccineAppointment->vaccine_status) }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-right" style="width: 50%">Vaccination Date:</th>
                                    <td class="text-left" style="width: 50%">{{ $user->vaccineAppointment->vaccination_date }}</td>
                                </tr>
                                <tr>
                                    <th class="text-right" style="width: 50%">Vaccine Center:</th>
                                    <td class="text-left" style="width: 50%">
                                        {{ $user->vaccineAppointment->vaccineCenter->name }} <br>
                                        {{ $user->vaccineAppointment->vaccineCenter->address }}
                                    </td>
                                </tr>

                            @else
                                <tr>
                                    <th class="text-right" style="width: 50%">Status:</th>
                                    <td class="text-left" style="width: 50%">
                                        <span class="badge badge-pill badge-warning" style="font-size: 15px;">{{ 'Not Scheduled' }}</span>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="card-body">
                        You can <a href="{{ route('register') }}">register</a> here
                    </div>
                @endif

                <div class="card-footer text-right">
                    <a href="{{ route('vaccine-status') }}" class="btn btn-primary">Check Again/Another</a>
                    <a href="{{ route('home') }}" class="btn btn-danger">Cancel</a>
                </div>
            </div>

        </div>
    </div>


@endsection
