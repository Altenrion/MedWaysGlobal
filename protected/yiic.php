<?php

// change the following paths if necessary
//$yiic=dirname(__FILE__).'/../framework/yiic.php';
//
//require_once($yiic);
//


defined('STDIN') or define('STDIN', fopen('php://stdin', 'r'));

defined('YII_DEBUG') or define('YII_DEBUG',true);

require_once(dirname(__FILE__).'/../framework/yii.php');
$config=dirname(__FILE__).'/config/console.php';

if(isset($config))
{
    $app=Yii::createConsoleApplication($config);
    $app->commandRunner->addCommands(YII_PATH.'/cli/commands');
}
else
    $app=Yii::createConsoleApplication(array('basePath'=>dirname(__FILE__).'/cli'));

$env=@getenv('YII_CONSOLE_COMMANDS');
if(!empty($env))
    $app->commandRunner->addCommands($env);

Yii::setPathOfAlias('webroot', dirname(__FILE__).'/../../');

$app->run();

