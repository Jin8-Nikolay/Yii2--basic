<?php

use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>

<?php $form =  ActiveForm::begin(); ?>
<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'comment')->textarea(['maxlength'=>true]) ?>
<?= $form->field($model, 'delivery_id')->radioList(ArrayHelper::map($deliveryList,'id','name')) ?>

<?= $form->field($model, 'payment_id')->radioList(ArrayHelper::map($paymentList,'id','name')) ?>
<div class="row">
    <div class="col-md-6">
        <select name="" id="np_cities" style="width: 280px">
            <option value="">...</option>
        </select>
    </div>
    <div class="col-md-6">
        <select name="" id="np_warehouses">
            <option value="">...</option>
        </select>
    </div>
</div>
<?php echo Html::submitButton('Checkout',['class'=>'btn btn-default']) ?>
<?php ActiveForm::end(); ?>
