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
        $projects = Users::model()->count("roles = 'Manager' AND AKTIV_KEY = 100");
        $clean_num = $this->getTermination($projects);
		$this->render('index',array('clean_num'=>$clean_num));

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

    public function actionTests(){
        $this->render('tests');
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


    public function mailAktivation($name,$role,$email,$password){

        $tpl_file = Yii::getPathOfAlias('webroot.downloads').DIRECTORY_SEPARATOR.'mail_template.php';
        $tpl = file_get_contents($tpl_file);
        $mail = $tpl;
        if($role == 'Exp'){$role = 'Эксперт';}
        if($role == 'Manager'){$role = 'Руководитель проекта';}

        $mail = strtr($mail, array(
            "{name}"   => $name,
            "{role}" => $role,
            "{email}" => $email,
            "{password}" => $password,

        ));
        $message = new YiiMailMessage;
        $message->setBody($mail, 'text/html');
        $message->subject = 'Активация пароля';
        $message->addTo($email);
        $message->from = Yii::app()->params['adminEmail'];
        Yii::app()->mail->send($message);

    }



    public function actionRegistration()
	{
        $model = new Users();

        $data = Yii::app()->request;

        if(isset($_POST['RegForm'])){

            $model->attributes=$_POST['RegForm'];

            $name = $_POST['RegForm']['L_NAME'];
            $role = $_POST['RegForm']['roles'];
            $password = $_POST['RegForm']['password'];
            $email = $_POST['RegForm']['EMAIL'];

            $model->password = $password;
//            $model->password = $model->encrypting($password);

            $email_exist = $model->find("EMAIL='$email'");

            if($email_exist){

                $fail = 'email';
                echo json_encode($fail);
                Yii::app()->end();
            }

            if($model->save()){
                $this->mailAktivation($name,$role,$email,$password);

                $success= 'succsess';
                echo json_encode($success);
                Yii::app()->end();

            }

                $fail= 'fail';
                echo json_encode($fail);
                Yii::app()->end();


        }
        echo 'Извините';
        Yii::app()->end();

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

            $currentFile = Yii::getPathOfAlias('webroot.images.avatars').DIRECTORY_SEPARATOR.$filename;

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


    public function actionGenerateMap(){

        $model= new Users();
        $dest_folder = Yii::getPathOfAlias('webroot.images.art').DIRECTORY_SEPARATOR;
        $overlay = Yii::getPathOfAlias('webroot.images.art').DIRECTORY_SEPARATOR.'m_overlay_p.png';

        $map= new MapStat($model,$dest_folder,$overlay);
        $map->getProjectsPointsData();
        $map->generateMapPoints();

        $map->getUniversPointsData();
        $map->generateMapPoints();

    }

    public function actionAktivation(){

        if(isset($_GET['email'])){

            $email = $_GET['email'];

            $user = new Users();
            $user_exist = $user->find("EMAIL='".$email."'");

            if($user_exist){

                if($user_exist->roles == 'Manager'){

                    $id= $user_exist->id;
                    $project = ProjectRegistry::model()->find("ID_REPRESENTATIVE='".$id."'");




////                    $project_exist = $project->find("ID_REPRESENTATIVE='".$user_exist->id."'");
//
                    if($project == null){
                        $proj = new ProjectRegistry();

                        $proj->ID_REPRESENTATIVE = $id;
                        $proj->save();


//                        var_dump($proj);
//                        echo "I'm here";
//                        Yii::app()->end();
                    }
                }
                $_POST['pk']= $user_exist->id ;
                $_POST['name']= 'AKTIV_KEY';
                $_POST['value']= '100';

                $this->forward('Autorized/updateProfile',false);
                //$this->redirect(Yii::app()->createUrl('ShowCase/login'));
            }
        }
        $this->redirect(Yii::app()->createUrl('ShowCase/login'));
    }


    public function getTermination ($num)
    {
        //Оставляем две последние цифры от $num
        $number = substr($num, -2);

        if($number > 10 and $number < 21)
        {
            $term = "ов";
        }
        else
        {
            $number = substr($number, -1);

            if($number == 0) {$term = "ов";}
            if($number == 1 ) {$term = "";}
            if($number > 1 ) {$term = "а";}
            if($number > 4 ) {$term = "ов";}
        }
        return  $num.' проект'.$term;
    }
}