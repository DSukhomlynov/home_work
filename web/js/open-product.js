$(function () {

    //Init dropdowns.
    $('.prod-options__select').select2({
        minimumResultsForSearch: 5
    });

    initColorbox('.open-prod-gallery', {
        href: '.gallery-prod-popup',
        inline: true,
        onComplete: function () {
            $('#cboxClose').addClass('show');
            $('.gallery-prod-popup .prod-options__select').select2({
                minimumResultsForSearch: 5,
                dropdownParent: $('.gallery-prod-popup')
            });
        },
    });

    initProductPhotoSlider('open-prod-slider');


    //swipper for similar-products
    new Swiper('.similar-products__wrapper', {
        slidesPerView: 4,
        nextButton: '.similar-products__btn-next',
        prevButton: '.similar-products__btn-prev'
    });

    // Change height "similar-products__swiper".
    var dynamicHeightProd, 
        prodItem = $('.product-block');

    prodItem.mouseleave(function () {
        $(this).parents('.similar-products__swiper').height($(this).parents('.swiper-slide').innerHeight());
    });

    prodItem.mouseenter(function () {
        setHeightProduct($(this)); 
    });

    function setHeightProduct(prod) {
        dynamicHeightProd = prod.children('.product-block__inner').innerHeight();
        prod.parents('.similar-products__swiper').height(dynamicHeightProd);
    }

});

document.addEventListener('DOMContentLoaded', function() {
    
    var addCommentPopup = new customPopup({
        popupBlock: '.custom-popup',
        overlay: '.custom-popup__overlay',
        triggerBtn: '.add-comment-btn--trigger',
        closeBtn: '.add-comment-popup .close-popup-btn'
    });
    
});