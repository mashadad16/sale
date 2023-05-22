<?php
use yii\bootstrap5\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Html;
use app\modules\models\Statuses;
?>

<div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'order-form']); ?>
                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'status_id')->dropDownList(
                    \yii\helpers\ArrayHelper::map(\app\modules\models\Statuses::find()->all(), 'id', 'name')
                ) ?>
                <?= $form->field($model, 'create_at')->input('date'); ?>
                    <div class="form-group">
                        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-warning', 'name' => 'contact-button']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
</div>