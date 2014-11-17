<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 10.08.14
 * Time: 12:02
 * To change this template use File | Settings | File Templates.
 */

class Subscriber extends CFormModel {

    public $email;

    public function rules()
    {
        return array(
            array('email', 'required'),
            array('email','email','message'=>'Введите корректный адрес Email.'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'email'=>'Email',
        );
    }
}