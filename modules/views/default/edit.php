<?php
use yii\bootstrap5\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Html;
?>

<div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'order-form']); ?>
                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                    <?= $form->field($model, 'status_id')->dropDownList([
                        '1' => 'Выполнен',
                        '2'=>'В работе'
                    ]); ?>
                    <?= $form->field($model, 'create_at')->input('date'); ?>
                    <div class="form-group">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-warning', 'name' => 'contact-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
</div>