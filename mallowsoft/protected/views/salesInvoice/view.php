<?php
/* @var $this SalesInvoiceController */
/* @var $model SalesInvoice */

$this->breadcrumbs=array(
	'Sales Invoices'=>array('index'),
	$model->invoice_no,
);

$this->menu=array(
	array('label'=>'List SalesInvoice', 'url'=>array('index')),
	array('label'=>'Create SalesInvoice', 'url'=>array('create')),
	array('label'=>'Update SalesInvoice', 'url'=>array('update', 'id'=>$model->invoice_no)),
	array('label'=>'Delete SalesInvoice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->invoice_no),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SalesInvoice', 'url'=>array('admin')),
);
?>

<h1>View SalesInvoice #<?php echo $model->invoice_no; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'production_order_no',
		'invoice_date',
		'customer',
		'quantity',
		'weight',
		'unit',
		'fc_value',
		'currency',
		'Ex_rate',
		'inr_value',
		'invoice_no',
		'payment_due_date',
		'bank_ref_no',
		'payment_date',
		'ecgc_payment_terms',
		'shipment_board_date',
		'loading_port',
		'destination_port',
		'shipping_bill_no',
		'additional_bill_no',
		'house_agent',
		'feeder_vessel',
		'clearance_customs_house',
		'expected_eta_date',
		'date',
		'forwarder_name',
		'mother_vessel',
		'additional_date',
		'premium_rate',
		'shipment_no',
	),
)); ?>
