$(function () {
    // Reviews slider on the 'vip-gift' page (section review).
    new Swiper('.reviews-slider', {
        pagination: '.reviews-slider__pagination',
        paginationClickable: true,
        slidesPerView: 1,
        speed: 500,
        nextButton: '.reviews-slider__btn-next',
        prevButton: '.reviews-slider__btn-prev'
    });

});
