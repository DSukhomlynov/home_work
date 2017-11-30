<?php
use mihaildev\elfinder\ElFinder;
use yii\web\JsExpression;
?>
<div class="admin-default-index">
    <h1><?= $this->context->action->uniqueId ?></h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>
    <p>
        You may customize this page by editing the following file:<br>
        <code><?= __FILE__ ?></code>
    </p>
    <div style="height: 500px;display: grid;">
        <?= ElFinder::widget([
            'language'         => 'ru',
            'controller'       => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
            //'filter'           => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
            'callbackFunction' => new JsExpression('function(file, id){}'), // id - id виджета
            //'style' => 'height:700px;',
        ]); ?>
    </div>

</div>
