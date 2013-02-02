<?php
/* @var $this ProfomoController */
/* @var $model Profomo */

$this->breadcrumbs=array(
	'Profomos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Profomo', 'url'=>array('index')),
	array('label'=>'Create Profomo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#profomo-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Profomos</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class' => 'search')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'profomo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'order_no',
		'profomo_date',
		'customer',
		'profomo_no',
		'serial',
		'fpc_booked',
		array(
			'class'=>'CButtonColumn',
		),
	),
));
?>
