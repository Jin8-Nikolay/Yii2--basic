<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;


$this->title = Yii::t('admin', 'Сторінки');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">


    <?= Html::a(Yii::t('admin', 'Створити сторінку'), ['create'], ['class' => 'btn btn-primary']) ?>


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
            [
                    'attribute'=>'header',
                    'value' => function ($model){
                        return  $model->header;
                    }
            ],
            'status',
            'index',
            'alias',
            'category_id',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
