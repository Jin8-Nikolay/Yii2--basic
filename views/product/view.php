<?php
use yii\helpers\Url;
use yii\helpers\Html;
$this->params['breadcrumbs'][]=['label'=>$this->title];
?>
<h1><?php echo $model->header;?></h1>
<div><?php echo $model->content;?></div>
<div><p>price <b><?php echo $model->price;?></b></p></div>
<?php echo Html::beginForm(Url::to(['/cart/add','id'=>$model->id]),'post')?>
<?php echo Html::submitButton('Add to cart')?>
<?php echo Html::endForm()?>
