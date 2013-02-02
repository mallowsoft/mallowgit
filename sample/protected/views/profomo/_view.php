<?php
/* @var $this ProfomoController */
/* @var $data Profomo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_no')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->order_no), array('view', 'id'=>$data->order_no)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profomo_date')); ?>:</b>
	<?php echo CHtml::encode($data->profomo_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer')); ?>:</b>
	<?php echo CHtml::encode($data->customer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profomo_no')); ?>:</b>
	<?php echo CHtml::encode($data->profomo_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serial')); ?>:</b>
	<?php echo CHtml::encode($data->serial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fpc_booked')); ?>:</b>
	<?php echo CHtml::encode($data->fpc_booked); ?>
	<br />


</div>