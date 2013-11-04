<?php
/* @var $this SalesInvoiceController */
/* @var $model SalesInvoice */
/* @var $form CActiveForm */
    if(isset($_GET['invoice_date_first']) && isset($_GET['invoice_date_last']))
    {
        $newdate = $_GET['invoice_date_first'];
        $today = $_GET['invoice_date_last'];
    }
    else
    {
        date_default_timezone_set('UTC');
        $today= date("d-m-Y");
        $newdate = strtotime ('-10 day',strtotime($today)) ;
        $newdate = date ('d-m-Y',$newdate);
    }
?>
<script>
$(document).ready(function () {
                  $.datepicker.setDefaults($.extend({},
                                                    {
                                                    dateFormat: 'dd-mm-yy',
                                                    }
                                                    )
                                           );
                  $("#date_report_first").datepicker({
                                                     onSelect: function () {
                                                     document.all ? $(this).get(0).fireEvent("onchange") : $(this).change();
                                                     this.focus();
                                                     },
                                                     onClose: function (dateText, inst) {
                                                     if (!document.all)
                                                     this.select();
                                                     }
                                                     });
                  $("#date_report_last").datepicker({
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

function test()
{
    var date1=document.getElementById('date_report_first').value;
    
    var date2=document.getElementById('date_report_last').value;
    
    var mat=/^(0[1-9]|[12][0-9]|3[01])\-(0[1-9]|1[012])\-([0-9]{4})$/;
    
    
    if(date1.match(mat) && date2.match(mat))
    {
        return true;
    }
    else if(date1 === '' && date2 === '')
    {
        alert("All entries will display because of empty date fields");
        // return false;
    }
    else
    {
        alert("Invalid Date");
        return false;
    }
}
</script>
<div id="report_box">
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>
<div id="row">
        <?php echo $form->label($model,'invoice_date From:'); ?>
        <?php
            
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                                  'name'=>'invoice_date_first',  // name of post parameter
                                                                  'value'=>$newdate,
                                                                  'id'=>'invoice_from',
                                                                  'options'=>array(
                                                                                   'dateFormat'=>'dd-mm-yy',
                                                                                   ),
                                                                  'htmlOptions'=>array(
                                                                                       'style'=>'height:20px;',
                                                                                       'id'=>'date_report_first',
                                                                                       ),
                                                                  ));
        ?>
        <?php echo $form->label($model,'To :'); ?>
        <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                                  'name'=>'invoice_date_last',
                                                                  'value'=>$today,
                                                                  'id'=>'invoice_to',
                                                                  'options'=>array(
                                                                                    'dateFormat'=>'dd-mm-yy',
                                                                                   ),
                                                                  'htmlOptions'=>array(
                                                                                       'style'=>'height:20px;',
                                                                                       'id'=>'date_report_last',
                                                                                       ),
                                                                  ));
        ?>
</div>
<div id="row">
        <?php echo $form->label($model,'invoice_no From :'); ?>
        <?php echo $form->dropDownList($model,'invoice_no_from',CHtml::listData(SalesInvoice::model()->findAll(array('order'=>'invoice_no ASC')),'invoice_no','invoice_no'),array('id'=>'invoice_no_from','prompt' => 'All'));  ?>
        <?php echo $form->label($model,'To :');  ?>
        <?php echo $form->dropDownList($model,'invoice_no_to',CHtml::listData(SalesInvoice::model()->findAll(array('order'=>'invoice_no ASC')),'invoice_no','invoice_no'),array('prompt' => 'All'));  ?>
</div>
<div id="row">
        <?php echo $form->label($model,'customer_id'); ?>
        <?php echo $form->dropDownList($model,'customer_id',CHtml::listData(Customer::model()->findAll(array('order'=>'customer_code ASC')),'customer_code_id','customer_code'),array('prompt' => 'All')); ?>
</div>
<div id="row">
<div id="report_center">
        <div class="reportbutton"><?php echo CHtml::submitButton('Report',array('onclick'=>'test();')); ?>
<?php echo CHtml::Button('PDF',array('submit'=>array('proforma/CreateSalespdf'),'onclick'=>'test();')); ?>
</div>
</div>
</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
</div>