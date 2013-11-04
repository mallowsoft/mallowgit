<?php
    /* @var $this AgentController */
    /* @var $model Agent */
    
    Yii::app()->clientScript->registerScript('search', "
 $('.search-button').click(function(){
       $('.search-form').toggle();
       return false;
       });
 $('.search-form form').submit(function(){
       $('#agent-grid').yiiGridView('update', {
                                    data: $(this).serialize()
                                    });
       return false;
       });
");
?>

<div id="titlebar">
<div class="listtitle">Agents List</div>
<div class="createbutton"><a href="../agent/create"><input type="button" id="createbutton" value="Create New"></a></div>
</div>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
                                           'model'=>$model,                                    ));
?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
'id'=>'agent-grid',
'dataProvider'=>$model->search(),
'columns'=>array(
                 array('header'=>'S.No',
                       'headerHtmlOptions' => array('style'=>'color:white'),
                       'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
                       ),
                 array(
                       'header'=>'Agent Code',
                       'name'=>'agent_code',
                       'value' => 'CHtml::link($data->agent_code, Yii::app()->createUrl("agent/update",array("id"=>$data->primaryKey)))',
                       'headerHtmlOptions' => array('style'=>'color:white'),
                       'type'  => 'raw',
                       ),
                 array(
                       'header'=>'Agent Name',
                       'name'=>'agent_name',
                       'value' => 'CHtml::link($data->agent_name, Yii::app()->createUrl("agent/update",array("id"=>$data->primaryKey)))',
                       'headerHtmlOptions' => array('style'=>'color:white'),
                       'type'  => 'raw',
                       ),
                 /*
                  'address',
                  'city',
                  'country',
                  'phone_primary',
                  'phone_alternative',
                  'email',
                  */
                 array(
                       'class'=>'CButtonColumn',
                       ),
                 ),
                'summaryText' => '',
                'htmlOptions'=>array('style'=>'cursor: pointer;'),
                'selectionChanged'=>"function(id){window.location='" . Yii::app()->createUrl('agent/update', array('id'=>$model->primaryKey)) . "' + $.fn.yiiGridView.getSelection(id);}",
));
?>

