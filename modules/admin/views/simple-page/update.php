<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SimplePage */

$this->title = 'Update Simple Page: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Simple Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="simple-page-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
