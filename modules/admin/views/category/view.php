<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;



$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Категорії', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="category-view">


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'options'=>[
                'class'=>'table'
        ],
        'attributes' => [
            'id',
            'header',
            'content:ntext',
            'short_content:ntext',
            'created_at',
            'updated_at',
            'status',
            'image',
        ],
    ]) ?>

</div>
