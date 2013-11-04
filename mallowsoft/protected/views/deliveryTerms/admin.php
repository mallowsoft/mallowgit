<?php
/* @var $this DeliveryTermsController */
/* @var $model DeliveryTerms */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#delivery-terms-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div id="titlebar">
<div class="listtitle">Delivery terms List</div>
<div class="createbutton"><a href="../deliveryTerms/create"><input type="button" id="createbutton" value="Create New"></a></div>
</div>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
                                           'model'=>$model,
                                           )); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'delivery-terms-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
         array('header'=>'S.No',
               'headerHtmlOptions' => array('style'=>'color:white'),
                           'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
               ),
                     
        array(
              'header'  => 'Delivery Terms Code',
              'headerHtmlOptions' => array('style'=>'color:white'),
              'value' => 'CHtml::link($data->delivery_terms_code, Yii::app()->createUrl("deliveryTerms/update",array("id"=>$data->primaryKey)))',
              'type'  => 'raw',
              ),
         array(
               'header'  => 'Delivery Terms',
               'headerHtmlOptions' => array('style'=>'color:white'),
               'value' => 'CHtml::link($data->delivery_terms, Yii::app()->createUrl("deliveryTerms/update",array("id"=>$data->primaryKey)))',
               'type'  => 'raw',
               ),		
        /*
		'delivery_terms_id',
         'information',
         */
                                                        
		array(
			'class'=>'CButtonColumn',
		),
	),
    'summaryText' => '',
    'htmlOptions'=>array('style'=>'cursor: pointer;'),
    'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl('deliveryTerms/update', array('id'=>$model->primaryKey)) . "' + $.fn.yiiGridView.getSelection(id);}",
));
?>
