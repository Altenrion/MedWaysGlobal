<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 09.08.14
 * Time: 11:52
 * To change this template use File | Settings | File Templates.
 */

trait MyTraits {

    public function checkRole(array $roles){
        if(!empty($roles)){
            $reply = false;
            foreach ($roles as $r_k=>$r_v) {
                $check = Yii::app()->user->checkAccess($r_v);
                if($check == true){
                    $reply = true;
                }
            }
            return $reply;

        }

    }

    public function setParams($array){
        foreach($array as $ar_k=>$ar_v){

            $_POST[$ar_k] = $ar_v;
        }
    }





}

