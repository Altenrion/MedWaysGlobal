<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 02.09.14
 * Time: 19:53
 * To change this template use File | Settings | File Templates.
 */

class Notificator extends CWidget{
    private $_notifies;

    public function init(){
//        $assetDir = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('cabinet.widgets.assets') );

        $notifies = new Notify();
        $this->_notifies = $notifies->GetNotify(Yii::app()->user->role,Yii::app()->user->id);

//        $cs = Yii::app()->getClientScript();
//        $cs->registerScriptFile($assetDir.'/jquery-flot/jquery.flot.js', CClientScript::POS_END);
//        $cs->registerScriptFile($assetDir.'/jquery-flot/jquery.flot.resize.min.js', CClientScript::POS_END);
//        $cs->registerScriptFile($assetDir.'/jquery-flot/jquery.flot.pie.min.js', CClientScript::POS_END);
//        $cs->registerScriptFile($assetDir.'/browser_counter.js', CClientScript::POS_END);
//
//        $cs->registerCssFile( $assetDir.'/browser_counter.css');
//
//        var_dump($this->_notifies);
//        Yii::app()->end();

    }

    public function run(){

         $this->render('notify',array(
             'notifies'=>$this->_notifies,
         ));
    }


}