<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Edit';
$this->params['breadcrumbs'][]= $this->title;
?>

<div class="site-login">
    <h1><?php echo $this->title?></h1>
    <div>
        <?php $form = ActiveForm::begin(['id'=>'login-form'])?>
        <?php echo $form->field($model,'username')->textInput()?>
        <?php echo $form->field($model,'email')->textInput()?>
        <?php echo $form->field($model,'phone')->textInput()?>
        <?php echo $form->field($model,'surname')->textInput()?>
        <?php echo $form->field($model,'patronymic')->textInput()?>
        <?php echo Html::submitButton('Save',['class'=>'btn btn-primary'])?>
        <?php $form=ActiveForm::end()?>
    </div>
</div>
