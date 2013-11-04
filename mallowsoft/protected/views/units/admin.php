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
<div class="listtitle">Units List</div>
<div class="createbutton"><a href="../units/create"><input type="button" id="createbutton" value="Create New"></a></div>
</div>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
));
?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'units-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
                     array('header'=>'S.No',
                           'headerHtmlOptions' => array('style'=>'color:white'),
                           'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                           ),
                     array(
                           'header'=>'Unit Code',
                           'headerHtmlOptions' => array('style'=>'color:white'),
                           'value' => 'CHtml::link($data->unit_code, Yii::app()->createUrl("units/update",array("id"=>$data->primaryKey)))',
                           'type'  => 'raw',
                           ),
                     array(
                           'header'=>'Unit Name',
                           'headerHtmlOptions' => array('style'=>'color:white'),
                           'value' => 'CHtml::link($data->unit_name, Yii::app()->createUrl("units/update",array("id"=>$data->primaryKey)))',
                           'type'  => 'raw',
                           ),
                    /*
                    'unit_id',
                     */
                    array(
                        'class'=>'CButtonColumn',
                          ),
                     ),
                    'summaryText' => '',
                    'htmlOptions'=>array('style'=>'cursor: pointer;'),
                    'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl('units/update', array('id'=>$model->primaryKey)) . "' + $.fn.yiiGridView.getSelection(id);}",

));
?>
