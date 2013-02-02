<?php/* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />

<!-- blueprint CSS framework -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/profomo.css" media="screen, projection" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<div id="outerbox">
<div id="menubox">
<div id="menu">
<div class="title"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mallowsoft.png"></div>
<?php $this->widget('zii.widgets.CMenu',array(
      'items'=>array(
                     
                     array('label'=>'<img src="'. Yii::app()->request->baseUrl.'/images/btn_home.png">', 'url'=>array('proformaInvoice/admin'),'itemOptions'=>array('class'=>'menuicons')),
                     array('label'=>'<img src="'. Yii::app()->request->baseUrl.'/images/btn_masters.png">', 'url'=>array('/site/contact'),'itemOptions'=>array('class'=>'menuicons')),
                     array('label'=>'<img src="'. Yii::app()->request->baseUrl.'/images/btn_payments.png">', 'url'=>array(''),'itemOptions'=>array('class'=>'menuicons')),
                     array('label'=>'<img src="'. Yii::app()->request->baseUrl.'/images/btn_reports.png">', 'url'=>array(''),'itemOptions'=>array('class'=>'menuicons')),
                     array('label'=>'<img src="'. Yii::app()->request->baseUrl.'/images/btn_logout.png">', 'url'=>array('/site/logout'), 'itemOptions'=>array('class'=>'menuicons')),),
      
      'htmlOptions'=>array('class'=>'menuicons'),
      'encodeLabel'=>false,
      )); ?>

</div>
</div>
<div id="contentbox">
    <div id="sidemenu">
    <div class="userimage"><a href='#'><img src=<?php  echo Yii::app()->request->baseUrl.'/images/user.png';?>></a></div>
    </div>
    <div id="listbox">
    
    <div id="tablebox">
    <?php echo $content;?>
    </div>
    </div>
</div>
<div id="footerbox">
</div>
</div>
</body>
</html>