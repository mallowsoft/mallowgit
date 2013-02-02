<?php

class ProformaInvoiceController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($order)
	{
//		$this->render('view',array(
//        $model=>$this->loadModel($order);
//        'invoicemodel'=>$this->invoiceloadModel($order),
//		));
        $dataProvider=new SalesInvoice('search');
        $dataProvider->unsetAttributes();  // clear any default values
        if(isset($_GET['SalesInvoice']))
            $dataProvider->attributes=$_GET['SalesInvoice'];
            $dataProvider->production_order_no=$this->proformaloadModel($order)->production_order_no;
        
        //$model->unsetAttributes();
        if(isset($_GET['ProformaInvoice']))
            $dataProvider->attributes=$_GET['ProformaInvoice'];
        $this->render('view',array(
        'model'=>$this->proformaloadModel($order),'dataProvider'=>$dataProvider,
       ));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ProformaInvoice;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProformaInvoice']))
		{
			$model->attributes=$_POST['ProformaInvoice'];
            $currency=Currency::model()->find('currency_code = :currency_code',array(':currency_code' => $model->currency_code));
            $model->currency_symbol=$currency->currency_symbol;
            //$model->fpc_booking_on = 1;
			if($model->save())
				$this->redirect(array('proformaInvoice/admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProformaInvoice']))
		{
			$model->attributes=$_POST['ProformaInvoice'];
            $currency=Currency::model()->find('currency_code = :currency_code',array(':currency_code' => $model->currency_code));
            $model->currency_symbol=$currency->currency_symbol;
			if($model->save())
				$this->redirect(array('proformaInvoice/admin'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ProformaInvoice');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ProformaInvoice('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProformaInvoice']))
			$model->attributes=$_GET['ProformaInvoice'];
        
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ProformaInvoice the loaded model
	 * @throws CHttpException
	 */
    public function loadModel($id)
	{
		$model=ProformaInvoice::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
        
	}
	public function proformaloadModel($order)
	{
		$model=ProformaInvoice::model()->find('production_order_no=:production_order_no',array(':production_order_no'=>$order));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
    public function invoiceloadModel($order)
	{

		$invoicemodel=SalesInvoice::model()->find('production_order_no=:production_order_no',array(':production_order_no'=>$order));
		if($invoicemodel===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $invoicemodel;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ProformaInvoice $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='proforma-invoice-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
?>
