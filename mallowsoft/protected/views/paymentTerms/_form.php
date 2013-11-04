<?php
    /* @var $this Payment_TermsController */
    /* @var $model Payment_Terms */
    /* @var $form CActiveForm */
    ?>
<script>
function test()
{
    document.location.href = "/../yii/mallowsoft/index.php/paymentTerms/admin";
}
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
                                                    'id'=>'payment--terms-form',
                                                    'enableClientValidation'=>true,
                                                    'clientOptions'=>array(
                                                                           'validateOnSubmit'=>true,
                                                                           'afterValidateAttribute' => 'js:function(form, attribute, data, hasError)
                                                                           {
                                                                           if(hasError)
                                                                           {
                                                                           $("#"+attribute.id).css({marginTop:"30px",marginBottom:"5px", backgroundColor:"pink", border:"1px solid red"});
                                                                           }
                                                                           else $("#"+attribute.id).css({marginTop:"",marginBottom:"", backgroundColor:"", border:""});
                                                                           }'
                                                                           ),
                                                    )); ?>


<?php //echo $form->errorSummary($model); ?>

<div id="wrapper">
<div id="row">
<?php echo $form->labelEx($model,'payment_terms_code'); ?>
<?php echo $form->textField($model,'payment_terms_code',array('placeHolder'=>'ex: text')); ?>
<?php echo $form->error($model,'payment_terms_code', array('class'=>'error_select')); ?>
</div>
<div id="row">
<?php echo $form->labelEx($model,'payment_terms'); ?>
<?php echo $form->textField($model,'payment_terms',array('placeHolder'=>'ex: text')); ?>
<?php echo $form->error($model,'payment_terms', array('class'=>'error_select')); ?>
</div>
<div id="row">
<?php echo $form->labelEx($model,'information'); ?>
<?php echo $form->textArea($model,'information',array('rows'=>6, 'cols'=>50,'placeHolder'=>'ex: text')); ?>
<?php echo $form->error($model,'information', array('class'=>'errorMessage')); ?>
</div>
</div>

<div id="emptyrowpayment">
</div>
<div id="submitmenu">
<div class="space"><span class="required">*</span> Mandatory Fields</div>
<div class="cancelbutton"><?php echo CHtml::Button('Cancel',array('onClick'=>'test();')); ?></div>
<div class="createbutton"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></div>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->