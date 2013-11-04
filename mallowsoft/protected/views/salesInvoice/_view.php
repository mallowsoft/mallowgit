<?php
/* @var $this SalesInvoiceController */
/* @var $data SalesInvoice */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoice_no')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->invoice_no), array('view', 'id'=>$data->invoice_no)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('production_order_no')); ?>:</b>
	<?php echo CHtml::encode($data->production_order_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoice_date')); ?>:</b>
	<?php echo CHtml::encode($data->invoice_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer')); ?>:</b>
	<?php echo CHtml::encode($data->customer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantity')); ?>:</b>
	<?php echo CHtml::encode($data->quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
	<?php echo CHtml::encode($data->weight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unit')); ?>:</b>
	<?php echo CHtml::encode($data->unit); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fc_value')); ?>:</b>
	<?php echo CHtml::encode($data->fc_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency')); ?>:</b>
	<?php echo CHtml::encode($data->currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Ex_rate')); ?>:</b>
	<?php echo CHtml::encode($data->Ex_rate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inr_value')); ?>:</b>
	<?php echo CHtml::encode($data->inr_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_due_date')); ?>:</b>
	<?php echo CHtml::encode($data->payment_due_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_ref_no')); ?>:</b>
	<?php echo CHtml::encode($data->bank_ref_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_date')); ?>:</b>
	<?php echo CHtml::encode($data->payment_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ecgc_payment_terms')); ?>:</b>
	<?php echo CHtml::encode($data->ecgc_payment_terms); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shipment_board_date')); ?>:</b>
	<?php echo CHtml::encode($data->shipment_board_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loading_port')); ?>:</b>
	<?php echo CHtml::encode($data->loading_port); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destination_port')); ?>:</b>
	<?php echo CHtml::encode($data->destination_port); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shipping_bill_no')); ?>:</b>
	<?php echo CHtml::encode($data->shipping_bill_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('additional_bill_no')); ?>:</b>
	<?php echo CHtml::encode($data->additional_bill_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('house_agent')); ?>:</b>
	<?php echo CHtml::encode($data->house_agent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('feeder_vessel')); ?>:</b>
	<?php echo CHtml::encode($data->feeder_vessel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clearance_customs_house')); ?>:</b>
	<?php echo CHtml::encode($data->clearance_customs_house); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('expected_eta_date')); ?>:</b>
	<?php echo CHtml::encode($data->expected_eta_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('forwarder_name')); ?>:</b>
	<?php echo CHtml::encode($data->forwarder_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mother_vessel')); ?>:</b>
	<?php echo CHtml::encode($data->mother_vessel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('additional_date')); ?>:</b>
	<?php echo CHtml::encode($data->additional_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('premium_rate')); ?>:</b>
	<?php echo CHtml::encode($data->premium_rate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shipment_no')); ?>:</b>
	<?php echo CHtml::encode($data->shipment_no); ?>
	<br />

	*/ ?>

</div>