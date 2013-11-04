<?php
/* @var $this UnitsController */
/* @var $model Units */
?>
<div id="titlebar">
<div class="listtitle">Update Unit <?php echo $model->unit_id; ?></div>
<div class="deletebutton"><?php echo CHtml::submitButton('Delete',array('submit'=>array('delete','id'=>$model->unit_id),'confirm'=>'Are you sure you want to delete this item?')); ?></div>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>