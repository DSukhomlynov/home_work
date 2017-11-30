<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 07.11.2017
 * Time: 16:03
 */

namespace app\controllers;
use Yii;
use yii\data\ArrayDataProvider;


class SearchController extends AppController
{
    public function actionSearch($q = '')
    {
        /** @var \himiklab\yii2\search\Search $search */
        $search = Yii::$app->search;
        $searchData = $search->find($q); // Search by full index.
        //$searchData = $search->find($q, ['model' => 'page']); // Search by index provided only by model `page`.

        $dataProvider = new ArrayDataProvider([
            'allModels' => $searchData['results'],
            'pagination' => ['pageSize' => 10],
        ]);

        return $this->render(
            'found',
            [
                'hits' => $dataProvider->getModels(),
                'pagination' => $dataProvider->getPagination(),
                'query' => $searchData['query']
            ]
        );
    }
}