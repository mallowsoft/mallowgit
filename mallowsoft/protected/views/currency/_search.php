<?php
/* @var $this CurrencyController */
/* @var $model Currency */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

<div class="row">
    <?php echo $form->label($model,'currency_name'); ?>
    <?php echo $form->textArea($model,'currency_name',array('rows'=>6, 'cols'=>50)); ?>
</div>

<div class="row">
    <?php echo $form->label($model,'currency_symbol'); ?>
    <?php echo $form->textArea($model,'currency_symbol',array('rows'=>6, 'cols'=>50)); ?>
</div>

<div class="row">
    <?php echo $form->label($model,'currency_code'); ?>
    <?php echo $form->textArea($model,'currency_code',array('rows'=>6, 'cols'=>50)); ?>
</div>

<div class="row">
    <?php echo $form->label($model,'currency_id'); ?>
    <?php echo $form->textField($model,'currency_id'); ?>
    <?php echo CHtml::textField('sample','value'); ?>

</div>

<div class="row buttons">
    <?php echo CHtml::submitButton('Search'); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->