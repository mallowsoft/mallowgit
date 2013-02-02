<?php
    /* @var $this Payment_TermsController */
    /* @var $model Payment_Terms */
    /* @var $form CActiveForm */
    ?>


<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
                                                    'id'=>'payment--terms-form',
                                                    'enableAjaxValidation'=>false,
                                                    )); ?>


<?php //echo $form->errorSummary($model); ?>

<div id="wrapper">
<div id="row">
<?php echo $form->labelEx($model,'payment_terms_code :'); ?>
<?php echo $form->textField($model,'payment_terms_code'); ?>
<?php echo $form->error($model,'payment_terms_code', array('class'=>'error')); ?>
</div>
<div id="row">
<?php echo $form->labelEx($model,'payment_terms :'); ?>
<?php echo $form->textField($model,'payment_terms'); ?>
<?php echo $form->error($model,'payment_terms', array('class'=>'error')); ?>
</div>
<div id="row">
<?php echo $form->labelEx($model,'information :'); ?>
<?php echo $form->textArea($model,'information',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'information', array('class'=>'error')); ?>
</div>
</div>

<div id="emptyrowpayment">
</div>
<div id="submitmenu">
<div class="space"><span class="required">*</span> Mandatory Fields</div>
<div class="cancelbutton"><?php echo CHtml::Button('Cancel',array('submit'=>array('paymentTerms/admin'))); ?></div>
<div class="createbutton"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></div>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->