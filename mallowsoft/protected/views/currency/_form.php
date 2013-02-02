<?php
    /* @var $this CurrencyController */
    /* @var $model Currency */
    /* @var $form CActiveForm */
    ?>



<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
                                                    'id'=>'currency-form',
                                                    'enableClientValidation'=>false,
                                                    'clientOptions'=>array('validateOnSubmit'=>true,
                                                                           ),
                                                    )); ?>

<div id="wrapper">
<div id="row">
<?php echo $form->labelEx($model,'currency_code :'); ?>
<?php echo $form->textField($model,'currency_code'); ?>
<?php echo $form->error($model,'currency_code', array('class'=>'error')); ?>
</div>

<div id="row">
<?php echo $form->labelEx($model,'currency_name :'); ?>
<?php echo $form->textField($model,'currency_name',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'currency_name', array('class'=>'error')); ?>
</div>
<div id="row">
<?php echo $form->labelEx($model,'currency_symbol :'); ?>
<?php echo $form->textField($model,'currency_symbol',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'currency_symbol', array('class'=>'error')); ?>
</div>

</div>
<div id="emptyrowcurrency">
</div>

<div id="submitmenu">
<div class="space"><span class="required">*</span> Mandatory Fields</div>
<div class="cancelbutton"><?php echo CHtml::Button('Cancel',array('submit'=>array('currency/admin'))); ?></div>

<div class="createbutton"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></div>
</div>

<?php $this->endWidget(); ?>
</div><!-- form -->