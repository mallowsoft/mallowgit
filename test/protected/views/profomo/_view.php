<?php
/* @var $this ProfomoController */
/* @var $model Profomo */

?>


<?php
//    $a= $data->getAttributeLabel('profomo_date');
//    $b=CHtml::encode($data->getAttributeLabel('profomo_no'));
//    $c=CHtml::encode($data->getAttributeLabel('order_no'));
//    $d=CHtml::encode($data->getAttributeLabel('customer'));
//    $this->widget('zii.widgets.CMenu',array(
//'items'=>array(
//             array('label'=>"SNo" , 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'serial')),
//             array('label'=>"$a" , 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'date')),
//             array('label'=> "$b", 'url'=>array('/site/page', 'view'=>'about'),'itemOptions'=>array('class'=>'projectname')),
//             array('label'=>"$c", 'url'=>array('/site/contact'),'itemOptions'=>array('class'=>'workinghours')),
//             array('label'=>"$d",'url'=>array('/site/sample'),'itemOptions'=>array('class'=>'comments')),),
//'encodeLabel'=>false,
//                                        
//));
?>

<div id="entriesbox">
<div id="entries">
<div class="serial"><a href="#">1</a></div>
<div class="date"><?php  echo CHtml::encode($data->profomo_date); ?></div>
<div class="projectname"><?php  echo $data->profomo_no; ?><br /></div>
<div class="workinghours"><?php echo $data->order_no; ?></div>
<div class="comments"><?php  echo $data->customer; ?></div>
</div>
</div>

