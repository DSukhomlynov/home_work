<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>
    <input id="make_alias" type="button" value="Make alias"/>

    <?// $form->field($model, 'published')->textInput() ?>
    <?= \kartik\date\DatePicker::widget([
        'model' => $model,
        'attribute' => 'published',
        'value' => date('d-M-Y', strtotime('+2 days')),
        'options' => ['placeholder' => 'Select issue date ...'],
        'language' => 'en',
        'pluginOptions' => [
            'format' => 'dd-M-yyyy',
            'todayHighlight' => true
        ]
    ]);?>

    <?// $form->field($model, 'active')->textInput() ?>
    <?= $form->field($model, 'active')
        ->checkbox(['label' => null, 'value'=>1,'uncheck'=>0, 'checked '=>$model->active?true:false])
        ->label("Активен") ?>

    <?// $form->field($model, 'delete')->textInput() ?>
    <?= $form->field($model, 'delete')
        ->checkbox(['label' => null, 'value'=>1,'uncheck'=>0, 'checked '=>$model->active?true:false])
        ->label("Удален") ?>

    <?// $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    <?=$form->field($model, 'content')->widget(CKEditor::className(),[
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ])
    ])?>

    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_keywords')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    $(document).ready(function () {
        $('#make_alias').click(function (e) {
            //var text = $('input[name="Category[name]"]').val();
            translitF("post-name", "post-alias");
        });
    });
</script>