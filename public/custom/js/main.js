$(window).on('load', function () {
    $(document).on('keydown', '.alphabets', function (e) {
        const pattern = /^[a-zA-Z ' \n\r-]+$/;
        return pattern.test(e.key)
    });
    //validating phone_no
    $(document).on('keydown', '.numeric', function (e) {
        const pattern = /^[0-9]$/;
        return pattern.test(e.key)
    });
})
