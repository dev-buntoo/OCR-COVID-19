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
                            <h4 class="header-title">Reaction Details</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="{{ route('paramedic.add_reaction.store', $citizen->passcode) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="reaction" class="font-bold">Reaction Detail</label>
                                    <textarea type="text" name="reaction" id="reaction" class="form-control "
                                        placeholder="Reaction Detail" required></textarea>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-xs btn-outline-primary">Save</button>
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
