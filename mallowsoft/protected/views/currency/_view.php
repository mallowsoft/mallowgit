<?php
/* @var $this CurrencyController */
/* @var $data Currency */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->currency_id), array('view', 'id'=>$data->currency_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency_name')); ?>:</b>
	<?php echo CHtml::encode($data->currency_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency_symbol')); ?>:</b>
	<?php echo CHtml::encode($data->currency_symbol); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency_code')); ?>:</b>
	<?php echo CHtml::encode($data->currency_code); ?>
	<br />


</div>