<?php



require_once('browser_test.php');


        defined('APPLICATION_ENV')
        || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));
        // Подключаем Yii
        $yii=dirname(__FILE__).'/framework/yii.php';

        /**
         * Включим дебаг если мы разработчики
         */
        if (APPLICATION_ENV == 'devel')
        {
            defined('YII_DEBUG') or define('YII_DEBUG',true);
            defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL', 3);
        }

        // А вот так мы подключим нужную нам конфигурацию
        $config = dirname(__FILE__).'/protected/config/'.APPLICATION_ENV.'.php';

        require_once($yii);
        Yii::createWebApplication($config)->run();

//
//        // change the following paths if necessary
//        $yii=dirname(__FILE__).'/framework/yii.php';
//        $config=dirname(__FILE__).'/protected/config/main.php';
//
//        // remove the following lines when in production mode
//        defined('YII_DEBUG') or define('YII_DEBUG',true);
//        // specify how many levels of call stack should be shown in each log message
//        defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
//
//        require_once($yii);
//        Yii::createWebApplication($config)->run();
