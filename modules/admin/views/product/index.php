<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;


$this->title = 'Товари';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">



    <?= Html::a(Yii::t('admin','Створити товар'),['create'],['class'=>'btn btn-primary']) ?>

    <?php Pjax::begin(); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-dark',
        ],
        'formatter' => ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ''],
        'layout' => "{items}\n{summary}",
        'summary' => Yii::t('admin', 'Відображення {begin} - з {totalCount} елементів'),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'category_id',
            'meta_title',
            'meta_description:ntext',
            'header',
            //'content:ntext',
            //'short_content:ntext',
            //'price',
            //'created_at',
            //'updated_at',
            //'status',
            //'image:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
