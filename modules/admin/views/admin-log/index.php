<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10.11.2017
 * Time: 12:30
 *
 * @var $admin_panel_log (file log)
 */
use \yii\widgets\Pjax;
use \yii\helpers\Html;
?>
<h3>Лог заходов в админ пенель</h3>

<?php Pjax::begin(); ?>
    <?= Html::a("Обновить", ['admin/default/admin-log'], ['class' => 'btn btn-lg btn-success']) ?>
    <?= Html::a("Удалить", ['admin/default/admin-log'], ['class' => 'btn btn-lg btn-primary']) ?>
<div><?= $admin_panel_log ?></div>
<?php Pjax::end(); ?>


