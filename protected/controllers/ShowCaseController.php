<?php

class ShowCaseController extends Controller
{
    public  $layout = '//layouts/Proto';
    public $defaultAction = 'index';

    public function filters()
    {
        return array(
            'accessControl',
        );
    }
//
//    public function accessRules()
//    {
//        return array(
//            array('deny',
//                'actions'=>array('index', 'contact','autentification','Present','select'),
//                'users'=>array('?'),
//            ),
//            array('allow',
//                'actions'=>array('index'),
//                'roles'=>array('Dev','Moderator','User'),
//            ),
//            array('deny',
//                'actions'=>array('index'),
//                'users'=>array('*'),
//            ),
//        );
//    }

    public function actionIndex()
	{

		$this->render('index');
	}


   public function actionPartners()
	{
		$this->render('partners');
	}
    public function actionRegPartners()
    {
        $model = new PartnersRequests();

        if(isset($_POST['partners_request'])){
            $data = Yii::app()->request;


            $model->NAME = $data->getPost('name');
            $model->EMAIL = $email =  $data->getPost('email');
            $model->ORG_NAME = $data->getPost('org_name');
            $model->TEXT = $data->getPost('message');

            $email_exist = $model->find("email='$email'");

            if($email_exist){
                echo 'Заявка не принята. Указанный email уже использовался';
                Yii::app()->end();
            }
            if($model->save()){
                echo 'Заявка на партнерство зарегистрирована';
                Yii::app()->end();
            }

            echo 'Сервер не доступен';
            Yii::app()->end();
        }
    }



	public function actionStatistics()
	{
		$this->render('statistics');
	}


    public function actionInfo()
	{
		$this->render('info');
	}
    public function actionFeedbackQuestions()
        {
            $model = new Questions();
            $data = Yii::app()->request;

            if(isset($_POST['question_form'])){


                $model->NAME = $data->getPost('name');
                $model->EMAIL = $email =  $data->getPost('email');
                $model->SUBJECT = $data->getPost('subject');
                $model->QUESTION = $data->getPost('question');

                $email_exist = $model->find("email='$email'");

                if($email_exist){
                    echo 'Вопрос не отправлен. Указанный email уже использовался';
                    Yii::app()->end();
                }
                if($model->save()){
                    echo 'Вопрос зарегистрирован. Ответ будет отправлен на указанный email';
                    Yii::app()->end();
                }

                echo 'Сервер не доступен';
                Yii::app()->end();
            }
        }


    public function actionFeedback()
	{
		$this->render('feedback');
	}


    public function actionOrganizers()
	{
		$this->render('organizers');
	}

    public function actionRegistration()
	{


        if(isset($_POST['F_NAME'])){

            echo 'Заявка на регистрацию отправлена';
            Yii::app()->end();
        }



		$this->render('registration');
	}


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

    public function actionGetFile($filename = NULL) {

        if ($filename !== NULL) {
            // некоторая логика по обработке пути из url в путь до файла на сервере

            $currentFile = Yii::getPathOfAlias('webroot.downloads').DIRECTORY_SEPARATOR.$filename;

            if (file_exists($currentFile)) {
                    Yii::app()->request->sendFile($filename, file_get_contents(Yii::getPathOfAlias('webroot.downloads').DIRECTORY_SEPARATOR.$filename));
            }
            else
            {
            $this->redirect('404');
            }
        }
    }


	public function actionLogin()
	{
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


            $this->render('login',array('model'=>$model));
        }

    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function checkRole(array $roles){
        if(!empty($roles)){
        $reply = false;
            foreach ($roles as $r_k=>$r_v) {
                $check = Yii::app()->user->checkAccess($r_v);
                if($check == true){
                    $reply = true;
                }
            }
        return $reply;

        }


    }



}