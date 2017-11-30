<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 16.11.2017
 * Time: 16:09
 */

namespace app\assets;

use yii\web\AssetBundle;

class IndexAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/index.css',
    ];
    public $js = [
        'js/libs/jquery.knob.js',
        'js/libs/jquery.ui.widget.js',
        'js/libs/jquery.iframe-transport.js',
        'js/libs/jquery.fileupload.js',
        'js/main.js',
        'js/product-photos-slider-controller.js',
        'js/index.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}