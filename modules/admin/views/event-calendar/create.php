<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EventCalendar */

$this->title = 'Create Event Calendar';
$this->params['breadcrumbs'][] = ['label' => 'Event Calendars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-calendar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
