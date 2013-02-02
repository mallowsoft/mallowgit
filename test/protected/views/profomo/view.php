<?php
/* @var $this ProfomoController */
/* @var $model Profomo */

$this->breadcrumbs=array(
	'Profomos'=>array('index'),
	$model->profomo_no,
);

$this->menu=array(
	array('label'=>'List Profomo', 'url'=>array('index')),
	array('label'=>'Create Profomo', 'url'=>array('create')),
	array('label'=>'Update Profomo', 'url'=>array('update', 'id'=>$model->profomo_no)),
	array('label'=>'Delete Profomo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->profomo_no),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Profomo', 'url'=>array('admin')),
);
?>

<h1>View Profomo #<?php echo $model->profomo_no; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'profomo_no',
		'order_no',
		'profomo_date',
		'customer',
	),
)); ?>

