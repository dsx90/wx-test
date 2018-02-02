<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\tehnic\models\TehnicOptionValue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tehnic-option-value-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tehnic_id')->textInput() ?>

    <?= $form->field($model, 'option_id')->textInput() ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
