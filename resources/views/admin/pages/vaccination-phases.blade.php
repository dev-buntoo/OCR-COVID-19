@extends('admin.layout.admin')

@section('title') Vaccination Phase @stop

@section('pageStyles')

@stop
@section('breadcrubsList')
    <li><span>Vaccination Phases</span></li>
@stop
@section('pageContent')
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8">
                            <h4 class="header-title">Vaccination Phases</h4>
                        </div>
                        <div class="col-sm-4 text-right">
                            <button class="btn btn-xs btn-success" data-toggle="modal" data-target="#addPhaseModal">
                                <i class=" ti-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="response"></div>
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead class="text-uppercase bg-dark">
                                <tr class="text-white">
                                    <th scope="col">Minimum Age</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vaccinationPhases as $phase)
                                    <tr>
                                        <td>{{ $phase->minimum_age }}</td>
                                        <td>{{ $phase->status === '1' ? 'Active' : 'Unactive' }}</td>
                                        <td>
                                            @if ($phase->status === '0')
                                                <button class="btn btn-xs btn-success onPhase"
                                                    value="{{ $phase->vaccination_phase_id }}"> Turn On </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('pageScripts')
    <script src="{{ asset('custom/js/phases.js') }}"></script>
@stop
