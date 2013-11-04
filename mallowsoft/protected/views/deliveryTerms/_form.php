<?php
    /* @var $this DeliveryTermsController */
    /* @var $model DeliveryTerms */
    /* @var $form CActiveForm */
    ?>
<script>
function test()
{
    //  alert("hi");
    
    document.location.href = "/../yii/mallowsoft/index.php/deliveryTerms/admin";
    // return true;
}
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
                                                    'id'=>'delivery-terms-form',
                                                   // 'enableAjaxValidation'=>false,
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
    <?php echo $form->labelEx($model,'delivery_terms_code'); ?>
    <?php echo $form->textField($model,'delivery_terms_code',array('placeHolder'=>'ex: C&F')); ?>
    <?php echo $form->error($model,'delivery_terms_code', array('class'=>'error_select')); ?>
</div>
<div id="row">
    <?php echo $form->labelEx($model,'delivery_terms'); ?>
    <?php echo $form->textField($model,'delivery_terms',array('placeHolder'=>'ex: COST AND FREIGHT')); ?>
    <?php echo $form->error($model,'delivery_terms', array('class'=>'error_select')); ?>
</div>
<div id="row">
    <?php echo $form->labelEx($model,'information'); ?>
    <?php echo $form->textArea($model,'information',array('rows'=>6, 'cols'=>50,'placeHolder'=>'ex: text')); ?>
    <?php echo $form->error($model,'information', array('class'=>'errorMessage')); ?>
</div>
</div>

<div id="emptyrowdelivery">
</div>
<div id="submitmenu">
<div class="space"><span class="required">*</span> Mandatory Fields</div>

<div class="cancelbutton"><?php echo CHtml::Button('Cancel',array('onClick'=>'test();')); ?></div>
<div class="createbutton"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></div>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->