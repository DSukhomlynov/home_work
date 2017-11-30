<?php

namespace app\components\fenom;
use app\assets\IndexAsset;

IndexAsset::register($this);
?>
{*{$.php.app.assets.IndexAsset::register($this)}*}
{set $this->title = 'Главная'}
{$this->registerCssFile('/web/css/index.css')}

<div class="pattern-container">
    <div class="main-banner">
        <div class="main-slider main-slider--backg swiper-container">
            <div class="swiper-wrapper">
                <a href="" class="swiper-slide" style="background:#94dcf4">
                    <img class="main-swiper__img" src="/web/img/banners/main-slider_1.png" alt="">
                </a>
                <a href="" class="swiper-slide" style="background:#70bed6">
                    <img class="main-swiper__img" src="/web/img/banners/main-slider_1.png" alt="">
                </a>
                <a href="" class="swiper-slide" style="background:#01b7c5">
                    <img class="main-swiper__img" src="/web/img/banners/main-slider_1.png" alt="">
                </a>
            </div>
            <div class="main-slider__pagination-container">
                <div class="main-slider__pagination swiper-pagination white"></div>
            </div>
        </div>
    </div>
    <div class="container backg-container">
        <div class="page-title">Новинки</div>
        <div class="products-container">
            <div class="products-container__inner">
                {$this->render('blocks/product-block')}
                {$this->render('blocks/product-block-discount')}
                {$this->render('blocks/product-block')}
                {$this->render('blocks/product-block')}
                <div class="product-horizontal-line"></div>
                {$this->render('blocks/product-block')}
                {$this->render('blocks/product-block-discount')}
                {$this->render('blocks/product-block-top')}
                {$this->render('blocks/product-block')}
            </div>
            <div class="btn-center-block">
                <a href="#" class="see-all-link">смотреть все</a>
            </div>
        </div>

        <div class="page-title">Индивидуальный заказ</div>
        <section class="custom-order content-block">
            <div class="custom-order__images-block">
                <img src="/web/img/content/item1.png" class="left-center" alt="">
                <img src="/web/img/content/item2.png" class="right-top" alt="">
                <img src="/web/img/content/item3.png" class="center-bottom" alt="">
            </div>
            <div class="custom-order__content-text">
                <div class="custom-order__title">
                    Создадим для Вас уникальный шедевр!
                </div>
                <div class="custom-order__text">
                    Близкие, друзья, коллеги - они все разные и потому бывает сложно подобрать подарок из предложенного каталога, мы понимаем.
                    Поэтому у нас есть специальное предложение именно для таких случаев - индивидуальный заказ. Мы сделаем все, чтобы вы остались довольны!
                </div>
                <button class="look-detalies blue-btn"><span>подробнее</span></button>
            </div>
        </section>

        <div class="page-title">Как мы делаем наши сладости</div>
        <div class="videos-slider-block content-block">
            <div class="videos-slider-block__title">
                Закулисье создания украшений для пряников
            </div>
            <div class="videos-slider-block__description">
                Мы рады приоткрыть для Вас занавес процесса изготовления наших пряников
            </div>
            <div class="videos-slider-wrapper">
                <div class="videos-slider swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="video-preview">
                                <object>
                                    <a class="video-preview__link" href="http://www.youtube.com/embed/cTj1WQ_EEyc?rel=0&amp;wmode=transparent">
                                        <div class="video-preview-inner">
                                            <img class="video-preview__img" src="http://img.youtube.com/vi/cTj1WQ_EEyc/mqdefault.jpg" alt=""/>
                                            <div class="video-preview__play-btn"></div>
                                            <span class="video-preview__time">04:54</span>
                                        </div>
                                        <div class="video-preview__description">
                                            Процесс декорирования печенья
                                        </div>
                                    </a>
                                </object>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="video-preview">
                                <object>
                                    <a class="video-preview__link" href="http://www.youtube.com/embed/ODWv5DhwJcc?rel=0&amp;wmode=transparent">
                                        <div class="video-preview-inner">
                                            <img class="video-preview__img" src="http://img.youtube.com/vi/ODWv5DhwJcc/mqdefault.jpg" alt=""/>
                                            <div class="video-preview__play-btn"></div>
                                            <span class="video-preview__time">03:50</span>
                                        </div>
                                        <div class="video-preview__description">
                                            Процесс декорирования печенья
                                        </div>
                                    </a>
                                </object>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="video-preview">
                                <object>
                                    <a class="video-preview__link" href="http://www.youtube.com/embed/6WbQZkd0MPE?rel=0&amp;wmode=transparent">
                                        <div class="video-preview-inner">
                                            <img class="video-preview__img" src="http://img.youtube.com/vi/6WbQZkd0MPE/mqdefault.jpg" alt=""/>
                                            <div class="video-preview__play-btn"></div>
                                            <span class="video-preview__time">21:19</span>
                                        </div>
                                        <div class="video-preview__description">
                                            Процесс декорирования печенья
                                        </div>
                                    </a>
                                </object>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="video-preview">
                                <object>
                                    <a class="video-preview__link" href="http://www.youtube.com/embed/N8U0k3o_dOU?rel=0&amp;wmode=transparent">
                                        <div class="video-preview-inner">
                                            <img class="video-preview__img" src="http://img.youtube.com/vi/N8U0k3o_dOU/mqdefault.jpg" alt=""/>
                                            <div class="video-preview__play-btn"></div>
                                            <span class="video-preview__time">06:40</span>
                                        </div>
                                        <div class="video-preview__description">
                                            Процесс декорирования печенья
                                        </div>
                                    </a>
                                </object>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="video-preview">
                                <object>
                                    <a class="video-preview__link" href="http://www.youtube.com/embed/N8U0k3o_dOU?rel=0&amp;wmode=transparent">
                                        <div class="video-preview-inner">
                                            <img class="video-preview__img" src="http://img.youtube.com/vi/N8U0k3o_dOU/mqdefault.jpg" alt=""/>
                                            <div class="video-preview__play-btn"></div>
                                            <span class="video-preview__time">06:40</span>
                                        </div>
                                        <div class="video-preview__description">
                                            Процесс декорирования печенья
                                        </div>
                                    </a>
                                </object>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="video-preview">
                                <object>
                                    <a class="video-preview__link" href="http://www.youtube.com/embed/6WbQZkd0MPE?rel=0&amp;wmode=transparent">
                                        <div class="video-preview-inner">
                                            <img class="video-preview__img" src="http://img.youtube.com/vi/6WbQZkd0MPE/mqdefault.jpg" alt=""/>
                                            <div class="video-preview__play-btn"></div>
                                            <span class="video-preview__time">21:19</span>
                                        </div>
                                        <div class="video-preview__description">
                                            Процесс декорирования печенья
                                        </div>
                                    </a>
                                </object>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="video-preview">
                                <object>
                                    <a class="video-preview__link" href="http://www.youtube.com/embed/N8U0k3o_dOU?rel=0&amp;wmode=transparent">
                                        <div class="video-preview-inner">
                                            <img class="video-preview__img" src="http://img.youtube.com/vi/N8U0k3o_dOU/mqdefault.jpg" alt=""/>
                                            <div class="video-preview__play-btn"></div>
                                            <span class="video-preview__time">06:40</span>
                                        </div>
                                        <div class="video-preview__description">
                                            Процесс декорирования печенья
                                        </div>
                                    </a>
                                </object>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="video-preview">
                                <object>
                                    <a class="video-preview__link" href="http://www.youtube.com/embed/N8U0k3o_dOU?rel=0&amp;wmode=transparent">
                                        <div class="video-preview-inner">
                                            <img class="video-preview__img" src="http://img.youtube.com/vi/N8U0k3o_dOU/mqdefault.jpg" alt=""/>
                                            <div class="video-preview__play-btn"></div>
                                            <span class="video-preview__time">06:40</span>
                                        </div>
                                        <div class="video-preview__description">
                                            Процесс декорирования печенья
                                        </div>
                                    </a>
                                </object>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="videos-slider__btn-next swiper-btn-next swiper-btn--brown" svg-data-uri></div>
                <div class="videos-slider__btn-prev swiper-btn-prev swiper-btn--brown" svg-data-uri></div>
            </div>
            <button class="join-now blue-btn"><span>смотреть на канале</span></button>
        </div>

        <div class="page-title">Для корпоративных заказов и праздничных агенств</div>
        <div class="event-agencies content-block">
            <div class="event-agencies__left-block">
                <div class="event-agencies__img">
                    <img src="/web/img/content/item4.png" alt="">
                </div>
                <div class="event-agencies__title">
                    Отправляйте сладкие подарки на несколько адресов
                </div>
                <div class="event-agencies__description">
                    Мы рады сообщить вам об уникальной возможности - отправка подарков по почте нескольким адресатам сразу.
                    Больше не нужно оформлять разные заказы отдельно друг от друга, достаточно выбрать сладкие подарки и отправить их нескольким адресатам с помощью удобной корзины.
                </div>
                <button class="how-it-work-btn blue-btn"><span>как это работает</span></button>
            </div>
            <div class="event-agencies__right-block">
                <div class="event-agencies__img">
                    <img src="/web/img/content/item5.png" alt="">
                </div>
                <div class="event-agencies__title">
                    Сделаем пряники с логотипом вашей компании
                </div>
                <div class="event-agencies__description">
                    Уникальный заказ? Просто! Корпоративный заказ с логотипом компании - еще проще!
                    Пишите нам и мы все сделаем быстро, качественно, а главное - вкусно!
                </div>
                <button class="how-it-work-btn blue-btn"><span>сделать заказ</span></button>
            </div>
        </div>

        <div class="page-title">Скидки</div>
        <div class="products-container">
            <div class="products-container__inner">
                {$this->render('blocks/product-block-discount')}
                {$this->render('blocks/product-block-discount')}
                {$this->render('blocks/product-block-discount')}
                {$this->render('blocks/product-block-discount')}
            </div>
            <div class="btn-center-block">
                <a href="#" class="see-all-link">смотреть все</a>
            </div>
        </div>

        <div class="page-title">Ближайшие мастер-классы</div>
        <div class="main-page__content">
            <div class="offer">
                <div class="offer__left-block">
                    <div class="offer__date">
                        21.09.2017 (суббота) 13:00
                    </div>
                    <span class="offer__classes-type" style="color: #79a626;">групповые занятия</span>
                    <div class="offer__title block-title">
                        Мастер-класс для всей семьи
                    </div>
                    <div class="offer__price">1 час 30 мин | 5000 руб.</div>
                    <div class="offer__description">
                        Адрес: Большой Сампсониевский проспект 25, м. Выборгская,<br> Санкт-Петербург, Россия
                    </div>
                    <button class="blue-btn join-btn"><span>присоединиться</span></button>
                </div>
                <div class="offer__right-block" style="background-image: url(/web/img/content/item6.png)"></div>
            </div>
            <div class="offer">
                <div class="offer__left-block">
                    <div class="offer__date">
                        21.09.2017 (суббота) 13:00
                    </div>
                    <span class="offer__classes-type" style="color: #2aace2;">занятия по skype</span>
                    <div class="offer__title block-title">
                        Готовим онлайн
                    </div>
                    <div class="offer__price">1 час 30 мин | 5000 руб.</div>
                    <div class="offer__description">
                        Место: занятия по skype
                    </div>
                    <button class="blue-btn join-btn"><span>присоединиться</span></button>
                </div>
                <div class="offer__right-block" style="background-image: url(/web/img/content/item7.png)"></div>
            </div>
        </div>
        <div class="btn-center-block">
            <a href="#" class="see-all-link">все масстер-классы</a>
        </div>

        <div class="page-title">Отзывы</div>
        {$this->render('blocks/reviews-slider')}
        <div class="btn-center-block">
            <a href="#" class="see-all-link">все отзывы</a>
        </div>


        <div class="page-title">О нас</div>
        <section class="about-us">
            <div class="about-us__start">
                <div class="about-us__block">
                    <div class="about-us__title block-title">Создатели сладостей</div>
                    <div class="about-us__text">
                        Вначале это было лишь хобби, которое после переросло в бизнес, и мы гордимся этим. В 2012 году основалась компания Пряник Домик и теперь это не только магазин, это наша семья, где проводятся уютные мастер-классы для всех желающих, выпекаются самые вкусные сладости для близких и родных, здесь каждый может почувствовать себя родным.
                    </div>
                </div>
                <div class="about-us__block">
                    <div class="about-us__title block-title">Шоу и мероприятия</div>
                    <div class="about-us__text">
                        Мы организовываем различные “сладкие” мероприятия и конференции по всей России, поэтому будем рады познакомиться с вами лично!
                    </div>
                </div>
                <a href="#" class="about-us__link">больше о нас</a>
            </div>
            <div class="about-us__end">
                <div class="about-us__pic" style="background-image: url(/web/img/content/item11.jpg")></div>
            </div>
        </section>

        {$this->render('blocks/subscribe-form')}
        <div class="page-title">Instagram</div>
        <section class="insta">
            <div class="block-title--small insta__title">Следи за нами в Instagram</div>

            <div class="insta-col-wrap">
                <div class="insta-col">
                    <div class="insta-page-link-left">
                        <a href="https://www.instagram.com/pryanikdomik/" target="_blank" class="insta-page-link">@pryanikdomik</a>
                    </div>
                    <ul class="insta__list">
                        <li class="insta__item">
                            <a href="#" class="insta__link">
                                <img src="/web/img/insta/item1.png" alt="" class="insta__pic">
                            </a>
                        </li>
                        <li class="insta__item">
                            <a href="#" class="insta__link">
                                <img src="/web/img/insta/item2.png" alt="" class="insta__pic">
                            </a>
                        </li>
                        <li class="insta__item">
                            <a href="#" class="insta__link">
                                <img src="/web/img/insta/item3.png" alt="" class="insta__pic">
                            </a>
                        </li>
                        <li class="insta__item">
                            <a href="#" class="insta__link">
                                <img src="/web/img/insta/item4.png" alt="" class="insta__pic">
                            </a>
                        </li>
                        <li class="insta__item">
                            <a href="#" class="insta__link">
                                <img src="/web/img/content/item5.png" alt="" class="insta__pic">
                            </a>
                        </li>
                        <li class="insta__item">
                            <a href="#" class="insta__link">
                                <img src="/web/img/content/item4.png" alt="" class="insta__pic">
                            </a>
                        </li>
                        <li class="insta__item">
                            <a href="#" class="insta__link">
                                <img src="/web/img/content/item3.png" alt="" class="insta__pic">
                            </a>
                        </li>
                        <li class="insta__item">
                            <a href="#" class="insta__link">
                                <img src="/web/img/content/item11.jpg" alt="" class="insta__pic">
                            </a>
                        </li>
                        <li class="insta__item">
                            <a href="#" class="insta__link">
                                <img src="/web/img/content/item4.png" alt="" class="insta__pic">
                            </a>
                        </li>
                        <li class="insta__item">
                            <a href="#" class="insta__link">
                                <img src="/web/img/content/item3.png" alt="" class="insta__pic">
                            </a>
                        </li>
                        <li class="insta__item">
                            <a href="#" class="insta__link">
                                <img src="/web/img/content/item11.jpg" alt="" class="insta__pic">
                            </a>
                        </li>
                        <li class="insta__item">
                            <a href="#" class="insta__link">
                                <img src="/web/img/content/item11.jpg" alt="" class="insta__pic">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="insta-col">
                    <div class="insta-page-link-right">
                        <a href="https://www.instagram.com/pryanikdomik/" target="_blank" class="insta-page-link">@pryanikdomik</a>
                    </div>
                    <ul class="insta__list">
                        <li class="insta__item">
                            <a href="#" class="insta__link">
                                <img src="/web/img/insta/item1.png" alt="" class="insta__pic">
                            </a>
                        </li>
                        <li class="insta__item">
                            <a href="#" class="insta__link">
                                <img src="/web/img/insta/item2.png" alt="" class="insta__pic">
                            </a>
                        </li>
                        <li class="insta__item">
                            <a href="#" class="insta__link">
                                <img src="/web/img/insta/item3.png" alt="" class="insta__pic">
                            </a>
                        </li>
                        <li class="insta__item">
                            <a href="#" class="insta__link">
                                <img src="/web/img/insta/item4.png" alt="" class="insta__pic">
                            </a>
                        </li>
                        <li class="insta__item">
                            <a href="#" class="insta__link">
                                <img src="/web/img/content/item5.png" alt="" class="insta__pic">
                            </a>
                        </li>
                        <li class="insta__item">
                            <a href="#" class="insta__link">
                                <img src="/web/img/content/item4.png" alt="" class="insta__pic">
                            </a>
                        </li>
                        <li class="insta__item">
                            <a href="#" class="insta__link">
                                <img src="/web/img/content/item3.png" alt="" class="insta__pic">
                            </a>
                        </li>
                        <li class="insta__item">
                            <a href="#" class="insta__link">
                                <img src="/web/img/content/item11.jpg" alt="" class="insta__pic">
                            </a>
                        </li>
                        <li class="insta__item">
                            <a href="#" class="insta__link">
                                <img src="/web/img/content/item4.png" alt="" class="insta__pic">
                            </a>
                        </li>
                        <li class="insta__item">
                            <a href="#" class="insta__link">
                                <img src="/web/img/content/item3.png" alt="" class="insta__pic">
                            </a>
                        </li>
                        <li class="insta__item">
                            <a href="#" class="insta__link">
                                <img src="/web/img/content/item11.jpg" alt="" class="insta__pic">
                            </a>
                        </li>
                        <li class="insta__item">
                            <a href="#" class="insta__link">
                                <img src="/web/img/content/item11.jpg" alt="" class="insta__pic">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <div class="page-title">Наша продукция и как мы работаем</div>
        <section class="info-tips">
            <ul class="info-tips__list">
                <li class="info-tips__item">
                    <div class="info-tips__icon">
                        <img src="/web/img/icon/box.svg" alt="" class="info-tips__icon-img">
                    </div>
                    <div class="info-tips__text info-tips__text--light">
                        В течении 5-7 рабочих дней после оплаты заказ будет выполнен и доставлен по адресу.
                    </div>
                </li>
                <li class="info-tips__item">
                    <div class="info-tips__icon">
                        <img src="/web/img/icon/exclamation_mark.svg" alt="" class="info-tips__icon-img">
                    </div>
                    <div class="info-tips__text info-tips__text--light">Важно!<br> Содержит: мед, пшеницу, яйца.</div>
                </li>
                <li class="info-tips__item">
                    <div class="info-tips__icon">
                        <img src="/web/img/icon/lock.svg" alt="" class="info-tips__icon-img">
                    </div>
                    <div class="info-tips__text info-tips__text--light">Как хранить наши печенья?<br>Храните их в сухом, темном месте при комнатной температуре, упакованном в целлофан или в коробке. Пожалуйста, НЕ храните декорированные печенья в холодильнике или морозильной камере.
                    </div>
                </li>
                <li class="info-tips__item">
                    <div class="info-tips__icon">
                        <img src="/web/img/icon/cloud.svg" alt="" class="info-tips__icon-img">
                    </div>
                    <div class="info-tips__text info-tips__text--light">
                        Мы с радостью предлагаем вариант СРОЧНЫЙ для внезапных заказов: печенья будут готовы к отправке в течение 1-2 рабочих дней с момента оплаты заказа.<br>
                        Чтобы разместить свой заказ в существующем расписании выпечки и украшения, необходимо внести коррективы. Срочные заказы оплачиваются дополнительно + 40% от цены.
                    </div>
                </li>
                <li class="info-tips__item">
                    <div class="info-tips__icon">
                        <img src="/web/img/icon/cookies.svg" alt="" class="info-tips__icon-img">
                    </div>
                    <div class="info-tips__text info-tips__text--light">
                        Информация о сроках хранения.<br>Печенье - одна из немногих кондитерских изделий, которые могут храниться в течение длительного времени.<br> Рекомендуемый срок хранения составляет 1,5 месяца для песочного и шоколадного печенья; 3 месяца для пряников.
                    </div>
                </li>
            </ul>
        </section>
        {$this->render('blocks/contact-form')}

    </div>
</div>
<div class="up-scroll">
    <span class="up-scroll__pic" svg-data-uri></span>
</div>

<!-- Hidden blocks Start-->
<div class="custom-popup">
    <div class="custom-popup__overlay"></div>
    <div class="custom-popup__content">
        {$this->render('popups/add-comment-popup')}
    </div>
</div>
<!-- Hidden blocks End-->


