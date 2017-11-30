<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SimplePageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Simple Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="simple-page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Simple Page', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'alias',
            'content:ntext',
            'custom_template',
            // 'active',
            // 'delete',
            // 'meta_title',
            // 'meta_description',
            // 'meta_keywords',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
