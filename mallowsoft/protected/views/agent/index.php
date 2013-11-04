<?php
/* @var $this AgentController */
/* @var $dataProvider CActiveDataProvider */
?>
<h1>Agents</h1>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));
?>
