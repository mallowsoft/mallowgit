<?php
/* @var $this ProfomoController */
/* @var $model Profomo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'profomo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'profomo_no'); ?>
		<?php echo $form->textField($model,'profomo_no'); ?>
		<?php echo $form->error($model,'profomo_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order_no'); ?>
		<?php echo $form->textField($model,'order_no'); ?>
		<?php echo $form->error($model,'order_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profomo_date'); ?>
		<?php echo $form->textField($model,'profomo_date'); ?>
		<?php echo $form->error($model,'profomo_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'customer'); ?>
		<?php echo $form->textArea($model,'customer',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'customer'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->