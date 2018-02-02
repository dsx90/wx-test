<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\Launch */
/* @var $composit \backend\controllers\LaunchController : update  */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="launch-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $this->beginBlock('control-panel'); ?>

        <div class="pull-right">
            <?= $form->field($model, 'status')->widget(\dosamigos\switchinput\SwitchBox::className(),[
                'clientOptions' => [
                    'size' => 'normal',
                    'onColor' => 'success',
                    'offColor' => 'danger',
                ],
                'inlineLabel' => false
            ])->label(false);?>
            <?= Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> '.Yii::t('backend', 'Save'), ['class' => 'btn btn-primary']) ?>
            <?php if (!$model->isNewRecord) {
                echo Html::a('<i class="glyphicon glyphicon-eye-open"></i> '.Yii::t('backend', 'View'), ['view', 'id' => $model->id], [
                        'class' => 'btn btn-success',
                    ])." ";
                echo Html::a('<i class="glyphicon glyphicon-trash"></i> '.Yii::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('backend', 'Are you sure you want to delete the resources?'),
                            'method' => 'post',
                        ],
                    ])." ";
                echo Html::a('<i class="glyphicon glyphicon-level-up"></i> '.Yii::t('backend', 'Create child'), ['create', 'parent_id' => $model->parent_id], [
                        'class' => 'btn btn-default',
                    ])." ";
            }
            ?>
            <?= Html::a('<i class="fa fa-chevron-left"></i>',['update', 'id' => $model->getPrev()], ['class' => 'btn btn-default',]) ?>
            <?= Html::a('<i class="fa fa-arrow-up"></i>',['index'], ['class' => 'btn btn-default',]) ?>
            <?= Html::a('<i class="fa fa-chevron-right"></i>',['update', 'id' => $model->getNext()], ['class' => 'btn btn-default',]) ?>
        </div>

    <?php $this->endBlock();?>

    <?php $this->beginBlock('left-top-panel'); ?>

        <div class="left-top-panel border-field">

            <?= $form->field($model, 'title')->textInput(['maxlength' => true])/*->hint('Длинна пароля не меньше 70 символов.')*/ ?>

            <?= $form->field($model, 'longtitle')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 5]) ?>

            <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

        </div>

    <?php $this->endBlock();?>

    <?php $this->beginBlock('left-bottom-panel'); ?>

        <div class="adver-view">
            <i>Видимость в поисковиках</i>
            <h2><span id="title"><?= $model->title ? $model->title : 'Титул' ?></span>: <span id="longtitle"><?= $model->longtitle ? $model->longtitle : 'Краткое описание' ?></span></h2>
            <h4><?= env('FRONTEND_URL')?>›<span id="url"><?= $model->slug ? $model->slug : 'url ссылка' ?></span></h4>
            <h5><span id="description"><?= $model->description ? $model->description : 'Обьявление' ?></span></h5>
        </div>

    <?php $this->endBlock();?>

    <?php $this->beginBlock('right-panel'); ?>

        <?= $form->field($model, 'parent_id')->dropDownList(\common\models\Launch::getAll(),
            ['prompt' => 'Нет']) ?>

        <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'menutitle')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'author_id')->textInput() ?>

        <?= $form->field($model, 'published_at')->textInput() ?>

        <?= $form->field($model, 'type')->dropDownList(\common\models\Chain::getAll(),
            ['prompt' => 'Тип документа:']) ?>

    <?php $this->endBlock();?>

    <div class="forms">
        <?if (isset($model->tietype->form)) {
            echo $this->renderAjax($model->tietype->form, [
                'model' => $composit
            ]);
        }?>
    </div>

    <?php ActiveForm::end()?>

</div>

<?php
$id = $model->id;
$this->registerJs(<<<JS
$('#launch-type').on('change', function(){
    $.ajax({
        url: '/launch/update?id={$id}',
        type: 'POST',
        data : {class : $(this).val()},
        success: function(res){
            //console.log(res);
            //orderModal(res);
        }
    });
});
JS
);
?>
