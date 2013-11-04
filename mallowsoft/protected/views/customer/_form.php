<?php
    /* @var $this CustomerController */
    /* @var $model Customer */
    /* @var $form CActiveForm */
    ?>
<script>
function CopyAdd(cb)
{
    var invoice_address = document.getElementById("invoice_address").value;
    var invoice_city = document.getElementById("invoice_city").value;
    var invoice_country = document.getElementById("invoice_country").value;
    var invoice_pincode = document.getElementById("invoice_pincode").value;
    var invoice_phone = document.getElementById("invoice_phone").value;
//    var invoice_email = document.getElementById("invoice_email").value;
    
    if (cb.checked)
    {
        document.getElementById("delivery_address").value = invoice_address;
        document.getElementById("delivery_city").value = invoice_city;
        document.getElementById("delivery_country").value = invoice_country;
        document.getElementById("delivery_pincode").value = invoice_pincode;
        document.getElementById("delivery_phone").value = invoice_phone;
  //      document.getElementById("delivery_email").value = invoice_email;
        
    }
    else
    {
        document.getElementById("delivery_address").value = '';
        document.getElementById("delivery_city").value = '';
        document.getElementById("delivery_country").value = '';
        document.getElementById("delivery_pincode").value = '';
        document.getElementById("delivery_phone").value = '';
   //     document.getElementById("delivery_email").value = '';
    }
}
function test()
{
document.location.href = "/../yii/mallowsoft/index.php/customer/admin";
}
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
                                                    'id'=>'customer-form',
                                                    'enableClientValidation'=>true,
                                                    'clientOptions'=>array(
                                                                           'validateOnSubmit'=>true,
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
?>

<div id="wrapper">
<div id="row">
    <?php echo $form->labelEx($model,'customer_code'); ?>
    <?php echo $form->textField($model,'customer_code',array('rows'=>6, 'cols'=>50,'placeHolder'=>'ex: Joe')); ?>
    <?php echo $form->error($model,'customer_code',array('class'=>'errorMessage')); ?>

    <?php echo $form->labelEx($model,'customer_name'); ?>
    <?php echo $form->textField($model,'customer_name',array('rows'=>6, 'cols'=>50,'placeHolder'=>'ex: Joseph')); ?>
    <?php echo $form->error($model,'customer_name',array('class'=>'errorMessage')); ?>
</div>

<div id="row">
    <?php echo $form->labelEx($model,'invoicing_address'); ?>
    <?php echo $form->textArea($model,'invoicing_address',array('id'=>'invoice_address','placeHolder'=>'ex: 7,New street Perth.')); ?>
    <?php echo $form->error($model,'invoicing_address',array('class'=>'errorMessage')); ?>
</div>

<div id="row">
    <?php echo $form->labelEx($model,'city'); ?>
    <?php echo $form->textField($model,'city',array('id'=>'invoice_city','placeHolder'=>'ex: Perth')); ?>
    <?php echo $form->error($model,'city',array('class'=>'errorMessage')); ?>

    <?php echo $form->labelEx($model,'country'); ?>
    <?php echo $form->textField($model,'country',array('id'=>'invoice_country','placeHolder'=>'ex: Australia')); ?>
    <?php echo $form->error($model,'country',array('class'=>'errorMessage')); ?>

    <?php echo $form->labelEx($model,'pincode'); ?>
    <?php echo $form->textField($model,'pincode',array('id'=>'invoice_pincode','placeHolder'=>'ex: 36804')); ?>
    <?php echo $form->error($model,'pincode',array('class'=>'errorMessage')); ?>
</div>

<div id="row">
    <?php echo CHtml::activeLabel($model,'phone_primary'); ?>
    <?php echo $form->textField($model,'phone_primary',array('id'=>'invoice_phone','placeHolder'=>'ex: 000-800-100-3777')); ?>
    <?php echo $form->error($model,'phone_primary',array('class'=>'errorMessage')); ?>

    <?php echo CHtml::activeLabel($model,'phone_alternative'); ?>
    <?php echo $form->textField($model,'phone_alternative',array('placeHolder'=>'ex: 000-800-100-3345')); ?>
    <?php echo $form->error($model,'phone_alternative',array('class'=>'errorMessage')); ?>
</div>

<div id="row">
    <?php echo $form->labelEx($model,'email'); ?>
    <?php echo $form->textField($model,'email',array('placeHolder'=>'ex: mallow@yahoo.com')); ?>
    <?php echo $form->error($model,'email',array('class'=>'errorMessage')); ?>

    <?php echo $form->labelEx($model,'destination_port'); ?>
    <?php echo $form->textField($model,'destination_port',array('id'=>'port','placeHolder'=>'ex: California')); ?>
    <?php echo $form->error($model,'destination_port',array('class'=>'errorMessage')); ?>
</div>
</div>
<div id="wrapper">
<div id="titleback">Delivery Details</div>
<div id="row">
    <?php echo $form->labelEx($model,'delivery_address'); ?>
    <?php echo $form->textArea($model,'delivery_address',array('id'=>'delivery_address','placeHolder'=>'ex: 46,New Street Alabama.')); ?>
    <?php echo $form->error($model,'delivery_address',array('class'=>'errorMessage')); ?>
    <?php if($model->isNewRecord)
        {
    ?>
        
        <input id="sameadd" name="sameadd" type="checkbox" value="Sameadd" onchange="CopyAdd(this);" />
    <?php
        }
        else
        {
            if(!empty($model->invoicing_address))
            {
            if($model->invoicing_address==$model->delivery_address && $model->city==$model->delivery_city && $model->country==$model->delivery_country && $model->pincode==$model->delivery_pincode)
            {
     ?>
            <input id="sameadd" name="sameadd" type="checkbox" value="Sameadd" onchange="CopyAdd(this);" checked/>
    <?php
            }

            else
            {
    ?>
            <input id="sameadd" name="sameadd" type="checkbox" value="Sameadd" onchange="CopyAdd(this);" />
    <?php
            }
            }
            else
            {
    ?>
            <input id="sameadd" name="sameadd" type="checkbox" value="Sameadd" onchange="CopyAdd(this);" />
    <?php
            }
        }
    ?>
    <span class="checknote">Check if Invoicing Address  Same as Delivery Address</span>
</div>
<div id="row">

    <?php echo $form->labelEx($model,'delivery_city'); ?>
    <?php echo $form->textField($model,'delivery_city',array('id'=>'delivery_city','placeHolder'=>'ex: Alabama'));  ?>
    <?php echo $form->error($model,'delivery_city',array('class'=>'errorMessage')); ?>

    <?php echo $form->labelEx($model,'delivery_country');  ?>
    <?php echo $form->textField($model,'delivery_country',array('id'=>'delivery_country','placeHolder'=>'ex: USA'));  ?>
    <?php echo $form->error($model,'delivery_country',array('class'=>'errorMessage')); ?>

    <?php echo $form->labelEx($model,'delivery_pincode');  ?>
    <?php echo $form->textField($model,'delivery_pincode',array('id'=>'delivery_pincode','placeHolder'=>'ex: 36790'));  ?>
    <?php echo $form->error($model,'delivery_pincode',array('class'=>'errorMessage'));  ?>
</div>
<div id="row">

    <?php echo CHtml::activeLabel($model,'delivery_phone');  ?>
    <?php echo $form->textField($model,'delivery_phone',array('id'=>'phone','placeHolder'=>'ex: 000-800-100-3345'));  ?>
    <?php echo $form->error($model,'delivery_phone',array('class'=>'errorMessage')); ?>

    <?php echo $form->labelEx($model,'delivery_email');  ?>
    <?php echo $form->textField($model,'delivery_email',array('placeHolder'=>'ex: siangsee@gmail.com'));  ?>
    <?php echo $form->error($model,'delivery_email',array('class'=>'errorMessage'));  ?>

</div>
<div id="row">

    <?php echo $form->labelEx($model,'currency_id');  ?>
    <?php echo $form->dropDownList($model,'currency_id',CHtml::listData(Currency::model()->findAll(),'currency_id','currency_code'),array('prompt'=>'--select--','options'=> $model->isNewRecord ? array(''=>array('selected'=>'selected')) : array($model->currency_id=>array('selected'=>'selected'))));  ?>
    <?php echo $form->error($model,'currency_id',array('class'=>'errorMessage'));  ?>

    <?php echo $form->labelEx($model,'delivery_terms_id');  ?>
    <?php echo $form->dropDownList($model,'delivery_terms_id',CHtml::listData(deliveryTerms::model()->findAll(),'delivery_terms_id','delivery_terms_code'),array('prompt' => '--select--','options'=> $model->isNewRecord ? array(''=>array('selected'=>'selected')) : array($model->delivery_terms_id=>array('selected'=>'selected'))));  ?>
    <?php echo $form->error($model,'delivery_terms_id',array('class'=>'errorMessage'));  ?>

    <?php echo $form->labelEx($model,'payment_terms_id');  ?>
    <?php echo $form->dropDownList($model,'payment_terms_id',CHtml::listData(paymentTerms::model()->findAll(),'payment_terms_id','payment_terms_code'),array('prompt'=>'--select--','options'=> $model->isNewRecord ? array(''=>array('selected'=>'selected')) : array($model->payment_terms_id=>array('selected'=>'selected'))));  ?>
    <?php echo $form->error($model,'payment_terms_id',array('class'=>'errorMessage'));  ?>

</div>
<div id="row">
    <?php echo $form->labelEx($model,'agent_id');  ?>
    <?php echo $form->dropDownList($model,'agent_id',CHtml::listData(Agent::model()->findAll(),'agent_id','agent_code'),array('prompt'=>'--select--','options'=> $model->isNewRecord ? array(''=>array('selected'=>'selected')) : array($model->agent_id=>array('selected'=>'selected'))));  ?>
    <?php echo $form->error($model,'agent_id',array('class'=>'errorMessage'));  ?>

</div>
</div>
<div id="submitmenu">
<div class="space"><span class="required">*</span> Mandatory Fields</div>
<div class="cancelbutton"><?php echo CHtml::submitButton('Cancel',array('onClick'=>'test();'));  ?></div>
<div class="createbutton"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save');  ?></div>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->