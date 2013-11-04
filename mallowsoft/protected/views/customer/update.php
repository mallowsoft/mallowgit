<?php
/* @var $this CustomerController */
/* @var $model Customer */
?>

<div id="titlebar">
<div class="listtitle">Update Customer <?php echo $model->customer_code; ?></div>
<div class="deletebutton"><?php echo CHtml::submitButton('Delete',array('submit'=>array('delete','id'=>$model->customer_code_id),'confirm'=>'Are you sure you want to delete this item?')); ?></div>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>