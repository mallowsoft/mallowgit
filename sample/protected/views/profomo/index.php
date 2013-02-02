<?php
/* @var $this ProfomoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Profomos',
);

$this->menu=array(
	array('label'=>'Create Profomo', 'url'=>array('create')),
	array('label'=>'Manage Profomo', 'url'=>array('admin')),
);
?>

<h1>Profomos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
?>
