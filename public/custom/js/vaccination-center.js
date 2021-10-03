// dell center initial
let adminRequireId = 0;
const delCenter = (id) => {
    adminRequireId = id;
    $('#delCenterModal').modal('show');
}
$(window).on('load', function () {
    // datatable
    $('#vaccinationCentersTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "/admin/vaccination_centers"
        },
        columns: [{
                data: "name",
                name: "name",
                orderable: false
            }, {
                data: "city_id",
                name: "city_id",
                orderable: false
            }, {
                data: "address",
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

    // add center
    $(document).on('submit', '#addCenter', function (event) {
        event.preventDefault();
        $('input[type=submit]', this).attr('disabled', 'disabled');
        $('#addCenter').bind('submit', function (e) {
            e.preventDefault();
        });
        const data = $(this).serialize();
        const route = "/admin/vaccination_centers"
        $.ajax({
            url: route,
            method: "POST",
            data: data,
            dataType: 'json',
            success: function (data) {
                if (data.success) {
                    $("#addCenterModal").modal('hide');
                    $("#addCenter")[0].reset();
                    html =
                        '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><p>' +
                        data.message + '</p></div>';
                    $("#response").html(html);
                    $('#vaccinationCentersTable').DataTable().ajax.reload();
                }
            },
            error: function (jqXHR, exception) {
                if (jqXHR.status == 422) {
                    let errors_array = Object.entries(jqXHR.responseJSON
                        .errors
                    )
                    // converts javscript object to array => multi-dimensional
                    errors_array.forEach(element => {
                        $('#addCenter [name="' + element[0] + '"]')
                            .addClass('is-invalid')
                        let error = '<span class="invalid-feedback">'
                        error += '<strong>' + element[1][0].replace('', '') +
                            '</strong>'
                        error += '</span>'
                        $('#addCenter [name="' + element[0] + '"]').parent()
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
        $('#addCenter').unbind('submit');
    });
    // edit center
    $(document).on('click', '.edit-center', function (event) {
        event.preventDefault();
        $('.edit-center').attr('disabled', true);
        const id = $(this).data('center-id');
        const route = "/admin/vaccination_centers/" + id + '/edit';
        $.ajax({
            url: route,
            method: "GET",
            dataType: 'json',
            success: function (data) {
                if (data.success) {
                    $("#editResponse").html(data.htmlResponse);
                    $("#updateCenterModal").modal('show');
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
        $('#addCenter').unbind('submit');
    });
    // Update center
    $(document).on('submit', '#updateCenter', function (event) {
        event.preventDefault();
        $('input[type=submit]', this).attr('disabled', 'disabled');
        $('#updateCenter').bind('submit', function (e) {
            e.preventDefault();
        });
        const id = $(this).attr('center');
        const data = $(this).serialize();
        const route = "/admin/vaccination_centers/" + id;
        $.ajax({
            url: route,
            method: "PATCH",
            data: data,
            dataType: 'json',
            success: function (data) {
                if (data.success) {
                    $("#updateCenterModal").modal('hide');
                    $('.modal-backdrop').hide();
                    html =
                        '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><p>' +
                        data.message + '</p></div>';
                    $("#response").html(html);
                    $('#vaccinationCentersTable').DataTable().ajax.reload();
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
                        $('#updateCenter [name="' + element[0] + '"]')
                            .addClass('is-invalid')
                        let error = '<span class="invalid-feedback">'
                        error += '<strong>' + element[1][0].replace('', '') +
                            '</strong>'
                        error += '</span>'
                        $('#updateCenter [name="' + element[0] + '"]').parent()
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
        $('#updateCenter').unbind('submit');
    });

    // del center
    $(document).on('click', '#confirmDelete', function (event) {
        event.preventDefault();
        $('#confirmDelete').attr('disabled', true);
        const route = "/admin/vaccination_centers/" + adminRequireId;
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
                    $("#delCenterModal").modal('hide');
                    html =
                        '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><p>' +
                        data.message + '</p></div>';
                    $("#response").html(html);
                }
            },
            error: function (jqXHR, exception) {
                $("#delCenterModal").modal('hide');
                let error = jqXHR.responseJSON.message
                html =
                    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><p>' +
                    error + '</p></div>';
                $('#vaccinationCentersTable').DataTable().ajax.reload();

                $("#response").html(html);
            }
        });
        $('#confirmDelete').attr('disabled', false);
        $('#vaccinationCentersTable').DataTable().ajax.reload();
    });
    //validating Alpabets
    $(document).on('keydown', '.alphabets', function (e) {
        const pattern = /^[a-zA-Z ' \n\r-]+$/;
        return pattern.test(e.key)
    });
    //validating phone_no
    $(document).on('keydown', '.number', function (e) {
        const pattern = /^[0-9]$/;
        return pattern.test(e.key)
    });
});
