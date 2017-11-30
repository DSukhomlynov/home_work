<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Import', ['import'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'parent',
            'alias',
            'active',
            // 'delete',
            // 'price',
            // 'old_price',
            // 'meta_title',
            // 'meta_description',
            // 'meta_keywords',
            // 'taste',
            // 'complect',
            // 'content:ntext',
            // 'ingredients:ntext',
            // 'shipping_returns:ntext',
            // 'advice:ntext',
            // 'hit',
            // 'sale',
            // 'only_components_kit',
            // 'is_packing',
            // 'update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
