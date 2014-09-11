<?php
/**
 * Created by JetBrains PhpStorm.
 * User: n.v.barishev
 * Date: 09.09.14
 * Time: 12:49
 * To change this template use File | Settings | File Templates.
 */

class Notify {

    /**
        Пример сохранения оповещения

        $notify = new Notify();
        $notify->SetNotify($address='Dev',$user_id=0,$title='Text2Text2',$text='Text3',$type='quick',$repeat='regular',$color='primary');
   */


    /**  Пачка констант, и внутренние атрибуты  */
    private $_notifies;

//    private $_title;        private $_text;
//    private $_address;      private $_user_id;      private $_repeat;
//    private $_type;         private $_color;

    private $_colors =array(  0=>'primary', 1=>'warning', 2=>'danger', 3=>'succsess',4=>' ' );

    const DEVELOPERS    = 'Dev';       const EXPERTS    = 'Experts';
    const USERS         = 'Users';     const ID         = 'id';
    const EXPERT        = 'Exp';       const EXPERT1    = 'Exp1';
    const EXPERT2       = 'Exp2';      const EXPERT3    = 'Exp3';
    const MANAGERS      = 'Manager';



    public function SetNotify($address,$user_id,$title,$text,$type,$repeat,$color=' '){

        $storage = new NotificationStorage();

        /**  Проверяем адресс   */
        if($address == self::ID){
            $storage->address = self::ID;
            $storage->user_id = $user_id;
        }

            else{
                switch($address){
                    case self::DEVELOPERS: $storage->address = self::DEVELOPERS;break;
                    case self::EXPERTS: $storage->address = self::EXPERTS;break;
                    case self::USERS: $storage->address = self::USERS;break;
                    case self::MANAGERS: $storage->address = self::MANAGERS;break;
                    case self::EXPERT: $storage->address = self::EXPERT;break;
                    case self::EXPERT1: $storage->address = self::EXPERT1;break;
                    case self::EXPERT2: $storage->address = self::EXPERT2;break;
                    case self::EXPERT3: $storage->address = self::EXPERT3;break;

                }
            }


        /**  Проверяем правильность указания регулярности оповещений    */
        ($repeat == 'once')?($storage->repeat = $repeat):($storage->repeat = 'regular');



        /**  Проверяем правильность указания прилипания оповещений    */
        ($type == 'sticky')?($storage->type = $type):($storage->type = 'quick');

        /**  Проверяем правильность указания цвета оповещений    */
        (in_array($color,$this->_colors) )?($storage->color = $color):($storage->color = 'primary');

        /** Пишем заголовок и текст оповещения */
        (isset($title))?($storage->title = $title):($storage->title = ' ');

        (isset($text))?($storage->text = $text):($storage->text = ' ');


        if($storage->save()){
            return true;
        }else
        throw new CHttpException(404,'При сохранении записи произошла ошибка');

    }

    public function GetNotify( $user_role,$user_id){
        $this->_notifies = array();
        $id_notifies = NotificationStorage::model()->findAll("user_id = '".$user_id."' AND block = 0");
        $role_notifies = '';

        if(!is_null($id_notifies)){ $this->packNotifies($id_notifies); }

        if( $user_role ==  self::DEVELOPERS) {
            $role_notifies = NotificationStorage::model()->findAll("address = '".$user_role."' AND block = 0");
        }
        if( $user_role ==  self::MANAGERS) {
            $role_notifies = NotificationStorage::model()->findAll("address = '".$user_role."' OR address='".self::USERS."' AND block = 0");
        }
        if( $user_role ==  self::EXPERT ||
            $user_role ==  self::EXPERT1 ||
            $user_role ==  self::EXPERT2 ||
            $user_role ==  self::EXPERT3) {

            $role_notifies = NotificationStorage::model()->findAll("address = '".$user_role."' OR address='".self::EXPERTS."' OR address='".self::USERS."' AND block = 0");

        }

        if(!is_null($role_notifies)){ $this->packNotifies($role_notifies); }

        if(!is_null($this->_notifies)){
            return $this->_notifies;
        } else  throw new CHttpException(404,'При поиске оповещений произошла ошибка');
    }

    public function packNotifies($array){
        $work_array = CJSON::decode(CJSON::encode($array));

        if(!is_null($work_array)){
            $this->_notifies = array_merge($this->_notifies,$work_array);
        }

    }


}