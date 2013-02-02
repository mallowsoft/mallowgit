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
            <div class="userimage"></div>
            <div class="title">
            <div class="name"></div>
            </div>
            <?php $this->widget('zii.widgets.CMenu',array(
                'items'=>array(
                
                            array('label'=>'<img src="'. Yii::app()->request->baseUrl.'/css/newentry.png">', 'url'=>array('/profomo/create'),'itemOptions'=>array('class'=>'menuicons')),
                             array('label'=>'<img src="'. Yii::app()->request->baseUrl.'/css/entries.png" >', 'url'=>array('/site/page', 'view'=>'about'),'itemOptions'=>array('class'=>'menuicons')),
                             array('label'=>'<img src="'. Yii::app()->request->baseUrl.'/css/history.png" >', 'url'=>array('/site/contact'),'itemOptions'=>array('class'=>'menuicons')),
                             array('label'=>'<img src="'. Yii::app()->request->baseUrl.'/css/user.png" >','url'=>array('/site/sample'),'itemOptions'=>array('class'=>'menuicons')),
                             array('label'=>'<img src="'. Yii::app()->request->baseUrl.'/css/logout.png" >', 'url'=>array('/site/logout'), 'itemOptions'=>array('class'=>'menuicons')),),
                             
                'htmlOptions'=>array('class'=>'menuicons'),
                'encodeLabel'=>false,
                )); ?>
            </div><!-- menu -->
        </div>

                <?php
//                $this->menu=array(
//                              array('label'=>'List Profomo', 'url'=>array('index')),
//                              array('label'=>'Create Profomo', 'url'=>array('create')),
//                              );
                ?>
                <?php echo $content;?>
                </div>
        </div>
    <div id="copyright">© Mallow Technologies Private Limited.</div>

    
 </body>
</html>