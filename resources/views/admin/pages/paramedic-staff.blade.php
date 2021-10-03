@extends('admin.layout.admin')

@section('title') Paramedic Staff @stop

@section('pageStyles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@stop
@section('breadcrubsList')
    <li><span>Paramedic Staff</span></li>
@stop
@section('pageContent')
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8">
                            <h4 class="header-title">Paramedic Staff</h4>
                        </div>
                        <div class="col-sm-4 text-right">
                            <button class="btn btn-xs btn-success" data-toggle="modal" data-target="#addStaffModal">
                                <i class=" ti-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="response"></div>
                    <div class="data-tables">
                        {{-- <table id="citiesTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Add City Form Modal --}}
    <div class="modal fade" id="addStaffModal">
        <div class=" modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Paramedic Staff</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <form id="addCenter">
                    <div class="modal-body p-3">
                        @csrf
                        <div class="form-main-section">
                            <div class="card basicInfo">
                                <div class=" card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name *</label>
                                                <input type="text" name="name" id="name" class="form-control alphabets"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Phone *</label>
                                                <input type="text" name="phone" id="phone" class="form-control numeric"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Email *</label>
                                                <input type="email" name="email" id="email" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password *</label>
                                                <input type="password" name="password" id="password"
                                                    class="form-control alphabets" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="cnic">CNIC *</label>
                                                <input type="text" name="cnic" id="cnic" class="form-control numeric"
                                                    required minlength="13" maxlength="13">
                                            </div>
                                            <div class="form-group">
                                                <label for="dob">Date Of Birth *</label>
                                                <input type="date" name="dob" id="dob" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="gender">Gender *</label>
                                                <select name="gender" id="gender" class="form-control" required>
                                                    <option value="">Select Gender</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                    <option value="3">Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Vaccination Center *</label>
                                                <select name="center" id="center" class="form-control" required>
                                                    <option value="">Select Vaccination Center</option>
                                                    @foreach ($vaccinationCenters as $center)
                                                        <option value="{{ $center->vaccination_center_id }}">{{ $center->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Email *</label>
                                                <input type="email" name="email" id="email" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password *</label>
                                                <input type="password" name="password" id="password"
                                                    class="form-control alphabets" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="cnic">CNIC *</label>
                                                <input type="text" name="cnic" id="cnic" class="form-control numeric"
                                                    required minlength="13" maxlength="13">
                                            </div>
                                            <div class="form-group">
                                                <label for="dob">Date Of Birth *</label>
                                                <input type="date" name="dob" id="dob" class="form-control" required>
                                            </div>
                                        </div>
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
    {{-- Dilete City Modal --}}
    <div class="modal fade" id="delStaffModal">
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
    <script src="{{ asset('custom/js/city.js') }}"></script>
@stop
