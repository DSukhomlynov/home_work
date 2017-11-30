$(function () {
    // main slider on the 'classes' page.
    if ($(".swiper-slide").length > 1) {
        new Swiper('.main-slider', {
            pagination: ".main-slider__pagination",
            paginationClickable: true,
            effect: 'fade',
            loop: true,
            autoplay: 4000
        });
    }
    // Tabs.
    (function controlTabs() {
        if ($('.classes-tabs').length) {
            var tabLink = $('.classes-tabs__controls-link');

            tabLink.on('click', function (e) {
                e.preventDefault();
                var item = $(this).closest('.classes-tabs__controls-item'),
                    contentItem = $('.classes-tabs__item'),
                    itemPosition = item.index();

                contentItem.eq(itemPosition)
                    .add(item) // добавляем в набор для одновременного выполнения
                    .addClass('active')
                    .siblings()
                    .removeClass('active');
            });
        }
    })();



    var dataCalendar = {};
    $.ajax({
        url: '../js/test.json',
        dataType: 'json',
        success: function(json, textStatus) {
                dataCalendar = json;
        
                for (key in dataCalendar) {
                    if (key == "isDisabled") {
                        var isDisabled = dataCalendar[key];
                        var daysDisabled = [];
                        for ( i in isDisabled) {
                            if ( i == "days") {   
                                daysDisabled = isDisabled[i];                   
                            }
                        }  
                    } else {
                        var hasEvent = dataCalendar[key];
                        var daysHasEvent = [];
                        for ( i in hasEvent) {
                            if ( i == "days") {   
                                daysHasEvent = hasEvent[i];                   
                            }
            
                        } 
                        
                    }
                }
        
                // calendar
                var picker = new Pikaday({
                    field: document.getElementById('data'),
                    container: document.getElementById('calendar'),
                    bound: false,
                    firstDay: 1,
                    events: daysHasEvent,
                    disableDayFn: function(theDate) {
                        const day = theDate.getDate();
                        const month = theDate.getMonth() + 1;
                        const year = theDate.getFullYear();
                        theDate =  day + '.' + month + '.' + year;;   

                        return (daysDisabled.indexOf(theDate) != -1)
                    },
                    minDate: new Date(),
                    maxDate: new Date(2020, 12, 31),
                    yearRange: [2000, 2020],
                    setDefaultDate: true,
                    defaultDate: new Date(),
                    numberOfMonths: 2,
                    i18n: {
                        months: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
                        weekdays: ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'],
                        weekdaysShort: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
                    },
                    onSelect: function(days) {
                        // const day = days.getDate();
                        // const month = days.getMonth() + 1;
                        // const year = days.getFullYear();
                        // days =  `${day}.${month}.${year}`;

                        // console.log(days.toLocaleDateString('ru', {
                        //     year: 'numeric',
                        //     month: 'long',
                        //     day: 'numeric'
                        //   }));

                        var dayName = 'Воскресенье,Понедельник,Вторник,Среда,Четверг,Пятница,Суббота'.split(',');
                        var monthName = 'Январь,Февраль,Март,Апрель,Май,Июнь,Июль,Август,Сентябрь,Октябрь,Ноябрь,Декабрь'.split(',');
                        var selectedDay = dayName[days.getDay()];
                        var selectedMonth = monthName[days.getMonth()];
                        var selectedYear = days.toLocaleDateString('ru', {year: 'numeric', month: 'long', day: 'numeric'}).substr(-7,4);
                        // console.log(selectedDay);
                        // console.log(selectedMonth);
                        // console.log(selectedYear);
                    }
                });
        }
    });
    
    //gallery
    $('.gallery-grid .gallery-grid__item').each(function () {
        $(this).css({
            'width': 150 + 150 * Math.random() << 0
        });
    });
    
    var wall = new Freewall('.gallery-grid');
    wall.reset({
        selector: '.gallery-grid__item',
        animate: false,
        cellH: 140,
        gutterX: 5,
        gutterY: 5
    });
    wall.fitWidth();
    
    initColorbox('.gallery-grid__item-overlay', {
        rel: 'gallery-grid__item-overlay'
    });
    
    $('.show-all-gallery').on('click', function () {
        var defaultH = 560,
            dynamicH = $('.gallery-grid').height(),
            gridWrap = $('.gallery-grid-wrap');
    
        gridWrap.toggleClass('show-all');
    
        if (gridWrap.hasClass('show-all')) {
            gridWrap.css('height', dynamicH + 'px')
    
            $(this).text('скрыть');
        } else {
            gridWrap.css('height', defaultH + 'px')
    
            $(this).text('смотреть все');
        }
    
        return false;
    });

});
