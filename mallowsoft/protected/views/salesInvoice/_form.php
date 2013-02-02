<?php
/* @var $this SalesInvoiceController */
/* @var $model SalesInvoice */
/* @var $form CActiveForm */
if(isset($_GET['production_order_no']))
    {
        $proformamodel=$_GET['production_order_no'];
        $promodel=ProformaInvoice::model()->find('production_order_no=:production_order_no',array(':production_order_no'=>$proformamodel));
        $currecncy=$promodel->currency_code;
        $customer=$promodel->customer_code;
        $fc_value=$promodel->FC_value;
        $ex_rate=$promodel->exchange_rate;
        $inr_value=$promodel->INR_value;
    }
?>

<div class="form">

<?php
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sales-invoice-form',
	'enableAjaxValidation'=>false,
));
    date_default_timezone_set('UTC');
    $today=date('d-M-Y');
?>
<div id="wrapper">
<div id="row">
		<?php echo $form->labelEx($model,'production_order_no'); ?>
        <?php echo $form->textField($model,'production_order_no',array('value'=>$model->isNewRecord ? $proformamodel : null)); ?>
		<?php echo $form->error($model,'production_order_no',array('class'=>'error')); ?>

        <?php echo $form->labelEx($model,'invoice_no'); ?>
        <?php echo $form->textField($model,'invoice_no'); ?>
        <?php echo $form->error($model,'invoice_no',array('class'=>'error')); ?>

		<?php echo $form->labelEx($model,'invoice_date'); ?>
		<?php echo $form->textField($model,'invoice_date',array('value'=> $model->isNewRecord ? date('d-M-Y') : null)); ?>
		<?php echo $form->error($model,'invoice_date',array('class'=>'error')); ?>
</div>
<div id="row">

        <?php echo $form->labelEx($model,'shipment_no'); ?>
        <?php echo $form->textField($model,'shipment_no'); ?>
        <?php echo $form->error($model,'shipment_no',array('class'=>'error')); ?>

        <?php echo $form->labelEx($model,'customer'); ?>
<?php echo $form->textArea($model,'customer',array('value'=>$model->isNewRecord ? $customer : null)); ?>
        <?php echo $form->error($model,'customer',array('class'=>'error')); ?>
</div>
</div>
<div id="wrapper">
<div id="row">
		<?php echo $form->labelEx($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity'); ?>
		<?php echo $form->error($model,'quantity',array('class'=>'error')); ?>

        <?php echo $form->labelEx($model,'unit'); ?>
        <?php echo $form->dropDownList($model,'unit',CHtml::listData(Units::model()->findAll(),'unit_code','unit_code'),array('prompt'=>$model->isNewRecord ? 'select Unit' : null));  ?>
        <?php //echo $form->textField($model,'unit',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'unit',array('class'=>'error')); ?>

		<?php echo $form->labelEx($model,'weight'); ?>
		<?php echo $form->textField($model,'weight',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'weight',array('class'=>'error')); ?>
</div>
<div id="row">
		<?php echo $form->labelEx($model,'fc_value'); ?>
<?php echo $form->textField($model,'fc_value',array('value'=>$model->isNewRecord ? $fc_value : null)); ?>
		<?php echo $form->error($model,'fc_value',array('class'=>'error')); ?>

        <?php echo $form->labelEx($model,'currency'); ?>
<?php echo $form->textField($model,'currency',array('value'=>$model->isNewRecord ? $currecncy : null)); ?>
        <?php echo $form->error($model,'currency',array('class'=>'error')); ?>

        <?php echo $form->labelEx($model,'Ex_rate'); ?>
<?php echo $form->textField($model,'Ex_rate',array('value'=>$model->isNewRecord ? $ex_rate : null)); ?>
        <?php echo $form->error($model,'Ex_rate',array('class'=>'error')); ?>
</div>
<div id="row">
        <?php echo $form->labelEx($model,'inr_value'); ?>
        <?php echo $form->textField($model,'inr_value'); ?>
        <?php echo $form->error($model,'inr_value',array('class'=>'error')); ?>
</div>
</div>
<div id="wrapper">
<div id="titleback">Payment Details</div>
<div id="row">
		<?php echo $form->labelEx($model,'payment_due_date'); ?>
		<?php echo $form->textField($model,'payment_due_date'); ?>
		<?php echo $form->error($model,'payment_due_date',array('class'=>'error')); ?>

        <?php echo $form->labelEx($model,'bank_ref_no'); ?>
		<?php echo $form->textField($model,'bank_ref_no'); ?>
		<?php echo $form->error($model,'bank_ref_no',array('class'=>'error')); ?>

		<?php echo $form->labelEx($model,'payment_date'); ?>
		<?php echo $form->textField($model,'payment_date'); ?>
		<?php echo $form->error($model,'payment_date',array('class'=>'error')); ?>
</div>
<div id="row">
		<?php echo $form->labelEx($model,'ecgc_payment_terms'); ?>
		<?php echo $form->textField($model,'ecgc_payment_terms',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ecgc_payment_terms',array('class'=>'error')); ?>

        <?php echo $form->labelEx($model,'premium_rate'); ?>
        <?php echo $form->textField($model,'premium_rate'); ?>
        <?php echo $form->error($model,'premium_rate',array('class'=>'error')); ?>
</div>
</div>
<div id="wrapper">
<div id="titleback">Shipment Details</div>
<div id="row">
		<?php echo $form->labelEx($model,'shipment_board_date'); ?>
		<?php echo $form->textField($model,'shipment_board_date'); ?>
		<?php echo $form->error($model,'shipment_board_date',array('class'=>'error')); ?>

        <?php echo $form->labelEx($model,'feeder_vessel'); ?>
        <?php echo $form->textField($model,'feeder_vessel',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'feeder_vessel',array('class'=>'error')); ?>

        <?php echo $form->labelEx($model,'mother_vessel'); ?>
        <?php echo $form->textField($model,'mother_vessel',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'mother_vessel',array('class'=>'error')); ?>
</div>
<div id="row">
		<?php echo $form->labelEx($model,'loading_port'); ?>
		<?php echo $form->textField($model,'loading_port',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'loading_port',array('class'=>'error')); ?>

        <?php echo $form->labelEx($model,'clearance_customs_house'); ?>
        <?php echo $form->textField($model,'clearance_customs_house',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'clearance_customs_house',array('class'=>'error')); ?>

		<?php echo $form->labelEx($model,'destination_port'); ?>
		<?php echo $form->textField($model,'destination_port',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'destination_port',array('class'=>'error')); ?>
</div>
<div id="row">
        <?php echo $form->labelEx($model,'expected_eta_date'); ?>
        <?php echo $form->textField($model,'expected_eta_date'); ?>
        <?php echo $form->error($model,'expected_eta_date',array('class'=>'error')); ?>

		<?php echo $form->labelEx($model,'shipping_bill_no'); ?>
		<?php echo $form->textField($model,'shipping_bill_no'); ?>
		<?php echo $form->error($model,'shipping_bill_no',array('class'=>'error')); ?>

        <?php echo $form->labelEx($model,'additional_bill_no'); ?>
        <?php echo $form->textField($model,'additional_bill_no'); ?>
        <?php echo $form->error($model,'additional_bill_no',array('class'=>'error')); ?>
</div>
<div id="row">
        <?php echo $form->labelEx($model,'date'); ?>
        <?php echo $form->textField($model,'date'); ?>
        <?php echo $form->error($model,'date',array('class'=>'error')); ?>

        <?php echo $form->labelEx($model,'additional_date'); ?>
        <?php echo $form->textField($model,'additional_date'); ?>
        <?php echo $form->error($model,'additional_date',array('class'=>'error')); ?>

		<?php echo $form->labelEx($model,'house_agent'); ?>
		<?php echo $form->textField($model,'house_agent',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'house_agent',array('class'=>'error')); ?>
</div>
<div id="row">
        <?php echo $form->labelEx($model,'forwarder_name'); ?>
        <?php echo $form->textField($model,'forwarder_name',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'forwarder_name',array('class'=>'error')); ?>
</div>
</div>
<div id="submitmenu">
<div class="space"><span class="required">*</span> Mandatory Fields</div>
<div class="cancelbutton"><?php echo CHtml::Button('Cancel',$model->isNewRecord ? array('submit'=> array('proformaInvoice/view?order='.$proformamodel)) : array('submit'=>array('proformaInvoice/view?order='.$model->production_order_no))); ?></div>
<div class="createbutton"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></div>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->