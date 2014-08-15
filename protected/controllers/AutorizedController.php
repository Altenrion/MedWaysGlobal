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




}