<?php
    /* @var $this AgentController */
    /* @var $model Agent */
    /* @var $form CActiveForm */
    ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'agent-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array('validateOnSubmit'=>true,
                               ),
        ));
?>

<div id="wrapper">
<div id="row">
<?php echo $form->labelEx($model,'agent_code :'); ?>
<?php echo $form->textField($model,'agent_code'); ?>
<?php echo $form->error($model,'agent_code',array('class'=>'error')); ?>

<?php echo $form->labelEx($model,'agent_name :'); ?>
<?php echo $form->textField($model,'agent_name',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'agent_name',array('class'=>'error')); ?>
</div>
<div id="row">
<?php echo $form->labelEx($model,'address :'); ?>
<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'address',array('class'=>'error')); ?>
</div>

<div id="row">
<?php echo $form->labelEx($model,'city :'); ?>
<?php echo $form->textField($model,'city',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'city',array('class'=>'error')); ?>

<?php echo $form->labelEx($model,'country :'); ?>
<?php echo $form->textField($model,'country',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'country',array('class'=>'error')); ?>
</div>

<div id="row">
<?php echo $form->labelEx($model,'phone_primary :'); ?>
<?php echo $form->textField($model,'phone_primary'); ?>
<?php echo $form->error($model,'phone_primary',array('class'=>'error')); ?>

<?php echo $form->labelEx($model,'phone_alternative :'); ?>
<?php echo $form->textField($model,'phone_alternative'); ?>
<?php echo $form->error($model,'phone_alternative',array('class'=>'error')); ?>
</div>

<div id="row">
<?php echo $form->labelEx($model,'email :'); ?>
<?php echo $form->textField($model,'email'); ?>
<?php echo $form->error($model,'email',array('class'=>'error')); ?>
</div>
</div>

<div id="submitmenu">
<div class="space"><span class="required">*</span> Mandatory Fields</div>
<div class="cancelbutton"><?php echo CHtml::Button('Cancel',array('submit'=>array('agent/admin'))); ?></div>

<div class="createbutton"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></div>
</div>


<?php $this->endWidget(); ?>

</div><!-- form -->