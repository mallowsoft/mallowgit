<?php
/* @var $this DeliveryTermsController */
/* @var $model DeliveryTerms */
?>

<h1>View DeliveryTerms #<?php echo $model->delivery_terms_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'information',
		'delivery_terms',
		'delivery_terms_code',
		'delivery_terms_id',
	),
)); ?>
