<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;


/* @var $this yii\web\View */
/* @var $model app\models\Subscription */
/* @var $form yii\widgets\ActiveForm */

$mainImage = $model->getImage();
?>

<div class="subscription-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?// $form->field($model, 'active')->textInput() ?>
    <?= $form->field($model, 'active')
        ->checkbox(['label' => null, 'value'=>1,'uncheck'=>0, 'checked '=>$model->active?true:false])
        ->label("Активен") ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'old_price')->textInput(['maxlength' => true]) ?>

    <?// $form->field($model, 'information')->textarea(['rows' => 6]) ?>

    <?=$form->field($model, 'information')->widget(CKEditor::className(),[
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ])
    ])?>
    <img src="<?= $mainImage->getUrl('150x')?>" alt=""/>
    <?// $form->field($model, 'image')->fileInput(['value' => $mainImage->id]) ?>
    <?= $form->field($model, 'image')->widget(\mihaildev\elfinder\InputFile::className(), [
        'language'      => 'ru',
        'controller'    => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
        'filter'        => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
        'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
        'options'       => ['class' => 'form-control', 'readonly' => true, 'value' => $mainImage->filePath],
        'buttonOptions' => ['class' => 'btn btn-default'],
        'multiple'      => false,       // возможность выбора нескольких файлов
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
