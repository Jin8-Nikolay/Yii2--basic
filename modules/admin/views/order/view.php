<?php

use app\models\Delivery;
use app\models\Payment;

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
        'attributes' => [
            'id',
            'user_id',
            'name',
            'surname',
            'patronymic',
            'phone',
            'email:email',
            'total',
            'count',
            'status',
            'comment:ntext',
            [
                    'attribute'=>'delivery_id',
                'value'=>function($model){
                    $delivery = Delivery::findOne($model->delivery_id);
                    return $delivery->name;
                }
            ],
            [
                'attribute'=>'payment_id',
                'value'=>function($model){
                    $payment = Payment::findOne($model->payment_id);
                    return $payment->name;
                }
            ],
            'ip',
            'system_info:ntext',
            'hash',
        ],
    ]) ?>

    <table class="table table-striped table-bordered detail-view">
        <tr>
            <td>Name</td>
            <td>Price</td>
            <td>Count</td>
            <td>Total</td>
            <td></td>
        </tr>
        <?php foreach ($products as $product): ?>
        <tr>
            <td><?php echo $product->name?></td>
            <td><?php echo $product->price?></td>
            <td><?php echo $product->count?></td>
            <td><?php echo $product->total?></td>
            <td></td>
        </tr>
        <?php endforeach; ?>
    </table>

</div>
