$(function () {

	if ($(".swiper-slide").length > 1) {
		new Swiper('.main-slider', {
			pagination: ".main-slider__pagination",
			paginationClickable: true,
			effect: 'fade',
			loop: true,
			// autoplay: 2000
		});
	}

	var gridLayouts = [
		['height2', '0', '0', '0', '0', 'width2'],
		['0', '0', '0', 'height2', '0', 'width2'],
		['width2', 'height2', '0', '0', '0', '0'],
		['0', 'height2', '0', '0', '0', 'width2'],
		['0', 'width2', 'height2', '0', '0', '0'],
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
});



