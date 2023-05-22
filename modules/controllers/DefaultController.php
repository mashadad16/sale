<?php

namespace app\modules\controllers;

use Yii;
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
        /*$dataProvider = new ActiveDataProvider([
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
        $searchModel = new Orders();*/

        $searchModel = new Orders();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index',['dataProvider' => $dataProvider, 'searchModel' => $searchModel]);
    }

   /* public function search($params)
    {
        $query = Orders::find()->Join('status_id', 'status_id = statuses.id');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'status_id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
*/
    //правка записи
    public function actionUpdate($id)
    {
        $model = Orders::findOne($id);
        if ($model->load(Yii::$app->request->post()))
        {
            $model->save();
            return $this->redirect(['index']);
        }
        return $this->render('edit', ['model' => $model]);
    }

    //Добавить заказ
    public function actionAdd()
    {
        $model = new Orders();
        if ($model->load(Yii::$app->request->post()))
        {
            $model->save();
            return $this->redirect(['index']);
        }
        return $this->render('edit', ['model' => $model]);
    }

    //Удалить заказ
    public function actionDelete($id)
    {
        $model = Orders::findOne($id);
        if ($model)
        {
            $model->delete();
        }
        return $this->redirect(['index']);
    }

}
