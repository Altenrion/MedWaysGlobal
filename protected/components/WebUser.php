<?php


/**
 * Description of WebUser
 *
 * @author adm_trivia
 */
class WebUser extends CWebUser {
    private $_model = null;
    //protected $_roles;
    //public $role;
    
    function getRole() {
        if($user = $this->getModel()){
            // в таблице Users есть поле roles
            return $user->roles;
        }
    }
 
    private function getModel(){
        if (!$this->isGuest && $this->_model === null){
            $this->_model = Users::model()->findByPk($this->id, array('select' => 'roles'));
        }
        return $this->_model;
    }
}

?>
