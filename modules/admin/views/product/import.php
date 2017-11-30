<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 06.11.2017
 * Time: 15:42
 */

use yii\helpers\Html;
use mihaildev\elfinder\InputFile;
$this->title = 'Import';
?>

<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= InputFile::widget([
        'language'   => 'ru',
        'controller' => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
        'filter'     => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',    // https://github.com/yiisoft/yii2/blob/master/framework/helpers/mimeTypes.php фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
        'name'       => 'myinput',
        'value'      => '',
    ]);
    ?>
</div>
