<?php

class AutorizedController extends Controller
{

    use MyTraits;

    public  $layout = '//layouts/Adminka';
    public $defaultAction = 'index';

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
                'actions'=>array('index', 'profile','info','news','project','statistics'),
                'users'=>array('?'),
            ),
            array('allow',
                'actions'=>array('profile','news',),
                'roles'=>array('Dev','Manager','Exp','Exp1','Exp2','Exp3'),
            ),
            array('deny',
                'actions'=>array('index','project','statistics'),
                'users'=>array('*'),
            ),
        );
    }


	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionStatistics()
	{
		$this->render('statistics');
	}

    public function actionFeedback()
	{
		$this->render('feedback');
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


	public function actionInfo()
	{
		$this->render('info');
	}

	public function actionNews()
	{
		$this->render('news');
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
        $model = new Users;
        if(!Yii::app()->user->isGuest){
            $data = $model->findProfileData(Yii::app()->user->id);
        }

        $this->render('profile',array(
            'data'=>$data,
            'model'=>$model,
        ));
	}


    public function actionCheckFullInfo(){
        $user = new Users();
        $project= new ProjectRegistry();

        $user_info = $user->findProfileData(Yii::app()->user->id);
        $proj_info = $project->findProjectData(Yii::app()->user->id);

//        var_dump($proj_info);
        foreach($user_info[0] as $i_k=>$i_v){
            if($i_v == null && $i_v == ''){  echo json_encode('fail'); Yii::app()->end();  }
        }

        foreach ($proj_info[0] as $in_k=>$in_v) {

            if($in_k == 'FIRST_LAVEL_APPROVAL' || $in_k == 'SECOND_LAVEL_RATING' || $in_k == 'THIRD_LAVEL_RATING'){
                $in_v = 'not_count';
            }
            if($in_v == null && $in_v == ''){  echo json_encode('fail'); Yii::app()->end();   }
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


    public function statusOk($text=''){
        return '<i class="fa fa-check"></i>';
    }

    public  function statusFail($text=''){
        return '<i class="fa fa-times"></i>';
    }

    public function statusSpinner(){
        return '<i class="fa fa-spinner fa-spin"></i>';
    }
}