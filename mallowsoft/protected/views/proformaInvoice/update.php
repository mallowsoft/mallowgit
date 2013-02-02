<?php
/* @var $this ProformaInvoiceController */
/* @var $model ProformaInvoice */
?>

<div id="titlebar">
<div class="listtitle">Update Proforma Invoice #<?php echo $model->production_order_no; ?>
</div>
<div class="deletebutton"><?php echo CHtml::submitButton('Delete',array('submit'=>array('delete','id'=>$model->proforma_invoice_id),'confirm'=>'Are you sure you want to delete this item?')); ?></div>
</div>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>