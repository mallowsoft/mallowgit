<?php/* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="en" />
<!-- blueprint CSS framework -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/profomo.css" media="screen, projection , print" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<div id="outerbox">
<div id="menubox">
<div class="noprint">
<div id="menu">
<div class="noprint">
<div class="title"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/mallowsoft.png"></div>
<?php
    //, 'visible'=>Rights::getAuthorizer()->isSuperuser('Admin')
    $this->widget('zii.widgets.CMenu',array(
      'items'=>array(
//                     array('label'=>'Rights', 'url'=>array('/rights/assignment/view'),'itemOptions'=>array('class'=>'menuicons'),'visible'=>Rights::getAuthorizer()->isSuperuser(Yii::app()->user->id)),
                     array('label'=>'<img src="'. Yii::app()->request->baseUrl.'/images/btn_home.png">', 'url'=>array('/proforma/admin'),'active'=>$this->isActive(array(
                                                                                                                                                                         'proforma/view','proforma/update','proforma/create','proforma/admin','salesInvoice/create','salesInvoice/update'
                                                                                                                                                                         )),'itemOptions'=>array('class'=>'menuicons')),
                     array('label'=>'<img src="'. Yii::app()->request->baseUrl.'/images/btn_masters.png">', 'url'=>array('/site/contact'),'active'=>$this->isActive(array(
                                                                                                                                                                          'site/contact','agent/admin', 'agent/create','agent/update','customer/admin','customer/create','customer/update','currency/admin','currency/create','currency/update','deliveryTerms/update','deliveryTerms/create','deliveryTerms/admin','paymentTerms/create','paymentTerms/update','paymentTerms/admin','units/create','units/update','units/admin','merchandiser/create','merchandiser/update','merchandiser/admin','containers/create','containers/update','containers/admin',
                                                                                                                                                                          )),'itemOptions'=>array('class'=>'menuicons')),
                     array('label'=>'<img src="'. Yii::app()->request->baseUrl.'/images/btn_manage.png">', 'url'=>array('/site/manage'),'active'=>$this->isActive(array(
                                                                                                                                                                       'site/manage','customerMerchandiser/create','customerMerchandiser/update','target/admin','target/create','target/update'
                                                                                                                                                                       )),'itemOptions'=>array('class'=>'menuicons')),
                     array('label'=>'<img src="'. Yii::app()->request->baseUrl.'/images/btn_reports.png">', 'url'=>array('/site/reports'),'active'=>$this->isActive(array(
                                                                                                                                                                          'site/reports','proforma/proforma_report','reports/admin','reports/view','reports/month_view',
                                                                                                                                                                          'salesInvoice/sales_invoice_report','salesInvoice/payment_due_report','commissionPayment/commission_payment_report','commissionPayment/commission_report','paymentReceipt/payment_receipt_report','salesInvoice/fob_statement','salesInvoice/current_year_sales_report'
                                                                                                                                                                          )),'itemOptions'=>array('class'=>'menuicons')),
                     array('label'=>'<img src="'. Yii::app()->request->baseUrl.'/images/btn_payments.png">', 'url'=>array('/site/payments'),'active'=>$this->isActive(array(
                                                                                                                                                                            'site/payments','commissionPayment/admin','commissionPayment/create','commissionPayment/update','paymentReceipt/admin','paymentReceipt/create','paymentReceipt/update'
                                                                                                                                                                            )),'itemOptions'=>array('class'=>'menuicons')),
                     array('label'=>'<img src="'. Yii::app()->request->baseUrl.'/images/btn_search.png">', 'url'=>array('/site/view'),'active'=>$this->isActive(array(
                                                                                                                                                                      'site/view',
                                                                                                                                                                      )),'itemOptions'=>array('class'=>'menuicons')),
                     array('label'=>'<img src="'. Yii::app()->request->baseUrl.'/images/btn_logout.png">', 'url'=>array('/site/logout'), 'itemOptions'=>array('class'=>'menuicons')),
                     ),
      'htmlOptions'=>array('class'=>'menuicons'),
      'encodeLabel'=>false,
      )); ?>

</div>
</div>
</div>
<div id="contentbox">
<div id="sidemenu">
<div class="noprint">
<div class="userimage"><a href='#'><img src=<?php  echo Yii::app()->request->baseUrl.'/images/user.png';?>></a></div>
</div>
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