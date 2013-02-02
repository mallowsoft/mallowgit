<?php
    /* @var $this ProformaInvoiceController */
    /* @var $model ProformaInvoice */
    /* @var $form CActiveForm */
?>

<script>
$('#ch1').live('change', function(){
               if ( $(this).is(':checked') ) {
               $('#fpc_row').show();
               $('#exchange_row').hide();
               } else {
               $('#fpc_row').hide();
               }
               });
$('#ch2').live('change', function(){
               if ( $(this).is(':checked') ) {
               $('#fpc_row').hide();
               $('#exchange_row').show();
               } else {
               $('#exchange_row').hide();
               }
               });
</script>
<script>
$(document).ready(function()
              {
              $('#code').change(function()
                    {
                    var selected = $(this).find(':selected').html();
                    $.post('http://localhost/yii/mallowsoft/protected/controllers/ajax.php',{'item': selected}, function(data)
                           {
                           $('#port').val(data);
                           });
                    
                    $.post('http://localhost/yii/mallowsoft/protected/controllers/ajaxdelivery.php',{'item': selected}, function(data)
                           {
                           $('#deliveryterms').val(data);
                           });
                    
                    $.post('http://localhost/yii/mallowsoft/protected/controllers/ajaxpayment.php',{'item': selected}, function(data)
                           {
                           $('#paymentterms').val(data);
                           });
                    $.post('http://localhost/yii/mallowsoft/protected/controllers/ajaxcurrency.php',{'item': selected}, function(data)
                           {
                           $('#currency').val(data);
                           });
                    });
              
              });
</script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
                                                    'id'=>'proforma-invoice-form',
                                                    'enableAjaxValidation'=>false,
                                                    ));
    date_default_timezone_set('UTC');
    $today=date('d-M-Y');
?>

<div id="wrapper">
<div id="row">
<?php echo $form->labelEx($model,'customer_code : '); ?>
<?php echo $form->dropDownList($model,'customer_code',CHtml::listData(Customer::model()->findAll(),'customer_code','customer_code'),array('id'=>'code'));  ?>
<?php echo $form->error($model,'customer_code',array('class'=>'error')); ?>

<?php echo $form->labelEx($model,'date :'); ?>
<?php echo $form->textField($model,'proforma_date',array('value'=> $model->isNewRecord ? date('d-M-Y') : null)); ?>
<?php echo $form->error($model,'proforma_date',array('class'=>'error')); ?><br>

<?php echo $form->labelEx($model,'proforma_no : '); ?>
<?php echo $form->textField($model,'proforma_no',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'proforma_no',array('class'=>'error')); ?>

<?php echo $form->labelEx($model,'production_order_no :'); ?>
<?php echo $form->textField($model,'production_order_no',array('rows'=>6, 'cols'=>50)); ?><br>
<?php echo $form->error($model,'production_order_no',array('class'=>'error')); ?>
</div>
</div>
<div id="wrapper">
<div id="titleback">General Details</div>
<div id="row">
<?php echo $form->labelEx($model,'Value :'); ?>
<?php echo $form->textField($model,'FC_value'); ?>
<?php echo $form->error($model,'FC_value',array('class'=>'error')); ?>

<?php echo $form->labelEx($model,'currency_code :'); ?>
<?php echo $form->textField($model,'currency_code',array('id'=>'currency')); ?>
<?php echo $form->error($model,'currency_code',array('class'=>'error')); ?>
</div>

<div id="row">

<?php echo $form->labelEx($model,'Is FPC Booked :'); ?>
    
<?php echo $form->radiobutton($model,'fpc_booking_on',array('id'=>'ch1','name'=>'radio'),array('value'=>1,'uncheckValue'=>null)); ?>
<?php //echo $form->radioButtonList($model,'fpc_booking_on',array('2'=>'Yes','1'=>'No'),array(
//                                                                                           'separator'=>'&nbsp;',
//                                                                                           'labelOptions'=>array(
//                                                                                                                 'style'=>'display: inline; margin-right: 10px; font-weight: normal;')
//                                                                                            ));
?>
<?php echo $form->labelEx($model,'Yes',array('class'=>'radiotext'));   ?>
<?php echo $form->error($model,'fpc_booking_on'); ?>

<?php echo $form->radiobutton($model,'fpc_booking_off',array('id'=>'ch2','name'=>'radio'),array('value'=>2,'uncheckValue'=>null));  ?>
<?php echo $form->labelEx($model,'No',array('class'=>'radiotext'));   ?>
<?php echo $form->error($model,'fpc_booking_off');   ?>

<?php
//<input type="radio" name="RadiobuttonGroup" id="ch1" value="Yes"><span class="radiotext">Yes</span>
//<input type="radio" name="RadiobuttonGroup" id="ch2" value="No"><span class="radiotext">No</span>
?>
    
</div>

<div id="fpc_row" style=display:none>
<?php echo $form->labelEx($model,'FPC_booking_period :'); ?>
<?php echo $form->textField($model,'FPC_booking_period',array('id'=>'FPC_booking_period'),array('style'=>'margin-left: 0px;')); ?>
<?php echo $form->error($model,'FPC_booking_period',array('class'=>'error')); ?>


<?php echo $form->labelEx($model,'Booked exchange_rate :'); ?>
<?php echo $form->textField($model,'booked_exchange_rate',array('id'=>'exchange_rate'),array('style'=>'display: none;')); ?>
<?php echo $form->error($model,'booked_exchange_rate',array('class'=>'error')); ?>
</div>

<div id="exchange_row" style=display:none>
<?php echo $form->labelEx($model,'exchange_rate :'); ?>
<?php echo $form->textField($model,'exchange_rate'); ?>
<?php echo $form->error($model,'exchange_rate',array('class'=>'error')); ?>
</div>

<div id="row">
<?php echo $form->labelEx($model,'shipment_date :'); ?>
<?php echo $form->textField($model,'shipment_date'); ?>
<?php echo $form->error($model,'shipment_date',array('class'=>'error')); ?>

<?php echo $form->labelEx($model,'eta'); ?>
<?php echo $form->textField($model,'eta'); ?>
<?php echo $form->error($model,'eta',array('class'=>'error')); ?>
</div>

<div id="row">
<?php echo $form->labelEx($model,'destination_port :'); ?>
<?php echo $form->textArea($model,'destination_port',array('id'=>'port')); ?>
<?php echo $form->error($model,'destination_port',array('class'=>'error')); ?>
</div>

<div id="row">
<?php echo $form->labelEx($model,'delivery_terms :'); ?>
<?php echo $form->textField($model,'delivery_terms',array('id'=>'deliveryterms')); ?>
<?php echo $form->error($model,'delivery_terms',array('class'=>'error')); ?>

<?php echo $form->labelEx($model,'payment_terms :'); ?>
<?php echo $form->textField($model,'payment_terms',array('id'=>'paymentterms')); ?>
<?php echo $form->error($model,'payment_terms',array('class'=>'error')); ?>
</div>
<div id="row">
<?php echo $form->labelEx($model,'total_cbm :'); ?>
<?php echo $form->textField($model,'total_cbm'); ?>
<?php echo $form->error($model,'total_cbm',array('class'=>'error')); ?>

<?php echo $form->labelEx($model,'no & Type of containers :'); ?>
<?php echo $form->textField($model,'no_type_containers',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'no_type_containers',array('class'=>'error')); ?>
</div>
</div>
<div id="wrapper">
<div id="titleback">General Details</div>
<div id="row">
<?php echo $form->labelEx($model,'agent :'); ?>
<?php echo $form->textField($model,'agent',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'agent',array('class'=>'error')); ?>

<?php echo $form->labelEx($model,'agent_commision :'); ?>
<?php echo $form->textField($model,'agent_commision'); ?>
<?php echo $form->error($model,'agent_commision',array('class'=>'error')); ?>
</div>
</div>

<div id="submitmenu">
<div class="space"><span class="required">*</span> Mandatory Fields</div>
<div class="cancelbutton"><?php echo CHtml::Button('Cancel',$model->isNewRecord ? array('submit'=>array('admin')) : array('submit'=>array('proformaInvoice/view?order='.$model->production_order_no))); ?></div>
<div class="createbutton"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></div>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
