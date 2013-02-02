<?php
/* @var $this ProfomoController */
/* @var $model Profomo */

//$this->breadcrumbs=array(
//	'Profomos'=>array('index'),
//	'Manage',
//);

$this->menu=array(
	array('label'=>'List Profomo', 'url'=>array('index')),
	array('label'=>'Create Profomo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
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




<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'profomo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                     array(
                            'name'=>'profomo_no',
                            'htmlOptions'=>array('class'=>'date'),
                           'headerHtmlOptions'=>array('id'=>'entriesheader'),
                          ),
                     array(
                     'name'=>'order_no',
                     'htmlOptions'=>array('class'=>'workinghours'),
                     ),
                     array(
                           'name'=>'profomo_date',
                           'htmlOptions'=>array('class'=>'projectname'),
                           ),
                     array(
                           'name'=>'customer',
                           'htmlOptions'=>array('class'=>'comments'),
                           ),
                     array(
                           'class'=>'CButtonColumn',
                           ),
                     ),
));
?>

