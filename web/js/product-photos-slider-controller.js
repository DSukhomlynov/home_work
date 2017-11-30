var prodPhotoSlider,
    prodPhotoPreviewSlider,
    swiperNext = '.swiper-btn-next',
    swiperPrev = '.swiper-btn-prev',

    prodPhotoClassName = '.prod-photo-slider',
    prodPhotoPreviewClassName = '.prod-photo-preview-slider';



// Init product preview popup.
$(document).on('click', '.product-block__name, .product-block__img-block, .last-viewed-product__pic, .last-viewed-product__title', function () {
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
                // fixed: true,
                trapFocus: false,
                onComplete: function () {
                    $('#cboxClose').addClass('show');
                    
                    $('.preview-prod-popup').addClass('show-popup');
                    
                    // Init custom dropdowns.
                    $('.preview-prod-popup .prod-options__select').select2({
                        minimumResultsForSearch: 5,
                        dropdownParent: $('.preview-prod-popup')
                    });
                    
                    convertImgToSvgPath();
                    
                    new SvgDataUri();
                    
                    // Fill stars in the reviews slider
                    fillStarts();

                    var addCommentPopup = new customPopup({
                        popupBlock: '.custom-popup',
                        overlay: '.custom-popup__overlay',
                        triggerBtn: '.add-comment-btn--trigger2',
                        closeBtn: '.add-comment-popup .close-popup-btn'
                    });
                    
                    // Trigger click event for colorbox 'close' icon.
                    $('.preview-prod-popup .close-popup-btn, .gallery-prod-popup .close-popup-btn').click(function () {
                        $('#cboxClose').trigger('click');
                    });

                    setTimeout(function() {
                        controlHint('.preview-prod-popup .hint-link',
                        '.preview-prod-popup .prod-options.right-block');
                    }, 2000);
                    

                    initProductPhotoSlider('preview-prod-slider'); // as a parameter it takes data
                },
                onClosed: function () {
                    $('#cboxClose').removeClass('show');
                }
            });
        }
    });

    return false;
});

function initProductPhotoSlider(data) {
    
    var prodPhotoSliderEl = prodPhotoClassName + '[data-slider=' + data + ']',
        prodPhotoPreviewSliderEl = prodPhotoPreviewClassName + '[data-slider=' + data + ']',
        activeSlide = 0,
        sliders = [];

    $(prodPhotoSliderEl).each(function(i, el) {
        prodPhotoSlider = new Swiper(el, {
            nextButton: $(el).siblings(swiperNext),
            prevButton: $(el).siblings(swiperPrev),
            effect: 'fade',
            onSlideChangeStart: function (swiper) {
                setActiveSlide(sliders, getActiveIndexSlide(swiper));
            },
            onTransitionEnd: function (swiper) {
                setActiveSlide(sliders, getActiveIndexSlide(swiper));
            }
        });
        
        sliders.push({
            photoPreviewSliderEl: prodPhotoPreviewSliderEl,
            photoSliderEl: prodPhotoSliderEl,
            photoSwiper: prodPhotoSlider,
            videoBtn: $(el).parents('.prod-photo-slider-container').find($('.prod-video-preview[data-slider=' + data + ']')),
            videoIframe: $(el).find('.prod-photo-slider__video iframe')
        });
    });

    $(prodPhotoPreviewSliderEl).each(function (i, el) {
        var direction = 'horizontal';
        if ($(el).data('direction') == 'vertical') {
            direction = 'vertical';
        }
        
        prodPhotoPreviewSlider = new Swiper(el, {
            nextButton: $(el).siblings(swiperNext),
            prevButton: $(el).siblings(swiperPrev),
            slidesPerView: 4,
            spaceBetween: 5,
            direction: direction,
            onSlideChangeStart: function (swiper) {
                // setActiveSlide(sliders, getActiveIndexSlide(swiper));
            }
        });

        sliders[i].previewPhotoSwiper = prodPhotoPreviewSlider;

        $(el).find('.swiper-slide').on('click', function (e) {
            setActiveSlide(sliders, $(this).index());
        });
    });

    $.each(sliders, function(i, el) {
        el.videoBtn.on('click', function () {
            var indexVideoSlide = el.videoIframe
                .parents('.swiper-slide')
                .index();

            el.previewPhotoSwiper.slideTo(indexVideoSlide);
            el.photoSwiper.slideTo(indexVideoSlide);
        });
    });
}

function setActiveSlide(sliders, index) {
    $.each(sliders, function (i, el) {
        el.photoSwiper.slideTo(index);
        $(el.photoSliderEl).find('.swiper-slide').removeClass('active');
        var currentSlide = $(el.photoSliderEl).find('.swiper-slide:nth-child(' + (index + 1) + ')').addClass('active');  // +1 потому что в свайпере индексация с 0, а в css с 1
    
        el.previewPhotoSwiper.slideTo(index);
        $(el.photoPreviewSliderEl).find('.swiper-slide').removeClass('active');
        $(el.photoPreviewSliderEl).find('.swiper-slide:nth-child(' + (index + 1) + ')').addClass('active');
    
        if ($(currentSlide).find('.prod-photo-slider__video').length) {
            $(el.videoBtn).addClass('active');
        } else if ($(el.videoBtn).hasClass('active')) {
            $(el.videoBtn).removeClass('active');
    
            iframe = el.videoIframe;
            iframe.attr('src', iframe.attr('src'));
        }
    });
}

function getActiveIndexSlide(swiper) {
    var activeIndex = swiper.activeIndex,
        slidesLen = swiper.slides.length;
    if (swiper.params.loop) {
        switch (swiper.activeIndex) {
            case 0:
                activeIndex = slidesLen - 3;
                break;
            case slidesLen - 1:
                activeIndex = 0;
                break;
            default:
                --activeIndex;
        }
    }
    return activeIndex;
}