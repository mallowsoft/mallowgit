<?php
    /* @var $this CustomerController */
    /* @var $model Customer */
    /* @var $form CActiveForm */
    ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
                                                    'id'=>'customer-form',
                                                    'enableClientValidation'=>false,
                                                    'clientOptions'=>array('validateOnSubmit'=>true,
                                                                           ),
                                                    ));
?>

<div id="wrapper">
<div id="row">
<?php echo $form->labelEx($model,'customer_code :'); ?>
<?php echo $form->textField($model,'customer_code',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'customer_code',array('class'=>'error')); ?>

<?php echo $form->labelEx($model,'customer_name :'); ?>
<?php echo $form->textField($model,'customer_name',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'customer_name',array('class'=>'error')); ?>
</div>

<div id="row">
<?php echo $form->labelEx($model,'invoicing_address :'); ?>
<?php echo $form->textArea($model,'invoicing_address',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'invoicing_address',array('class'=>'error')); ?>
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
<?php echo $form->textField($model,'email',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'email',array('class'=>'error')); ?>

<?php echo $form->labelEx($model,'destination_port :'); ?>
<?php echo $form->textArea($model,'destination_port',array('id'=>'port')); ?>
<?php echo $form->error($model,'destination_port',array('class'=>'error')); ?>
</div>
</div>
<div id="wrapper">
<div id="titleback">Delivery Details</div>
<div id="row">
<?php echo $form->labelEx($model,'delivery_address :'); ?>
<?php echo $form->textArea($model,'delivery_address',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'delivery_address',array('class'=>'error')); ?>
</div>
<div id="row">

<?php echo $form->labelEx($model,'delivery_city :'); ?>
<?php echo $form->textField($model,'delivery_city',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'delivery_city',array('class'=>'error')); ?>

<?php echo $form->labelEx($model,'delivery_country :'); ?>
<?php echo $form->textField($model,'delivery_country',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'delivery_country',array('class'=>'error')); ?>
</div>
<div id="row">

<?php echo $form->labelEx($model,'delivery_phone :'); ?>
<?php echo $form->textField($model,'delivery_phone'); ?>
<?php echo $form->error($model,'delivery_phone',array('class'=>'error')); ?>

<?php echo $form->labelEx($model,'delivery_email :'); ?>
<?php echo $form->textField($model,'delivery_email',array('rows'=>6, 'cols'=>50)); ?>
<?php echo $form->error($model,'delivery_email',array('class'=>'error')); ?>

</div>
<div id="row">

<?php echo $form->labelEx($model,'currency :'); ?>
<?php echo $form->dropDownList($model,'currency_id',CHtml::listData(Currency::model()->findAll(),'currency_id','currency_code'),array('prompt'=>$model->isNewRecord ? 'select Currency' : null));  ?>
<?php echo $form->error($model,'currency_id',array('class'=>'error')); ?>

<?php echo $form->labelEx($model,'delivery Terms :'); ?>
<?php echo $form->dropDownList($model,'delivery_terms_id',CHtml::listData(deliveryTerms::model()->findAll(),'delivery_terms_id','delivery_terms_code'),array('prompt' => $model->isNewRecord ? 'select Delivery Terms' : null));  ?>
<?php echo $form->error($model,'delivery_terms_id',array('class'=>'error')); ?>

<?php echo $form->labelEx($model,'payment Terms :'); ?>
<?php echo $form->dropDownList($model,'payment_terms_id',CHtml::listData(paymentTerms::model()->findAll(),'payment_terms_id','payment_terms_code'),array('prompt'=>$model->isNewRecord ? 'select Payment Terms' : null));  ?>
<?php echo $form->error($model,'payment_terms_id',array('class'=>'error')); ?>

</div>
</div>
<div id="submitmenu">
<div class="space"><span class="required">*</span> Mandatory Fields</div>
<div class="cancelbutton"><?php echo CHtml::Button('Cancel',array('submit'=>array('customer/admin'))); ?></div>

<div class="createbutton"><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?></div>
</div>
<?php $this->endWidget(); ?>

</div><!-- form -->