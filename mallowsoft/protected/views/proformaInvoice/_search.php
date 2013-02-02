<?php
/* @var $this ProformaInvoiceController */
/* @var $model ProformaInvoice */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'proforma_no'); ?>
		<?php echo $form->textArea($model,'proforma_no',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'production_order_no'); ?>
		<?php echo $form->textArea($model,'production_order_no',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'proforma_date'); ?>
		<?php echo $form->textField($model,'proforma_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customer_code'); ?>
		<?php echo $form->textArea($model,'customer_code',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'currency_value'); ?>
		<?php echo $form->textField($model,'currency_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shipment_date'); ?>
		<?php echo $form->textField($model,'shipment_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FC_value'); ?>
		<?php echo $form->textField($model,'FC_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'exchange_rate'); ?>
		<?php echo $form->textField($model,'exchange_rate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'INR_value'); ?>
		<?php echo $form->textField($model,'INR_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FPC_booking_period'); ?>
		<?php echo $form->textArea($model,'FPC_booking_period',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eta'); ?>
		<?php echo $form->textField($model,'eta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'destination_port'); ?>
		<?php echo $form->textArea($model,'destination_port',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'delivery_terms'); ?>
		<?php echo $form->textArea($model,'delivery_terms',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment_terms'); ?>
		<?php echo $form->textArea($model,'payment_terms',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_cbm'); ?>
		<?php echo $form->textField($model,'total_cbm'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_type_containers'); ?>
		<?php echo $form->textArea($model,'no_type_containers',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'agent'); ?>
		<?php echo $form->textArea($model,'agent',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'agent_commision'); ?>
		<?php echo $form->textField($model,'agent_commision'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'proforma_invoice_id'); ?>
		<?php echo $form->textField($model,'proforma_invoice_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'currency_code'); ?>
		<?php echo $form->textArea($model,'currency_code',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'booked_exchange_rate'); ?>
		<?php echo $form->textField($model,'booked_exchange_rate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fpc_booking_on'); ?>
		<?php echo $form->checkBox($model,'fpc_booking_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fpc_booking_off'); ?>
		<?php echo $form->checkBox($model,'fpc_booking_off'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->