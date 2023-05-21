<?php

namespace app\modules\controllers;

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
        

        $hello = 'hjhjh';
        return $this->render('index',['hello' => $hello]);
    }
}
