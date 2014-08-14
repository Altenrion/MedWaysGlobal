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
		$this->render('profile');
	}




}