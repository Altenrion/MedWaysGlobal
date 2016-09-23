<?php


/** Указание среды */

if (!defined('APPLICATION_ENV')) {
    if ($_SERVER['SERVER_NAME'] == "medwaysglobal") {
        define(APPLICATION_ENV, 'development');
    } else {
        define(APPLICATION_ENV, 'production');
    }
}

/** Определение среды */

defined('APPLICATION_ENV') || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));
// Подключаем Yii
$yii = dirname(__FILE__) . '/framework/yii.php';


/** Включим дебаг если мы разработчики */

if (APPLICATION_ENV == 'development') {
    defined('YII_DEBUG') or define('YII_DEBUG', true);
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
}

/** Подключим нужную нам конфигурацию */

$config = dirname(__FILE__) . '/protected/config/' . APPLICATION_ENV . '.php';



require_once($yii);
$YiiApp = Yii::createWebApplication($config);

/**
 * Тут можно подключить много всяких штук, но каунтер браузеров
 *  перенесен в beforeAction класса Controller
 */

$YiiApp->run();

