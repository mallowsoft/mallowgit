<?php
/* @var $this CustomerController */
/* @var $model Customer */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#customer-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<div id="titlebar">
<div class="listtitle">Customers List</div>
<div class="createbutton"><a href="../customer/create"><input type="button" id="createbutton" value="Create New"></a></div>
</div>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
                                           'model'=>$model,
                                           )); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'customer-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
                     array('header'=>'S.No',
                           'headerHtmlOptions' => array('style'=>'color:white'),
                           'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                           ),
                     array(
                           'header'  => 'Customer Code',
                           'headerHtmlOptions' => array('style'=>'color:white'),
                           'value' => 'CHtml::link($data->customer_code, Yii::app()->createUrl("customer/update",array("id"=>$data->customer_code_id)))',
                           'type'  => 'raw',
                           ),
                     array(
                           'header'  => 'Customer Name',
                           'headerHtmlOptions' => array('style'=>'color:white'),
                           'value' => '$data->customer_name',
                           'type'  => 'raw',
                           ),
                    /*
                     
                    'currency_id',
                    'invoicing_address',
                    'city',
                    'country',
                    'phone_primary',
                    'phone_alternative',
                    'email',
                    'destination_port',
                    'delivery_address',
                    'delivery_city',
                    'delivery_country',
                    'delivery_phone',
                    'delivery_email',
                    'customer_code_id',
                    'payment_terms_id',
                    'delivery_terms_id',
                    'agent_id',

                    */
                    array(
                        'class'=>'CButtonColumn',
                    ),
                ),
                'summaryText' => '',
                'htmlOptions'=>array('style'=>'cursor: pointer;'),
                'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl('customer/update', array('id'=>$model->primaryKey)) . "' + $.fn.yiiGridView.getSelection(id);}",
));
?>
