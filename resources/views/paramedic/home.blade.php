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
                            <h4 class="header-title">Start Vaccination</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form id="start-vaccination-form">
                                @csrf
                                <div id="response"></div>
                                <div class="form-group">
                                    <label for="passcode" class="font-bold">Enter Citizen Passcode</label>
                                    <input type="number" name="passcode" id="passcode" class="form-control "
                                        placeholder="Please Enter Citizen Vaccination Passcode" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-xs btn-outline-primary search-btn">Search <i
                                            class="ti-arrow-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
@section('pageScripts')
    <script src="{{ asset('custom/js/vaccinate-citizen.js') }}"></script>
@stop
