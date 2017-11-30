$(function () {
    fixedHeader();

    // Fill stars in the reviews slider.
    fillStarts();  

    matchHeihgtElements([
        '.product-block__name', 
        '.product-block', 
        '.last-viewed-product__title'
    ]);

    initColorbox('.signIn-cart__link--signIn', {
        href: '.sign-in-popup',
        inline: true,
        width: 'auto',
        height: 'auto'
    });

    initColorbox('.signIn-cart__link--signUp', {
        href: '.sign-up-popup',
        inline: true,
        width: 'auto',
        height: 'auto'
    });

    initColorbox('.sign-up-btn', {
        href: '.confirm-sign-up-popup',
        inline: true,
        width: 'auto',
        height: 'auto'
    });

    initColorbox('.confirm-sign-up-btn', {
        href: '.completion-sing-up-popup',
        inline: true,
        width: 'auto',
        height: 'auto'
    });
    

    // Convert from base64 to svg path.
    new SvgDataUri();

    convertImgToSvgPath();

    //Toggle search btn in search input.
    controlSearchField();

    // Arrow scroll top.
    controlScrollBtn();

    // Quantity-control.
    controlQuantityField();
    
    // Show/hide mini basket.
    $(document).delegate('.minicart--full', 'mouseenter mouseleave', function (e) {
        self = $(this);
        if (e['type'] == 'mouseenter') {
            self.height(self.height());
            showMiniBasket(self.find('.mini-basket'), 200);
        } else if (e['type'] == 'mouseleave') {
            hideMiniBasket(self.find('.mini-basket'), 100);
        }
    }); 
    // END Show/hide mini basket.

    //Adjust main form's input color on blur.
    controlInputMainForm();

    // Tabs.
    if ($('.tabs').length) {
        controlTabs();
    }

    // Float blocks.
    if ( $('.float-block-wrap--open-product').length ) {
        floatBlock(100, 15, 20, 36);
    }
    if ( $('.float-block-wrap--blog-open').length ) {
        floatBlock(100, 30, 20, 15);
    }

    // Mask block.
    $("body").prepend("<div class='mask'></div>");
    $(window).scroll(function() {
        if($(".fixed-header").length) {
            $(".header__middle").addClass("active")
        } else {
            $(".header__middle").removeClass("active")
        }
    })
    $(".menu-trigger").hover(function() {
        $(".mask").toggleClass("active");
    })

    // Free mode slider with fade mixing.
    if($('.full-width-slider').length) {
        fullWidthSlider();
    }

    // Custom scroll for mini-basket
    $(".mini-basket-table").mCustomScrollbar({
        axis:"y",
        scrollInertia: 400,
        theme:"3d-dark"
    });
    
    // Init drag & drop for imgs
    if ($('.files-container').length) {
        uploadImgs();
    }

    // Add active class for menu li.
    var locationURL = location.href,
        menuLink = $('.main-menu__link'),
        navListLink = $('.nav-list .nav-list__link');

    menuLink.each(function() {
        if( locationURL.indexOf( $(this).attr('href') ) !== -1 ) {
            $(this).addClass('active');
        }
    });
    navListLink.each(function() {
        if( locationURL.indexOf( $(this).attr('href') ) !== -1 ) {
            $(this).addClass('active');
        }
    });
   
});

document.addEventListener('DOMContentLoaded', function() {
    controlHint('.open-product-main .hint-link','.open-product-main .prod-options.right-block');
});

// Custom popup for comments.
function customPopup (options) {
    this.popupBlock = document.querySelector(options.popupBlock);
    this.overlay = document.querySelector(options.overlay);
    this.triggerBtn = document.querySelector(options.triggerBtn);
    this.closeBtn = document.querySelector(options.closeBtn);

    var popup = this;

    this.open = function () {
        popup.popupBlock.classList.add('open');
    };

    this.close = function () {
        popup.popupBlock.classList.remove('open');
    };
    
    // $(document).on('click', this.triggerBtn, popup.open);

    this.triggerBtn.onclick = popup.open;
    this.overlay.onclick = popup.close;
    this.closeBtn.onclick = popup.close;
    

    document.addEventListener('keydown', function (e) {
        if (popup.popupBlock.classList.contains('open')) {
            if (e.keyCode == 27) {
                popup.close();
            } else {
                return false;
            }
        } 
    });
};

// Adjust product-block height.
function matchHeihgtElements(elements) {
    var element;
    $.each(elements, function (i, el) {
        element = $(el);
        if (element.length) {
            element.matchHeight();
        }
    });
}

// Fill stars in the reviews slider.
function fillStarts() {
    var starsCont = $('.reviews'),
        countStars;

    starsCont.find('.rating-stars').each(function () {
        countStars = $(this).data('rate');

        $(this).find('.rating-stars__n:nth-child(-n+' + countStars + ')').addClass('fill');
    });
}

// Fix header.
function fixedHeader() {
    var winScroll,
        header = $('.header'),
        headerInnerWrap = $('.header-inner-wrap'),
        headerHeight = header.outerHeight(),
        searchInput = $('.search__input');

    if ($('.header.header--open-menu').length) {
        var mainSliderHeight = $('.main-banner').outerHeight();
        headerHeight += mainSliderHeight;
    }

    $(window).scroll(function () {
        winScroll = $(window).scrollTop();

        if (winScroll >= headerHeight && !headerInnerWrap.hasClass('fixed-header')) {
            headerInnerWrap
                .addClass('no-animate')
                .addClass('animate-header');
            searchInput.addClass('notransition');


            setTimeout(function () {
                headerInnerWrap.addClass('fixed-header');
            }, 0);

            setTimeout(function () {
                searchInput.removeClass('notransition');
            }, 600);


            //On index page hide menu, when fixed header is trigered
            if ($('.header.header--open-menu').length) {
                $('.main-menu .menu').addClass('closed');
            }

        } else if (winScroll < headerHeight && headerInnerWrap.hasClass('fixed-header')) {
            headerInnerWrap.removeClass('animate-header')
                .addClass('no-animate')
                .removeClass('fixed-header');

            //On index page show menu, when fixed header is hiden
            if ($('.header.header--open-menu').length) {
                $('.main-menu .menu').removeClass('closed');
            }
        }

        setTimeout(function () {
            headerInnerWrap.removeClass('no-animate');
        }, 300);

    });
}

// Animate search field.
function controlSearchField() {
    if ($('form.search').length) {
        var searchInput = $('.search__input'),
            searchBtn = $('.search__btn'),
            onHover = false;

        searchBtn.hover(function () {
            onHover = true;
        }, function () {
            onHover = false;
        });

        searchInput.on('focus', function () {
            $(this).addClass('infocus');
            searchBtn.addClass('show');
        });

        searchInput.on('focusout', function () {
            if (searchInput.val() == '' && !onHover) {
                $(this).removeClass('infocus');
                searchBtn.removeClass('show');
            }
        });
    }
}

// Scroll to top.
function controlScrollBtn() {
    var afterScroll = 200,
        upArrow = $('.up-scroll');
    $(window).scroll(function () {
        var condition = $(window).scrollTop() > afterScroll;
        condition ? upArrow.addClass('show') : upArrow.removeClass('show');
    });
    upArrow.click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, '400');
    });
}

// Quantity-control.
function controlQuantityField() {
    $(document).on('click', '.qty-button-minus, .qty-button-plus', changeQuantity);

    $(document).on('blur', '.qty', function () {
        var value = setValidInputVal(parseInt($(this).val()));
        $(this).val(value);
    });
}

function changeQuantity(e) {
    var input = $(this).siblings('.qty'),
        currentVal = parseInt(input.val());

    if ($(e.target).hasClass('qty-button-plus')) {
        currentVal++;
    } else {
        currentVal--;
    }

    input.val(setValidInputVal(currentVal));
}

function setValidInputVal(currentVal) {
    if (!currentVal || currentVal < 0) {
        currentVal = 0;
    }

    return currentVal;
}
// END Quantity-control.


// Show/hide mini basket.
function showMiniBasket(el, duration) {
    $(el).css('display', 'block').animate({
        marginTop: '0',
        opacity: '1'
    }, duration);
    changeMiniBasketTableDisplay();
}

function hideMiniBasket(el, duration) {
    $(el).animate({
        // marginTop: '10%',
        opacity: '0'
    }, duration, function () {
        $(el).css('display', 'none');
    });
    changeMiniBasketTableDisplay();
} 

// Adjust mini-basket with according to vertical scroll-bar
function changeMiniBasketTableDisplay() {
    var miniBasketTable = $('.mini-basket-table'),
        itemsInBasket = $('.mini-basket-table .mini-basket-table__tr').length;
    (itemsInBasket > 3) ? miniBasketTable.css("display", "block") : miniBasketTable.css("display", "table");
}
// END Show/hide mini basket.

// Input main form.
function controlInputMainForm() {
    if ($('.main-form').length) {
        // Trigger focus from placeholder to fieled
        $('.form-field-placeholder').click(function () {
            $(this).siblings('textarea, input').focus();
        });

        $('.form-field-wrap input, .form-field-wrap textarea').focus(function () {
            $(this).addClass('non-empty-input');
        });

        $('.form-field-wrap input, .form-field-wrap textarea').focusout(function () {
            if (!$(this).val().length) {
                $(this).removeClass('non-empty-input');
            }
        });
    }
}

// Tabs.
function controlTabs() {
    var tabLink = $('.tabs__controls-link');

    tabLink.on('click', function (e) {
        e.preventDefault();
        var item = $(this).closest('.tabs__controls-item'),
            contentItem = $('.tabs__item'),
            itemPosition = item.data('tab');

        contentItem.filter('.tabs__item_' + itemPosition)
            .add(item) // добавляем в набор для одновременного выполнения
            .addClass('active')
            .siblings()
            .removeClass('active');
        // На странице корзины, переинициализировать подсказки при открытии таба
        if ($('.tabs.tabs--cart').length) {
            controlHint('.tabs.tabs--cart .hint-link','.tabs.tabs--cart');
        }
    });

}

// Init Hints.
function controlHint(hintLink, boundary) {
    var hintLinks = document.querySelectorAll(hintLink);

    if (hintLinks.length) {
        var boundariesContainer = document.querySelector(boundary);

        for (var i = 0; i < hintLinks.length; i++) {
            var hintLink = hintLinks[i],
                hintBlock = hintLink.nextElementSibling;

            var anotherPopper = new Popper(
                hintLink,
                hintBlock,
                {
                    placement: 'top',
                    modifiers: {
                        preventOverflow: {
                            enabled: 'true',
                            boundariesElement: boundariesContainer,
                            priority: ['right', 'bottom', 'left', 'top'],
                            padding: 15
                        },
                        arrow: {
                            enabled: 'true',
                            element: '.hint-block__arrow'
                        }
                    }
                }
            );
        }
    }
}

// Float block
/******REWRITE******/
function floatBlock(floatBlockOffsetTop, floatBlockOffsetRight,
                    floatBlockOffsetBottom, floatBlockOffsetTopFromWrap) {
    var bottomLeftBlock,
        floatBlock = $('.float-block'),
        floatBlockWrap = $('.float-block-wrap'),
        topFloatBlock = (floatBlock.offset().top) - floatBlockOffsetTop,
        floatBlockWrapWidth = floatBlockWrap.outerWidth(),
        heightFloatBlock = floatBlock.outerHeight() + floatBlockOffsetBottom + floatBlockOffsetTopFromWrap,
        widthFloatBlock = floatBlock.outerWidth(),
        difference = 0,
        margin = floatBlockWrapWidth - widthFloatBlock - floatBlockOffsetRight;

    floatBlockWrap.css({'min-height': heightFloatBlock + floatBlockOffsetTopFromWrap});

    $(window).scroll( function () {
        if ( $(window).scrollTop() >= topFloatBlock ) {
            bottomFloatBlockWrap = topFloatBlock + floatBlockWrap.outerHeight();
            floatBlock.addClass('fixed-float-block');
            floatBlock.css({'margin-left': margin});
            difference = bottomFloatBlockWrap - $(window).scrollTop();
            if (heightFloatBlock >= difference) {
                floatBlock.removeClass('fixed-float-block');
                floatBlock.addClass('fixed-bottom-float-block');
            } else {
                floatBlock.addClass('fixed-float-block');
                floatBlock.removeClass('fixed-bottom-float-block');
            }
        } else {
            floatBlock.removeClass('fixed-float-block');
            floatBlock.removeClass('fixed-bottom-float-block');
        }
    });  
}
/******REWRITE******/

function initColorbox(target, customOptions) {
    var defaultOptions = {
        transition: "fade",
        width: '97%',
        height: '97%',
        scalePhotos: true,
        scrolling: false,
        opacity: 0.6,
        // fixed: true,
        returnFocus: false,
        onComplete: function () {
            $('#cboxClose').addClass('show');
        },
        onClosed: function () {
            $('#cboxClose').removeClass('show');
        }
    }

    $(target).colorbox($.extend(defaultOptions, customOptions));
}

function rand(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}

function randInclude(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}


// -=-=-=-=-=-=-=-=   Full width slider  =-=-=-=-=-=-=-=-=
function fullWidthSlider() {
    var viewportWidth = document.documentElement.clientWidth,
        slideWidth = 340,
        slidesOffset = viewportWidth - slideWidth;

    // Swiper init settings
    var fullWidthSlider = new Swiper('.full-width-slider', {
        width: slideWidth,
        spaceBetween: 10,
        speed: 600,
        freeMode: true,
        freeModeSticky: true,
        grabCursor: true,
        slidesOffsetAfter: -slidesOffset,
        nextButton: '.full-width-slider__btn-next',
        prevButton: '.full-width-slider__btn-prev',
        // pagination: '.full-width-slider .swiper-pagination',
        // paginationClickable: true,
        onTransitionStart: function(swiper) {
            // console.log('start transition...');
            if(startMixingSlides) {
                endMixing();
            };
            
        },
        onSlideChangeEnd: function(swiper) {
            // console.log('end moving...');
        }
    });

    var slides = $('.full-width-slider .swiper-slide'),
        slideWidth = slides.outerWidth();
        slideFit = viewportWidth / slideWidth,
        slideFitInt = Math.round(slideFit),
        visibleSlides = $('.full-width-slider .swiper-slide:lt(' + slideFitInt + ')')
                        .addClass('visible-slide'),
        nonVisibleSlides = $('.full-width-slider .swiper-slide:gt(' + --slideFitInt  + ')'),
        slideFitInt++,
        visibleSlidesLength = visibleSlides.length,
        nonVisibleSlidesLength = nonVisibleSlides.length;

    if ( slides.length > (slideFitInt + 2) ) {
        var startMixingSlides = setInterval(mixSlides, 4000);
    }
    
    function mixSlides() {
        var randomIndVisibleSlide = rand(0, visibleSlidesLength),
            randomIndNonVisibleSlide = rand(0, nonVisibleSlidesLength),
            randomVisibleSlide = visibleSlides.eq(randomIndVisibleSlide),
            randomNonVisibleSlide = nonVisibleSlides.eq(randomIndNonVisibleSlide);

        var visibleSlideImgSrc = randomVisibleSlide.css('background-image'),
            nonVisibleSlideImgSrc = randomNonVisibleSlide.css('background-image');
        
        randomVisibleSlide.fadeOut(500, 'linear', function() {
            randomVisibleSlide.css('background-image', nonVisibleSlideImgSrc);
            randomVisibleSlide.fadeIn(1500);
        });
        randomNonVisibleSlide.fadeOut(500, 'linear', function() {
            randomNonVisibleSlide.css('background-image', visibleSlideImgSrc);
            randomNonVisibleSlide.fadeIn(1500);
        });
        
    };

    function endMixing() {
        clearInterval(startMixingSlides);
        // console.log('Interval is cleared!');
        startMixingSlides = setInterval(mixSlides, 4000);
    };

};

// Upload imgs with drug & drop and by selecting
function uploadImgs() {
    var ul = $('.imgs-for-upload ul'),
    form = $('#uploadForm'),
    mimetypes = [
        'image/png',
        'image/jpeg'
    ],
    coincid;

    $('#drop .file-name').click(function () {
        $(this).parent().parent().find('input').click();
    });

    var maxFiles = 4,
        filesCounter = 0;

    $('#uploadForm').fileupload({
        maxNumberOfFiles: 1,
        acceptFileTypes: /(png)|(jpe?g)|(gif)$/i,
        dropZone: $('#drop'),
        buildUploadRow: function (files, index) {
            if (filesCounter + index + 1 > maxFiles) {
                return null;
            }
        },
        add: function (e, data) {
            if ($('.imgs-for-upload ul li').length > 3) {
                return;
            }

            coincid = 0;
            jQuery.each(mimetypes, function (i, val) {
                if (data.files[0].type !== val) {
                    coincid++;
                } else {
                    coincid--;
                }
            });

            if (coincid === mimetypes.length) {
                form.find('.warning').fadeIn();
            } else {
                form.find('.warning').fadeOut();
                var tpl = $('<li class="working"><input type="text" value="0" data-width="20" data-height="20"' +
                    ' data-fgColor="#00acc1" data-readOnly="1" data-bgColor="#ccc9c9" /><p><span></span></p><span></span></li>');

                tpl.find('p>span').text(data.files[0].name);
                tpl.find('p').append('<div class="del"></div>');
                tpl.find('p').append('<i>' + formatFileSize(data.files[0].size) + '</i>');
                data.context = tpl.appendTo(ul);
                tpl.find('input').knob();

                var jqXHR = data.submit();

                tpl.find('.del').click(function () {
                    if (tpl.hasClass('working')) {
                        jqXHR.abort();
                    }
                    tpl.fadeOut(function () {
                        tpl.remove();
                        setActiveSubmit();
                    });
                });
                setActiveSubmit();
            }
        },
        progress: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            data.context.find('input').val(progress).change();

            if (progress == 100) {
                data.context.removeClass('working');
            }
        },
        fail: function (e, data) {
            data.context.addClass('error');
        }
    });

    function setActiveSubmit() {
        if ($('.imgs-for-upload ul li').length > 0) {
            form.children('button').removeAttr('disabled');
        } else {
            form.children('button').attr('disabled', '');
        }
        $('.order-calc-popup').colorbox.resize();
    }

    $(document).bind('dragover', function (e) {
        var dropZone = $('#drop'),
            timeout = window.dropZoneTimeout,
            dropWrap = dropZone.parents('.drop-wrap');
        if (!timeout) {
            dropWrap.addClass('in');
        } else {
            clearTimeout(timeout);
        }
        var found = false,
            node = e.target;
        do {
            if (node === dropZone[0]) {
                found = true;
                break;
            }
            node = node.parentNode;
        } while (node != null);
        if (found) {
            dropWrap.addClass('hover');
        } else {
            dropWrap.removeClass('hover');
        }
        window.dropZoneTimeout = setTimeout(function () {
            window.dropZoneTimeout = null;
            dropWrap.removeClass('in hover');
        }, 100);
    });

    $(document).on('drop dragover', function (e) {
        e.preventDefault();
    });

    function formatFileSize(bytes) {
        if (typeof bytes !== 'number') {
            return '';
        }

        if (bytes >= 1000000000) {
            return (bytes / 1000000000).toFixed(2) + ' GB';
        }

        if (bytes >= 1000000) {
            return (bytes / 1000000).toFixed(2) + ' MB';
        }

        return (bytes / 1000).toFixed(2) + ' KB';
    }
}