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

                    <div class="table-responsive">
                        <table id="citizen-table" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th>Family Number</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>CNIC</th>
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

    {{-- Add Citizen Form Modal --}}
    <div class="modal fade" id="addCitizenModal">
        <div class=" modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Citizen</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body p-3">
                    <form id="addCitizenForm">
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
                                                <input type="text" name="name" id="name" class="form-control alphabets"
                                                    required>
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
                                                <label for="date_of_birth">Enter Date of Birth *</label>
                                                <input type="date" name="date_of_birth" id="date_of_birth"
                                                    class="form-control" required>
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
                                                <label style="color: #7e74ff">Gender </label>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="male" name="gender"
                                                        class="custom-control-input gender" value="1" required>
                                                    <label class="custom-control-label" for="male">Male</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="female" name="gender"
                                                        class="custom-control-input gender" value="2" required>
                                                    <label class="custom-control-label" for="female">Female</label>
                                                </div>
                                                @error('gender')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label style="color: #7e74ff">Marital Status </label>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="unmarried" name="marital_status"
                                                        class="custom-control-input marital_status" value="1">
                                                    <label class="custom-control-label" for="unmarried">Unmarried</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="married" name="marital_status"
                                                        class="custom-control-input marital_status" value="2">
                                                    <label class="custom-control-label" for="married">Married</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group guardian">
                                                <label for="guardian_cnic" id="guardian_cnic_label">Husband/Father
                                                    CNIC</label>
                                                <input type="text" id="guardian_cnic" name="guardian_cnic"
                                                    class="form-control" required value="">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="state">State</label>
                                                <input type="text" id="state" class="alphabet form-control" required
                                                    name="state" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <input type="text" id="city" class="alphabet form-control" required
                                                    name="city" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" id="address" class="alphabet form-control" required
                                                    name="address" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-xs btn-success">Save</button>
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
        $(document).ready(function() {
            // datatable
            $('#citizen-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.citizens.index') }}"
                },
                columns: [{
                    data: 'family_number',
                    name: "name",
                    orderable: true
                }, {
                    data: 'citizen.name',
                    name: 'citizen',
                    orderable: false
                }, {
                    data: 'phone',
                    name: 'phone',
                    orderable: false
                }, {
                    data: 'email',
                    name: 'email',
                    orderable: false
                }, {
                    data: 'cnic',
                    name: 'cnic',
                    orderable: false
                }]
            });
            $(document).on('submit', '#addCitizenForm', function(event) {
                $('.invalid-feedback').remove();
                event.preventDefault();
                const formData = $('#addCitizenForm').serialize();
                const route = '{{ route('admin.citizens.store') }}';
                $.ajax({
                    type: "post",
                    url: route,
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        $("#addCitizenModal").modal('hide');
                        $("#addCitizenForm")[0].reset();
                        html =
                            '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><p>' +
                            data.message + '</p></div>';
                        $("#response").html(html);
                        $('#citizen-table').DataTable().ajax.reload();
                    },
                    error: function(jqXHR, exception) {
                        if (jqXHR.status == 422) {
                            let errors_array = Object.entries(jqXHR.responseJSON
                                .errors
                            )
                            // converts javscript object to array => multi-dimensional
                            errors_array.forEach(element => {
                                $('#addCitizenForm [name="' + element[0] + '"]')
                                    .addClass('is-invalid')
                                let error = '<span class="invalid-feedback">'
                                error += '<strong>' + element[1][0].replace('', '') +
                                    '</strong>'
                                error += '</span>'
                                $('#addCitizenForm [name="' + element[0] + '"]')
                                    .parent()
                                    .append(error)
                            })
                        } else {
                            let error = jqXHR.responseJSON.message
                            html =
                                '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><p>' +
                                error + '</p></div>';

                            $("#response").html(html);
                        }
                    }
                });
            });
            gender = $('input[name="gender"]:checked').val();
            maritalStatus = $('input[name="marital_status"]:checked').val();
            displaySection();
            $(document).on('change', '.gender', function(e) {
                gender = $(this).val();
                displaySection();
            });
            $(document).on('change', '.marital_status', function(e) {
                maritalStatus = $(this).val();
                displaySection();
            });
            //validating Alpabets
            $(document).on('keydown', '.alphabets', function(e) {
                const pattern = /^[a-zA-Z ' \n\r-]+$/;
                return pattern.test(e.key)
            });
            //validating phone_no
            $('.number').keypress(function(e) {
                const pattern = /^[0-9]$/;
                return pattern.test(e.key)
            });
        });

        function displaySection() {
            if (gender == 1 && maritalStatus == 1 || gender == 2 && maritalStatus == 1) {
                $('.guardian').show();
                $('#guardian_cnic').prop('required', true);
                $('#guardian_cnic_label').text('Father CNIC');
                $('#form_submit').attr('disabled', false);
            } else if (gender == 1 && maritalStatus == 2) {
                $('.guardian').hide();
                $('#guardian_cnic').prop('required', false);
                $('#form_submit').attr('disabled', false);
            } else if (gender == 2 && maritalStatus == 2) {
                $('.guardian').show();
                $('#guardian_cnic').prop('required', true);
                $('#guardian_cnic_label').text('Husband CNIC')
                $('#form_submit').attr('disabled', false);
            }
        }
    </script>
@stop
