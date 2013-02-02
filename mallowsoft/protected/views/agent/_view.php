<?php
/* @var $this AgentController */
/* @var $data Agent */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('agent_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->agent_id), array('view', 'id'=>$data->agent_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agent_name')); ?>:</b>
	<?php echo CHtml::encode($data->agent_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_alternative')); ?>:</b>
	<?php echo CHtml::encode($data->phone_alternative); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agent_code')); ?>:</b>
	<?php echo CHtml::encode($data->agent_code); ?>
	<br />

	*/ ?>

</div>