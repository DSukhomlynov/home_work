<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'parent') ?>

    <?= $form->field($model, 'alias') ?>

    <?= $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'delete') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'old_price') ?>

    <?php // echo $form->field($model, 'meta_title') ?>

    <?php // echo $form->field($model, 'meta_description') ?>

    <?php // echo $form->field($model, 'meta_keywords') ?>

    <?php // echo $form->field($model, 'taste') ?>

    <?php // echo $form->field($model, 'complect') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'ingredients') ?>

    <?php // echo $form->field($model, 'shipping_returns') ?>

    <?php // echo $form->field($model, 'advice') ?>

    <?php // echo $form->field($model, 'hit') ?>

    <?php // echo $form->field($model, 'sale') ?>

    <?php // echo $form->field($model, 'only_components_kit') ?>

    <?php // echo $form->field($model, 'is_packing') ?>

    <?php // echo $form->field($model, 'update') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
