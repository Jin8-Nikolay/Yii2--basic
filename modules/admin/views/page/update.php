<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Page */

$this->title = Yii::t('admin', 'Update Page: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('admin', 'Update');
?>
<div class="page-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
