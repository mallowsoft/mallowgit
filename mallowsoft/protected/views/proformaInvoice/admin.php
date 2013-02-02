<?php
/* @var $this ProformaInvoiceController */
/* @var $model ProformaInvoice */
?>

<div id="titlebar">
<div class="listtitle">Proforma Invoice Details</div>
<div class="createbutton"><a href="../proformaInvoice/create"><input type="button" id="createbutton" value="Create New"></a></div>
</div>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
                                           'model'=>$model,
                                           )); ?>
</div><!-- search-form -->

<?php
//    $currency_symbol=Currency::model()->find('currency_symbol=:currency_symbol',array(':currency_code'=>$model->currency_code));
    date_default_timezone_set('UTC');
    $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'proforma-invoice-grid',
//    'pager'=>array(
//                     'header'         => '',
//                     'prevPageLabel'  => '<img src="'. Yii::app()->request->baseUrl.'/images/previous.png">',
//                     'nextPageLabel'  => '<img src="'. Yii::app()->request->baseUrl.'/images/next.png">',
//                     ),
	'dataProvider'=>$model->search(),
	'columns'=>array(
        array(
               'header'=>'S.No',
               'headerHtmlOptions' => array('style'=>'color:white'),
               'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',              
               ),
         array(
               'name'  => 'production_order_no',
               'value' => 'CHtml::link($data->production_order_no, Yii::app()->createUrl("proformaInvoice/view",array("order"=>$data->production_order_no)))',
               'type'  => 'raw',
               ),
        'proforma_no',
         array(
               'name'=>'proforma_date',
               'value'=>'Yii::app()->dateFormatter->format("dd-MM-y",strtotime($data->proforma_date))',
               ),
         array(
               'name'=>'customer_code',
               ),
         array(
               'header'  => 'FC Value',
               'headerHtmlOptions' => array('style'=>'color:white'),
               'value' => 'CHtml::link($data->currency_symbol.$data->FC_value, Yii::app()->createUrl("proformaInvoice/view",array("order"=>$data->production_order_no)))',
               'type'  => 'raw',
               ),
         array(
               'name'  => 'exchange_rate',
               'value' => '$data["booked_exchange_rate"] == 0.00 ? $data->exchange_rate : $data->booked_exchange_rate',
               'type'  => 'raw',
               ),
         array(
               'header'  => 'INR Value',
               'headerHtmlOptions' => array('style'=>'color:white'),
               'value' => '$data["booked_exchange_rate"] == 0.00 ? $data->FC_value * $data->exchange_rate : $data->FC_value * $data->booked_exchange_rate',
               'type'  => 'raw',
               ),
        /*
         array(
         'name'  => 'fpc_booking_on',
         'value' => 'CHtml::link($data->fpc_booking_on, Yii::app()->createUrl("proformaInvoice/update",array("id"=>$data->primaryKey)))',
         'type'  => 'raw',
         ),
         'fpc_booking_off',
		'shipment_date',
         'currency_value',
		'FPC_booking_period',
		'eta',
		'destination_port',
		'delivery_terms',
		'payment_terms',
		'total_cbm',
		'no_type_containers',
		'agent',
		'agent_commision',
		'proforma_invoice_id',
		'currency_code',
		*/

	),
));
?>
