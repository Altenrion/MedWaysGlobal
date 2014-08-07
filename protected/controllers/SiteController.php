<?php

class SiteController extends Controller
{
    
    
     public $defaultAction = 'Login';
	/**
	 * Declares class-based actions.
	 */
        
     public function filters()
     {
        return array(
            'accessControl',
        );
     }
     public function accessRules()
     {
        return array(
            array('deny',
                'actions'=>array('index', 'contact','autentification','Present','select'),
                'users'=>array('?'),
            ),
            array('allow',
                'actions'=>array('index'),
                'roles'=>array('Dev','Moderator','User'),
            ),
            array('deny',
                'actions'=>array('index'),
                'users'=>array('*'),
            ),
        );
     }   
        
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
            
            
                $model=new ContMain;
                $arr = ContMain::model()->with(
                        array('contType'=> ['select'=>'id','name'],
                            ))->findAll();
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index',array('model'=>$arr));
	}
        public function actionAutentification()
	{
            var_dump($_POST);
            
            $model=new ContactForm;
            
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'


        $this->layout = '//layouts/Autentification_main';
		$this->render('Autentification',array('model'=>$model));
	}

        public function actionPresent()
	{
               $model=new ContactForm;
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
                $this->layout = '//layouts/Autentification_main';
		$this->render('Present',array('model'=>$model));
	}
        
       
            
        public function actionSelect() 
        { 
            $model=new ContMain; 

            // uncomment the following code to enable ajax-based validation 

            if(isset($_POST['ajax']) && $_POST['ajax']==='cont-main-select-form') 
            { 
                echo CActiveForm::validate($model); 
                Yii::app()->end(); 
            } 

            if(isset($_POST['ContMain'])) 
            { 
                $model->attributes=$_POST['ContMain']; 
                if($model->validate()) 
                { 
                    // form inputs are valid, do something here 
                    return; 
                } 
            } 
            $this->render('select',array('model'=>$model)); 
        }
        
        
	/**
	 * This is the action to handle external exceptions.
	 */


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
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

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
			if($model->validate() && $model->login()){
			        $route = $model->roleCheckAndMove ();
                                $this->redirect(Yii::app()->createUrl($route));
                        }
                }
		// display the login form
                $this->layout = '//layouts/Autentification_main';
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
        
        
}