$(function () {
    // Main slider on the 'index' page.
    new Swiper('.main-slider', {
        pagination: '.main-slider__pagination',
        paginationClickable: true,
        effect: 'fade',
        loop: true,
        autoplay: 2000
    });

    // Adjust text height in product block.
    $('.event-agencies__title').matchHeight();
    $('.info-tips__text').matchHeight();


    // Videos slider on the 'index' page (section Video).
    new Swiper('.videos-slider', {
        // loop: true,
        slidesPerView: 4,
        spaceBetween: 42,
        nextButton: '.videos-slider__btn-next',
        prevButton: '.videos-slider__btn-prev'
    });

    // Youtube video popup adjustments (section Video).
    initColorbox('.video-preview__link', {
        rel: 'video-preview__link',
        iframe: true,
    });

    // Reviews slider on the 'index' page (section review).
    new Swiper('.reviews-slider', {
        pagination: '.reviews-slider__pagination',
        paginationClickable: true,
        slidesPerView: 1,
        speed: 500,
        nextButton: '.reviews-slider__btn-next',
        prevButton: '.reviews-slider__btn-prev'
    });
});





