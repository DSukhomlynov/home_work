<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SimplePage */

$this->title = 'Create Simple Page';
$this->params['breadcrumbs'][] = ['label' => 'Simple Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="simple-page-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
