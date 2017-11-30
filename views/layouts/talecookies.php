<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\widgets\LoginFormWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=1200">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
<body>
<?php $this->beginBody() ?>

<?//= (Yii::$app->user->isGuest ? LoginFormWidget::widget([]) : ''); ?>

<div class="wrapper">
    <header class="header header--open-menu">
        <div class="header-inner-wrap">
            <div class="container">
                <div class="header-top-middle-logo-wrap">
                    <div class="header__logo">
                        <a href="/" class="logo">
                            <?= Html::img('/web/img/icon/logo.svg', ['alt' => '', 'class' => "logo__pic img-responsive"]) ?>
                        </a>
                    </div>
                    <div class="header-top-middle-wrap">
                        <div class="header__top">
                            <ul class="nav-list">
                                <li class="nav-list__item">
                                    <a href="/site/about" class="nav-list__link">О нас</a>
                                </li>
                                <li class="nav-list__item">
                                    <a href="/site/contacts" class="nav-list__link">Контакты</a>
                                </li>
                                <li class="nav-list__item">
                                    <a href="/site/payment" class="nav-list__link">Оплата и доставка</a>
                                </li>
                                <li class="nav-list__item">
                                    <a href="/site/blog" class="nav-list__link">Блог</a>
                                </li>
                                <li class="nav-list__item">
                                    <a href="/site/competition" class="nav-list__link nav-list__link_competition">Конкурс<span class="competition-icon" svg-data-uri></span>
                                    </a>
                                </li>
                            </ul>
                            <div class="contacts">
                                <div class="callback">
                                    <a href="#" class="callback__title">заказать звонок</a>
                                    <a href="tel:+79992139753" class="callback__phone">+7 999 213 97 53</a>
                                </div>
                                <!-- <div class="working-hours">8:00 AM - 8:00 PM</div> -->
                                <div class="email">
                                    <a href="mailto:pryanikdomikspb@gmail.com" class="email__link">e-mail: pryanikdomikspb@gmail.com</a>
                                </div>
                            </div>
                        </div>
                        <div class="header__middle">
                            <div class="header__middle-start">
                                <form class="search">
                                    <input type="text" class="search__input">
                                    <button class="blue-btn--search search__btn" type="submit">поиск</button>
                                </form>
                            </div>
                            <div class="header__middle-end">
                                <ul class="signIn-cart__list">
                                    <li class="signIn-cart__item">
                                        <a href="#" class="signIn-cart__link signIn-cart__link--signUp">Регистрация</a>
                                    </li>
                                    <li class="signIn-cart__item">
                                        <a href="#" class="signIn-cart__link signIn-cart__link--signIn">Вход</a>
                                    </li>
                                    <li class="signIn-cart__item">
                                        <a href="wishlist.php" class="signIn-cart__link signIn-cart__link--wishlist">Список желаний</a>
                                        <span class="wishlist-icon" svg-data-uri>
                                    </span>
                                    </li>
                                    <li class="signIn-cart__item minicart minicart--full">
                                        <a href="cart.php" class="signIn-cart__link signIn-cart__link--cart">Корзина <span class="num-prod-in-cart">(22 товара)</span></a>
                                        <span class="cart-icon" svg-data-uri></span>

                                        <div class="mini-basket">
                                            <table class="mini-basket-table">
                                                <tr class="mini-basket-table__tr">
                                                    <td class="mini-basket-table__td product-pic">
                                                        <a href="#" class="product-pic__link">
                                                            <img src="/web/img/products-small-images/item1.jpg" alt="" class="product-pic__img img-responsive">
                                                        </a>
                                                    </td>
                                                    <td class="mini-basket-table__td product-title">
                                                        <a href="#" class="product-title__link">
                                                            Банановые капкейки с кусочками шоколада / Ванильные капкейки с домашней карамелью
                                                        </a>
                                                    </td>
                                                    <td class="mini-basket-table__td product-quant-conrol">
                                                        <form  class="quant-conrol">
                                                            <div class="qty-button qty-button-minus">-</div>
                                                            <input class="qty" type="text" value="4" />
                                                            <div class="qty-button qty-button-plus">+</div>
                                                            <button class="quant-conrol__count-change" hidden></button>
                                                        </form>
                                                    </td>
                                                    <td class="mini-basket-table__td product-price">
                                                        <div class="product-price__new">116₽</div>
                                                        <div class="product-price__old">122₽</div>
                                                    </td>
                                                    <td class="mini-basket-table__td product-remove">
                                                        <a href="#" class="product-remove__link">
                                                            <span class="product-remove__icon" svg-data-uri></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="mini-basket-table__tr">
                                                    <td class="mini-basket-table__td product-pic">
                                                        <a href="#" class="product-pic__link">
                                                            <img src="/web/img/products-small-images/item1.jpg" alt="" class="product-pic__img img-responsive">
                                                        </a>
                                                    </td>
                                                    <td class="mini-basket-table__td product-title">
                                                        <a href="#" class="product-title__link">
                                                            Банановые капкейки с кусочками шоколада / Ванильные капкейки с домашней карамелью
                                                        </a>
                                                    </td>
                                                    <td class="mini-basket-table__td product-quant-conrol">
                                                        <form  class="quant-conrol">
                                                            <div class="qty-button qty-button-minus">-</div>
                                                            <input class="qty" type="text" value="4" />
                                                            <div class="qty-button qty-button-plus">+</div>
                                                            <button class="quant-conrol__count-change" hidden></button>
                                                        </form>
                                                    </td>
                                                    <td class="mini-basket-table__td product-price">
                                                        <div class="product-price__new">116₽</div>
                                                        <div class="product-price__old">122₽</div>
                                                    </td>
                                                    <td class="mini-basket-table__td product-remove">
                                                        <a href="#" class="product-remove__link">
                                                            <span class="product-remove__icon" svg-data-uri></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="mini-basket-table__tr">
                                                    <td class="mini-basket-table__td product-pic">
                                                        <a href="#" class="product-pic__link">
                                                            <img src="/web/img/products-small-images/item1.jpg" alt="" class="product-pic__img img-responsive">
                                                        </a>
                                                    </td>
                                                    <td class="mini-basket-table__td product-title">
                                                        <a href="#" class="product-title__link">
                                                            Банановые капкейки с кусочками шоколада / Ванильные капкейки с домашней карамелью
                                                        </a>
                                                    </td>
                                                    <td class="mini-basket-table__td product-quant-conrol">
                                                        <form  class="quant-conrol">
                                                            <div class="qty-button qty-button-minus">-</div>
                                                            <input class="qty" type="text" value="4" />
                                                            <div class="qty-button qty-button-plus">+</div>
                                                            <button class="quant-conrol__count-change" hidden></button>
                                                        </form>
                                                    </td>
                                                    <td class="mini-basket-table__td product-price">
                                                        <div class="product-price__new">116₽</div>
                                                        <div class="product-price__old">122₽</div>
                                                    </td>
                                                    <td class="mini-basket-table__td product-remove">
                                                        <a href="#" class="product-remove__link">
                                                            <span class="product-remove__icon" svg-data-uri></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr class="mini-basket-table__tr">
                                                    <td class="mini-basket-table__td product-pic">
                                                        <a href="#" class="product-pic__link">
                                                            <img src="/web/img/products-small-images/item1.jpg" alt="" class="product-pic__img img-responsive">
                                                        </a>
                                                    </td>
                                                    <td class="mini-basket-table__td product-title">
                                                        <a href="#" class="product-title__link">
                                                            Банановые капкейки с кусочками шоколада / Ванильные капкейки с домашней карамелью
                                                        </a>
                                                    </td>
                                                    <td class="mini-basket-table__td product-quant-conrol">
                                                        <form  class="quant-conrol">
                                                            <div class="qty-button qty-button-minus">-</div>
                                                            <input class="qty" type="text" value="4" />
                                                            <div class="qty-button qty-button-plus">+</div>
                                                            <button class="quant-conrol__count-change" hidden></button>
                                                        </form>
                                                    </td>
                                                    <td class="mini-basket-table__td product-price">
                                                        <div class="product-price__new">116₽</div>
                                                        <div class="product-price__old">122₽</div>
                                                    </td>
                                                    <td class="mini-basket-table__td product-remove">
                                                        <a href="#" class="product-remove__link">
                                                            <span class="product-remove__icon" svg-data-uri></span>
                                                        </a>
                                                    </td>
                                                </tr>

                                            </table>
                                            <div class="minibasket-subtotal">
                                                <span class="minibasket-subtotal__text">Сумма</span>
                                                <span class="subtotal__amount">5500.35₽</span>
                                            </div>
                                            <button class="blue-btn--checkout"><span>купить</span></button>
                                        </div>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header__bottom">
                <div class="main-menu">
                    <div class="container">
                        <ul class="main-menu__list">
                            <li class="main-menu__item menu-trigger">
                                <a href="catalog.php" class="main-menu__link">
                                    Пряники и сладости
                                    <span class="hamburger">
                                    <span class="line"></span>
                                    <span class="line"></span>
                                    <span class="line"></span>
                                </span>
                                </a>
<!--                                <ul class="menu">-->
<!--                                    <li class="menu__item">-->
<!--                                        <a href="#" class="menu__link">Капкейки</a>-->
<!--                                    </li>-->
<!--                                    <li class="menu__item">-->
<!--                                        <a href="#" class="menu__link">Пирожные</a>-->
<!--                                    </li>-->
<!--                                    <li class="menu__item">-->
<!--                                        <a href="#" class="menu__link">Пряники</a>-->
<!--                                    </li>-->
<!--                                    <li class="menu__item">-->
<!--                                        <a href="#" class="menu__link">Торты <span class="menu__link-icon arrow-right" svg-data-uri></span></a>-->
<!--                                        <div class="submenu">-->
<!--                                            <h3 class="submenu__title">Торты</h3>-->
<!--                                            <ul class="submenu__list">-->
<!--                                                <li class="submenu__item">-->
<!--                                                    <a href="#" class="submenu__link">Весь ассортимент</a>-->
<!--                                                </li>-->
<!--                                                <li class="submenu__item">-->
<!--                                                    <a href="#" class="submenu__link">Новый год</a>-->
<!--                                                </li>-->
<!--                                                <li class="submenu__item">-->
<!--                                                    <a href="#" class="submenu__link">1 Сентября</a>-->
<!--                                                </li>-->
<!--                                                <li class="submenu__item">-->
<!--                                                    <a href="#" class="submenu__link">1 Июня</a>-->
<!--                                                </li>-->
<!--                                                <li class="submenu__item">-->
<!--                                                    <a href="#" class="submenu__link">14 февраля</a>-->
<!--                                                </li>-->
<!--                                                <li class="submenu__item">-->
<!--                                                    <a href="#" class="submenu__link">8 Марта</a>-->
<!--                                                </li>-->
<!--                                                <li class="submenu__item">-->
<!--                                                    <a href="#" class="submenu__link">23 Февраля</a>-->
<!--                                                </li>-->
<!--                                                <li class="submenu__item">-->
<!--                                                    <a href="#" class="submenu__link">9 Мая</a>-->
<!--                                                </li>-->
<!--                                                <li class="submenu__item">-->
<!--                                                    <a href="#" class="submenu__link">Свадьба</a>-->
<!--                                                </li>-->
<!--                                                <li class="submenu__item">-->
<!--                                                    <a href="#" class="submenu__link">Пасха</a>-->
<!--                                                </li>-->
<!--                                                <li class="submenu__item">-->
<!--                                                    <a href="#" class="submenu__link">Крещение</a>-->
<!--                                                </li>-->
<!--                                                <li class="submenu__item">-->
<!--                                                    <a href="#" class="submenu__link">Мультяшки</a>-->
<!--                                                </li>-->
<!--                                                <li class="submenu__item">-->
<!--                                                    <a href="#" class="submenu__link">День рождения</a>-->
<!--                                                </li>-->
<!--                                                <li class="submenu__item">-->
<!--                                                    <a href="#" class="submenu__link">День учителя</a>-->
<!--                                                </li>-->
<!--                                                <li class="submenu__item">-->
<!--                                                    <a href="#" class="submenu__link">Для девочек</a>-->
<!--                                                </li>-->
<!--                                                <li class="submenu__item">-->
<!--                                                    <a href="#" class="submenu__link">Для мальчиков</a>-->
<!--                                                </li>-->
<!--                                            </ul>-->
<!--                                        </div>-->
<!--                                    </li>-->
<!--                                    <li class="menu__item">-->
<!--                                        <a href="#" class="menu__link">Зефир</a>-->
<!--                                    </li>-->
<!--                                    <li class="menu__item">-->
<!--                                        <a href="#" class="menu__link">Безе</a>-->
<!--                                    </li>-->
<!--                                </ul>-->
                            </li>
                            <li class="main-menu__item">
                                <a href="membership.php" class="main-menu__link">Подписка</a>
                            </li>
                            <li class="main-menu__item">
                                <a href="vip-gift.php" class="main-menu__link">VIP подарки</a>
                            </li>
                            <li class="main-menu__item">
                                <a href="for-business.php" class="main-menu__link">Для Корпоративных заказов и агенств </a>
                            </li>
                            <li class="main-menu__item">
                                <a href="classes.php" class="main-menu__link">Мастер-классы</a>
                            </li>
                            <li class="main-menu__item">
                                <a href="our-studio.php" class="main-menu__link">Наша студия</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="blue-line"></div>
        </div>
    </header>

    <div class="hide">
        <?php include 'popups/sign-in-popup.php' ?>
        <?php include 'popups/sign-up-popup.php' ?>
        <?php include 'popups/confirm-sign-up-popup.php' ?>
        <?php include 'popups/completion-sing-up-popup.php' ?>
    </div>

    <?= $content ?>

</div>

<footer class="footer">
    <div class="container">
        <div class="footer__top">
            <div class="footer__start">
                <div class="footer-menu-title">Пряники и сладости</div>
                <ul class="footer-menu">
                    <li class="footer-menu__item">
                        <a href="#" class="footer-menu__link">Капкейки</a>
                    </li>
                    <li class="footer-menu__item">
                        <a href="#" class="footer-menu__link">Пряники</a>
                    </li>
                    <li class="footer-menu__item">
                        <a href="#" class="footer-menu__link">Торты</a>
                    </li>
                    <li class="footer-menu__item">
                        <a href="#" class="footer-menu__link">Зефир</a>
                    </li>
                </ul>
            </div>
            <div class="footer__middle">
                <div class="footer-logo">
                    <a href="#" class="footer-logo__link">
                        <?= Html::img('/web/img/icon/logo.svg', ['alt' => 'logo', 'class' => "logo__pic img-responsive"]) ?>
                    </a>
                </div>
                <div class="socials">
                    <ul class="socials__list">
                        <li class="socials__item">
                            <a href="#" class="socials__link socials__link--insta" svg-data-uri></a>
                        </li>
                        <li class="socials__item">
                            <a href="#" class="socials__link socials__link--fb" svg-data-uri></a>
                        </li>
                        </li>
                        <li class="socials__item">
                            <a href="#" class="socials__link socials__link--ytube" svg-data-uri></a>
                        </li>
                        <li class="socials__item">
                            <a href="#" class="socials__link socials__link--etsy" svg-data-uri></a>
                        </li>
                        <li class="socials__item">
                            <a href="#" class="socials__link socials__link--yelp" svg-data-uri></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer__end"></div>
            <div class="footer__end-col">
                <div class="footer-menu-title">Предложения</div>
                <ul class="footer-main-menu">
                    <li class="footer-main-menu__item">
                        <a href="#" class="footer-main-menu__link">Подписки</a>
                    </li>
                    <li class="footer-main-menu__item">
                        <a href="vip-gift.php" class="footer-main-menu__link">VIP подарки</a>
                    </li>
                    <li class="footer-main-menu__item">
                        <a href="#" class="footer-main-menu__link">Для Корпоративных заказов и агенств</a>
                    </li>
                    <li class="footer-main-menu__item">
                        <a href="#" class="footer-main-menu__link">Мастер-классы</a>
                    </li>
                    <li class="footer-main-menu__item">
                        <a href="our-studio.php" class="footer-main-menu__link">Наша студия</a>
                    </li>
                </ul>
            </div>
            <div class="footer__end-col">
                <div class="footer-menu-title">Контакты</div>
                <ul class="footer-nav-list">
                    <li class="footer-nav-list__item">
                        <a href="about.php" class="footer-nav-list__link">О нас</a>
                    </li>
                    <li class="footer-nav-list__item">
                        <a href="contacts.php" class="footer-nav-list__link">Контакты</a>
                    </li>
                    <li class="footer-nav-list__item">
                        <a href="payment.php" class="footer-nav-list__link">Оплата и доставка</a>
                    </li>
                    <li class="footer-nav-list__item">
                        <a href="blog.php" class="footer-nav-list__link">Блог</a>
                    </li>
                    <li class="footer-nav-list__item">
                        <a href="competition.php" class="footer-nav-list__link footer-nav-list__link--competition">Конкурс<span class="competition-icon" svg-data-uri></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<div class="footer__bottom">
    <div class="container container--flex">
        <div class="copyright">©2017 "Пряник домик".</div>
        <div class="development-by">разработано в
            <a href="#" class="development-by__link">
                moohii.com
            </a>
        </div>
    </div>
</div>
</footer>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>