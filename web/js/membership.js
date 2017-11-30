$(document).on('click', '.membership__cards .more-btn', function () {
    var url = $(this).attr('href');

    $.ajax({
        type: 'GET',
        url: url,
        dataType: 'html',
        cache: true,
        beforeSend: function () { },
        complete: function () { },
        success: function (data) {
            $.colorbox({
                html: data,
                fixed: true,
                trapFocus: false,
                onComplete: function () {
                    $('#cboxClose').addClass('show');

                    $('.preview-prod-popup').addClass('show-popup');

                    convertImgToSvgPath();

                    new SvgDataUri();

                    initProductPhotoSlider('preview-prod-slider'); // as a parameter it takes data
                }
            });
        }
    });

    return false;
});