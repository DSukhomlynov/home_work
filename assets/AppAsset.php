<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "https://fonts.googleapis.com/css?family=Roboto:400,400i,500,700,900",
        "https://fonts.googleapis.com/css?family=Merriweather:400,700,900&amp;subset=cyrillic-ext",
        'css/main.css',
    ];
    public $js = [
        'js/libs/jquery.min.js',
        'js/libs/swiper.min.js',
        'js/libs/svg-data-uri.min.js',
        'js/libs/jquery.colorbox-min.js',
        'js/libs/jquery.matchHeight-min.js',
        'js/libs/img-to-svg.js',
        'js/libs/popper.min.js',
        'js/libs/select2.min.js',
        'js/libs/jquery.mCustomScrollbar.concat.min.js',

        'js/libs/jquery.knob.js',
        'js/libs/jquery.ui.widget.js',
        'js/libs/jquery.iframe-transport.js',
        'js/libs/jquery.fileupload.js',
        'js/main.js',
        'js/product-photos-slider-controller.js',
        'js/index.js',

        'js/about.js',
        'js/libs/freewall.js',

        'https://maps.googleapis.com/maps/api/js?key=AIzaSyD-_7rbiILzu1_9WsTomzKQZO0FMmtNePU',
        'js/contacts.js',

        'js/competition.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];


//    public function init()
//    {
//        parent::init();
//        // resetting BootstrapAsset to not load own css files
//        \Yii::$app->assetManager->bundles['yii\\bootstrap\\BootstrapAsset'] = [
//            'css' => [],
//            'js' => []
//        ];
//    }
}