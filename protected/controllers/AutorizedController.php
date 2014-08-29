<?php

class AutorizedController extends Controller
{

    use MyTraits;

    public  $layout = '//layouts/Cabinet';
    public $defaultAction = 'index';

//    public function init() {
//        parent::init();
//        Yii::app()->errorHandler->errorAction= $this->actionError();
//    }


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
                'actions'=>array('index', 'profile','info','news','project','statistics','projects','experts'),
                'users'=>array('?'),
            ),
            array('allow',
                'actions'=>array('profile','news','info','project'),
                'roles'=>array('Dev','Manager','Exp','Exp1','Exp2','Exp3'),
            ),
            array('allow',
                'actions'=>array('project'),
                'roles'=>array('Manager'),
            ),
            array('allow',
                'actions'=>array('projects','statistics'),
                'roles'=>array('Exp1','Exp2','Exp3','Dev',),
            ),

            array('deny',
                'actions'=>array('index', 'profile','info','news','project','statistics','projects'),
                'users'=>array('*'),
            ),
        );
    }

//    public function actionError()
//    {
//        if($error=Yii::app()->errorHandler->error)
//        {
//            if(Yii::app()->request->isAjaxRequest)
//                echo $error['message'];
//            else
//                $this->render('error', $error);
//        }
//    }

	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionStatistics()
	{




		$this->render('statistics');
	}


    public function actionExperts()
	{
		$this->render('experts');
	}


	public function actionProject()
	{
        $model = new ProjectRegistry;
        if(!Yii::app()->user->isGuest){
            $data = $model->findProjectData(Yii::app()->user->id);
        }

        $this->render('project',array(
            'data'=>$data,
            'model'=>$model,
        ));
	}

    public function actionUnlockScreen()
    {
        {
            $model=new LoginForm;

            // collect user input data
            if(isset($_POST['LoginForm']))
            {
                $model->attributes=$_POST['LoginForm'];
                // validate user input and redirect to the previous page if valid
                if($model->validate() && $model->login()){

                    $this->redirect(Yii::app()->createUrl('Autorized/profile'));
                }
            }
            $this->renderPartial('lockScreen',array('model'=>$model));
        }

    }
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->createUrl('ShowCase/login'));
    }




	public function actionInfo()
	{
		$this->render('info');
	}

    public function actionProjects()
	{
		$this->render('projects');
	}

	public function actionNews()
	{
		$this->render('news');
	}


    public function actionLockScreen()
	{

		$this->renderPartial('lockScreen');
	}


    public function actionUpdateProject(){
        $edit = new EditableSaver('ProjectRegistry');
        $edit->scenario = 'update';
        $edit->update();
    }
    public function actionUpdateProfile(){
        $edit = new EditableSaver('Users');
        $edit->scenario = 'update';
        $edit->update();
    }

    public function actionProfile()
	{
        $role = '';
        $messsages = array();
        $model = new Users;

        if(!Yii::app()->user->isGuest){
            $data = $model->findProfileData(Yii::app()->user->id);
            $clean_data=$data[0];

            if(!is_null($clean_data['roles'])){
                $role = $this->cleanRole($data[0]['roles']);
            }

            if(Yii::app()->user->role == 'Dev'){
                $messsages[] = ['success','Уважаемый эксперт','Ваш статус находится на согласовании. Ожидайте оповещения по почте указанной при регистрации.'];
                $messsages[] = ['primary','Уважаемый пользователь','Ваш проект успешно отправлен на согласование. Ожидайте оповещения по почте.'];
//              Yii::app()->user->setFlash("CONTACT_EMAIL", 'Имэйл отправлен');
            }

            $perc_prof = $this->CheckInfoPercentage($clean_data);

        }
        else{
            $this->redirect(Yii::app()->createUrl('showCase/login'));
        }
        $this->render('profile',array(
            'data'=>$clean_data,
            'model'=>$model,
            'role'=>$role,
            'messages'=>$messsages,
            'perc_prof'=>$perc_prof,
        ));
	}

    public function CheckInfoPercentage($arr){
        $key = 0;
        foreach($arr as $ar_k=>$ar_v){

            if( $ar_k !== 'FIRST_LAVEL_APPROVAL' ||
                $ar_k !== 'SECOND_LAVEL_RATING'  ||
                $ar_k !== 'THIRD_LAVEL_RATING'   ){
                if(empty($ar_v) || $ar_v == "" || $ar_v == " " || is_null( $ar_v) ){
                    $key++;
                }
            }
        }

        $num = count($arr);
        $percentage = (($num - $key)/$num)*100;
        return $percentage;



    }


    public function actionCheckFullInfo(){
        $user = new Users();
        $project= new ProjectRegistry();

        $user_info = $user->findProfileData(Yii::app()->user->id);
        $proj_info = $project->findProjectData(Yii::app()->user->id);

        foreach($user_info[0] as $i_k=>$i_v){
            if($i_v == null || $i_v == '' || $i_v == ' '){  echo json_encode('fail'); Yii::app()->end();  }
        }

        foreach ($proj_info[0] as $in_k=>$in_v) {

            if($in_k == 'FIRST_LAVEL_APPROVAL' || $in_k == 'SECOND_LAVEL_RATING' || $in_k == 'THIRD_LAVEL_RATING'){
                $in_v = 'not_count';
            }
            if($in_v == null || $in_v == '' || $in_v == ' '){  echo json_encode('fail'); Yii::app()->end();   }
        }



        $_POST['pk']=  $proj_info[0]['id'];
        $_POST['name']= 'FIRST_LAVEL_APPROVAL';
        $_POST['value']= '1';

        $this->forward('Autorized/updateProject',false);
        echo json_encode('ok');
            Yii::app()->end();

    }






    public function actionGetSpecialities(){
        echo CJSON::encode(Editable::source(Speciality::model()->findAll(), 'ID_SPECIALITY', 'NAME'));
    }
    public function actionGetUniversities(){
        echo CJSON::encode(Editable::source(University::model()->findAll(), 'ID_UNIVER', 'NAME_UNIVER'));
    }
    public function actionGetDistricts(){
        echo CJSON::encode(Editable::source(District::model()->findAll(), 'ID_DISTRICT', 'NAME'));
    }
    public function actionGetStages(){
        echo CJSON::encode(Editable::source(Stage::model()->findAll(), 'ID_STAGE', 'NAME_STAGE'));
    }
    public function actionGetPhases(){
        echo CJSON::encode(Editable::source(Phase::model()->findAll(), 'ID_PHASE', 'NAME'));
    }

    public function actionGetBudget(){
        echo CJSON::encode(Editable::source(Budget::model()->findAll(), 'ID_BUDGET', 'NAME'));
    }

    public function getAvatar(){
        if(is_null(Yii::app()->user->ava)){
            $ava = 'new.png';
        }
        else{ $ava = 'thumb_'.Yii::app()->user->ava;
        }

        return $ava;
    }

    public function DaysIn($date){
        $dnei_nazad = (int)((strtotime($date) - time())/86400) * -1;
        return $dnei_nazad;
    }

    public function cleanRole($role){
        switch($role){
            case 'Dev': $clean_role = 'Разработчик'; break;
            case 'Manager': $clean_role = 'Руководитель проекта'; break;
            case 'Exp':
            case 'Exp1':
            case 'Exp2':
            case 'Exp3': $clean_role = 'Эксперт'; break;
        }
        return $clean_role;
    }
    public function MakeOrder($id){
        if(strlen($id)==1){$order = '000'.$id;}
        if(strlen($id)==2){$order = '00'.$id;}
        if(strlen($id)==3){$order = '0'.$id;}
        if(strlen($id)==4){$order = $id;}
        return $order;
    }

    public function statusOk(){
        return '<i class="fa fa-check" style="color:green;"></i>';
    }

    public  function statusFail(){
        return '<i class="fa fa-times"></i>';
    }

    public function statusSpinner(){
        return '<i class="fa fa-spinner fa-spin"></i>';
    }
}