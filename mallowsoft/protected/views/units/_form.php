<?php
/* @var $this UnitsController */
/* @var $model Units */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'units-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true,
                          ),
));
?>

<div id="wrapper">
<div id="row">

		<?php echo $form->labelEx($model,'unit_name'); ?>
		<?php echo $form->textField($model,'unit_name',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'unit_name'); ?>
</div>
<div id="row">
		<?php echo $form->labelEx($model,'unit_code'); ?>
		<?php echo $form->textField($model,'unit_code',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'unit_code'); ?>
</div>
</div>
<div id="emptyrowcurrency">
</div>
<div id="submitmenu">
<div class="space"><span class="required">*</span> Mandatory Fields</div>
<div class="cancelbutton"><?php echo CHtml::Button('Cancel',array('submit'=>array('units/admin'))); ?></div>

<div class="createbutton"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></div>
</div>


<?php $this->endWidget(); ?>

</div><!-- form -->