<?php
/* @var $this CurrencyController */
/* @var $model Currency */
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#currency-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div id="titlebar">
<div class="listtitle">Currency Details</div>
<div class="createbutton"><a href="../currency/create"><input type="button" id="createbutton" value="Create New"></a></div>
</div>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
                                           'model'=>$model,
                                           )); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'currency-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
                     array('header'=>'S.No',
                           'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                           ),
                     array(
                           'name'  => 'currency_code',
                           'value' => 'CHtml::link($data->currency_code, Yii::app()->createUrl("currency/update",array("id"=>$data->primaryKey)))',
                           'type'  => 'raw',
                           ),
                     array(
                           'name'  => 'currency_name',
                           'value' => 'CHtml::link($data->currency_name, Yii::app()->createUrl("currency/update",array("id"=>$data->primaryKey)))',
                           'type'  => 'raw',
                           ),
                    'currency_symbol',

                    /*
                    'currency_id',
                        */
                    array(
                        'class'=>'CButtonColumn',
                    ),
                ),
)); ?>
