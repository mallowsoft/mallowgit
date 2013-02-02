<?php
/* @var $this SalesInvoiceController */
/* @var $model SalesInvoice */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'production_order_no'); ?>
		<?php echo $form->textArea($model,'production_order_no',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'invoice_date'); ?>
		<?php echo $form->textField($model,'invoice_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'customer'); ?>
		<?php echo $form->textArea($model,'customer',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'weight'); ?>
		<?php echo $form->textField($model,'weight',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unit'); ?>
		<?php echo $form->textArea($model,'unit',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fc_value'); ?>
		<?php echo $form->textField($model,'fc_value',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'currency'); ?>
		<?php echo $form->textArea($model,'currency',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Ex_rate'); ?>
		<?php echo $form->textField($model,'Ex_rate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'inr_value'); ?>
		<?php echo $form->textField($model,'inr_value',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'invoice_no'); ?>
		<?php echo $form->textField($model,'invoice_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment_due_date'); ?>
		<?php echo $form->textField($model,'payment_due_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bank_ref_no'); ?>
		<?php echo $form->textField($model,'bank_ref_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'payment_date'); ?>
		<?php echo $form->textField($model,'payment_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ecgc_payment_terms'); ?>
		<?php echo $form->textArea($model,'ecgc_payment_terms',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shipment_board_date'); ?>
		<?php echo $form->textField($model,'shipment_board_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loading_port'); ?>
		<?php echo $form->textArea($model,'loading_port',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'destination_port'); ?>
		<?php echo $form->textArea($model,'destination_port',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shipping_bill_no'); ?>
		<?php echo $form->textField($model,'shipping_bill_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'additional_bill_no'); ?>
		<?php echo $form->textField($model,'additional_bill_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'house_agent'); ?>
		<?php echo $form->textArea($model,'house_agent',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'feeder_vessel'); ?>
		<?php echo $form->textArea($model,'feeder_vessel',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'clearance_customs_house'); ?>
		<?php echo $form->textArea($model,'clearance_customs_house',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'expected_eta_date'); ?>
		<?php echo $form->textField($model,'expected_eta_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'forwarder_name'); ?>
		<?php echo $form->textArea($model,'forwarder_name',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'mother_vessel'); ?>
		<?php echo $form->textArea($model,'mother_vessel',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'additional_date'); ?>
		<?php echo $form->textField($model,'additional_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'premium_rate'); ?>
		<?php echo $form->textField($model,'premium_rate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shipment_no'); ?>
		<?php echo $form->textField($model,'shipment_no'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->