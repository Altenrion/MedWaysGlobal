<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('bootstrap', dirname(__FILE__).'/../extensions/bootstrap');
Yii::setPathOfAlias('editable', dirname(__FILE__).'/../extensions/x-editable');
Yii::setPathOfAlias('cabinet', dirname(__FILE__).'/../extensions/cabinet');


// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
        'theme'=>'bootstrap',
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
                'cabinet.widgets.BrowserCounter',
                'ext.edatatables.*',
	    ),

        'defaultController'=>'ShowCase',


	    'modules'=>array(
            
                'gii'=>array(
                    'class'=>'system.gii.GiiModule',
                    'password'=>'Altenrion',
                    'ipFilters'=>array('127.0.0.1','::1'),
                    'generatorPaths'=>array(
                         'bootstrap.gii',
                     ),
                ),

	    ),

	// application components
	'components'=>array(
            
                'editable' => array(
                    'class'     => 'editable.EditableConfig',
                    'form'      => 'bootstrap',        //form style: 'bootstrap', 'jqueryui', 'plain' 
                    'mode'      => 'popup',            //mode: 'popup' or 'inline'
                    'defaults'  => array(              //default settings for all editable elements
                       'emptytext' => 'не указано'
                    ),
                    
                ),  

                'user'=>array(
                    // enable cookie-based authentication
                        'class'=> 'WebUser',
                        'allowAutoLogin'=>true,
                        'authTimeout'=>3600,
                        'loginUrl'=>array('ShowCase/login'),
                ),

                'authManager' => array(
                        // Будем использовать свой менеджер авторизации
                        'class' => 'PhpAuthManager',
                        // Роль по умолчанию. Все, кто не админы, модераторы и юзеры — гости.
                        'defaultRoles' => array('guest'),
                ),
            
                'bootstrap'=>array(
                        'class'=>'bootstrap.components.Bootstrap',
                 ),
            
                'urlManager'=>array(
                        'showScriptName' => false,
                        'urlFormat'=>'path',

                    'rules'=>array(
                        '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                        '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                    ),
                ),

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


                'errorHandler'=>array(
                        // use 'site/error' action to display errors
                        'errorAction'=>'ShowCase/error',
                        'adminInfo'=>'landerfeld@gmail.com'
                ),

                'log'=>array(
                        'class'=>'CLogRouter',
                        'routes'=>array(
//                                array(
//                                    'class' => 'CWebLogRoute',
////                                    'categories' => 'application',
//                                    'levels'=>'error, warning, trace, profile, info',
//                                ),
//				                array(
//                                        'class'=>'CProfileLogRoute',
//                                         'levels'=>'profile',
//                                         'enabled'=>true,
//				                ),
                                array(
                                    'class'=>'CFileLogRoute',
                                    'levels'=>'trace, info, error, warning',
                                    'categories'=>'system.*',
                                ),
//
//
////				             uncomment the following to show log messages on web pages
//				                array(
//                                    'class'=>'CWebLogRoute',
//                                ),
//
			        ),
		        )
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		        'adminEmail'=>'Administration@medways.ru',
                'hash_site_key' => 'dlfkgknbcvjkbsdkjflsdkhfdf34534jkHL$@#K$^kb',
                'postsPerPage' => 10,
                'downloads'=>Yii::app()->basePath,
	),
);