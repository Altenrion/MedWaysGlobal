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



    public function actionGetSpecialities(){
        echo CJSON::encode(Editable::source(Speciality::model()->findAll(), 'ID_SPECIALITY', 'NAME'));
    }
    public function actionGetUniversities(){
        echo CJSON::encode(Editable::source(University::model()->findAll(), 'ID_UNIVER', 'NAME_UNIVER'));
    }
    public function actionGetDistricts(){
        echo CJSON::encode(Editable::source(District::model()->findAll(), 'ID_DISTRICT', 'NAME'));
    }

}