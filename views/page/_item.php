<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>

<h2><?php echo $model->header;?></h2>
<div><?php echo  $model ->short_content;?></div>
<div>
    <?php echo Html::a('More',Url::to(['page/view','id'=>$model->id]))?>
</div>

