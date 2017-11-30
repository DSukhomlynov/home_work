<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventCalendarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Event Calendars';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-calendar-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Event Calendar', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'date',
            'time:datetime',
            'type',
            // 'price',
            // 'old_price',
            // 'location',
            // 'content:ntext',
            // 'meta_title',
            // 'meta_description',
            // 'meta_keywords',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
