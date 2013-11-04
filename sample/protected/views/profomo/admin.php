<html>
<head>
<script type = "text/javascript"
src = "http://localhost/yii/sample/profomo/getPrice?GOOGLE=123">
</script>
</head>
<body>
<script type = "text/javascript">
var json = eval(result);
document.write(json.value);
</script>
</body>
</html>
<?php
/* @var $this ProfomoController */
/* @var $model Profomo */
?>

<h1>Manage Profomos</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
<?php
    $client=new SoapClient('http://localhost/yii/sample/index.php/profomo/quote');
    echo $client->getPrice('IBM');
?>
<?php echo CHtml::SubmitButton('Advanced Search',array('url'=>'create')); ?>
<div class="search-form">
<?php $this->renderPartial('create',array(
	'model' => $model,
)); ?>
</div><!-- search-form -->
<?php
    $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'profomo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'order_no',
		'profomo_date',
		'customer',
		'profomo_no',
		'serial',
		'fpc_booked',
		array(
			'class'=>'CButtonColumn',
		),
	),
));
?>






