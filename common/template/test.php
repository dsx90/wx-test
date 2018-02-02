<?php
$this->title = $model->title;
\dsx90\launcher\AssetsBundle::register($this);
?>

<p class="hint">
    <span class="glyphicon glyphicon-eye-open"></span> <?//=$views ?>
    <?= \yii\helpers\Html::button('<span class="glyphicon glyphicon-heart"></span> '/*. $likes*/, ['class' => 'btn btn-default like', 'id' => $model->id])?>
</p>
<?=$this->registerJs('
$(".like").click(function(){
    var id = $(this).attr("id");
    $.post("like/"+id, {
        }, function(data){
            $("#"+id).html("<span class=\'glyphicon glyphicon-thumbs-up\'></span> "+data);
        });
})
');
?>