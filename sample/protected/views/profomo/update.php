<?php
/* @var $this ProfomoController */
/* @var $model Profomo */

$this->breadcrumbs=array(
	'Profomos'=>array('index'),
	$model->order_no=>array('view','id'=>$model->order_no),
	'Update',
);

$this->menu=array(
	array('label'=>'List Profomo', 'url'=>array('index')),
	array('label'=>'Create Profomo', 'url'=>array('create')),
	array('label'=>'View Profomo', 'url'=>array('view', 'id'=>$model->order_no)),
	array('label'=>'Manage Profomo', 'url'=>array('admin')),
);
?>

<h1>Update Profomo <?php echo $model->order_no; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>