// dell staff initial
$(window).on('load', function () {
    $(document).on('click', '.onPhase', function (event) {
        $("#response").html('');
        $('.onPhase').prop('disabled', true);
        const id = $(this).val();
        const route = "/admin/vaccination_phases/" + id;
        const csrf = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: route,
            data: {
                id: id,
                _token: csrf
            },
            method: "PATCH",
            dataType: 'json',
            success: function (data) {
                html =
                    '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><p>' +
                    data.message + '</p></div>';
                $("#response").html(html);
                setTimeout(() => {
                    location.reload();
                }, 1500)
            },
            error: function (jqXHR, exception) {
                let error = jqXHR.responseJSON.message
                html =
                    '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a><p>' +
                    error + '</p></div>';

                $("#response").html(html);

                $('.onPhase').prop('disabled', false);
            }
        });

    });
});
