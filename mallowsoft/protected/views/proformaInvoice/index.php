<?php
/* @var $this ProformaInvoiceController */
/* @var $dataProvider CActiveDataProvider */
?>

<h1>Proforma Invoices</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
?>
