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
    'tableOptions' => ['class' => 'table'],
    'showFooter' => true,
    'layout' => "{errors}\n{pager}\n{items}\n{pager}\n{summary}",
    'summary' => '<i>Сейчас вы видите от </i> <b>{begin}</b> до <b>{end}</b> записей (всего: <b style="color: #090">{totalCount}</b>)',
    'headerRowOptions' => [
        'class' => 'headerCustomRow'
    ],
    'footerRowOptions' => [
        'style' => 'color: #888;font-style: italic;'
    ],
    'rowOptions' => function($model, $key, $index){
        return [
            'class' => ($index % 2 == 0) ? 'stripShow' : ''
        ];
    },
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
        [
            'attribute' => 'name',
            'footer' => 'Введите имя заказа'
        ],
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
<style>
    .empty-cell{
        background: #c12e2a;
    }
    .headerCustomRow, .headerCustomRow th, .headerCustomRow a{
        background: #337ab7;
        color: #fff;
    }
    .stripShow{
        background: #e9f1ff
    }
</style>
