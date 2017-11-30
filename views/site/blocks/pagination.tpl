<div class="pagination">
    <ul class="pagination__list">
        <li class="pagination__item pagination__item--prev">
        <a href="#" class="pagination__link pagination__link--next pagination__link--brown" svg-data-uri></a>
        </li>
        <li class="pagination__item active">
            <a href="#" class="pagination__link">1</a>
        </li>
        <li class="pagination__item">
            <a href="#" class="pagination__link">2</a>
        </li>
        <li class="pagination__item">
            <a href="#" class="pagination__link">3</a>
        </li>
        <li class="pagination__item">
            <a href="#" class="pagination__link">4</a>
        </li>
        <li class="pagination__item">
            <span class="pagination__dots">. . .</span>
        </li>
        <li class="pagination__item">
            <a href="#" class="pagination__link">5</a>
        </li>
        <li class="pagination__item pagination__item--next">
            <a href="#" class="pagination__link pagination__link--prev pagination__link--brown" svg-data-uri></a>
        </li>
    </ul>
</div>
{yii\widgets\LinkPager::widget([
'pagination' => $pages,
])}