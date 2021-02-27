<?php

use yii\helpers\Url;

$this->title = 'Order Items';
$this->params['breadcrumbs'][]=['label'=>'Cabinet','url'=>Url::to(['/cabinet'])];
$this->params['breadcrumbs'][]=['label'=>$this->title];
?>

<div>
    <?php if (is_array($items)): ?>
        <table class="table table-bordered">
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Price</td>
                <td>Total</td>
                <td>Count</td>
            </tr>

            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?php echo $item->id?></td>
                    <td><?php echo $item->name?></td>
                    <td><?php echo $item->price?></td>
                    <td><?php echo $item->total?></td>
                    <td><?php echo $item->count?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
