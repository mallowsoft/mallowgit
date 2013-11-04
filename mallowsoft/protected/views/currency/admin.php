<?php
/* @var $this CurrencyController */
/* @var $model Currency */
?>

<div id="titlebar">
<div class="listtitle">Currency List</div>
<div class="createbutton"><a href="../currency/create"><input type="button" id="createbutton" value="Create New"></a></div>
</div>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
                                           'model'=>$model,
                                           )); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'currency-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
                     array('header'=>'S.No',
                           'headerHtmlOptions' => array('style'=>'color:white'),
                           'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                           ),
                     array(
                           'header'  => 'Currency Name',
                           'headerHtmlOptions' => array('style'=>'color:white'),
                           'value' => 'CHtml::link($data->currency_name, Yii::app()->createUrl("currency/update",array("id"=>$data->primaryKey)))',
                           'type'  => 'raw',
                           ),
                     array(
                           'header'  => 'Currency Symbol',
                           'headerHtmlOptions' => array('style'=>'color:white'),
                           'value' => 'CHtml::link($data->currency_symbol, Yii::app()->createUrl("currency/update",array("id"=>$data->primaryKey)))',
                           'type'  => 'raw',
                           ),
                     array(
                           'header'  => 'Currency Code',
                           'headerHtmlOptions' => array('style'=>'color:white'),
                           'value' => 'CHtml::link($data->currency_code, Yii::app()->createUrl("currency/update",array("id"=>$data->primaryKey)))',
                           'type'  => 'raw',
                           ),
                    /*
                    'currency_id',
                        */
                    array(
                        'class'=>'CButtonColumn',
                          ),
                     ),
    'summaryText' => '',
    'htmlOptions'=>array('style'=>'cursor: pointer;'),
    'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl('currency/update', array('id'=>$model->primaryKey)) . "' + $.fn.yiiGridView.getSelection(id);}",
)); ?>
