<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.

Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
Yii::setPathOfAlias('editable', dirname(__FILE__).'/../extensions/x-editable');
Yii::setPathOfAlias('cabinet', dirname(__FILE__).'/../extensions/cabinet');

return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'',
    'language' => 'ru',

    // preloading 'log' component
    'preload'=>array('log'),

    // autoloading model and component classes
    'import'=>array(
        'application.models.medways.*',
        'application.models.*',
        'application.components.*',
        'editable.*',
        'ext.yii-mail.YiiMailMessage',
    ),

//    'defaultController'=>'ShowCase',
	// application components
	'components'=>array(
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=altenrion_medway',
            'emulatePrepare' => true,
            'username' => 'altenrion_medway',
            'password' => 'sBJ9RUYW',
            'charset' => 'utf8',
            'enableProfiling'=>true,
            // показываем значения параметров
            'enableParamLogging' => true,
        ),

        'mail' => array(
            'class' => 'ext.yii-mail.YiiMail',
            'transportType' => 'php',
//                    'transportType' => 'smtp',
//                    'transportOptions'=>array(
//                        'host'=>'smtp.timeweb.ru',
//                        //'encryption'=>'tls',
//                        'username'=>'administration@altenrion.ru',
//                        'password'=>'Altenrion',
//                        'port'=>25,
//                    ),
            'viewPath' => 'application.views.mail',
            'logging' => true,
            'dryRun' => false
        ),


//        'user'=>array(
//            // enable cookie-based authentication
//            'class'=> 'WebUser',
//            'allowAutoLogin'=>true,
//            'authTimeout'=>3600,
//            'loginUrl'=>array('ShowCase/login'),
//        ),

//        'authManager' => array(
//            // Будем использовать свой менеджер авторизации
//            'class' => 'PhpAuthManager',
//            // Роль по умолчанию. Все, кто не админы, модераторы и юзеры — гости.
//            'defaultRoles' => array('guest'),
//        ),
        'urlManager'=>array(
            'showScriptName' => false,
            'urlFormat'=>'path',

            'rules'=>array(
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
			),
		),
	),
);