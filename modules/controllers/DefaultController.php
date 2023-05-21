<?php

namespace app\modules\controllers;

use app\modules\models\Orders;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * Default controller for the `order` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Orders::find(),
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'create_at' => SORT_DESC,
                    ],
                ],
        ]);
        return $this->render('index',['dataProvider' => $dataProvider]);
    }
}
