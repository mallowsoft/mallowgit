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
<div class="listtitle">Payment Terms </div>
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
                           'value'=>'++$row',
                           ),
                     array(
                           'name'  => 'payment_terms_code',
                           'value' => 'CHtml::link($data->payment_terms_code, Yii::app()->createUrl("paymentTerms/update",array("id"=>$data->primaryKey)))',
                           'type'  => 'raw',
                           ),
                    'payment_terms',
                    'information',
                     /*
                    'payment_terms_id',
                      */
                    array(
                        'class'=>'CButtonColumn',
                    ),
	),
)); ?>
