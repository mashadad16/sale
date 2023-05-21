<?php
use yii\bootstrap5\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Html;

?>


    <div class="body-content">

    <div class="row">
    <div class="col-lg-4">
        <?= Html::a('Создать заказ', ['add'], ['class' => 'btn btn-warning', 'text-align' => 'center']);?>
    </div>
    </div>



<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
            ['class' => 'yii\grid\ActionColumn',
                'header'=>'Действия',
                'template' => '{update} {delete}',
                'buttons' =>
                 [
                    'update' => function($url,$model,$key)
                        {
                            return Html::a('<i class="fa fa-pencil" style="color: #ffc107"></i>', $url);
                        },
                    'delete' => function($url,$model,$key)
                        {
                            return Html::a('<i class="fa fa-trash" style="color: #ff4534"></i>', $url);
                        },


            ],
    ],
        'id',
        'create_at',
        'name',
        'status_id',
        ],
]) ?>

    </div>
