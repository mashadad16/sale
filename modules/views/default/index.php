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
    'filterModel' => $searchModel,
    'columns' => [
            ['class' => 'yii\grid\ActionColumn',
                'header'=>' ',
                'template' => '{update} {delete}',
                'buttons' =>
                 [
                    'update' => function($url)
                        {
                            return Html::a('<i class="fa fa-pencil" style="color: #ffc107"></i>', $url);
                        },
                    'delete' => function($url)
                        {
                            return Html::a('<i class="fa fa-trash" style="color: #ff4534"></i>', $url);
                        },


            ],
    ],
        'id',
        [
            'attribute' => 'create_at',
            'filter' => false
        ],
        'name',
        [
            'attribute' => 'status_id',
            'value' => function ($dataProvider){
                if ($dataProvider->status_id == 1){return 'Выполнен';}
                else {return 'В работе';}
            },
            'filter' => false
        ],
        ],
]) ?>

    </div>
