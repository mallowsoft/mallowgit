<?php
/* @var $this SalesInvoiceController */
/* @var $model SalesInvoice */
?>


<div id="titlebar">
<div class="listtitle">Sales Invoice List</div>
</div>
<div class="search-form" style="display:none">
<?php $this->renderPartial('../salesInvoice/_search',array(
                                           'model'=>$model,
                                           )); ?>
</div><!-- search-form -->
<?php
    date_default_timezone_set('UTC');
    $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sales-invoice-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
     array(
         'header'=>'S.No',
         'headerHtmlOptions' => array('style'=>'color:white'),
         'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
          ),
     array(
           'header'  => 'Order No',
          'headerHtmlOptions' => array('style'=>'color:white'),
           'value' => 'CHtml::link($data->production_order_no, Yii::app()->createUrl("salesInvoice/update",array("id"=>$data->primaryKey)))',
           'type'  => 'raw',
           ),
     array(
           'header'  => 'Invoice No',
           'headerHtmlOptions' => array('style'=>'color:white'),
           'value' => 'CHtml::link($data->invoice_no, Yii::app()->createUrl("salesInvoice/update",array("id"=>$data->primaryKey)))',
           'type'  => 'raw',
           ),
     array(
           'header'  => 'Date',
           'headerHtmlOptions' => array('style'=>'color:white'),
           'value' => 'CHtml::link(Yii::app()->dateFormatter->format("dd-MM-y",strtotime($data->invoice_date)), Yii::app()->createUrl("salesInvoice/update",array("id"=>$data->primaryKey)))',
           'type'  => 'raw',
           ),

     array(
           'header'  => 'Customer',
           'headerHtmlOptions' => array('style'=>'color:white'),
           'value' => 'CHtml::link($data->customer, Yii::app()->createUrl("salesInvoice/update",array("id"=>$data->primaryKey)))',
           'type'  => 'raw',
           ),
     array(
           'header'  => 'FC Value',
           'headerHtmlOptions' => array('style'=>'color:white'),
           'value' => 'CHtml::link($data->currency_symbol." ".$data->fc_value, Yii::app()->createUrl("salesInvoice/update",array("id"=>$data->primaryKey)))',
           'type'  => 'raw',
           ),
     array(
           'header'  => 'Ex Rate',
           'headerHtmlOptions' => array('style'=>'color:white'),
           'value' => 'CHtml::link($data->ex_rate, Yii::app()->createUrl("salesInvoice/update",array("id"=>$data->primaryKey)))',
           'type'  => 'raw',
           ),
     array(
           'header'  => 'INR Value',
           'headerHtmlOptions' => array('style'=>'color:white'),
           'value' => 'CHtml::link($data->fc_value * $data->ex_rate, Yii::app()->createUrl("salesInvoice/update",array("id"=>$data->primaryKey)))',
           'type'  => 'raw',
           ),
		/*
        'unit',
		'currency',
         
        'weight',
        'quantity',
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
    'summaryText'=>'',
    'htmlOptions'=>array('style'=>'cursor: pointer;'),
    'selectionChanged'=>"function(order){window.location='" . Yii::app()->createUrl('salesInvoice/update', array('id'=>$model->invoice_id)) . "' + $.fn.yiiGridView.getSelection(order);}",
));
?>
