<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */

$groups = [
    'client' => 'Клиент',
    'admin' => 'Админ'
];
?>

<?php if( \Yii::$app->session->hasFlash('error_create_refferal_code') ): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('error_create_refferal_code')[0]; ?>
    </div>
<?php endif;?>
<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?// $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true])->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '+38 (999) 999 99 99',
    ]) ?>

    <?// $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?/* $form->field($model, 'email')->textInput(['maxlength' => true])->widget(\yii\widgets\MaskedInput::className(), [
        'mask' => 't',
        'definitions' => ['t' => [
                'validator' => "/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/",
                'cardinality' => 4,
                'prevalidator' =>  [
                    ['validator' => '[12]', 'cardinality' => 1],
                    ['validator' => '(19|20)', 'cardinality' => 2],
                    ['validator' => '(19|20)\\d', 'cardinality' => 3],
                ]
            ]]
    ]) */?>
    <?=  $form->field($model, 'email')->textInput(['maxlength' => true])->widget(\yii\widgets\MaskedInput::className(), [
        'clientOptions' => [
            'alias' =>  'email'
        ],
    ]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'value' => '123456' , 'readonly' => true]) ?>
    <?/*$form->field($model, 'update_password')
        ->checkbox(['label' => null, 'value'=>0,'uncheck'=>1, 'checked '=>false])
        ->label("Новый пароль") */?>
    <div class="form-group field-users-update_password has-success">
        <label class="control-label" for="users-update_password">Новый пароль</label>
        <input type="hidden" name="Users[update_password]" value="0"><input type="checkbox" id="users-update_password" name="Users[update_password]" value="0" aria-invalid="false">

        <div class="help-block"></div>
    </div>

    <?= $form->field($model, 'refferal_code')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <!--<div class="form-group field-users-group">
        <label class="control-label" for="users-group">Parent</label>
        <select id="users-group" class="form-control" name="Users[group]">
            <option value='client'>Клиент</option>
            <option value='admin'>Админ</option>
        </select>
    </div>-->
    <?= $form->field($model, 'group')->dropDownList($groups) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
    $(document).ready(function(){
        work_password($('input[name="Users[update_password]"]'));
        $('input[name="Users[update_password]"]').on('click', function(){
            work_password(this);
        });
    });

    function work_password(element) {
        if ($(element).prop('checked')) {
            $('input[name="Users[password]"]').prop('readonly', false).val('');
            $(element).val('1');
        } else {
            $('input[name="Users[password]"]').prop('readonly', true).attr('value','123456');
            $(element).val('0');
        }
    }
</script>
