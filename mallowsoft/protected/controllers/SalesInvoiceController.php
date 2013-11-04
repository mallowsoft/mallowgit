<?php
class SalesInvoiceController extends Controller
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
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','payment_due_report','fob_statement','current_year_sales_report'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','sales_invoice_report','dynamicinvoice'),
				'users'=>array('@'),
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
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        $model=new SalesInvoice;        
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SalesInvoice']))
		{
            $model=new SalesInvoice;
            $model->attributes = $_POST['SalesInvoice'];
            $model->invoice_date=$_POST['invoice_date'];
            $model->payment_received = 0;
            $customer=Customer::model()->find('customer_name = :customer_name',array(':customer_name' => $_POST['SalesInvoice']['customer_id']));
            if($customer!==null)
            {
            $model->customer_id=$customer->customer_code_id;
            }
            $model->save();
          //  echo $_POST['SalesInvoice']['production_order_no'];

            for($i=0; $i < count($_POST['SalesInvoice']['production_order_no']); $i++)
            {

                if(!empty($_POST['SalesInvoice']['production_order_no'][$i]))
                {
                    $proforma_sales=new ProformaSales;
                    $proforma_sales->invoice_id=$model->invoice_id;
//                    $production=Proforma::model()->find('production_order_no = :production_order_no',array(':production_order_no' => $_POST['SalesInvoice']['production_order_no'][$i]));
                    $proforma_sales->proforma_invoice_id=$_POST['SalesInvoice']['production_order_no'][$i];
                    $proforma_sales->save();
                }
            }
			if($model->save())
				$this->redirect(array('proforma/view?order='.$_POST['SalesInvoice']['production_order_no'][0]));
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

		if(isset($_POST['SalesInvoice']))
		{
            $mapmodel=$this->proformasalesloadModel($id);
            foreach($mapmodel as $map)
            $map->delete();
            $model->attributes = $_POST['SalesInvoice'];
            $model->invoice_date = $_POST['invoice_date'];
            $model->payment_received = 0;

            $customer=Customer::model()->find('customer_name = :customer_name',array(':customer_name' => $_POST['SalesInvoice']['customer_id']));
            if($customer!==null)
            {
            $model->customer_id=$customer->customer_code_id;
            }
            $model->save();
            
            for($i=0; $i < count($_POST['SalesInvoice']['production_order_no']); $i++)
            {
              //  var_dump($_POST['SalesInvoice']['production_order_no']);

                if(!empty($_POST['SalesInvoice']['production_order_no'][$i]))
                {
//                      var_dump($_POST['SalesInvoice']['production_order_no']);
//                      echo $model->invoice_id;
                    $proforma_sales=new ProformaSales;
                    $proforma_sales->invoice_id=$model->invoice_id;
//                    $production=Proforma::model()->find('production_order_no = :production_order_no',array(':production_order_no' => $_POST['SalesInvoice']['production_order_no'][$i]));
                    $proforma_sales->proforma_invoice_id=$_POST['SalesInvoice']['production_order_no'][$i];
                    $proforma_sales->save();
                }
            }

			if($model->save())
				$this->redirect(array('proforma/view?order='.$_POST['SalesInvoice']['production_order_no'][0]));
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
		$model=$this->loadModel($id);
        $model->delete();
        
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('proforma/admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('SalesInvoice');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{        
		$model=new SalesInvoice();
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SalesInvoice']))
			$model->attributes=$_GET['SalesInvoice'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
    public function actionsales_invoice_report()
	{
		$model=new SalesInvoice('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SalesInvoice']))
        {
			$model->attributes=$_GET['SalesInvoice'];
            if(!empty($_GET))
            {
                $model->invoice_date_first = $_GET['invoice_date_first'];
                $model->invoice_date_last = $_GET['invoice_date_last'];
                                
                $model->invoice_no_from = $_GET['SalesInvoice']['invoice_no_from'];
                $model->invoice_no_to = $_GET['SalesInvoice']['invoice_no_to'];
            }
        }
		$this->render('sales_invoice_report',array(
                                    'model'=>$model,
                                    ));
	}
    public function actionpayment_due_report()
	{
		$model=new SalesInvoice('search_due_report');
		$model->unsetAttributes();
        // clear any default values
		if(isset($_GET['year_first']) && isset($_GET['year_last']))
        {
			 $model->year_first=$_GET['year_first'];
             $model->year_last=$_GET['year_last'];
            
//             $model->invoice_no_from = $_GET['SalesInvoice']['invoice_no_from'];
//             $model->invoice_no_to = $_GET['SalesInvoice']['invoice_no_to'];
//            
//             $model->production_order_no = $_GET['SalesInvoice']['production_order_no'];
//             $model->proforma_no = $_GET['SalesInvoice']['proforma_no'];
        }
		$this->render('payment_due_report',array(
                                                   'model'=>$model,
                                                   ));
	}
    public function actionfob_statement()
	{
		$model=new SalesInvoice('search_fob_report');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SalesInvoice']))
			$model->attributes=$_GET['SalesInvoice'];
		$this->render('fob_statement',array('model'=>$model,
                                            ));
	}
    public function actioncurrent_year_sales_report()
	{
		$model=new SalesInvoice('search_current_sales');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SalesInvoice']))
			$model->attributes=$_GET['SalesInvoice'];
		$this->render('current_year_sales_report',array(
                                            'model'=>$model,
                                            ));
	}
    
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SalesInvoice the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SalesInvoice::model()->findByPK($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
    public function proformasalesloadModel($id)
	{
        $mapmodel = ProformaSales::model()->findAll('invoice_id=:invoice_id',array(':invoice_id'=>$id));
		if($mapmodel===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $mapmodel;
	}
    
	/**
	 * Performs the AJAX validation.
	 * @param SalesInvoice $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sales-invoice-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    public function actiondynamicinvoice()
	{
        $dates = $_POST['financial_year'];
        $years = explode("-",$dates);
        $current_year = $years[0];
        $next_year = $years[1];
        $date_first = $current_year."-04-01";
        $date_last =  $next_year."-03-31";

        $criteria = new CDbCriteria();
        $criteria->condition = "invoice_date BETWEEN :from_date AND :to_date ";
        $criteria->params = array(
                                  ':from_date' => $date_first,
                                  ':to_date' => $date_last,
                                  );
        $result = SalesInvoice::model()->findAll($criteria);
        $result = CHtml::listData($result,'invoice_id','invoice_no');
        echo "<option value=''>--select--</option>";
        foreach($result as $res=>$r)
        {
            echo CHtml::tag('option', array('value'=>$res),CHtml::encode($r),true);
        }
	}
    public function isActive($routes = array())
    {
        $routeCurrent = '';
        if ($this->module !== null) {
            $routeCurrent .= sprintf('%s/', $this->module->id);
        }
        $routeCurrent .= sprintf('%s/%s', $this->id, $this->action->id);
        foreach ($routes as $route) {
            $pattern = sprintf('~%s~', preg_quote($route));
            if (preg_match($pattern, $routeCurrent)) {
                return true;
            }
        }
        return false;
    }
  }
?>
