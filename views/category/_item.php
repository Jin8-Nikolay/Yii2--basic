<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<div>
    <h2><?php echo $model->header; ?></h2>
    <p><?php echo $model->short_content?></p>
    <p><?php echo $model->price?></p>
    <?php echo Html::a('More',Url::to(['view','id'=>$model->id]))?>
</div>