<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Language */

$this->title = Yii::t('admin', 'Створення мови');
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Мови'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="language-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
