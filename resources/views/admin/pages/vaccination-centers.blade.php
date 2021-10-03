@extends('admin.layout.admin')

@section('title') Vaccination Centers @stop

@section('pageStyles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@stop
@section('breadcrubsList')
    <li><span>Vaccination Centers</span></li>
@stop
@section('pageContent')
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8">
                            <h4 class="header-title">Vaccination Centers</h4>
                        </div>
                        <div class="col-sm-4 text-right">
                            <button class="btn btn-xs btn-success" data-toggle="modal" data-target="#addCenterModal">
                                <i class=" ti-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="response"></div>
                    <div class="data-tables">
                        <table id="vaccinationCentersTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>Name</th>
                                    <th>City</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Center Form Modal --}}
    <div class="modal fade" id="addCenterModal">
        <div class=" modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Vaccination Center</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form id="addCenter">
                    <div class="modal-body p-3">
                        @csrf
                        <div class="form-main-section">
                            <div class="card basicInfo">
                                <div class=" card-body">
                                    <div class="form-group">
                                        <label for="name">Enter Name *</label>
                                        <input type="text" name="name" id="name" class="form-control alphabets" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Select City *</label>
                                        <select name="city" id="city" class=" form-control">
                                            <option value="">Select City</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->city_id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Enter Address *</label>
                                        <textarea type="text" name="address" id="address" class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" modal-footer">
                        <div class="text-right">
                            <button type="submit" class="btn btn-sm btn-success"> Save </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Dilete center Modal --}}
    <div class="modal fade" id="delCenterModal">
        <div class=" modal-dialog bg-danger">
            <div class="modal-content panel-warning">
                <div class="modal-header panel-heading bg-danger">
                    <h5 class="modal-title">Delete City</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body p-3">
                    <p>Are you sure to delete this record? This cannot be <b>undone!<b></p>
                </div>
                <div class=" modal-footer">
                    <div class="text-right">
                        <button type="button" id="confirmDelete" class="btn btn-sm btn-danger"> Delete </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- edit response --}}
    <div id="editResponse"></div>
@stop
@section('pageScripts')
    <!-- Start datatable js -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script src="{{ asset('custom/js/vaccination-center.js') }}"></script>
@stop
