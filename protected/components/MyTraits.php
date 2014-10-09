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

    public function Update($model ,array $posts){

        foreach($posts as $post_k=>$post_v){
            $_POST[$post_k] = $post_v;
        }


        $edit = new EditableSaver($model);
        $edit->scenario = 'update';
        $edit->update();
    }


    public function setParams($array){
        foreach($array as $ar_k=>$ar_v){

            $_POST[$ar_k] = $ar_v;
        }
    }


    public function checkMonth($date){

        $month = array(
            'January'=>'янв',
            'February'=>'фев',
            'March'=>'мар',
            'April'=>'апр',
            'May'=>'м',
            'June'=>'июн',
            'July'=>'июл',
            'August'=>'авг',
            'September'=>'сент',
            'October'=>'окт',
            'November'=>'нов',
            'December'=>'дек',

        );

        foreach($month as $m_k=>$m_v){
            $date = str_replace( $m_k,$m_v ,$date);
        }
        return $date;
    }




}

