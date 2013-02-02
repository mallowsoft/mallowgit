<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>


<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>


	<div id="loginrow">
    <div id="formtext">
            <?php echo $form->labelEx($model,'username'); ?>
    </div>
    <div id="field">
            <?php echo $form->textField($model,'username'); ?>
    </div>

    <?php echo $form->error($model,'username'); ?>
	</div>

	<div id="loginrow">

    <div id="formtext">
                    <?php echo $form->labelEx($model,'password'); ?>
    </div>
    <div id="field">
                    <?php echo $form->passwordField($model,'password'); ?>
    </div>

                    <?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row rememberMe">

		<?php // echo $form->checkBox($model,'rememberMe'); ?>

		<?php //echo $form->label($model,'rememberMe'); ?>
		<?php //echo $form->error($model,'rememberMe'); ?>
	</div>

		 <div class="login_button"><?php echo CHtml::submitButton('Login'); ?></div>

<?php $this->endWidget(); ?>
</div><!-- form -->
