<?php
/* @var $this PaymentTermsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Payment Terms',
);

$this->menu=array(
	array('label'=>'Create PaymentTerms', 'url'=>array('create')),
	array('label'=>'Manage PaymentTerms', 'url'=>array('admin')),
);
?>

<h1>Payment Terms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
?>
