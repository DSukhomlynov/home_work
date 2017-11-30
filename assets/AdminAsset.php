<?php
/**
 * Created by PhpStorm.
 * User: moohii07
 * Date: 31.10.2017
 * Time: 12:11
 */

namespace app\assets;


use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
    ];
    public $js = [
        'js/jquery-3.1.1.min.js',
        'js/bootstrap.min.js',
        'js/function-admin.js',
    ];
    public $jsOptions = ['position' => \yii\web\View::POS_BEGIN];

    /*public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];*/
}