$(window).on('load', () => {
    $(document).on('submit', '#start-vaccination-form', (event) => {
        event.preventDefault();
        $('.search-btn').attr('disabled', true);
        $('.search-btn').html('Please Wait');
        const route = 'paramedic/verify-passcode';
        const formData = $('#start-vaccination-form').serialize();
        $.ajax({
            url: route,
            method: "POST",
            data: formData,
            dataType: 'json',
            success: function (data) {
                $(location).prop('href', 'paramedic/vaccinating')
            },
            error: function (jqXHR, exception) {
                $('.search-btn').attr('disabled', false);
                $('.search-btn').html('search');
                if (jqXHR.status == 422) {
                    let errors_array = Object.entries(jqXHR.responseJSON
                        .errors
                    )
                    // converts javscript object to array => multi-dimensional
                    errors_array.forEach(element => {
                        $('#start-vaccination-form [name="' + element[0] + '"]')
                            .addClass('is-invalid')
                        let error = '<span class="invalid-feedback">'
                        error += '<strong>' + element[1][0].replace('', '') +
                            '</strong>'
                        error += '</span>'
                        $('#start-vaccination-form [name="' + element[0] + '"]').parent()
                            .append(error)
                    })
                } else {
                    let error = jqXHR.responseJSON.message
                    html =
                        '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><p>' + error + '</p></div>';
                    $('#response').html(html);
                    setTimeout(() => {
                        $('#response').html(null)
                    }, 3000);
                }
            }
        });
    })
})
