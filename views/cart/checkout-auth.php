<?php

use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = Yii::t('app','Оформлення замовлення');
?>
<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="checkout_details_area mt-50 clearfix">

                    <div class="cart-title">
                        <h2><?php echo $this->title?></h2>
                    </div>

                    <?php $form =  ActiveForm::begin(); ?>
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label(false) ?>
                            </div>
                            <div class="col-md-6 mb-3">
                                <?= $form->field($model, 'surname')->textInput(['maxlength' => true, 'value' => $user->surname, 'placeholder' => $model->attributeLabels()['surname']])->label(false) ?>
                            </div>
                            <div class="col-12 mb-3">
                                <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true, 'value' => $user->patronymic, 'placeholder' => $model->attributeLabels()['patronymic']])->label(false) ?>
                            </div>
                            <div class="col-12 mb-3">
                                <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'value' => $user->email, 'placeholder' => $model->attributeLabels()['email']])->label(false) ?>
                            </div>

                            <div class="col-12 mb-3">
                                <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'value' => $user->phone, 'placeholder' => $model->attributeLabels()['comment']])->label(false) ?>
                            </div>

                            <div class="col-12 mb-3">
                                <?= $form->field($model, 'comment')->textarea(['maxlength' => true,'placeholder' => $model->attributeLabels()['comment']])->label(false) ?>
                            </div>

                            <div class="col-6 mb-3">
                                <?= $form->field($model, 'delivery_id')->dropDownList(ArrayHelper::map($deliveryList, 'id', 'name'),['class' => 'w-100'])->label(false) ?>
                            </div>
                            <div class="col-6 mb-3">
                                <?= $form->field($model, 'payment_id')->dropDownList(ArrayHelper::map($paymentList, 'id', 'name'),['class' => 'w-100'])->label(false) ?>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <select name="" id="np_cities">
                                        <option value="">...</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select name="" id="np_warehouses">
                                        <option value="">...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="custom-control custom-checkbox d-block mb-2">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                    <label class="custom-control-label" for="customCheck2">Create an accout</label>
                                </div>
                                <div class="custom-control custom-checkbox d-block">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                                    <label class="custom-control-label" for="customCheck3">Ship to a different address</label>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php ActiveForm::end(); ?>

                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="cart-summary">
                    <h5>Cart Total</h5>
                    <ul class="summary-table">
                        <li><span>subtotal:</span> <span>$140.00</span></li>
                        <li><span>delivery:</span> <span>Free</span></li>
                        <li><span>total:</span> <span>$140.00</span></li>
                    </ul>

                    <div class="payment-method">
                        <!-- Cash on delivery -->
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="cod" checked>
                            <label class="custom-control-label" for="cod">Cash on Delivery</label>
                        </div>
                        <!-- Paypal -->
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input type="checkbox" class="custom-control-input" id="paypal">
                            <label class="custom-control-label" for="paypal">Paypal <img class="ml-15" src="../img/core-img/paypal.png" alt=""></label>
                        </div>
                    </div>

                    <div class="cart-btn mt-100">
                        <a href="#" class="btn amado-btn w-100">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?= $form->field($model, 'patronymic')->textInput(['maxlength' => true,'value'=>$user->patronymic]) ?>
<?= $form->field($model, 'email')->textInput(['maxlength' => true,'value'=>$user->email]) ?>
<?= $form->field($model, 'phone')->textInput(['maxlength' => true,'value'=>$user->phone]) ?>
<?= $form->field($model, 'comment')->textarea(['maxlength'=>true]) ?>
<?= $form->field($model, 'delivery_id')->radioList(ArrayHelper::map($deliveryList,'id','name')) ?>
<?= $form->field($model, 'payment_id')->radioList(ArrayHelper::map($paymentList,'id','name')) ?>
<?php echo Html::submitButton('Checkout',['class'=>'btn btn-default']) ?>
