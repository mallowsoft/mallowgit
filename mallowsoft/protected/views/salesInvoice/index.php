<?php
/* @var $this SalesInvoiceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sales Invoices',
);

$this->menu=array(
	array('label'=>'Create SalesInvoice', 'url'=>array('create')),
	array('label'=>'Manage SalesInvoice', 'url'=>array('admin')),
);
?>

<h1>Sales Invoices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
?>
