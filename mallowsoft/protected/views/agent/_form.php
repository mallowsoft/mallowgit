<?php
    /* @var $this AgentController */
    /* @var $model Agent */
    /* @var $form CActiveForm */
    ?>
<script>
function test()
{
    document.location.href = "/../yii/mallowsoft/index.php/agent/admin";
}

</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
                                                    'id'=>'agent-form',
                                                    'enableClientValidation'=>true,
                                                    'clientOptions'=>array(
                                                                           'validateOnSubmit'=>true,
                                                                           'afterValidateAttribute' => 'js:function(form, attribute, data, hasError)
                                                                           {
                                                                           if(hasError)
                                                                           {
                                                                           //alert(attribute.id);
                                                                           $("#"+attribute.id).css({marginTop:"30px",marginBottom:"30px", backgroundColor:"pink", border:"1px solid red"});
                                                                           }
                                                                           else $("#"+attribute.id).css({marginTop:"",marginBottom:"", backgroundColor:"", border:""});
                                                                           }'
                                                                           ),
                                                    ));
?>

<div id="wrapper">
<div id="row">
<?php echo $form->labelEx($model,'agent_code'); ?>
<?php echo $form->textField($model,'agent_code',array('placeHolder'=>'ex: John')); ?>
<?php echo $form->error($model,'agent_code',array('class'=>'errorMessage')); ?>

<?php echo $form->labelEx($model,'agent_name'); ?>
<?php echo $form->textField($model,'agent_name',array('rows'=>6, 'cols'=>50,'placeHolder'=>'ex: John Britto')); ?>
<?php echo $form->error($model,'agent_name',array('class'=>'errorMessage')); ?>
</div>
<div id="row">
<?php echo $form->labelEx($model,'address'); ?>
<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50,'placeHolder'=>'ex: 47,New Street Alabama.')); ?>
<?php echo $form->error($model,'address',array('class'=>'errorMessage')); ?>

<?php echo $form->labelEx($model,'pincode'); ?>
<?php echo $form->textField($model,'pincode',array('rows'=>6, 'cols'=>50,'placeHolder'=>'ex: 675894')); ?>
<?php echo $form->error($model,'pincode',array('class'=>'errorMessage')); ?>
</div>

<div id="row">
<?php echo $form->labelEx($model,'city'); ?>
<?php echo $form->textField($model,'city',array('rows'=>6, 'cols'=>50,'placeHolder'=>'ex: Alabama')); ?>
<?php echo $form->error($model,'city',array('class'=>'errorMessage')); ?>

<?php echo $form->labelEx($model,'country'); ?>
<?php echo $form->textField($model,'country',array('rows'=>6, 'cols'=>50,'placeHolder'=>'ex: Australia')); ?>
<?php echo $form->error($model,'country',array('class'=>'errorMessage')); ?>
</div>

<div id="row">
<?php echo $form->labelEx($model,'phone_primary'); ?>
<?php echo $form->textField($model,'phone_primary',array('placeHolder'=>'ex: 0801-86540056')); ?>
<?php echo $form->error($model,'phone_primary',array('class'=>'errorMessage')); ?>

<?php echo $form->labelEx($model,'phone_alternative'); ?>
<?php echo $form->textField($model,'phone_alternative',array('placeHolder'=>'ex: 0801-865400577')); ?>
<?php echo $form->error($model,'phone_alternative',array('class'=>'errorMessage')); ?>
</div>

<div id="row">
<?php echo $form->labelEx($model,'email'); ?>
<?php echo $form->textField($model,'email',array('placeHolder'=>'ex: siangsea@yahoo.com')); ?>
<?php echo $form->error($model,'email',array('class'=>'errorMessage')); ?>

<?php echo $form->labelEx($model,'agent_commission'); ?>
<?php echo $form->textField($model,'agent_commission',array('placeHolder'=>'ex: 2.9')); ?>( % )
<?php echo $form->error($model,'agent_commission',array('class'=>'errorMessage')); ?>
</div>
</div>

<div id="submitmenu">
<div class="space"><span class="required">*</span> Mandatory Fields</div>
<div class="cancelbutton"><?php echo CHtml::Button('Cancel',array('onClick'=>'test();')); ?></div>
<div class="createbutton"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></div>
</div>


<?php $this->endWidget(); ?>

</div><!-- form -->