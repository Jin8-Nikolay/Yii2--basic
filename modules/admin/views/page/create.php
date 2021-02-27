<?php

use yii\helpers\Html;



$this->title = Yii::t('admin', 'Створення Сторінки');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Сторінки'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


