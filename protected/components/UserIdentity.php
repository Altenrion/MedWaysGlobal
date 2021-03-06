<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    protected $_id;
    public $role;


public function authenticate()
{
        $users = Users::model()->findByAttributes(array('EMAIL' => $this->EMAIL));

        //var_dump($users);
        if ($users === null)
        {
                $this->EMAIL = 'user Null';
                $this->errorCode = self::ERROR_USERNAME_INVALID;
        }
        
   
        else if(!$users->validatePassword($this->password))
        {
                Yii::log('encrypted db password: '.$users->password,'trace');
                Yii::log('input password: '.$this->password.' / encrypted: '.$users->encrypting($this->password),'trace');
                Yii::log('aktiv_key: '.$users->AKTIV_KEY ,'trace');

                $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }
        else if ($users->AKTIV_KEY !=='100'){

            Yii::log('aktiv_key: '.$users->AKTIV_KEY ,'trace');

            $this->errorCode=self::ERROR_PASSWORD_INVALID;

        }
        else
        {
                $this->errorCode = self::ERROR_NONE;
                $this->_id = $users->id;
                $this->setState('lock', 'unlocked');
                $this->setState('name', $users->F_NAME.' '.$users->L_NAME);
                $this->setState('email', $users->EMAIL);
                if(is_null($users->AVATAR) ){
                    $this->setState('ava', 'new.png');
                }
                else{ $this->setState('ava', $users->AVATAR); }
        }

        return $this->errorCode == self::ERROR_NONE;
}
       
    
    public function getId()
    {
        return $this->_id;
        
    }
    
    public function getRole(){
        
        $users = Users::model()->findByAttributes(array('EMAIL' => $this->EMAIL));
        if(in_array($users->roles, array('Dev', 'Admin')))
            return 1;
        if($users->roles == 'Manager')
            return 2;
        if($users->roles == 'Exp' || $users->roles == 'Exp1'|| $users->roles == 'Exp2'|| $users->roles == 'Exp3' )
            return 3;
        if($users->roles == 'Moder')
            return 4;
        if($users->roles == 'Moder1')
            return 4;


    }
    
    
    
}