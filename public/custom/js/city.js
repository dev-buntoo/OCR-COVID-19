// dell city initial
let adminRequireId = 0;
const delCity = (id) => {
    adminRequireId = id;
    $('#delCityModal').modal('show');
}
$(window).on('load', function () {
    // cities datatable
    $('#citiesTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "/admin/cities"
        },
        columns: [{
                data: "name",
                name: "name",
                orderable: false
            },
            {
                data: "action",
                name: "action",
                orderable: false
            }
        ]
    });

    // add city
    $(document).on('submit', '#addCity', function (event) {
        event.preventDefault();
        $('input[type=submit]', this).attr('disabled', 'disabled');
        $('#addCity').bind('submit', function (e) {
            e.preventDefault();
        });
        const data = $(this).serialize();
        const route = "/admin/cities"
        $.ajax({
            url: route,
            method: "POST",
            data: data,
            dataType: 'json',
            success: function (data) {
                if (data.success) {
                    $("#addCityModal").modal('hide');
                    $("#addCity")[0].reset();
                    html =
                        '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><p>' +
                        data.message + '</p></div>';
                    $("#response").html(html);
                    $('#citiesTable').DataTable().ajax.reload();
                }
            },
            error: function (jqXHR, exception) {
                if (jqXHR.status == 422) {
                    let errors_array = Object.entries(jqXHR.responseJSON
                        .errors
                    )
                    // converts javscript object to array => multi-dimensional
                    errors_array.forEach(element => {
                        $('#addCity [name="' + element[0] + '"]')
                            .addClass('is-invalid')
                        let error = '<span class="invalid-feedback">'
                        error += '<strong>' + element[1][0].replace('', '') +
                            '</strong>'
                        error += '</span>'
                        $('#addCity [name="' + element[0] + '"]').parent()
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
        $('#addCity').unbind('submit');
    });
    // edit city
    $(document).on('click', '.edit-city', function (event) {
        event.preventDefault();
        $('.edit-city').attr('disabled', true);
        const id = $(this).data('city-id');
        const route = "/admin/cities/" + id + '/edit';
        $.ajax({
            url: route,
            method: "GET",
            dataType: 'json',
            success: function (data) {
                if (data.success) {
                    $("#editResponse").html(data.htmlResponse);
                    $("#updateCityModal").modal('show');
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
        $('#addCity').unbind('submit');
    });
    // Update city
    $(document).on('submit', '#updateCity', function (event) {
        event.preventDefault();
        $('input[type=submit]', this).attr('disabled', 'disabled');
        $('#updateCity').bind('submit', function (e) {
            e.preventDefault();
        });
        const id = $(this).attr('city');
        const data = $(this).serialize();
        const route = "/admin/cities/" + id;
        $.ajax({
            url: route,
            method: "PATCH",
            data: data,
            dataType: 'json',
            success: function (data) {
                if (data.success) {
                    $("#updateCityModal").modal('hide');
                    $('.modal-backdrop').hide();
                    html =
                        '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><p>' +
                        data.message + '</p></div>';
                    $("#response").html(html);
                    $('#citiesTable').DataTable().ajax.reload();
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
                        $('#updateCity [name="' + element[0] + '"]')
                            .addClass('is-invalid')
                        let error = '<span class="invalid-feedback">'
                        error += '<strong>' + element[1][0].replace('', '') +
                            '</strong>'
                        error += '</span>'
                        $('#updateCity [name="' + element[0] + '"]').parent()
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
        $('#updateCity').unbind('submit');
    });

    // del city
    $(document).on('click', '#confirmDelete', function (event) {
        event.preventDefault();
        $('#confirmDelete').attr('disabled', true);
        const route = "/admin/cities/" + adminRequireId;
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
                    $("#delCityModal").modal('hide');
                    html =
                        '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><p>' +
                        data.message + '</p></div>';
                    $("#response").html(html);
                }
            },
            error: function (jqXHR, exception) {
                $("#delCityModal").modal('hide');
                let error = jqXHR.responseJSON.message
                html =
                    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><p>' +
                    error + '</p></div>';
                $('#citiesTable').DataTable().ajax.reload();

                $("#response").html(html);
            }
        });
        $('#confirmDelete').attr('disabled', false);
        $('#citiesTable').DataTable().ajax.reload();
    });
    //validating Alpabets
    $(document).on('keydown', '.alphabets', function (e) {
        const pattern = /^[a-zA-Z ' \n\r-]+$/;
        return pattern.test(e.key)
    });
});
