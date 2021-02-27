<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductParamsValue */

$this->title = Yii::t('admin', 'Update Product Params Value: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Product Params Values'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('admin', 'Update');
?>
<div class="product-params-value-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
