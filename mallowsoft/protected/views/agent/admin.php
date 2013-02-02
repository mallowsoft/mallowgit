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
<div class="listtitle">Agent Details</div>
<div class="createbutton"><a href="../agent/create"><input type="button" id="createbutton" value="Create New"></a></div>
</div>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
                                           'model'=>$model,
                                           )); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
'id'=>'agent-grid',
'dataProvider'=>$model->search(),
'columns'=>array(
                 array('header'=>'S.No',
                       'value'=>'++$row',
                       ),
                 array(
                       'name'  => 'agent_code',
                       'value' => 'CHtml::link($data->agent_code, Yii::app()->createUrl("agent/update",array("id"=>$data->agent_id)))',
                       'type'  => 'raw',
                       ),
                 
                 array(
                       'name'  => 'agent_name',
                       'value' => 'CHtml::link($data->agent_name, Yii::app()->createUrl("agent/update",array("id"=>$data->primaryKey)))',
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
));
?>

