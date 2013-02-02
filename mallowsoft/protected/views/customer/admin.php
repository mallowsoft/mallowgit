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
<div class="listtitle">Customer Details</div>
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
                           'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                           ),
                     array(
                           'name'  => 'customer_code',
                           'value' => 'CHtml::link($data->customer_code, Yii::app()->createUrl("customer/update",array("id"=>$data->customer_code_id)))',
                           'type'  => 'raw',
                           ),
                     'customer_name',
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
));
?>
