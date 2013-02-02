<?php
/* @var $this SalesInvoiceController */
/* @var $model SalesInvoice */
?>


<div id="titlebar">
<div class="listtitle">Sales Invoice Details</div>
<div class="createbutton"><a href="../salesInvoice/create"><input type="button" id="createbutton" value="Create New"></a></div>
</div>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
                                           'model'=>$model,
                                           )); ?>
</div><!-- search-form -->
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sales-invoice-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
    array(
         'name'=>'S_No',
         'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
          ),
    array(
           'name'  => 'production_order_no',
           'value' => 'CHtml::link($data->production_order_no, Yii::app()->createUrl("salesInvoice/update",array("id"=>$data->primaryKey)))',
           'type'  => 'raw',
           ),
        'invoice_no',
		'invoice_date',
     array(
           'name'  => 'quantity',
           'value' => 'CHtml::link($data->quantity$data->unit, Yii::app()->createUrl("proformaInvoice/view",array("id"=>$data->primaryKey)))',
           'type'  => 'raw',
           ),

        'fc_value',
		/*
        'customer',
         'weight',
         'unit',
		'currency',
		'Ex_rate',
		'inr_value',
		'payment_due_date',
		'bank_ref_no',
		'payment_date',
		'ecgc_payment_terms',
		'shipment_board_date',
		'loading_port',
		'destination_port',
		'shipping_bill_no',
		'additional_bill_no',
		'house_agent',
		'feeder_vessel',
		'clearance_customs_house',
		'expected_eta_date',
		'date',
		'forwarder_name',
		'mother_vessel',
		'additional_date',
		'premium_rate',
		'shipment_no',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
));
?>
