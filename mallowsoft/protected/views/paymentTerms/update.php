<?php
/* @var $this PaymentTermsController */
/* @var $model PaymentTerms */

?>

<div id="titlebar">
<div class="listtitle">Update Payment Terms #<?php echo $model->payment_terms_code; ?>
</div>
<div class="deletebutton"><?php echo CHtml::submitButton('Delete',array('submit'=>array('delete','id'=>$model->payment_terms_id),'confirm'=>'Are you sure you want to delete this item?')); ?></div>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>