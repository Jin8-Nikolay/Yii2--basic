<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">
    <h1><?php echo $this->title?></h1>

    <?php $form = ActiveForm::begin(['id'=>'site-login']) ?>

    <?php echo  $form->field($model,'username')->textInput()?>
    <?php echo  $form->field($model,'password')->passwordInput()?>
    <?php echo  $form->field($model,'rememberMe')->checkbox()?>


    <div class="form-group">
        <?php echo Html::submitButton('Login',['class'=>'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end() ?>

</div>