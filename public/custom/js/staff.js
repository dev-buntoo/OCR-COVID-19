// dell staff initial
let adminRequireId = 0;
const delStaff = (id) => {
    adminRequireId = id;
    $('#delStaffModal').modal('show');
}
$(window).on('load', function () {
    // datatable
    $('#staffTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "/admin/paramedic_staff"
        },
        columns: [{
                data: "paramedic_staff.name",
                name: "name",
                orderable: false
            }, {
                data: "phone",
                name: "phone",
                orderable: false
            }, {
                data: "email",
                name: "email",
                orderable: false
            }, {
                data: "paramedic_staff.vaccination_center.name",
                name: "vaccination_center",
                orderable: false
            }, {
                data: "paramedic_staff.city",
                name: "city",
                orderable: false
            }, {
                data: "paramedic_staff.address",
                name: "address",
                orderable: false
            },
            {
                data: "action",
                name: "action",
                orderable: false
            }
        ]
    });

    // add staff
    $(document).on('submit', '#addStaff', function (event) {
        event.preventDefault();
        $('input[type=submit]', this).attr('disabled', 'disabled');
        $('#addStaff').bind('submit', function (e) {
            e.preventDefault();
        });
        const data = $(this).serialize();
        const route = "/admin/paramedic_staff"
        $.ajax({
            url: route,
            method: "POST",
            data: data,
            dataType: 'json',
            success: function (data) {
                if (data.success) {
                    $("#addStaffModal").modal('hide');
                    $("#addStaff")[0].reset();
                    html =
                        '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><p>' +
                        data.message + '</p></div>';
                    $("#response").html(html);
                    $('#staffTable').DataTable().ajax.reload();
                }
            },
            error: function (jqXHR, exception) {
                if (jqXHR.status == 422) {
                    let errors_array = Object.entries(jqXHR.responseJSON
                        .errors
                    )
                    // converts javscript object to array => multi-dimensional
                    errors_array.forEach(element => {
                        $('#addStaff [name="' + element[0] + '"]')
                            .addClass('is-invalid')
                        let error = '<span class="invalid-feedback">'
                        error += '<strong>' + element[1][0].replace('', '') +
                            '</strong>'
                        error += '</span>'
                        $('#addStaff[name="' + element[0] + '"]').parent()
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
        $('input[type=submit]', this).removeAttr('disabled', 'disabled');
        $('#addStaff').unbind('submit');
    });
    // edit staffs
    $(document).on('click', '.edit-staff', function (event) {
        event.preventDefault();
        $('.edit-staff').attr('disabled', true);
        const id = $(this).data('staff-id');
        const route = "/admin/paramedic_staff/" + id + '/edit';
        $.ajax({
            url: route,
            method: "GET",
            dataType: 'json',
            success: function (data) {
                if (data.success) {
                    $("#editResponse").html(data.htmlResponse);
                    $("#editStaffModal").modal('show');
                }
            },
            error: function (jqXHR, exception) {
                let error = jqXHR.responseJSON.message
                html =
                    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><p>' +
                    error + '</p></div>';

                $("#response").html(html);
            }
        });
        $('input[type=submit]', this).removeAttr('disabled', 'disabled');
        $('#addStaff').unbind('submit');
    });
    // Update staff
    $(document).on('submit', '#updateStaff', function (event) {
        event.preventDefault();
        $('input[type=submit]', this).attr('disabled', 'disabled');
        $('#updateStaff').bind('submit', function (e) {
            e.preventDefault();
        });
        const id = $(this).attr('staff');
        const data = $(this).serialize();
        const route = "/admin/paramedic_staff/" + id;
        $.ajax({
            url: route,
            method: "PATCH",
            data: data,
            dataType: 'json',
            success: function (data) {
                if (data.success) {
                    $("#updateStaffModal").modal('hide');
                    $('.modal-backdrop').hide();
                    html =
                        '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><p>' +
                        data.message + '</p></div>';
                    $("#response").html(html);
                    $('#staffTable').DataTable().ajax.reload();
                    $("#editResponse").html('');
                }
            },
            error: function (jqXHR, exception) {
                if (jqXHR.status == 422) {
                    let errors_array = Object.entries(jqXHR.responseJSON
                        .errors
                    )
                    // converts javscript object to array => multi-dimensional
                    errors_array.forEach(element => {
                        $('#updateStaff [name="' + element[0] + '"]')
                            .addClass('is-invalid')
                        let error = '<span class="invalid-feedback">'
                        error += '<strong>' + element[1][0].replace('', '') +
                            '</strong>'
                        error += '</span>'
                        $('#updateStaff [name="' + element[0] + '"]').parent()
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
        $('input[type=submit]', this).removeAttr('disabled', 'disabled');
        $('#updateStaff').unbind('submit');
    });

    // del staff
    $(document).on('click', '#confirmDelete', function (event) {
        event.preventDefault();
        $('#confirmDelete').attr('disabled', true);
        const route = "/admin/paramedic_staff/" + adminRequireId;
        $.ajaxSetup({
            headers: {
                'X_CSRF_TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: route,
            method: "DELETE",
            dataType: 'json',
            success: function (data) {
                if (data.success) {
                    $("#delStaffModal").modal('hide');
                    html =
                        '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><p>' +
                        data.message + '</p></div>';
                    $("#response").html(html);
                }
            },
            error: function (jqXHR, exception) {
                $("#delStaffModal").modal('hide');
                let error = jqXHR.responseJSON.message
                html =
                    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><p>' +
                    error + '</p></div>';
                $('#staffTable').DataTable().ajax.reload();

                $("#response").html(html);
            }
        });
        $('#confirmDelete').attr('disabled', false);
        $('#staffTable').DataTable().ajax.reload();
    });
});
