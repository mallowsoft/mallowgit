<?php
    Yii::import('application.extensions.arrayDataProvider.*');

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
    public $data=array();

	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'. base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'. base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}
    public function actionmanage()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'. base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'. base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
                "Reply-To: {$model->email}\r\n".
                "MIME-Version: 1.0\r\n".
                "Content-type: text/plain; charset=UTF-8";
                
				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('manage',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;
        
        $url=Yii::app()->user->returnUrl;

        
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];            
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
            {
                if(preg_match('/mallowsoft\/$/', $url))
                    $this->redirect(array('proforma/admin'));
                else
                    $this->redirect(Yii::app()->user->returnUrl);
            }
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
    public function actionpaymentreport()
	{
            $model=new SalesInvoice();
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['SalesInvoice']))
                $model->attributes=$_GET['SalesInvoice'];
            
            $this->render('../salesInvoice/payment_due_report',array(
                                        'model'=>$model,
                         ));
    }
    public function actionpayments()
	{
        $this->render('payments');
    }
    public function actionreports()
	{
        $this->render('reports');
    }
    public function actionproforma_report()
	{
        $this->render('proforma_report');
    }
    public function actionview()
	{
        $model=new SalesInvoice('search_order');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['view']))
			$model->attributes=$_GET['view'];
        $this->render('view',array(
                                  'model'=>$model,
                                  ));
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