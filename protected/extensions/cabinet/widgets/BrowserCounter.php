<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 02.09.14
 * Time: 19:53
 * To change this template use File | Settings | File Templates.
 */

class BrowserCounter extends CWidget{
    private $method;

    public function init(){
        $assetDir = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('cabinet.widgets.assets') );

        $this->method = Yii::app()->createUrl('Autorized/getBrowser');

        $cs = Yii::app()->getClientScript();
        $cs->registerScriptFile($assetDir.'/jquery-flot/jquery.flot.js', CClientScript::POS_END);
        $cs->registerScriptFile($assetDir.'/jquery-flot/jquery.flot.resize.min.js', CClientScript::POS_END);
        $cs->registerScriptFile($assetDir.'/jquery-flot/jquery.flot.pie.min.js', CClientScript::POS_END);
        $cs->registerScriptFile($assetDir.'/browser_counter.js', CClientScript::POS_END);

        $cs->registerCssFile( $assetDir.'/browser_counter.css');


    }

    public function run(){

         $this->render('body',array(
             'method'=>$this->method,
         ));
    }


}