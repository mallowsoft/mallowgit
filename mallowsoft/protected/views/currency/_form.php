<?php
    /* @var $this CurrencyController */
    /* @var $model Currency */
    /* @var $form CActiveForm */
?>
<script>
function test()
{
document.location.href = "/../yii/mallowsoft/index.php/currency/admin";
}
</script>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
                                                    'id'=>'currency-form',
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
                                                    ));
?>
<div id="wrapper">
<div id="row">
<?php echo $form->labelEx($model,'currency_name'); ?>
<?php echo $form->textField($model,'currency_name',array('rows'=>6, 'cols'=>50,'placeHolder'=>'ex: Dollar')); ?>
<?php echo $form->error($model,'currency_name', array('class'=>'error_select')); ?>
</div>
<div id="row">
<?php echo $form->labelEx($model,'currency_symbol'); ?>
<?php echo $form->textField($model,'currency_symbol',array('rows'=>6, 'cols'=>50,'placeHolder'=>'ex: $')); ?>
<?php echo $form->error($model,'currency_symbol', array('class'=>'error_select')); ?>
</div>
<div id="row">
<?php echo $form->labelEx($model,'currency_code'); ?>
<?php echo $form->textField($model,'currency_code',array('rows'=>6, 'cols'=>50,'placeHolder'=>'ex: dollar')); ?>
<?php echo $form->error($model,'currency_code', array('class'=>'errorMessage')); ?>
</div>

</div>
<div id="emptyrowcurrency">
</div>

<div id="submitmenu">
<div class="space"><span class="required">*</span> Mandatory Fields</div>
<div class="cancelbutton"><?php echo CHtml::Button('Cancel',array('onClick'=>'test();')); ?></div>
<div class="createbutton"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></div>
</div>

<?php $this->endWidget(); ?>
</div><!-- form -->