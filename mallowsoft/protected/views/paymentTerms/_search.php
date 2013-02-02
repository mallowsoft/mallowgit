<?php
/* @var $this PaymentTermsController */
/* @var $model PaymentTerms */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'information'); ?>
		<?php echo $form->textArea($model,'information',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment_terms'); ?>
		<?php echo $form->textArea($model,'payment_terms',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment_terms_code'); ?>
		<?php echo $form->textArea($model,'payment_terms_code',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment_terms_id'); ?>
		<?php echo $form->textField($model,'payment_terms_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->