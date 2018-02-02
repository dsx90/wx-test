<?php
use kartik\form\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>
        <div class="col-md-9">

            <?= $form->field($composit, 'content')->textarea(['rows' => 6]) ?>

            <?= $form->field($composit, 'attachment')->widget(
                \trntv\filekit\widget\Upload::className(),
                [
                    'url' => ['/site/upload'],
                    'sortable' => true,
                    'maxFileSize' => 10000000, // 10 MiB
                    'maxNumberOfFiles' => 10,
                ]);
            ?>
        </div>
        <div class="col-md-3">

            <?= $form->field($composit, 'price')->textInput() ?>

        </div>
<?php ActiveForm::end(); ?>

