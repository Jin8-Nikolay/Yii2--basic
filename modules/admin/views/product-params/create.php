<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductParams */

$this->title = Yii::t('admin', 'Create Product Params');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Product Params'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-params-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
