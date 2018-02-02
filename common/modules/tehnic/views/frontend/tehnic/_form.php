<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use bupy7\dynafields\DynaFields;
use \unclead\multipleinput\MultipleInput;


/* @var $this yii\web\View */
/* @var $model common\models\post */
/* @var $form yii\widgets\ActiveForm */
?>

<h1 class="mt-0"><?= Yii::t('frontend', 'Create post') ?>
    <input class="pull-right btn btn-grey" type="button" onclick="history.back();" value="Вернуться назад"/>
</h1>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-sm-6 pull-right row">

        <?= $form->field($launch, 'parent_id')->dropDownList(\common\models\Launch::getAll(13)) ?>

        <?= $form->field($launch, 'title')->textInput(['maxlength' => true]) ?>

        <?php if (isset($model->category)) : ?>
            <?= $form->field($models[0], 'option')->widget(MultipleInput::className(), [
                'model' => $models[0],
                'data' => $models,
                'max' => count($model->category->options),
                'enableGuessTitle'  => false,
                'allowEmptyList' => true,
                'addButtonPosition' => MultipleInput::POS_HEADER, // show add button in the header
                'columns' => [
                    [
                        'name' => 'option_id',
                        'items' => array_column($model->category->options, 'selectName', 'option_id'),
                        'type'  => 'dropDownList',
                        'title' => Yii::t('common', 'Options'),
                        'options' => [
                            'class' => 'multiple-select',
                        ]
                    ],
                    [
                        'name' => 'value',
                        'title' => Yii::t('common', 'Value'),
                    ],
                ],
            ])->label(false);
            ?>
            <h5><small>Добавьте доступные характеристики вашей техники, для удобного поиска</small></h5>
        <?php endif; ?>

        <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

        <div class="col-sm-6 p-0">
            <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6 p-0">
            <div class="pull-right" style="margin-top: 25px">
                <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>

                <?= Html::a('Удалить', ['delete', 'id' => $launch->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>

    </div>

    <div class="col-sm-6" style="
        border: 1px solid #cccccc;
        border-radius: 4px;
        min-height: 465px;
        max-height: 100%;
    ">

        <?= $form->field($model, 'attachments')->widget(
            \trntv\filekit\widget\Upload::className(),
            [
                'url' => ['/site/upload'],
                'sortable' => true,
                'maxFileSize' => 10000000, // 10 MiB
                'maxNumberOfFiles' => 10,
            ]);
        ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
