@extends('layouts.dashboard')

@section('title') Citizen Verification @stop

@section('pageStyles')

@stop
@section('breadcrubsList')
    <li><span>Citizen Verification</span></li>
@stop
@section('pageContent')
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8">
                            <h4 class="header-title">Citizen Verification</h4>
                        </div>
                        <div class="col-sm-4 text-right">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <form id="passcode-form" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 offset-md-4">
                                    <div id="response"></div>
                                    <div class="form-group">
                                        <label for="passcode" class="font-bold">Enter Passcode</label>
                                        <input type="number" name="passcode" id="passcode" class="form-control "
                                            placeholder="Please Enter Citizen Vaccination Passcode" required>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-xs btn-outline-primary">Search <i
                                                class="ti-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="citizen-record"></div>

@stop
@section('pageScripts')
    <script src="{{ asset('custom/js/citizen-verification.js') }}"></script>
@stop
