<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductParamsValue */

$this->title = Yii::t('admin', 'Create Product Params Value');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Product Params Values'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-params-value-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
