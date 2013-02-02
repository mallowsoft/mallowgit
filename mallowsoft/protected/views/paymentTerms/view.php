<?php
/* @var $this PaymentTermsController */
/* @var $model PaymentTerms */

$this->breadcrumbs=array(
	'Payment Terms'=>array('index'),
	$model->payment_terms_id,
);

$this->menu=array(
	array('label'=>'List PaymentTerms', 'url'=>array('index')),
	array('label'=>'Create PaymentTerms', 'url'=>array('create')),
	array('label'=>'Update PaymentTerms', 'url'=>array('update', 'id'=>$model->payment_terms_id)),
	array('label'=>'Delete PaymentTerms', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->payment_terms_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PaymentTerms', 'url'=>array('admin')),
);
?>

<h1>View PaymentTerms #<?php echo $model->payment_terms_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'information',
		'payment_terms',
		'payment_terms_code',
		'payment_terms_id',
	),
)); ?>
