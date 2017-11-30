<?php

namespace app\components\fenom;

use Yii;
use yii\base\ViewRenderer as BaseViewRenderer;

class ViewRenderer extends BaseViewRenderer {
    /**
     * @var string the directory, where stores templates.
     */
    public $templatePath = '@app/views';
    /**
     * @var string the directory, where stores compiled templates in PHP files.
     */
    public $compilePath = '@runtime/Fenom/compile';
    /**
     * @var int|array bit-mask or array of Fenom settings.
     * @see https://github.com/bzick/fenom/blob/master/docs/en/configuration.md#template-settings
     */
    public $options = ['auto_reload' => true];
    /**
     * @var \Fenom object that renders templates.
     */
    public $fenom;


    public function init() {
        // заносим главный класс Fenom в мап фреймворка
        Yii::$classMap['Fenom'] = __DIR__.'/Fenom.php';
        // вызываем автозагрузчик классов (https://github.com/fenom-template/fenom/blob/master/docs/en/start.md#custom-loader)
        \Fenom::registerAutoload(__DIR__."./");
        // Yii::getAlias нужен так как он не распознает алиасы фреймворка
        $this->fenom = \Fenom::factory(Yii::getAlias($this->templatePath), Yii::getAlias($this->compilePath), $this->options);
    }

    public function render($view, $file, $params) {
        $params['this'] = $view;

        $dirPath = '';
        // данные костыли нужны, т.к. fenom не одупляет абсолюбтные пути, а в $file именно он
        if (strpos($file, 'views') != false)
            $dirPath = explode('views', $file)[1];
        if (strpos($file, 'widgets') != false)
            $dirPath = explode('widgets', $file)[1];
        if (strpos($file, 'modules') != false)
            $dirPath = explode('modules', $file)[1];

        return $this->fenom->fetch($dirPath, $params);
    }
}