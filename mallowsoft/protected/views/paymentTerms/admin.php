<?php
/* @var $this PaymentTermsController */
/* @var $model PaymentTerms */
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#payment-terms-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div id="titlebar">
<div class="listtitle">Payment terms List</div>
<div class="createbutton"><a href="../paymentTerms/create"><input type="button" id="createbutton" value="Create New"></a></div>
</div>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
                                           'model'=>$model,
                                           )); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'payment-terms-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
                     array('header'=>'S.No',
                           'headerHtmlOptions' => array('style'=>'color:white'),
                           'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',                           ),
                     array(
                           'header'  => 'Payment Terms Code',
                           'headerHtmlOptions' => array('style'=>'color:white'),
                           'value' => 'CHtml::link($data->payment_terms_code, Yii::app()->createUrl("paymentTerms/update",array("id"=>$data->primaryKey)))',
                           'type'  => 'raw',
                           ),
                     array(
                           'header'  => 'Payment Terms',
                           'headerHtmlOptions' => array('style'=>'color:white'),
                           'value' => 'CHtml::link($data->payment_terms, Yii::app()->createUrl("paymentTerms/update",array("id"=>$data->primaryKey)))',
                           'type'  => 'raw',
                           ),
                    
                     /*
                      'information',
                    'payment_terms_id',
                      */
                    array(
                        'class'=>'CButtonColumn',
                    ),
                ),
                'summaryText' => '',
                'htmlOptions'=>array('style'=>'cursor: pointer;'),
                'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl('paymentTerms/update', array('id'=>$model->primaryKey)) . "' + $.fn.yiiGridView.getSelection(id);}",

)); ?>
