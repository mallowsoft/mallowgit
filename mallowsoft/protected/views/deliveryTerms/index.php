<?php
/* @var $this DeliveryTermsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Delivery Terms',
);

$this->menu=array(
	array('label'=>'Create DeliveryTerms', 'url'=>array('create')),
	array('label'=>'Manage DeliveryTerms', 'url'=>array('admin')),
);
?>

<h1>Delivery Terms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
?>
