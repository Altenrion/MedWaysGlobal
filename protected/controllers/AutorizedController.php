<?php

class AutorizedController extends Controller
{

    use MyTraits;

    public  $layout = '//layouts/Adminka';
    public $defaultAction = 'index';

	public function actionIndex()
	{
		$this->render('index');
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

	public function actionProjectStatistics()
	{
		$this->render('project_statistics');
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

        $flag = 'Отправляй';
        $flag_one = '';
        $flag_two = '';


        foreach($user_info[0] as $i_k=>$i_v){
            if($i_v == null && $i_v == ''){  echo 'fail'; Yii::app()->end();  }
        }

        foreach ($proj_info as $info_two) {
            if($info_two == null && $info_two == ''){  echo 'fail'; Yii::app()->end();   }
        }

            echo 'ok';
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
        return '<span class="label label-success"><i class="fa fa-check"></i>'.$text.'</span>';
    }

    public  function statusFail($text=''){
        return '<span class="label label-danger"><i class="fa fa-times"></i>'.$text.'</span>';
    }

    public function statusSpinner(){
        return '<i class="fa fa-spinner fa-spin"></i>';
    }
}