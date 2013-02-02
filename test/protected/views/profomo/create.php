<?php
/* @var $this ProfomoController */
/* @var $model Profomo */

$this->breadcrumbs=array(
	'Profomos'=>array('index'),
	'Create',
);

    
$this->menu=array(
	array('label'=>'List Profomo', 'url'=>array('index')),
	array('label'=>'Manage Profomo', 'url'=>array('admin')),
);
?>

<h1>Create Profomo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>