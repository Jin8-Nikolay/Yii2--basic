<?php

use yii\helpers\Html;
use yii\widgets\DetailView;



$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Pages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="page-view">


    <p>
        <?= Html::a(Yii::t('admin', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('admin', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('admin', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'options' => [
            'class'=>'table table-dark',
        ],
        'attributes' => [
            'id',
            'status',
            'index',
            'alias',
            'category_id',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
