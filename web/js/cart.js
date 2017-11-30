document.addEventListener('DOMContentLoaded', function () {
    controlHint('.tabs.tabs--cart .hint-link', '.tabs.tabs--cart');

    // Init Pickaday for every needed input.
    document.querySelectorAll('.calendar-btn').forEach(function (item, i, arr) {
        new Pikaday({
            field: item,
            firstDay: 1,
            minDate: new Date(),
            maxDate: new Date(2020, 12, 31),
            yearRange: [2000, 2020],
            setDefaultDate: true,
            defaultDate: new Date(),
            toString: function (date, format) {
                const day = date.getDate();
                const month = date.getMonth() + 1;
                const year = date.getFullYear();
                return data = day + '.' + month + '.' + year;
            },
            parse: function (dateString, format) {
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
    });

});

$(function() {

    // Init 'add adress' popup.
    initColorbox('.add-adress__link', {
        href: '.add-adress-popup',
        inline: true,
        width: 'auto',
        height: 'auto'
    });

    // Custom scroll for table
    $(".delivery-table-wrap").mCustomScrollbar({
        axis:"y",
        scrollInertia: 400,
        theme:"3d-dark"
    });

    // Tabs on radiobuttons.
    var radioBtns = $("input[type=radio][name=delivery-method-group]"),
        cartContent = $('.cart-content'),
        cartContentEnd = $('.cart-content__end'),
        cartRowEnd = $('.cart-row__end'),
        deliveryOne = $("div[data-tab-cont='delivery-method-one']"),
        deliveryPickUp = $("div[data-tab-cont='delivery-method-pickup']");

    radioBtns.on('change', function() {
        var $this = $(this),
            radioBtnId = $this.attr('id'),
            tabContent = $("div[data-tab-cont='"+radioBtnId+"']");
            
        deliveryOne.removeClass('active');
        deliveryPickUp.removeClass('active');

        if (radioBtnId == cartRowEnd.data('tabCont') ) {
            cartContent.removeClass('flex');
            cartContentEnd.removeClass('active');
            cartRowEnd.addClass('active');
        } else {
            cartRowEnd.removeClass('active');
            cartContent.addClass('flex');
            cartContentEnd.addClass('active');
            tabContent.addClass('active');
        }
    });

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

});

// Делегирование для инпутов, фильтрующих таблицу адресов
$(document).on('keyup', '.pick-delivery-adress__input', filterTable);

function filterTable() {
    var $this = $(this), 
        filter = $this.val().toUpperCase(),
        table = $this.closest(".filter-table-wrap").find(".delivery-table"),
        tr = table.find("tr"),
        td;
    console.log($this);
    // Loop through all table rows, and hide those who don't match the search query
    for (var i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
};