<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;



$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Мови'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="language-view">



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
            'title',
            'code',
            'locale',
            'icon',
            'status',
            'pos',
        ],
    ]) ?>

</div>
