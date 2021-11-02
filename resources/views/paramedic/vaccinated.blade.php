@extends('layouts.dashboard')

@section('title') Vaccinated By You @stop

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
                            <h4 class="header-title">Vaccinated By You</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="table-responsive">
                            <table class="table table-borderless table-condensed">
                                <thead>
                                    <tr>
                                        <th>Passcode</th>
                                        <th>CNIC</th>
                                        <th>Name</th>
                                        <th>Vaccination Date Time</th>
                                        <th>Reaction</th>
                                    </tr>
                                </thead>
                                <tbody id="vaccination-table">
                                    @include('paramedic.partials.vaccinated-cititzen')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
@section('pageScripts')
@stop
