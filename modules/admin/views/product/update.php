<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = 'Оновлення Товару: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Товари', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Оновлення';
?>
<div class="product-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
