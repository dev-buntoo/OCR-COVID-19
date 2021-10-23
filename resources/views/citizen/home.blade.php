@extends('layouts.dashboard')

@section('title') Home @stop

@section('pageStyles')

@stop
@section('breadcrubsList')

@stop
@section('pageContent')
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8">
                            <h4 class="header-title">Vaccination Registration</h4>
                        </div>
                        <div class="col-sm-4 text-right">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="response"></div>
                    @if ($alreadyRegistered)
                        <p class="text-center text-danger text-bold">
                            {{ $message }}
                        </p>
                    @else
                        @if ($eligible)
                                <div class="form-main-section">
                                    <div class="card basicInfo">
                                        <div class=" card-body">
                                            <p class="text-center text-success">
                                                Dear Citizen! You are eligible for vaccination please hit the button bellow
                                                to get secret code for vaccination.
                                            </p>
                                            <div class="form-group text-center my-3">
                                                <form enctype="multipart/form-data" method="post" action="{{ route('citizen.vaccine_registration') }}">
                                                    @csrf
                                                    <button class="btn btn-xs btn-success" type="submit">Get Code for
                                                        Vaccination</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @else
                            <p class="text-center text-danger text-bold">
                                {{ $message }}
                            </p>
                        @endif
                    @endif

                </div>
            </div>
        </div>
    </div>


@stop
@section('pageScripts')

@stop
