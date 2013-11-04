<?php
/* @var $this PaymentTermsController */
/* @var $data PaymentTerms */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_terms_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->payment_terms_id), array('view', 'id'=>$data->payment_terms_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('information')); ?>:</b>
	<?php echo CHtml::encode($data->information); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_terms')); ?>:</b>
	<?php echo CHtml::encode($data->payment_terms); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_terms_code')); ?>:</b>
	<?php echo CHtml::encode($data->payment_terms_code); ?>
	<br />


</div>