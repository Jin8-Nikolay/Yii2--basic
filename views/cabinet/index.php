<?php

use yii\helpers\Url;

$this->title = 'Cabinet';
$this->params['breadcrumbs'][]=['label'=>$this->title];
?>

<div>
    <?php if (is_array($orders)): ?>
<table class="table table-bordered">
    <tr>
        <td>Id</td>
        <td>Total</td>
        <td></td>
    </tr>

<?php foreach ($orders as $order): ?>

<tr>
    <td><?php echo $order->order->id?></td>
    <td><?php echo $order->order->total?></td>
    <td><a href="<?php echo Url::to(['cabinet/items','id'=>$order->order->id]) ?>">More</a></td>
</tr>

<?php endforeach; ?>
    </table>
    <?php endif; ?>
</div>