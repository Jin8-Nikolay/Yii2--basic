<?php

use app\helpers\StatusHelper;
use app\models\Language;
use iutbay\yii2\mm\widgets\MediaManagerInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Category;

$languages = Language::findActive();
$category = Category::findAll(['status'=>1]);
?>

<div class="product-params-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map($category,'id','header')) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'pos')->textInput() ?>

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
                <?php echo $form->field($model->translate($language->code), "[$language->code]name")->textInput(); ?>
            </div>
            <?php $count++; ?>
        <?php endforeach; ?>
        <div class="form-group">
            <?= Html::submitButton(Yii::t('admin', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>


