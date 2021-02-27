<?php

use app\models\Product;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\ProductParams;
use app\models\Language;
$languages = Language::findActive();

?>

<div class="product-params-value-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')
        ->dropDownList(ArrayHelper::map(ProductParams::findActive(),'id','name')) ?>

    <?= $form->field($model, 'params_id')->
   dropDownList(ArrayHelper::map(Product::findActive(),'id','header')) ?>

    <?php $count = 0; ?>
    <div class="tabs">
        <ul class="tabs__caption">
            <?php foreach ($languages as $language): ?>
                <li class="<?php if ($count === 0) echo "active"; ?>"><?php echo $language->title ?></li>
                <?php $count++; ?>
            <?php endforeach; ?>
        </ul>
        <?php $count = 0; ?>

        <?php foreach ($languages as $language): ?>
            <div class="tabs__content <?php if ($count === 0) echo "active"; ?>">
                <?php echo $form->field($model->translate($language->code), "[$language->code]value")->textInput(); ?>
            </div>
            <?php $count++; ?>
        <?php endforeach; ?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('admin', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
