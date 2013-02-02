<?php
/* @var $this ProformaInvoiceController */
/* @var $data ProformaInvoice */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('proforma_invoice_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->proforma_invoice_id), array('view', 'id'=>$data->proforma_invoice_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proforma_no')); ?>:</b>
	<?php echo CHtml::encode($data->proforma_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('production_order_no')); ?>:</b>
	<?php echo CHtml::encode($data->production_order_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proforma_date')); ?>:</b>
	<?php echo CHtml::encode($data->proforma_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_code')); ?>:</b>
	<?php echo CHtml::encode($data->customer_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency_value')); ?>:</b>
	<?php echo CHtml::encode($data->currency_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shipment_date')); ?>:</b>
	<?php echo CHtml::encode($data->shipment_date); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('FC_value')); ?>:</b>
	<?php echo CHtml::encode($data->FC_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('exchange_rate')); ?>:</b>
	<?php echo CHtml::encode($data->exchange_rate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('INR_value')); ?>:</b>
	<?php echo CHtml::encode($data->INR_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FPC_booking_period')); ?>:</b>
	<?php echo CHtml::encode($data->FPC_booking_period); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eta')); ?>:</b>
	<?php echo CHtml::encode($data->eta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destination_port')); ?>:</b>
	<?php echo CHtml::encode($data->destination_port); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_terms')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_terms); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_terms')); ?>:</b>
	<?php echo CHtml::encode($data->payment_terms); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_cbm')); ?>:</b>
	<?php echo CHtml::encode($data->total_cbm); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_type_containers')); ?>:</b>
	<?php echo CHtml::encode($data->no_type_containers); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agent')); ?>:</b>
	<?php echo CHtml::encode($data->agent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agent_commision')); ?>:</b>
	<?php echo CHtml::encode($data->agent_commision); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency_code')); ?>:</b>
	<?php echo CHtml::encode($data->currency_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('booked_exchange_rate')); ?>:</b>
	<?php echo CHtml::encode($data->booked_exchange_rate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fpc_booking_on')); ?>:</b>
	<?php echo CHtml::encode($data->fpc_booking_on); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fpc_booking_off')); ?>:</b>
	<?php echo CHtml::encode($data->fpc_booking_off); ?>
	<br />

	*/ ?>

</div>