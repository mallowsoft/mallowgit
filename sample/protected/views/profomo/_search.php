<?php
/* @var $this ProfomoController */
/* @var $model Profomo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'order_no'); ?>
		<?php echo $form->textField($model,'order_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profomo_date'); ?>
		<?php echo $form->textField($model,'profomo_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customer'); ?>
		<?php echo $form->textArea($model,'customer',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'profomo_no'); ?>
		<?php echo $form->textArea($model,'profomo_no',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serial'); ?>
		<?php echo $form->textField($model,'serial'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fpc_booked'); ?>
		<?php echo $form->checkBox($model,'fpc_booked'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->