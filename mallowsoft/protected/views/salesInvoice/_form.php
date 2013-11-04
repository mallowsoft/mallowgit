<?php
/* @var $this SalesInvoiceController */
/* @var $model SalesInvoice */
/* @var $form CActiveForm */

if(isset($_GET['proforma_invoice_id']))
{
    $proformamodel=$_GET['proforma_invoice_id'];
    $productionmodel=Proforma::model()->find('proforma_invoice_id=:proforma_invoice_id',array(':proforma_invoice_id'=>$proformamodel));
    if($productionmodel->currency_id!=null)
    {
    $currencyid=Currency::model()->find('currency_id=:currency_id',array(':currency_id'=> $productionmodel->currency_id));
    $currency=$currencyid->currency_id;
    }
    else
    {
        $currency="";
    }
    $customerid=Customer::model()->find('customer_code_id=:customer_code_id',array(':customer_code_id'=> $productionmodel->customer_id));
    if(!empty($customerid))
    {
    $customer=$customerid->customer_name;
    }
    else{
        $customer = "";
    }
     //."\n".$customerid->invoicing_address."\n".$customerid->city."\n".$customerid->country;

    if($productionmodel->exchange_rate!=0.00)
        $ex_rate=$productionmodel->exchange_rate;
    else
        $ex_rate=$productionmodel->booked_exchange_rate;
}
     $url=$_GET['url'];
     $current_page_url=Yii::app()->request->url;
//    if(strpos($current_page_url,'salesInvoice/create') == true || strpos($current_page_url,'salesInvoice/update') == true)
//    {
//        if(strpos($url,'proforma/admin') == true)
//            $u="admincreate";
//         else if((strpos($url,'proforma/proforma_report') == true && strpos($url,'salesInvoice/create') == false) || strpos($url,'salesInvoice/payment_due_report') == true)
//            $u="reportcreate";
//        else if(strpos($url,'proforma/proforma_report') == true && strpos($url,'salesInvoice/create') == true)
//            $u="salesinvoice-normal";
//        else
//            $u="salesinvoice-normal";
//    }
//    else
//    {
//        if (strpos($url,'proforma/proforma_report') == true || strpos($url,'salesInvoice/payment_due_report') || strpos($url,'commissionPayment/commission_report') || strpos($url,'salesInvoice/fob_statement') == true || strpos($url,'salesInvoice/current_year_sales_report') == true  )
//        {
//            $u="update_report";
//        }
//        else
//        {
//            $u="update";
//        }
//    }

?>
<script type="text/javascript" src="/yii/mallowsoft/javascript/reCopy.js"></script>
<?php
 //   <script type="text/javascript" src="/yii/mallowsoft/protected/controllers/javascript/reCopy.js"></script>
?>

<script type="text/javascript">
$(document).ready(function () {
                  $.datepicker.setDefaults($.extend({},
                                                    {
                                                    dateFormat: 'dd-mm-yy',
                                                    }
                                                    )
                                           );
                  $("#date_invoice").datepicker({
                                                onSelect: function () {
                                                document.all ? $(this).get(0).fireEvent("onchange") : $(this).change();
                                                this.focus();
                                                },
                                                onClose: function (dateText, inst) {
                                                if (!document.all)
                                                this.select();
                                                }
                                                });
                  $("#date_shipping").datepicker({
                                                onSelect: function () {
                                                document.all ? $(this).get(0).fireEvent("onchange") : $(this).change();
                                                this.focus();
                                                },
                                                onClose: function (dateText, inst) {
                                                if (!document.all)
                                                this.select();
                                                }
                                                });
                  $("#date_shipment_board").datepicker({
                                                onSelect: function () {
                                                document.all ? $(this).get(0).fireEvent("onchange") : $(this).change();
                                                this.focus();
                                                },
                                                onClose: function (dateText, inst) {
                                                if (!document.all)
                                                this.select();
                                                }
                                                });
                  $("#date_additional").datepicker({
                                                onSelect: function () {
                                                document.all ? $(this).get(0).fireEvent("onchange") : $(this).change();
                                                this.focus();
                                                },
                                                onClose: function (dateText, inst) {
                                                if (!document.all)
                                                this.select();
                                                }
                                                });
                  $("#date_bank_ref").datepicker({
                                                onSelect: function () {
                                                document.all ? $(this).get(0).fireEvent("onchange") : $(this).change();
                                                this.focus();
                                                },
                                                onClose: function (dateText, inst) {
                                                if (!document.all)
                                                this.select();
                                                }
                                                });
                  $("#date_due").datepicker({
                                                onSelect: function () {
                                                document.all ? $(this).get(0).fireEvent("onchange") : $(this).change();
                                                this.focus();
                                                },
                                                onClose: function (dateText, inst) {
                                                if (!document.all)
                                                this.select();
                                                }
                                                });
                  $("#date_expected_eta").datepicker({
                                                onSelect: function () {
                                                document.all ? $(this).get(0).fireEvent("onchange") : $(this).change();
                                                this.focus();
                                                },
                                                onClose: function (dateText, inst) {
                                                if (!document.all)
                                                this.select();
                                                }
                                                });
                  });
$(function(){
  var removeLink = '<a class="remove" href="#" onclick="$(this).parent().slideDown(function(){ $(this).remove() }); return false"><span class="addmorebutton"><?php echo CHtml::submitButton('Remove',array('class'=>'add','rel'=>'.clone')); ?></span></a>';
  $('a.add').relCopy({ append: removeLink});
  });
function validation()
{
    var invoice_date_value = document.getElementById('date_invoice').value;
    
    var due_date = document.getElementById('date_due').value;
    
    var date_shipment_board = document.getElementById('date_shipment_board').value;
    
    var date_expected_eta = document.getElementById('date_expected_eta').value;
    
    var date_bank_ref = document.getElementById('date_bank_ref').value;
    
    var date_shipping = document.getElementById('date_shipping').value;
    
    var date_additional = document.getElementById('date_additional').value;

    var mat=/^(0[1-9]|[12][0-9]|3[01])\-(0[1-9]|1[012])\-([0-9]{4})$/;
    
    success=true;
    
    success1 = date_validation(invoice_date_value);
    success2 = date_validation(due_date);
    success3 = date_validation(date_shipment_board);
    success4 = date_validation(date_expected_eta);
    success5 = date_validation(date_bank_ref);
    success6 = date_validation(date_shipping);
    success7 = date_validation(date_additional);

    
    if(!success1)
    {
        alert("Enter Valid Invoice Date!");
        return false;
    }

    if(!success2)
    {
        alert("Enter Valid Payment Due Date!");
        return false;
    }

    if(!success3)
    {
        alert("Enter Valid Shipment On Board Date!");
        return false;
    }
    if(!success4)
    {
        alert("Enter Valid Expected ETA Date!");
        return false;
    }
    if(!success5)
    {
        alert("Enter Valid Bank Ref Date!");
        return false;

    }
    if(!success6)
    {
        alert("Enter Valid Shipping Date!");
        return false;
    }

    if(!success7)
    {
        alert("Enter Valid  Date!");
        return false;
    }

        return true;
}
function date_validation(date_value)
{
    var mat=/^(0[1-9]|[12][0-9]|3[01])\-(0[1-9]|1[012])\-([0-9]{4})$/;
    
    if(date_value != "" && date_value.match(mat))
    {
        success=true;
        return success;
    }
    else
    {
        if(date_value == "")
        {
            return true;
        }
        else
        {
            success = false;
            return success;
        }
    }
}
</script>
<script type="text/javascript">
function test()
{
//var e="<?php echo $u; ?>";
////var ur="<?php echo $url; ?>";
//    alert(e);
//    if(e == "admincreate" || e == "salesinvoice-normal")
//    {
        history.go(-1);
//    }
//    else if(e == "update" || e == "salesinvoice")
//    {
//
//       history.go(-2);
//    }
//    else if(e == "reportcreate")
//    {
//        history.go(-2);
//    }
 //   history.go(-1);

  //  history.go(-1);
   // document.location.href = "/../yii/mallowsoft/index.php/proforma/admin";
}
function checkval()
{

    var inr_value=(document.getElementById("fc").value) * (document.getElementById("ex").value);
    document.getElementById("inr").value = inr_value;
}
</script>

<div class="form">
<?php
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sales-invoice-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
                         'validateOnSubmit'=>true,
                         'validateOnChange' => true,
                         'afterValidateAttribute' => 'js:function(form, attribute, data, hasError)
                         {
                         if(hasError)
                         {
                         $("#"+attribute.id).css({marginTop:"30px",marginBottom:"30px", backgroundColor:"pink", border:"1px solid red"});
                         }
                         else $("#"+attribute.id).css({marginTop:"",marginBottom:"", backgroundColor:"", border:""});
                         }'
                         ),
));
    date_default_timezone_set('UTC');
    
?>
<div id="wrapper">

<?php
        if($model->isNewRecord)
        {
?>

<div id="row">
        <span class="clone">
        <br><?php echo $form->labelEx($model,'production_order_no'); ?>
        <?php echo $form->dropDownList($model,'production_order_no[]',CHtml::listData(Proforma::model()->findAll(),'proforma_invoice_id','production_order_no'),array('empty'=>'--select--','options'=>array($proformamodel=>array('selected'=>'selected'))),array('class'=>'input'));  ?>
        </span>
      <a href="#" class='add' rel=".clone"><span class="addmorebutton"><?php echo CHtml::submitButton('Add More'); ?></span></a>
</div>
        <?php echo $form->error($model,'production_order_no',array('class'=>'error_select')); ?>
<?php
        }
        else
        {
            $invoice_id=ProformaSales::model()->findAll('invoice_id=:invoice_id',array(':invoice_id' => $model->invoice_id));
            if(!$invoice_id)
            {
?>
<div id="row">
<span class="clone">
<br><?php echo $form->labelEx($model,'production_order_no'); ?>
<?php echo $form->dropDownList($model,'production_order_no[]',CHtml::listData(Proforma::model()->findAll(),'proforma_invoice_id','production_order_no'),array('empty'=>'--select--','options'=>array(''=>array('selected'=>'selected'))),array('class'=>'input'));  ?>
</span>
<a href="#" class='add' rel=".clone"><span class="addmorebutton"><?php echo CHtml::submitButton('Add More'); ?></span></a>
</div>
<?php
            }
            else
            {
?>
<div id="row">
<?php
            foreach($invoice_id as $res)
            {
//                $proforma=Proforma::model()->find('proforma_invoice_id=:proforma_invoice_id',array(':proforma_invoice_id' => $res->proforma_invoice_id));
?>
        <span class="clone">
        <br><?php echo $form->labelEx($model,'production_order_no'); ?>
        <?php echo $form->dropDownList($model,'production_order_no[]',CHtml::listData(Proforma::model()->findAll(),'proforma_invoice_id','production_order_no'),array('prompt'=>'--select--','options'=> array($res->proforma_invoice_id=>array('selected'=>'selected'))),array('class'=>'input'));  ?>
        </span>
<?php
            }
?>
        <a href="#" class='add' rel=".clone"><span class="addmorebutton"><?php echo CHtml::submitButton('Add More',array('class'=>'add','rel'=>'.clone')); ?></a></span>
</div>
<?php echo $form->error($model,'production_order_no',array('class'=>'error_select')); ?>
<?php
            }
        }
?>
<div id="row">
        <?php echo $form->labelEx($model,'invoice_no'); ?>
        <?php echo $form->textField($model,'invoice_no',array('placeHolder'=>'ex: 123345')); ?>

        <?php echo $form->error($model,'invoice_no',array('class'=>'errorMessage')); ?>

		<?php echo $form->labelEx($model,'invoice_date'); ?>
        <?php $newdate = $model->isNewRecord ? date('d-m-Y') : $model->invoice_date;  ?>

        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                                    'name'=>'invoice_date',
                                                                    'value'=>$newdate,
                                                                    'options'=>array(
                                                                                     'dateFormat'=>'dd-mm-yy',
                                                                                     ),
                                                                    'htmlOptions'=>array(
                                                                                         'style'=>'height:20px;',
                                                                                         'id'=>'date_invoice',
                                                                                         'placeHolder'=>'ex: 15-05-2013',
                                                                                         ),
                                                                    ));
        ?>
		<?php echo $form->error($model,'invoice_date',array('class'=>'error_exchange','inputID'=>'date_invoice')); ?>
</div>
<div id="row">
        <?php echo $form->labelEx($model,'shipment_no'); ?>
        <?php echo $form->textField($model,'shipment_no',array('placeHolder'=>'ex: 567gg89')); ?>
        <?php echo $form->error($model,'shipment_no',array('class'=>'errorMessage')); ?>

        <?php echo $form->labelEx($model,'customer_id'); ?>
    <?php   
            if($model->isNewRecord)
                    $value=$customer;
                else
                {
                    if($model->customer_id==null)
                        $value = "";
                    else
                    {
                        if(!empty($model->customer->customer_name))
                            $value = $model->customer->customer_name;
                        else
                            $value = "";
                    }
                }
        ?>
        <?php echo $form->textArea($model,'customer_id',array('value'=> $value,'placeHolder'=>'ex: Joseph')); ?>
        <?php //."\n".$model->customer->invoicing_address."\n".$model->customer->city."\n".$model->customer->country));  ?>
        <?php //echo $form->textField($model,'customer_id_hidden',array('type'=>'hidden','value'=> $model->isNewRecord ? $customerid->customer_code : $model->customer->customer_code)); ?>
        <?php echo $form->error($model,'customer_id',array('class'=>'errorMessage')); ?>
</div>
</div>
<div id="wrapper">
<div id="row">
		<?php echo $form->labelEx($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity',array('placeHolder'=>'ex: 1000')); ?>
		<?php echo $form->error($model,'quantity',array('class'=>'errorMessage')); ?>

        <?php echo $form->labelEx($model,'unit_id'); ?>
        <?php echo $form->dropDownList($model,'unit_id',CHtml::listData(Units::model()->findAll(),'unit_id','unit_code'),array('prompt'=>'--select--','options'=>$model->isNewRecord ? array('' => array('selected'=>'selected')) : array($model->unit_id => array('selected'=>'selected')))); ?>
        <?php echo $form->error($model,'unit_id',array('class'=>'errorMessage')); ?>

		<?php echo $form->labelEx($model,'weight'); ?>
		<?php echo $form->textField($model,'weight',array('size'=>12,'maxlength'=>12,'placeHolder'=>'ex: 4000')); ?>
		<?php echo $form->error($model,'weight',array('class'=>'errorMessage')); ?>
</div>
<div id="row">
		<?php echo $form->labelEx($model,'Value in FC :'); ?>
        <?php echo $form->textField($model,'fc_value', array('id'=>'fc','placeHolder'=>'ex: 500000')); ?>
        <?php echo $form->error($model,'fc_value',array('class'=>'error_select','inputID'=>'fc')); ?>

        <?php echo $form->labelEx($model,'currency_id'); ?>
        <?php echo $form->dropDownList($model,'currency_id',CHtml::listData(Currency::model()->findAll(),'currency_id','currency_code'),array('prompt'=>'--select--','options'=>$model->isNewRecord ?  array($currency=>array('selected'=>'selected'))  : array($model->currency_id => array('selected'=>'selected'))));
        ?>
        <?php echo $form->error($model,'currency_id',array('class'=>'errorMessage')); ?>

        <?php echo $form->labelEx($model,'ex_rate :'); ?>
        <?php echo $form->textField($model,'ex_rate',array('id'=>'ex','value'=>$model->isNewRecord ? $ex_rate : null,'placeHolder'=>'ex: 4.90')); ?>
        <?php echo $form->error($model,'ex_rate',array('class'=>'errorMessage','inputID'=>'ex')); ?>
</div>
<div id="row">
        <?php echo $form->labelEx($model,'inr_value'); ?>
        <?php echo $form->textField($model,'inr_value',array('id'=>'inr','placeHolder'=>'ex: 4000000','onfocus'=>'checkval()')); ?>
        <?php echo $form->error($model,'inr_value',array('class'=>'error_select','inputID'=>'inr')); ?>
</div>
</div>
<div id="wrapper">
<div id="titleback">Payment Details</div>
<div id="row">
		<?php echo $form->labelEx($model,'payment_due_date'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                            'model' => $model,
                                                            'attribute' => 'payment_due_date',
                                                            
                                                            'options' => array(
                                                                               'dateFormat'=>'dd-mm-yy',  // optional Date formatting
                                                                               'debug'=>true,
                                                                               ),
                                                            'htmlOptions' => array(
                                                                                   'id'=>'date_due',// textField maxlength
                                                                                   'placeHolder'=>'ex: 15-05-2013',
                                                                                   ),
                                                            ));
        ?>
		<?php echo $form->error($model,'payment_due_date',array('class'=>'errorMessage')); ?>

        <?php echo $form->labelEx($model,'bank_ref_no'); ?>
		<?php echo $form->textField($model,'bank_ref_no',array('placeHolder'=>'ex: 123htyr7889',)); ?>
		<?php echo $form->error($model,'bank_ref_no',array('class'=>'errorMessage')); ?>

		<?php echo $form->labelEx($model,'bank Ref Date :'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                            'model' => $model,
                                                            'attribute' => 'payment_date',
                                                            'options' => array(
                                                                             'dateFormat'=>'dd-mm-yy',  // optional Date formatting
                                                                             'debug'=>true,
                                                                             ),
                                                            'htmlOptions' => array(
                                                                                   'id'=>'date_bank_ref',
                                                                                   'placeHolder'=>'ex: 15-05-2013',
                                                                                  ),
        )); ?>
		<?php echo $form->error($model,'payment_date',array('class'=>'errorMessage')); ?>
</div>
<div id="row">
		<?php echo $form->labelEx($model,'ecgc_payment_terms'); ?>
		<?php echo $form->textField($model,'ecgc_payment_terms',array('placeHolder'=>'ex: gfghf',)); ?>
		<?php echo $form->error($model,'ecgc_payment_terms',array('class'=>'errorMessage')); ?>

        <?php echo $form->labelEx($model,'premium_rate'); ?>
        <?php echo $form->textField($model,'premium_rate',array('placeHolder'=>'ex: 34.89')); ?>( % )
        <?php echo $form->error($model,'premium_rate',array('class'=>'errorMessage')); ?>

</div>
</div>
<div id="wrapper">
<div id="titleback">Shipment Details</div>
<div id="row">
		<?php echo $form->labelEx($model,'shipment_board_date'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                            'model' => $model,
                                                            'attribute' => 'shipment_board_date',
                                                            'options' => array(
                                                                               'dateFormat'=>'dd-mm-yy',  // optional Date formatting
                                                                               'debug'=>true,
                                                                               ),
                                                            'htmlOptions' => array(
                                                                                   'id'=>'date_shipment_board',
                                                                                   'placeHolder'=>'ex: 15-05-2013',
                                                                                   ),
        )); ?>
		<?php echo $form->error($model,'shipment_board_date',array('class'=>'errorMessage')); ?>

        <?php echo $form->labelEx($model,'feeder_vessel'); ?>
        <?php echo $form->textField($model,'feeder_vessel',array('placeHolder'=>'ex: jdfkhg')); ?>
        <?php echo $form->error($model,'feeder_vessel',array('class'=>'errorMessage')); ?>

        <?php echo $form->labelEx($model,'mother_vessel'); ?>
        <?php echo $form->textField($model,'mother_vessel',array('placeHolder'=>'ex: uruei')); ?>
        <?php echo $form->error($model,'mother_vessel',array('class'=>'errorMessage')); ?>
</div>
<div id="row">
		<?php echo $form->labelEx($model,'loading_port'); ?>
		<?php echo $form->textField($model,'loading_port',array('placeHolder'=>'ex: Chennai')); ?>
		<?php echo $form->error($model,'loading_port',array('class'=>'errorMessage')); ?>

        <?php echo $form->labelEx($model,'clearance_customs_house'); ?>
        <?php echo $form->textField($model,'clearance_customs_house',array('placeHolder'=>'ex: gffd')); ?>
        <?php echo $form->error($model,'clearance_customs_house',array('class'=>'errorMessage')); ?>

		<?php echo $form->labelEx($model,'destination_port'); ?>
		<?php echo $form->textField($model,'destination_port',array('placeHolder'=>'ex: Bangalore')); ?>
		<?php echo $form->error($model,'destination_port',array('class'=>'errorMessage')); ?>
</div>
<div id="row">
        <?php echo $form->labelEx($model,'expected_eta_date'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                            'model' => $model,
                                                            'attribute' => 'expected_eta_date',
                                                            'options' => array(
                                                                               'dateFormat'=>'dd-mm-yy',  // optional Date formatting
                                                                               'debug'=>true,
                                                                               ),
                                                            'htmlOptions' => array(
                                                                                   'id'=>'date_expected_eta',
                                                                                   'placeHolder'=>'ex: 15-05-2013',
                                                                                   ),
        )); ?>
        <?php echo $form->error($model,'expected_eta_date',array('class'=>'errorMessage')); ?>

		<?php echo $form->labelEx($model,'shipping_bill_no'); ?>
		<?php echo $form->textField($model,'shipping_bill_no',array('placeHolder'=>'ex: 7887fg7899')); ?>
		<?php echo $form->error($model,'shipping_bill_no',array('class'=>'errorMessage')); ?>

        <?php echo $form->labelEx($model,'shipping_date :'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                            'model' => $model,
                                                            'attribute' => 'shipping_date',
                                                            'options' => array(
                                                                               'dateFormat'=>'dd-mm-yy',  // optional Date formatting
                                                                               'debug'=>true,
                                                                               ),
                                                            'htmlOptions' => array(
                                                                                   'placeHolder'=>'ex: 15-05-2013',
                                                                                   'id'=>'date_shipping',
                                                                                   ),
                                                            )); ?>
        <?php echo $form->error($model,'shipping_date',array('class'=>'errorMessage')); ?>
</div>
<div id="row">
        <?php echo $form->labelEx($model,'additional_bill_no'); ?>
        <?php echo $form->textField($model,'additional_bill_no',array('placeHolder'=>'ex: 787879hjg89')); ?>
        <?php echo $form->error($model,'additional_bill_no',array('class'=>'errorMessage')); ?>


        <?php echo $form->labelEx($model,'Date :'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                            'model' => $model,
                                                            'attribute' => 'additional_date',
                                                            'options' => array(
                                                                               'dateFormat'=>'dd-mm-yy',  // optional Date formatting
                                                                               'debug'=>true,
                                                                               ),
                                                            'htmlOptions' => array(
                                                                                   'placeHolder'=>'ex: 15-05-2013',
                                                                                   'id'=>'date_additional',
                                                                                   ),
                                                            )); ?>
        <?php echo $form->error($model,'additional_date',array('class'=>'errorMessage')); ?>

		<?php echo $form->labelEx($model,'house_agent'); ?>
		<?php echo $form->textField($model,'house_agent',array('placeHolder'=>'ex: Bishop')); ?>
		<?php echo $form->error($model,'house_agent',array('class'=>'errorMessage')); ?>
</div>
<div id="row">
        <?php echo $form->labelEx($model,'forwarder_name'); ?>
        <?php echo $form->textField($model,'forwarder_name',array('placeHolder'=>'ex: Joseph')); ?>
        <?php echo $form->error($model,'forwarder_name',array('class'=>'errorMessage')); ?>
</div>
</div>
<div id="wrapper">
<div id="titleback">Receivables</div>
<div id="row">
        <?php echo $form->labelEx($model,'drawback_receivable'); ?>
        <?php echo $form->textField($model,'drawback_receivable',array('placeHolder'=>'ex: 8978')); ?>
        <?php echo $form->error($model,'drawback_receivable',array('class'=>'errorMessage')); ?>

        <?php echo $form->labelEx($model,'fps_receivable'); ?>
        <?php echo $form->textField($model,'fps_receivable',array('placeHolder'=>'ex: 4566')); ?>
        <?php echo $form->error($model,'fps_receivable',array('class'=>'errorMessage')); ?>
</div>

<div id="row">

        <?php echo $form->labelEx($model,'mlfps_payable'); ?>
        <?php echo $form->textField($model,'mlfps_payable',array('placeHolder'=>'ex: 500000')); ?>
        <?php echo $form->error($model,'mlfps_payable',array('class'=>'errorMessage')); ?>

        <?php echo $form->labelEx($model,'information_fps_mlfps'); ?>
        <?php echo $form->textField($model,'information_fps_mlfps',array('placeHolder'=>'ex: jhjkh')); ?>
        <?php echo $form->error($model,'information_fps_mlfps',array('class'=>'errorMessage')); ?>

</div>
</div>
<div id="wrapper">
<div id="titleback">Payables</div>
<div id="row">
        <?php echo $form->labelEx($model,'freight_payable'); ?>
        <?php echo $form->textField($model,'freight_payable',array('placeHolder'=>'ex: 50000')); ?>
        <?php echo $form->error($model,'freight_payable',array('class'=>'errorMessage')); ?>

        <?php echo $form->labelEx($model,'clearance_cost_payable'); ?>
        <?php echo $form->textField($model,'clearance_cost_payable',array('placeHolder'=>'ex: 4000')); ?>
        <?php echo $form->error($model,'clearance_cost_payable',array('class'=>'errorMessage')); ?>
</div>

<div id="row">
        <?php echo $form->labelEx($model,'insurance_payable'); ?>
        <?php echo $form->textField($model,'insurance_payable',array('placeHolder'=>'ex: 50000')); ?>
        <?php echo $form->error($model,'insurance_payable',array('class'=>'errorMessage')); ?>

        <?php echo $form->labelEx($model,'other_costs_payable'); ?>
        <?php echo $form->textField($model,'other_costs_payable',array('placeHolder'=>'ex: 5000')); ?>
        <?php echo $form->error($model,'other_costs_payable',array('class'=>'errorMessage')); ?>
</div>
</div>
<div id="submitmenu">
<div class="space"><span class="required">*</span> Mandatory Fields</div>
<?php
//$urlstring2 = str_replace(Yii::app()->baseUrl ."/", "", Yii::app()->request->urlReferrer);
//$ele = explode("/", $urlstring2);
?>
<div class="cancelbutton"><?php echo CHtml::Button('Cancel',array('onclick'=>'test();')); ?></div>
<div class="createbutton"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('onclick'=>'return validation();')); ?></div>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->