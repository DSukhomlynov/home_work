{$this->registerCssFile('/web/css/about.css')}

<div class="pattern-container">
    <div class="main-banner">
        <div class="main-slider swiper-container">
            <div class="swiper-wrapper">
                <a href="" class="swiper-slide" style="background:#382818">
                    <img class="main-swiper__img" src="/web/img/banners/banner_about.jpg" alt="">
                </a>
                <a href="" class="swiper-slide" style="background:#382818">
                    <img class="main-swiper__img" src="/web/img/banners/banner_about.jpg" alt="">
                </a>
                <a href="" class="swiper-slide" style="background:#382818">
                    <img class="main-swiper__img" src="/web/img/banners/banner_about.jpg" alt="">
                </a>
            </div>
            <div class="main-slider__pagination-container">
                <div class="main-slider__pagination swiper-pagination brown"></div>
            </div>
        </div>
    </div>
    <div class="container backg-container">

        {$this->render('blocks/breadcrumbs')}

        <div class="page-about__information">
            <div class="page-title page-title--blue">Встречайте владельцев</div>
            <div class="information">
                <p>
                    Привет!
                    Меня зовут Григорий.
                    Я являюсь основателем Пряник Домик. История компании началась еще в 2012, когда это было всего лишь хобби. Хобби переросло в нечто большее и теперь мы - интернет-магазин и мастер-классы по декорированию пряников и сладостей.
                    Я открыт к общению и рад видеть всех желающих познакомиться у нас в гостях.

                </p>
                <!-- <div class="text-indent"></div> -->
                <!-- <p>
                    Ваша любовь и поддержка значит для меня так много! Если у вас есть какие-либо
                    вопросы или вы просто хотите познакомиться ... Пожалуйста! Я буду рад Вам. То,
                    что началось в 2012 году, как увлечение Тани превратилось в онлайн-магазины,
                    а также в студию для изготовления печенья
                </p> -->
            </div>

            {$this->render('blocks/cookie-icons')}

            <div class="page-title page-title--blue">Шоу и события</div>
            <div class="information">
                <p>
                    Мы участвуем в различных видах соревнованиях сладостей и конференциях. Следуйте за нами на Facebook, и вы не упустите шанс встретиться с нами!!
                </p>
            </div>
        </div>

        <section class="our-photos">
            <div class="page-title">Наши фотографии</div>
            <div class="gallery-grid">
                <div class="gallery-grid__item">
                    <a href="/web/img/about/foto_1.png" class="gallery-grid__item-overlay">
                        <div class="gallery-grid__veiw-btn"></div>
                    </a>
                    <div class="gallery-grid__item-img" style="background-image: url(/web/img/about/foto_1.png)"></div>
                </div>
                <div class="gallery-grid__item">
                    <a href="/web/img/about/foto_2.png" class="gallery-grid__item-overlay">
                        <div class="gallery-grid__veiw-btn"></div>
                    </a>
                    <div class="gallery-grid__item-img" style="background-image: url(/web/img/about/foto_2.png)"></div>
                </div>
                <div class="gallery-grid__item">
                    <a href="/web/img/about/foto_3.jpg" class="gallery-grid__item-overlay">
                        <div class="gallery-grid__veiw-btn"></div>
                    </a>
                    <div class="gallery-grid__item-img" style="background-image: url(/web/img/about/foto_3.jpg)"></div>
                </div>
                <div class="gallery-grid__item">
                    <a href="/web/img/about/foto_4.jpg" class="gallery-grid__item-overlay">
                        <div class="gallery-grid__veiw-btn"></div>
                    </a>
                    <div class="gallery-grid__item-img" style="background-image: url(/web/img/about/foto_4.jpg)"></div>
                </div>
                <div class="gallery-grid__item">
                    <a href="/web/img/about/foto_5.jpg" class="gallery-grid__item-overlay">
                        <div class="gallery-grid__veiw-btn"></div>
                    </a>
                    <div class="gallery-grid__item-img" style="background-image: url(/web/img/about/foto_5.jpg)"></div>
                </div>
                <div class="gallery-grid__item">
                    <a href="/web/img/about/foto_6.jpg" class="gallery-grid__item-overlay">
                        <div class="gallery-grid__veiw-btn"></div>
                    </a>
                    <div class="gallery-grid__item-img" style="background-image: url(/web/img/about/foto_6.jpg)"></div>
                </div>
            </div>
        </section>

        <div class="questions">
            <div class="page-title page-title--blue">У Вас есть вопросы?</div>
            <div class="page-about__text">
                <p>
                    Если у вас есть вопросы, свяжитесь с нами, и мы с удовольствием ответим на них.
                </p>
            </div>
            <a href="#" class="see-all-link">Связаться</a>
        </div>
        {$this->render('blocks/subscribe-form')}
    </div>
</div>
<div class="up-scroll">
    <span class="up-scroll__pic" svg-data-uri></span>
</div>