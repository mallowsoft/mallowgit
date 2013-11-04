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
                           'afterValidateAttribute' => 'js:function(form, attribute, data, hasError)
                           {
                           if(hasError)
                           {
                           $("#"+attribute.id).css({marginTop:"20px",marginBottom:"20px", backgroundColor:"pink", border:"1px solid red"});
                           }
                           else $("#"+attribute.id).css({marginTop:"",marginBottom:"", backgroundColor:"", border:""}); 
                           }'
                           ),
    ));
?>

	<div id="loginrow">

    <div id="formtext">
            <?php echo $form->labelEx($model,'username'); ?>
    </div>

    <div id="field">
            <?php echo $form->textField($model,'username'); ?>
    </div>
            <?php echo $form->error($model,'username',array('class'=>'error_login')); ?>
	</div>

	<div id="loginrow">

    <div id="formtext">
            <?php echo $form->labelEx($model,'password'); ?>
    </div>
    <div id="field">
            <?php echo $form->passwordField($model,'password'); ?>
    </div>
            <?php echo $form->error($model,'password',array('class'=>'error_login')); ?>
	</div>

    <div class="login_button"><?php echo CHtml::submitButton('Login'); ?></div>

<?php $this->endWidget(); ?>
</div>
<!-- form -->