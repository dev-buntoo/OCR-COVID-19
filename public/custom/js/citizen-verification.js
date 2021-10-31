$(window).on('load', function () {
    //validating numeric input field
    $(document).on('keydown', '.numeric', function (e) {
        // Allow: backspace, delete, tab, escape, enter, ctrl+A and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }

        var charValue = String.fromCharCode(e.keyCode),
            valid = /^[0-9]+$/.test(charValue);

        if (!valid) {
            e.preventDefault();
        }
    });
    $(document).on('submit', '#passcode-form', (event) => {
        event.preventDefault();
        let formData = $('#passcode-form').serialize();
        const route = $(location).attr('href');
        $.ajax({
            url: route,
            method: "POST",
            data: formData,
            dataType: 'json',
            success: function (data) {
                $('#citizen-record').html(data.html_response);
                $('#confirm-citizen-modal').modal('show');
            },
            error: function (jqXHR, exception) {
                if (jqXHR.status == 422) {
                    let errors_array = Object.entries(jqXHR.responseJSON
                        .errors
                    )
                    // converts javscript object to array => multi-dimensional
                    errors_array.forEach(element => {
                        $('#passcode-form [name="' + element[0] + '"]')
                            .addClass('is-invalid')
                        let error = '<span class="invalid-feedback">'
                        error += '<strong>' + element[1][0].replace('', '') +
                            '</strong>'
                        error += '</span>'
                        $('#passcode-form [name="' + element[0] + '"]').parent()
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
        // console.log($(this).html());
    });
    $(document).on('submit', '#confirm-citizen-form', (event) => {
        event.preventDefault();
        $('.verify-citizen-button').attr('disabled', true)
        const formData = $('#confirm-citizen-form').serialize()
        const route = $(location).attr('href') + '/verify'
        $.ajax({
            url: route,
            method: "POST",
            data: formData,
            dataType: 'json',
            success: function (data) {
                html =
                    '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><p>' +
                    data.message + '</p></div>';
                $('#confirm-citizen-form-response').html(html)
                setTimeout(() => {
                    $('#confirm-citizen-modal').modal('hide');
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    $('#citizen-record').html('');
                }, 3000)
            },
            error: function (jqXHR, exception) {
                $('.verify-citizen-button').attr('disabled', false)
                let error = jqXHR.responseJSON.message
                html =
                    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><p>' +
                    error + '</p></div>';
                $("#confirm-citizen-form-response").html(html);

            }
        });
    })
})
