<?php
/* @var $this DeliveryTermsController */
/* @var $model DeliveryTerms */

?>

<div id="titlebar">
<div class="listtitle">Update DeliveryTerms #<?php echo $model->delivery_terms_code; ?>
</div>
<div class="deletebutton"><?php echo CHtml::submitButton('Delete',array('submit'=>array('delete','id'=>$model->delivery_terms_id),'confirm'=>'Are you sure you want to delete this item?')); ?></div>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>