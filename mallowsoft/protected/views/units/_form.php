<?php
/* @var $this UnitsController */
/* @var $model Units */
/* @var $form CActiveForm */
?>
<script>
function test()
{
    //  alert("hi");
    
    document.location.href = "/../yii/mallowsoft/index.php/units/admin";
    // return true;
}
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'units-form',
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

		<?php echo $form->labelEx($model,'unit_name'); ?>
		<?php echo $form->textField($model,'unit_name',array('placeHolder'=>'ex: Meters')); ?>
		<?php echo $form->error($model,'unit_name',array('class'=>'error_select')); ?>
</div>
<div id="row">
		<?php echo $form->labelEx($model,'unit_code'); ?>
        <?php echo $form->textField($model,'unit_code',array('placeHolder'=>'ex: mts')); ?>
		<?php echo $form->error($model,'unit_code',array('class'=>'error_select')); ?>
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