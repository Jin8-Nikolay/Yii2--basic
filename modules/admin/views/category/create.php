<?php

use yii\helpers\Html;



$this->title = 'Створення Категорії';
$this->params['breadcrumbs'][] = ['label' => 'Категорії', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
