<?php

class ShowCaseController extends Controller
{
    public  $layout = '//layouts/Proto';

	public function actionIndex()
	{

		$this->render('index');
	}

	public function actionPartners()
	{
		$this->render('partners');
	}

	public function actionStatistics()
	{
		$this->render('statistics');
	}

	public function actionTeam()
	{
		$this->render('team');
	}
    public function actionInfo()
	{
		$this->render('info_docs');
	}

    public function actionInfoPartners()
	{
		$this->render('info_partners');
	}

    public function actionInfoFAQ()
	{
		$this->render('info_FAQ');
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

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}