<?php
    /* @var $this DeliveryTermsController */
    /* @var $model DeliveryTerms */
    /* @var $form CActiveForm */
    ?>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
                                                    'id'=>'delivery-terms-form',
                                                    'enableClientValidation'=>false,
                                                    'clientOptions'=>array('validateOnSubmit'=>true,
                                                                           ),
                                                    )); ?>


<?php //echo $form->errorSummary($model); ?>
<div id="wrapper">
<div id="row">
<?php echo $form->labelEx($model,'delivery_terms_code :'); ?>
<?php echo $form->textField($model,'delivery_terms_code'); ?>
<?php echo $form->error($model,'delivery_terms_code', array('class'=>'error')); ?>
</div>
<div id="row">
<?php echo $form->labelEx($model,'delivery_terms :'); ?>
<?php echo $form->textField($model,'delivery_terms',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'delivery_terms', array('class'=>'error')); ?>
</div>
<div id="row">
<?php echo $form->labelEx($model,'information :'); ?>
<?php echo $form->textArea($model,'information',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'information', array('class'=>'error')); ?>
</div>
</div>

<div id="emptyrowdelivery">
</div>
<div id="submitmenu">
<div class="space"><span class="required">*</span> Mandatory Fields</div>

<div class="cancelbutton"><?php echo CHtml::Button('Cancel',array('submit'=>array('deliveryTerms/admin'))); ?></div>
<div class="createbutton"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></div>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->