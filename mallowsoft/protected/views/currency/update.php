<?php
/* @var $this CurrencyController */
/* @var $model Currency */
?>

<div id="titlebar">
<div class="listtitle">Update Currency #<?php echo $model->currency_code; ?></div>
<div class="deletebutton"><?php echo CHtml::submitButton('Delete',array('submit'=>array('delete','id'=>$model->currency_id),'confirm'=>'Are you sure you want to delete this item?')); ?></div>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>