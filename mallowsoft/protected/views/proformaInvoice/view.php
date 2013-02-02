<?php
/* @var $this ProformaInvoiceController */
/* @var $model ProformaInvoice */

//$this->breadcrumbs=array(
//	'Proforma Invoices'=>array('index'),
//	$model->proforma_invoice_id,
//);
//
//$this->menu=array(
//	array('label'=>'List ProformaInvoice', 'url'=>array('index')),
//	array('label'=>'Create ProformaInvoice', 'url'=>array('create')),
//	array('label'=>'Update ProformaInvoice', 'url'=>array('update', 'id'=>$model->proforma_invoice_id)),
//	array('label'=>'Delete ProformaInvoice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->proforma_invoice_id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage ProformaInvoice', 'url'=>array('admin')),
//);
?>

<div id="titlebar">
<div class="listtitle">Production Order No : <?php echo $model->production_order_no; ?></div>
<div class="createbutton"> <?php echo CHtml::Button('Edit',array('submit'=>array('proformaInvoice/update','id'=>$model->primaryKey))); ?></div>
</div>
<div id="wrapper">
<div id="proforma_view_row">
<div class="proforma_view_cell">
<div>Proforma Invoice No :</div>
<div class="proforma_view_digits"><?php echo $model->proforma_no; ?></div>
</div>
<div class="proforma_view_cell">
<div>Proforma Date :</div>
<div class="proforma_view_digits"><?php echo $model->proforma_date; ?></div>
</div>
<div class="proforma_view_cell">
<div>FC Value :</div>
<div class="proforma_view_digits"><?php $currency=Currency::model()->find('currency_code = :currency_code',array(':currency_code' => $model->currency_code));
    echo $model->currency_symbol=$currency->currency_symbol;
    echo $model->FC_value; ?></div>
</div>
<div class="proforma_view_cell">
<div>Exchange Rate (1£) :</div>
<div class="proforma_view_digits"><?php echo $model->exchange_rate.' INR'; ?></div>
</div>
<div class="proforma_view_cell">
<div>INR Value :</div>
<div class="proforma_view_digits"><?php echo $model->INR_value; ?></div>
</div>
</div>
</div>


<div id="titlebar">
<div class="listtitle"> Invoice</div>
<div class="createbutton"><a href="../salesInvoice/create?production_order_no=<?php echo $model->production_order_no;?>"><input type="button" id="createbutton" value="Create New"></a></div>
</div>
<?php
     $model2=SalesInvoice::model();
      $this->widget('zii.widgets.grid.CGridView', array(
            'id'=>'sales-invoice-grid',
            'dataProvider'=>$dataProvider->search(),
//            'ajaxUrl'=>array('salesInvoice/admin'),
            'columns'=>array(
                             array(
                                   'header'=>'S.No',
                                   'headerHtmlOptions' => array('style'=>'color:white'),
                                   'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                                   ),
                             array(
                                   'name'  => 'production_order_no',
                                   'value' => 'CHtml::link($data->production_order_no, Yii::app()->createUrl("salesInvoice/update",array("id"=>$data->primaryKey)))',
                                   'type'  => 'raw',
                                   ),
                             'invoice_no',
                             array(
                                   'name'=>'invoice_date',
                                   'value'=>'Yii::app()->dateFormatter->format("dd-MM-y",strtotime($data->invoice_date))',
                                   ),
                             array(
                                   'name'  => 'quantity',
                                   'value' => 'CHtml::link($data->quantity.$data->unit, Yii::app()->createUrl("proformaInvoice/view",array("id"=>$data->primaryKey)))',
                                   'type'  => 'raw',
                                   ),
                             array(
                                   'header'  => 'FC Value',
                                   'headerHtmlOptions' => array('style'=>'color:white'),
                                   'value' => 'CHtml::link($data->fc_value, Yii::app()->createUrl("proformaInvoice/view",array("id"=>$data->primaryKey)))',
                                   'type'  => 'raw',
                                   ),
                             /*
                              'weight',
                              'customer',
                              'currency',
                              'Ex_rate',
                              'inr_value',
                              'invoice_no',
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
