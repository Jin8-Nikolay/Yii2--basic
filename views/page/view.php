<?php
use \yii\helpers\Url;
$this->title = $model->header;
//$this->params['breadcrumbs'][]=[
//        'label'=>$model->category->header,
//        'url'=>Url::to(['/category/view','id'=>$model->category->id])
//    ];
$this->params['breadcrumbs'][] = ['label'=>$this->title];
?>

<h1><?php echo  $this->title;?></h1>
<h1><?php echo  $model->content;?></h1>
