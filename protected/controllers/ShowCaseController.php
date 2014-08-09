<?php

class ShowCaseController extends Controller
{


    use MyTraits;


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
        $model = new Users();
        $data = Yii::app()->request;

        if(isset($_POST['ROLE'])){

        // тут рега эксперта и менеджера

            $model->F_NAME = $data->getPost('F_NAME');
            $model->L_NAME =  $data->getPost('L_NAME');
            $model->S_NAME = $data->getPost('S_NAME');
            $model->EMAIL = $email = $data->getPost('EMAIL');
            $model->password = $data->getPost('PASSWD');
            $model->PHONE = $data->getPost('PHONE');
            $model->BIRTH_DATE = $data->getPost('BIRTH_DATE');
            $model->SEX = $data->getPost('SEX');
            $model->DEGREE = $data->getPost('DEGREE');
            $model->ACADEMIC_TITLE = $data->getPost('ACADEMIC_TITLE');
            $model->ID_DISTRICT = $data->getPost('ID_DISTRICT');
            $model->ID_UNIVER = $data->getPost('ID_UNIVER');
            $model->W_POSITION = $data->getPost('W_POSITION');
            $model->ID_SPECIALITY = $data->getPost('ID_SPECIALITY');
            $model->HIRSH = $data->getPost('HIRSH');
            $model->PRIVACY = $data->getPost('PRIVACY');
            $model->roles = $data->getPost('ROLE');

            $email_exist = $model->find("EMAIL='$email'");

            if($email_exist){
                echo 'Регистрация не прошла. Указанный email уже использовался';
                Yii::app()->end();
            }

            switch($model->roles){
                case 'Exp':

                    if($model->save()){
                        echo 'Регистрация завершена. На указанный email отправлено письмо активации.';
                        Yii::app()->end();
                    }
                    break;


                case 'Manager':
                    // тут рега проекта

//                    $project = new ProjectRegistry();
//
//                    $project->F_NAME = $data->getPost('F_NAME');
//                    $project->L_NAME =  $data->getPost('L_NAME');
//                    $project->S_NAME = $data->getPost('S_NAME');
//

                    echo 'Вы менедджер';
                    Yii::app()->end();
                    break;

            }


            echo 'Сервер не доступен';
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




}