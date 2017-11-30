$(function () {

    if ($(".swiper-slide").length > 1) {
        new Swiper('.main-slider', {
            pagination: ".main-slider__pagination",
            paginationClickable: true,
            effect: 'fade',
            loop: true,
            autoplay: 4000
        });
    }

    initializeClock('.timer', $('.deadline').text());
    updateClock('.timer', $('.deadline').text());

    $(document).on('click', '.photo-gallery__item', function () {
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
                        convertImgToSvgPath();

                        new SvgDataUri();

                        //comment text lenght
                        var size = 110,
                        commentBlocks = $('.competition-popup__comment-text');
                        commentBlocks.each(function() {
                            var commentText = $(this).text();
                            if(commentText.length > size){
                                $(this).text(commentText.slice(0, size) + ' ...');
                            }
                        });

                        //custom scroll
                        $(".photo-caption__comments-list").mCustomScrollbar({
                            axis:"y",
                            scrollInertia: 400,
                            theme:"3d-dark"
                        });
                    },
                    onClosed: function () {
                        $('#cboxClose').removeClass('show');
                    }
                });
            }
        });

        return false;
    });

});

function initializeClock(el, endtime) {
    var clock = $(el);

    var t = getTimeRemaining(endtime);

    if (t.total <= 0) {
        clearInterval(timeinterval);
        return false;
    }

    clock.find('div[data-timer="days"]').text(('0' + t.days).slice(-2));
    clock.find('div[data-timer="hours"]').text(('0' + t.hours).slice(-2));
    clock.find('div[data-timer="minutes"]').text(('0' + t.minutes).slice(-2));
    clock.find('div[data-timer="seconds"]').text(('0' + t.seconds).slice(-2));
}

function updateClock(el, endtime) {
    var timeinterval = setInterval(function () {
        initializeClock(el, endtime);
    }, 1000);
}

function getTimeRemaining(endtime) {
    var t = Date.parse(endtime) - Date.parse(new Date());
    var seconds = Math.floor((t / 1000) % 60);
    var minutes = Math.floor((t / 1000 / 60) % 60);
    var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
    var days = Math.floor(t / (1000 * 60 * 60 * 24));
    return {
        'total': t,
        'days': days,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
    };
}


