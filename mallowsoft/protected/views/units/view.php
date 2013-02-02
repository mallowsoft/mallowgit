<?php
/* @var $this UnitsController */
/* @var $model Units */
?>

<h1>View Units #<?php echo $model->unit_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'unit_name',
		'unit_code',
		'unit_id',
	),
)); ?>
