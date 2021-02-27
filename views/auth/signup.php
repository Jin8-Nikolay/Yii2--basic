<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="signup-form">
    <h1><?php echo $this->title?></h1>

    <?php $form = ActiveForm::begin(['id'=>'signup-form']) ?>

    <?php echo  $form->field($model,'username')->textInput()?>
    <?php echo  $form->field($model,'email')?>
    <?php echo  $form->field($model,'password')->textInput()?>

    <div class="form-group">
        <?php echo Html::submitButton('Signup',['class'=>'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end() ?>

</div>