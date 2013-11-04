<?php
/* @var $this AgentController */
/* @var $model Agent */
?>
<div id="titlebar">
<div class="listtitle">Update Agent <?php echo $model->agent_code; ?></div>
<div class="deletebutton"><?php echo CHtml::submitButton('Delete',array('submit'=>array('delete','id'=>$model->agent_id),'confirm'=>'Are you sure you want to delete this item?')); ?></div>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>