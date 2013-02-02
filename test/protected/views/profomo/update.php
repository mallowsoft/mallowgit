<?php
/* @var $this ProfomoController */
/* @var $model Profomo */

$this->breadcrumbs=array(
	'Profomos'=>array('index'),
	$model->profomo_no=>array('view','id'=>$model->profomo_no),
	'Update',
);

$this->menu=array(
	array('label'=>'List Profomo', 'url'=>array('index')),
	array('label'=>'Create Profomo', 'url'=>array('create')),
	array('label'=>'View Profomo', 'url'=>array('view', 'id'=>$model->profomo_no)),
	array('label'=>'Manage Profomo', 'url'=>array('admin')),
);
?>

<h1>Update Profomo <?php echo $model->profomo_no; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>