<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'parent',
            'alias',
            'active',
            'delete',
            'price',
            'old_price',
            'meta_title',
            'meta_description',
            'meta_keywords',
            'taste',
            'complect',
            'content:ntext',
            'ingredients:ntext',
            'shipping_returns:ntext',
            'advice:ntext',
            'hit',
            'sale',
            'only_components_kit',
            'is_packing',
            'update',
        ],
    ]) ?>

</div>
