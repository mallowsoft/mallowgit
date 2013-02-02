<?php
/* @var $this AgentController */
/* @var $model Agent */

$this->breadcrumbs=array(
	'Agents'=>array('index'),
	$model->agent_id,
);

$this->menu=array(
	array('label'=>'List Agent', 'url'=>array('index')),
	array('label'=>'Create Agent', 'url'=>array('create')),
	array('label'=>'Update Agent', 'url'=>array('update', 'id'=>$model->agent_id)),
	array('label'=>'Delete Agent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->agent_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Agent', 'url'=>array('admin')),
);
?>

<h1>View Agent #<?php echo $model->agent_id; ?></h1>

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
)); ?>
