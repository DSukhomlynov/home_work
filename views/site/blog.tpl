{$this->registerCssFile('/web/css/blog.css')}


<div class="pattern-container">
        <div class="container backg-container">
            {$this->render('blocks/breadcrumbs-long')}
            <section class="articles">
                {$entryPost[0][id]}
                {foreach $records as $record}
                <div class="article">
                    <div class="article__pic">
                        <img src="/web/img/blog/blog1.jpg" alt="">
                    </div>
                    <div class="article__content">
                        <div class="article__title">{$record[name]}</div>
                        <div class="article__date">{$record[published]}</div>
                        <div class="article__text">{$record[content]}</div>
                        <a href="blog-open.php" class="read-more-link">Читать</a>
                    </div>
                </div>
                {/foreach}
                {*<div class="article">*}
                    {*<div class="article__pic">*}
                        {*<img src="/web/img/blog/blog2.jpg" alt="">*}
                    {*</div>*}
                    {*<div class="article__content">*}
                        {*<div class="article__title">Пряники на Хеллоуин</div>*}
                        {*<div class="article__date">Опубликовано 20.10.2017</div>*}
                        {*<div class="article__text">*}
                            {*Эти милашки становятся хитом заказов на Хеллоуин уже 3й год и мы уже сейчас активно принимаем заказы на этот праздник  что бы вы хотели видеть? Наборчики тли Пряники поштучно?)) впереди ещё детский мастер-класс  Ещё, напоминаем, что кулинарная студия @Pryanikdomik с радостью приготовит специально для Вас пряники, торты или зефир для любого Вашего события, будь то корпоративного праздненства или уютного домашнего семейного праздника в кругу родных и близких.*}
                        {*</div>*}
                        {*<a href="blog-open.php" class="read-more-link">Читать</a>*}
                    {*</div>*}
                {*</div>*}
            </section>
            {$this->render('blocks/pagination.tpl')}
        </div>
    </div>
    <div class="up-scroll">
        <span class="up-scroll__pic" svg-data-uri></span>
    </div>
