<?php
/* @var $this AgentController */
/* @var $model Agent */
?>
<h1>View Agent <?php echo $model->agent_id; ?></h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'agent_name',
		'address',
		'city',
		'country',
		'phone_primary',
		'phone_alternative',
		'email',
		'agent_code',
		'agent_id',
                        ),
));
?>
