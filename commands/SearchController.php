<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 07.11.2017
 * Time: 16:00
 */

namespace app\commands;
use Yii;
use yii\console\Controller;

class SearchController extends Controller
{
    public function actionIndexing()
    {
        /** @var \himiklab\yii2\search\Search $search */
        $search = Yii::$app->search;
        $search->index();
    }
}