<?php
/**
 * Created by PhpStorm.
 * User: moohii07
 * Date: 01.11.2017
 * Time: 15:25
 */

namespace app\controllers;

use yii\web\Controller;

class AppController extends Controller
{
    protected function setMeta($title = null, $keywords = null, $description = null){
        $this->view->title = $title;
        $this->view->keywords = $keywords;
        $this->view->description = $description;
    }

    public static function debug($element) {
        echo '<pre>' . print_r($element, true) . '</pre>';
    }
}