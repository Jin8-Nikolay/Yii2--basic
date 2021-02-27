<?php

use app\models\Language;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Delivery */
/* @var $form yii\widgets\ActiveForm */

$languages = Language::findActive();
?>



<div class="payment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'pos')->textInput() ?>

    <div class="tabs">
        <?php $count = 0; ?>
        <ul class="tabs__caption">
            <?php foreach ($languages as $language): ?>
                <li class="<?php if ($count === 0) echo "active"; ?>"><?php echo $language->title ?></li>
                <?php $count++; ?>
            <?php endforeach; ?>
        </ul>
        <?php $count = 0; ?>

        <?php foreach ($languages as $language): ?>
            <div class="tabs__content <?php if ($count === 0) echo "active"; ?>">
                <?php echo $form->field($model->translate($language->code), "[$language->code]name")->textInput(); ?>
                <?php echo $form->field($model->translate($language->code), "[$language->code]description")->textInput(); ?>
                <?php echo $form->field($model->translate($language->code), "[$language->code]price")->textInput(); ?>
            </div>
            <?php $count++; ?>
        <?php endforeach; ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('admin', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
