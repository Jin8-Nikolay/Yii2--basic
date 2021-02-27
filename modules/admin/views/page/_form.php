<?php

use app\helpers\StatusHelper;
use app\models\Language;
use iutbay\yii2\mm\widgets\MediaManagerInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$languages = Language::findActive();

?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading"><?php echo Yii::t('admin','Елементи форми')?></div>
            <div class="panel-body">
                <div class="col-mb-12">
<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'status')->dropDownList(StatusHelper::statusList()) ?>

    <?= $form->field($model, 'index')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>
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
                <?php echo $form->field($model->translate($language->code), "[$language->code]header")->textInput(); ?>
                <?php echo $form->field($model->translate($language->code), "[$language->code]header2")->textInput(); ?>
                <?php echo $form->field($model->translate($language->code), "[$language->code]meta_title")->textInput(); ?>
                <?php echo $form->field($model->translate($language->code), "[$language->code]meta_description")->textInput(); ?>
                <?php echo $form->field($model->translate($language->code), "[$language->code]content")->textInput(); ?>
                <?php echo $form->field($model->translate($language->code), "[$language->code]short_content")->textInput(); ?>
                <?php echo $form->field($model->translate($language->code), "[$language->code]images")->widget(MediaManagerInput::className(), [
                    'multiple' => true,

                    'clientOptions' => [
                        'api' => [
                            'listUrl' => Url::to(['/mm/api/list']),
                            'uploadUrl' => Url::to(['/mm/api/upload']),
                            'downloadUrl' => Url::to(['/mm/api/download']),
                        ],
                    ],
                ]);
                ?>
            </div>
            <?php $count++; ?>
        <?php endforeach; ?>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('admin', 'Зберегти'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
                </div>
            </div>
        </div>
    </div>