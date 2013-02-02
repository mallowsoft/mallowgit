<?php
/* @var $this CustomerController */
/* @var $model Customer */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'customer_code'); ?>
		<?php echo $form->textArea($model,'customer_code',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customer_name'); ?>
		<?php echo $form->textArea($model,'customer_name',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'invoicing_address'); ?>
		<?php echo $form->textArea($model,'invoicing_address',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'city'); ?>
		<?php echo $form->textArea($model,'city',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'country'); ?>
		<?php echo $form->textArea($model,'country',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_primary'); ?>
		<?php echo $form->textField($model,'phone_primary'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'phone_alternative'); ?>
		<?php echo $form->textField($model,'phone_alternative'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textArea($model,'email',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'destination_port'); ?>
		<?php echo $form->textArea($model,'destination_port',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delivery_address'); ?>
		<?php echo $form->textArea($model,'delivery_address',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delivery_city'); ?>
		<?php echo $form->textArea($model,'delivery_city',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delivery_country'); ?>
		<?php echo $form->textArea($model,'delivery_country',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delivery_phone'); ?>
		<?php echo $form->textField($model,'delivery_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delivery_email'); ?>
		<?php echo $form->textArea($model,'delivery_email',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customer_code_id'); ?>
		<?php echo $form->textField($model,'customer_code_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'currency_id'); ?>
		<?php echo $form->textField($model,'currency_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'agent_id'); ?>
		<?php echo $form->textField($model,'agent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment_terms_id'); ?>
		<?php echo $form->textField($model,'payment_terms_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delivery_terms_id'); ?>
		<?php echo $form->textField($model,'delivery_terms_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->