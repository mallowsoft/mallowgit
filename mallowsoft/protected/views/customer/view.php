<?php
/* @var $this CustomerController */
/* @var $model Customer */

$this->breadcrumbs=array(
	'Customers'=>array('index'),
	$model->customer_code_id,
);

$this->menu=array(
	array('label'=>'List Customer', 'url'=>array('index')),
	array('label'=>'Create Customer', 'url'=>array('create')),
	array('label'=>'Update Customer', 'url'=>array('update', 'id'=>$model->customer_code_id)),
	array('label'=>'Delete Customer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->customer_code_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Customer', 'url'=>array('admin')),
);
?>

<h1>View Customer #<?php echo $model->customer_code_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
        
		'customer_code',
        'destination_port',
        /*
		'customer_name',
		'invoicing_address',
         
		'city',
		'country',
		'phone_primary',
		'phone_alternative',
		'email',
		
		'delivery_address',
		'delivery_city',
		'delivery_country',
		'delivery_phone',
		'delivery_email',
		'customer_code_id',
		'currency_id',
		'agent_id',
		'payment_terms_id',
		'delivery_terms_id',
         */
	),
)); ?>
