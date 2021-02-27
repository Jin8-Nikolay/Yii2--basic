<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;


$this->title = Yii::t('admin', 'Мови');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="language-index">




        <?= Html::a(Yii::t('admin', 'Створити Мову'), ['create'], ['class' => 'btn btn-primary']) ?>


    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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
            'title',
            'code',
            'locale',
            'icon',
            //'status',
            //'pos',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
