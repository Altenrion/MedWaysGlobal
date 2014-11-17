<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 05.09.14
 * Time: 12:00
 * To change this template use File | Settings | File Templates.
 */

class Browser {



    public static function  setBrowser($browser_client){
        $browser =  BrowserStorage::model()->findByPk(1);
        $browser->$browser_client++ ;
        $browser->update(array($browser_client));

    }

    public static function getBrowsers(){
        $browser =  BrowserStorage::model()->findByPk(1);



        $browser_list = CJSON::decode(CJSON::encode($browser));
            array_shift($browser_list);
            array_pop($browser_list);

        foreach($browser_list as $bro_k=>$bro_v){
            $browser_list[$bro_k] = (int) $bro_v;
        }

//
//        var_dump($browser_list);
//        die();
////
        return CJSON::encode($browser_list);
    }

}