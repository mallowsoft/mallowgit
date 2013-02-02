<?php
/* @var $this UnitsController */
/* @var $model Units */
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#units-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div id="titlebar">
<div class="listtitle">Units Details</div>
<div class="createbutton"><a href="../units/create"><input type="button" id="createbutton" value="Create New"></a></div>
</div>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'units-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
                     array('header'=>'S.No',
                           'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                           ),
                     array(
                           'name'=>'unit_code',
                           'value' => 'CHtml::link($data->unit_code, Yii::app()->createUrl("units/update",array("id"=>$data->primaryKey)))',
                           'type'  => 'raw',
                           ),
                    'unit_name',
                    
                    /*
                    'unit_id',
                     */
                    array(
                        'class'=>'CButtonColumn',
                          ),
                     ),
)); ?>
