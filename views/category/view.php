<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use app\models\ProductParamsValue;

?>
<h1>
    <?php echo $model->header ?>
</h1>
<div>
    <?php Pjax::begin() ?>
    <?php $form = ActiveForm::begin([
        'action' => ['/category/view', 'id' => $model->id],
        'method' => 'get',
    ]) ?>
    <?php echo $form->field($modelFilter, 'price_min')->textInput(['value' => $minPrice])->label('Price min') ?>
    <?php echo $form->field($modelFilter, 'price_max')->textInput(['value' => $maxPrice])->label('Price max') ?>
    <hr>
    <?php if (is_array($params)): ?>
        <?php foreach ($params as $param): ?>
            <p><b><?php echo $param->name ?></b></p>
            <?php
            $paramsValue = ProductParamsValue::findByParams($param->id);
            if (is_array($paramsValue)):
            foreach ($paramsValue as $value): ?>
                <label><?php echo $value->value;?><br>
                    <input type="checkbox" name="ProductFilter[params_value][<?php echo $param->id?>][]" value="<?php echo $value->value;?>">
                </label>
           <?php endforeach;
            endif;
            ?>
        <?php endforeach; ?>
    <?php endif; ?>
    <hr>
    <?php echo ListView::widget([
        'itemView' => '/product/_item',
        'dataProvider' => $dataProvider
    ]) ?>

    <div>
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end() ?>
    <?php Pjax::end() ?>
</div>