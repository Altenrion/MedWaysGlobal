<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{

    protected function beforeAction($action)
    {

        /**
         * Подключаем проверку браузера,
         */
        $browser_client =  $this->browserChecker($_SERVER['HTTP_USER_AGENT']);

        /**
         * Узнаем к какому экшену идет обращение
         */
        $action_to_run = $action->getId();

        /**
         * Если к экшену с каунтером то не делаем каунт ;)
         */
        if($action_to_run !== 'getBrowser'){
             Browser::setBrowser($browser_client);
            return true;
        }

        return true;
    }



	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();


    private function browserChecker($agent){
        $user_agent = '';
        $cli = '';

        if ( strpos($agent, 'Firefox') )           { $user_agent = 'Yes';  $cli = 'Firefox';   }
        elseif( strpos($agent, 'OPR'))             { $user_agent = 'Yes';  $cli = 'Opera';     }
        elseif ( strpos($agent, 'Opera') )         { $user_agent = 'Yes';  $cli = 'Opera';     }
        elseif ( strpos($agent, 'Chrome') )        { $user_agent = 'Yes';  $cli = 'Chrome';    }
        elseif ( strpos($agent, 'Safari') )        { $user_agent = 'Yes';  $cli = 'Safari';    }
        elseif ( strpos($agent, 'MSIE 6.0') )      { $user_agent = 'no';   $cli = 'MSIE6';     }
        elseif ( strpos($agent, 'MSIE 7.0') )      { $user_agent = 'no';   $cli = 'MSIE7';     }
        elseif ( strpos($agent, 'MSIE 8.0') )      { $user_agent = 'no';   $cli = 'MSIE8';     }
        elseif ( strpos($agent, 'MSIE 9.0') )      { $user_agent = 'no';   $cli = 'MSIE9';     }
        elseif ( strpos($agent, 'MSIE 10.0') )     { $user_agent = 'Yes';  $cli = 'MSIE10';    }
        else{                                        $user_agent = 'Yes';  $cli = 'Others';    }

        if($user_agent == 'no'){ header( 'Location:http://vuznauka2014.medways.ru/IE.html' ); }
        if($user_agent == 'Yes'){ return $cli; }

    }



}