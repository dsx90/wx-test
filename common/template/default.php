<?php
use yii\helpers\Html;
use common\modules\resources\ResourceAsset;

$this->title = $model->title;
\dsx90\launcher\assets\AssetsBundle::register($this);
?>

<div class="lb-document-module-post">
    <h1><?=Html::decode($model->name)?></h1>

    <?php
    if ($model->annotation) {
        echo "<div class='annotation'>";
        echo Html::decode($model->annotation);
        echo "</div>";
    }
    ?>

    <?php
    if ($model->image) {
        echo Html::img($model->image);
    }
    ?>

    <?=Html::decode($model->content)?>

    <p class="hint">
        <span class="glyphicon glyphicon-eye-open"></span> <?//=$views ?>
        <?= Html::button('<span class="glyphicon glyphicon-thumbs-up"></span> '. /*$likes*/, ['class' => 'btn btn-default like', 'id' => $model->id])?>
    </p>

</div>

<?=$this->registerJs('
$(".like").click(function(){
    var id = $(this).attr("id");
    $.post("/like/"+id, {
        }, function(data){
            $("#"+id).html("<span class=\'glyphicon glyphicon-thumbs-up\'></span> "+data);
        });
})
');
?>
