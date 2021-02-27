<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\models\Language;
use app\helpers\StatusHelper;
use iutbay\yii2\mm\widgets\MediaManagerInput;

$languages = Language::findActive();

?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>



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
            <div class="tabs__content <?php if($count ===0) echo "active";?> ">
                <?php echo $form->field($model->translate($language->code), "[$language->code]header")->textInput(); ?>
                <?php echo $form->field($model->translate($language->code), "[$language->code]content")->textInput(); ?>
                <?php echo $form->field($model->translate($language->code), "[$language->code]short_content")->textInput(); ?>
            </div>

            <?php $count++; ?>
        <?php endforeach; ?>
    </div>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'index')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'image')->widget(MediaManagerInput::className(), [
        'multiple' => true,

        'clientOptions' => [
            'api' => [
                'listUrl' => Url::to(['/mm/api/list']),
                'uploadUrl' => Url::to(['/mm/api/upload']),
                'downloadUrl' => Url::to(['/mm/api/download']),
            ],
        ],
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('admin','Save'),['class'=>'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
