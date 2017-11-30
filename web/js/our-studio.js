// map
(function initMap() {
    var options = {
        zoom: 17,
        // mapTypeControl: false,
        center: {
            lat: 59.965329,
            lng: 30.34146
        }
    }

    var map = new google.maps.Map(document.getElementById('map'), options);

    var markers = [
        {
            coords: {lat: 59.965228, lng: 30.344189},
            iconImage: '../img/icon/map-marker.svg',
            title: "1500 West Artesia Square"
        }
    ];

    for (var i = 0; i < markers.length; i++) {
        addMarker(markers[i]);
    }

    function addMarker(props) {
        var marker = new google.maps.Marker({
            position: props.coords,
            map: map,
            icon:props.iconImage,
            title: props.title
        });

        if (props.iconImage) {
            marker.setIcon(props.iconImage);
        }

        if (props.content) {
            var infoWindow = new google.maps.InfoWindow({
                content: props.content
            });

            marker.addListener('click', function () {
                infoWindow.open(map, marker);
            });
        }
    } 
})();


$(function () {
    // main slider on the 'our-studio' page.
    if ($(".swiper-slide").length > 1) {
        new Swiper('.main-slider', {
            pagination: ".main-slider__pagination",
            paginationClickable: true,
            effect: 'fade',
            loop: true,
            // autoplay: 2000
        });
    }

    // calendar
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
                        theDate =  `${day}.${month}.${year}`;   

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
    var gridLayouts = [
        ['height2', 'height2', '0', '0', '0', 'width2'],
        ['0', '0', '0', 'height2', '0', 'width2'],
        ['width2', 'height2', '0', '0', '0', '0'],
        ['height2', 'height2', '0', '0', '0', 'width2'],
        ['0', '0', 'height2', '0', '0', '0'],
        ['0', '0', 'height2', '0', 'width2', '0']
    ]

    setSizeItemGrid('.gallery-grid .gallery-grid__item', gridLayouts[rand(0, gridLayouts.length)]);

    function setSizeItemGrid(grid, layout) {
        $(grid).each(function (i, el) {
            if (layout[i] != '0') {
                var el = $(el);
                el.addClass(el.attr('class') + '--' + layout[i]);
            }
        });
    }

    var wall = new Freewall('.gallery-grid');
    wall.reset({
        animate: false
    });
    wall.fitWidth();

    initColorbox('.gallery-grid__item-overlay', {
        rel: 'gallery-grid__item-overlay'
    });

    $('.show-all').on('click', function () {
        var defaultH = 390,
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
