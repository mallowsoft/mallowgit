<?php
/* @var $this CurrencyController */
/* @var $model Currency */

$this->breadcrumbs=array(
	'Currencies'=>array('index'),
	$model->currency_id,
);

$this->menu=array(
	array('label'=>'List Currency', 'url'=>array('index')),
	array('label'=>'Create Currency', 'url'=>array('create')),
	array('label'=>'Update Currency', 'url'=>array('update', 'id'=>$model->currency_id)),
	array('label'=>'Delete Currency', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->currency_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Currency', 'url'=>array('admin')),
);
?>

<h1>View Currency #<?php echo $model->currency_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'currency_name',
		'currency_symbol',
		'currency_code',
		'currency_id',
	),
)); ?>
