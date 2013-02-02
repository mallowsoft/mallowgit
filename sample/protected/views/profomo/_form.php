<?php
/* @var $this ProfomoController */
/* @var $model Profomo */
/* @var $form CActiveForm */
?>
<script>
$('#ch1').live('change', function(){
                    if ( $(this).is(':checked') ) {
                    $('#myrow').show();
                    } else {
                    $('#myrow').hide();
                    }
                    });
$('#ch2').live('change', function(){
                   if ( $(this).is(':checked') ) {
                   $('#row').show();
                   } else {
                   $('#row').hide();
                   }
                   });
-->
</script>
<div class="form">

<?php
    Yii::app()->clientScript->registerScript('search', "
         $('.search').click(function(){
        $('.search-form').toggle();
        return false;
        });
//     $('.search-form form').submit(function(){
//       $('#profomo-grid').yiiGridView('update', {
//                data: $(this).serialize()
//        });
//       return false;
//       });
");
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'profomo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'order_no'); ?>
		<?php echo $form->textField($model,'order_no'); ?>
		<?php echo $form->error($model,'order_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profomo_date'); ?>
		<?php echo $form->textField($model,'profomo_date'); ?>
		<?php echo $form->error($model,'profomo_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'customer'); ?>
		<?php echo $form->textArea($model,'customer',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'customer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'profomo_no'); ?>
		<?php echo $form->textArea($model,'profomo_no',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'profomo_no'); ?><br>
        <input type="checkbox" name="c" id="ch1" value="ON"> Yes
        <input type="checkbox" name="c" id="ch2" value="ON"> No
	</div>
  
	<div id="myrow" style="display:none">
		<?php echo $form->labelEx($model,'serial'); ?>
		<?php echo $form->textField($model,'serial'); ?>
		<?php echo $form->error($model,'serial'); ?>
    </div>
    <div id="row" style="display:none">
        <?php echo $form->labelEx($model,'profomo_no'); ?>
        <?php echo $form->textArea($model,'profomo_no',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->error($model,'profomo_no'); ?>
    </div>
   
	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->