<?php
/* @var $this SalesInvoiceController */
/* @var $model SalesInvoice */

?>
<div id="titlebar">

<div class="listtitle">Update Sales Invoice <?php echo $model->invoice_no; ?>

</div>
<div class="deletebutton"><?php echo CHtml::submitButton('Delete',array('submit'=>array('delete','id'=>$model->invoice_id),'confirm'=>'Are you sure you want to delete this item?')); ?></div>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>