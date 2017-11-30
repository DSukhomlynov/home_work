<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?// $form->field($model, 'parent')->textInput() ?>
    <div class="form-group field-category-parent">
        <label class="control-label" for="category-parent">Parent</label>
        <select id="categories-parent" class="form-control" name="Product[parent]">
            <?php
            $categories = \app\models\Category::find()->select(['id','name'])->asArray()->all();
            if('0' == $model->parent){
                echo "<option value='0' selected>Без родителя</option>";
            }else{
                echo "<option value='0'>Без родителя</option>";
            }
            foreach ($categories as $category) {
                if($category['id'] == $model->parent){
                    echo "<option value={$category['id']} selected>{$category['name']}</option>";
                }else{
                    echo "<option value={$category['id']}>{$category['name']}</option>";
                }
            }
            ?>
        </select>

        <div class="help-block"></div>
    </div>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'old_price')->textInput(['maxlength' => true]) ?>

    <h3>SEO</h3>
    <hr/>
        <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'meta_keywords')->textInput(['maxlength' => true]) ?>
    <hr/>
    <?= $form->field($model, 'taste')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'complect')->textInput(['maxlength' => true]) ?>

    <?// $form->field($model, 'content')->textarea(['rows' => 6]) ?>
    <?=$form->field($model, 'content')->widget(CKEditor::className(),[
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ])
    ])?>

    <?// $form->field($model, 'ingredients')->textarea(['rows' => 6]) ?>
    <?=$form->field($model, 'ingredients')->widget(CKEditor::className(),[
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ])
    ])?>
    <?// $form->field($model, 'shipping_returns')->textarea(['rows' => 6]) ?>
    <?=$form->field($model, 'shipping_returns')->widget(CKEditor::className(),[
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ])
    ])?>

    <?// $form->field($model, 'advice')->textarea(['rows' => 6]) ?>
    <?=$form->field($model, 'advice')->widget(CKEditor::className(),[
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ])
    ])?>

    <?// $form->field($model, 'hit')->textInput() ?>
    <?= $form->field($model, 'hit')
        ->checkbox(['label' => null, 'value'=>1,'uncheck'=>0, 'checked '=>$model->hit?true:false])
        ->label("Хит")
    ?>

    <?// $form->field($model, 'sale')->textInput() ?>
    <?= $form->field($model, 'sale')
        ->checkbox(['label' => null, 'value'=>1,'uncheck'=>0, 'checked '=>$model->sale?true:false])
        ->label("Акция")
    ?>

    <?// $form->field($model, 'active')->textInput() ?>
    <?= $form->field($model, 'active')
        ->checkbox(['label' => null, 'value'=>1,'uncheck'=>0, 'checked '=>$model->active?true:false])
        ->label("Активен")
    ?>
    <?// $form->field($model, 'delete')->textInput() ?>
    <?= $form->field($model, 'delete')
        ->checkbox(['label' => null, 'value'=>1,'uncheck'=>0, 'checked '=>$model->delete?true:false])
        ->label("Удален")
    ?>

    <?// $form->field($model, 'only_components_kit')->textInput() ?>
    <?= $form->field($model, 'only_components_kit')
        ->checkbox(['label' => null, 'value'=>1,'uncheck'=>0, 'checked '=>$model->only_components_kit?true:false])
        ->label("Только в составе комплекта")
    ?>

    <?// $form->field($model, 'is_packing')->textInput() ?>
    <?= $form->field($model, 'is_packing')
        ->checkbox(['label' => null, 'value'=>1,'uncheck'=>0, 'checked '=>$model->is_packing?true:false])
        ->label("Упаковка")
    ?>

    <?= $form->field($model, 'update')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
