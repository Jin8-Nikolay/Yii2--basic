<?php

use yii\helpers\Html;



$this->title = Yii::t('admin', 'Оновлення мови: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Мови'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('admin', 'Оновлення');
?>
<div class="language-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
