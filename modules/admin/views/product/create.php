<?php

use yii\helpers\Html;


$this->title = 'Створення Товару';
$this->params['breadcrumbs'][] = ['label' => 'Товари', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
