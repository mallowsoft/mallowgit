<?php
/* @var $this DeliveryTermsController */
/* @var $data DeliveryTerms */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_terms_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->delivery_terms_id), array('view', 'id'=>$data->delivery_terms_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('information')); ?>:</b>
	<?php echo CHtml::encode($data->information); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_terms')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_terms); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delivery_terms_code')); ?>:</b>
	<?php echo CHtml::encode($data->delivery_terms_code); ?>
	<br />


</div>