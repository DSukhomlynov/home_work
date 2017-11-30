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

    // calendar
    var picker = new Pikaday({
        field: document.getElementById('datepicker'),
        firstDay: 1,
        minDate: new Date(),
        maxDate: new Date(2020, 12, 31),
        yearRange: [2000, 2020],
        setDefaultDate: true,
        defaultDate: new Date(),
        toString: function(date, format) {
            const day = date.getDate();
            const month = date.getMonth() + 1;
            const year = date.getFullYear();
            // return `${day}.${month}.${year}`;
            return data = day + '.' + month + '.' + year;
        },
        parse: function(dateString, format) {
            const parts = dateString.split('/');
            const day = parseInt(parts[0], 10);
            const month = parseInt(parts[1] - 1, 10);
            const year = parseInt(parts[1], 10);
            return new Date(year, month, day);
        },
        i18n: {
            months: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
            weekdays: ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'],
            weekdaysShort: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб']
        },
    });
    // console.log(picker);
    // Masked input.
    $("#phone").mask("+3(9999) 999 99 99");

});