@extends('admin.layout.admin')

@section('title') Citizens @stop

@section('pageStyles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@stop
@section('breadcrubsList')
<li><span>Citizens</span></li>
@stop
@section('pageContent')
<div class="row">
    <!-- data table start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <h4 class="header-title">Citizens</h4>
                    </div>
                    <div class="col-sm-4 text-right">
                        <button class="btn btn-xs btn-success" data-toggle="modal" data-target="#addCitizenModal">
                            <i class=" ti-plus"></i>
                        </button>
                    </div>
                </div>
                <hr>
                <div class="data-tables">
                    <table id="dataTable" class="text-center">
                        <thead class="bg-light text-capitalize">
                            <tr>
                                <th>Name</th>
                                <th>CNIC</th>
                                <th>Gender</th>
                                <th>Date Of Bith</th>
                                <th>Registored On</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Bruno Nash</td>
                                <td>Software Engineer</td>
                                <td>Edinburgh</td>
                                <td>21</td>
                                <td>2012/03/29</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Add Citizen Form Modal --}}
<div class="modal fade" id="addCitizenModal">
    <div class=" modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Citizen</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <div class="modal-body p-3">
                <form id="addCitizenForm" action="{{ route('admin.citizens.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-main-section">
                        <div class="card basicInfo">
                            <div class="card-header">
                                <h6 class="text-center">Basic Info</h6>
                            </div>
                            <div class=" card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Enter Name *</label>
                                            <input type="text" name="name" id="name" class="form-control alphabets" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Enter Phone No. *</label>
                                            <input type="text" name="phone" id="phone" class="form-control number"
                                                maxlength="11" minlength="10" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cnic">Enter CNIC *</label>
                                            <input type="text" name="cnic" id="cnic" class="form-control number"
                                                maxlength="13" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dob">Enter Date of Birth *</label>
                                            <input type="date" name="dob" id="dob" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Enter Email *</label>
                                            <input type="email" name="email" id="email" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender">Please Select Gender *</label>
                                            <select name="gender" id="gender" class="form-control" required>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="marital_status">Please Select Marital Status *</label>
                                            <select name="marital_status" id="marital_status" class="form-control" required>
                                                <option value="2">Married</option>
                                                <option value="1">Unmarried</option>
                                                <option value="3">Divorced</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card fatherInfo d-none">
                            <div class="card-header">
                                <h6 class="text-center">Father Info</h6>
                            </div>
                            <div class=" card-body">
                                <div class="row">
                                    <div class="col-md-6 offset-md-3">
                                        <div class="form-group">
                                            <label for="father_cnic">Enter Father's CNIC *</label>
                                            <input type="text" name="father_cnic" id="father_cnic" class="form-control number"
                                                maxlength="13">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-xs btn-success submitFinal">Confirm &nbsp;<i
                                            class="ti-angle-double-right"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="card husbandInfo d-none">
                            <div class="card-header">
                                <h6 class="text-center">Father Info</h6>
                            </div>
                            <div class=" card-body">
                                <div class="row">
                                    <div class="col-md-6 offset-md-3">
                                        <div class="form-group">
                                            <label for="husband_cnic">Enter Husband CNIC *</label>
                                            <input type="text" name="husband_cnic" id="husband_cnic" class="form-control number"
                                                maxlength="13">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-xs btn-success submitFinal">Confirm &nbsp;<i
                                            class="ti-angle-double-right"></i></button>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@section('pageScripts')
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.submitBasic', function () {
            if ($('#name').val() == '' || $('#phone').val() == '' || $('#cnic').val() == '' || $('#dob').val() == '' || $('#email').val() == '') {
                $('.basicError').text('Please Fill All Fields with * ')
            } else {
                let response = analizeBasicData();
                // $('.basicButtonSection').addClass('d-none');
                // $('.fatherInfo').removeClass('d-none');
            }
        });
        //validating Alpabets
        $(document).on('keydown', '.alphabets', function (e) {
            const pattern = /^[a-zA-Z ' \n\r-]+$/;
            return pattern.test(e.key)
        });
        //validating phone_no
        $('.number').keypress(function (e) {
            const pattern = /^[0-9]$/;
            return pattern.test(e.key)
        });
    });

    function analizeBasicData() {
            if($('#gender').val() == 1 && $('#marital_status').val() == 2){
                $('#addCitizenForm').submit();
            }
        }
</script>
@stop
