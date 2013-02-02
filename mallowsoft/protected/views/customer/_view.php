<?php
/* @var $this CustomerController */
/* @var $data Customer */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_code_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->customer_code_id), array('view', 'id'=>$data->customer_code_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_code')); ?>:</b>
	<?php echo CHtml::encode($data->customer_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_name')); ?>:</b>
	<?php echo CHtml::encode($data->customer_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoicing_address')); ?>:</b>
	<?php echo CHtml::encode($data->invoicing_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_primary')); ?>:</b>
	<?php echo CHtml::encode($data->phone_primary); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_alternative')); ?>:</b>
	<?php echo CHtml::encode($data->phone_alternative); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('destination_port')); ?>:</b>
	<?php echo CHtml::encode($data->destination_port); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_address')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_city')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_country')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_phone')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_email')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency_id')); ?>:</b>
	<?php echo CHtml::encode($data->currency_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agent_id')); ?>:</b>
	<?php echo CHtml::encode($data->agent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_terms_id')); ?>:</b>
	<?php echo CHtml::encode($data->payment_terms_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_terms_id')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_terms_id); ?>
	<br />

	*/ ?>

</div>