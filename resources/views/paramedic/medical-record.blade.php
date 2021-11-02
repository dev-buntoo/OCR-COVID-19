@extends('layouts.dashboard')

@section('title') Medical Record @stop

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
                            <form action="{{ route('paramedic.add_medical_record.store', $citizen->passcode) }}"
                                method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="disease" class="font-bold">Enter Disease Name</label>
                                    <input type="text" name="disease" id="disease" class="form-control "
                                        placeholder="Please Disease Name" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-xs btn-outline-primary search-btn">Save</button>
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
@stop
