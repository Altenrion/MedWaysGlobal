<?php

/**
 * EditableSaver class file.
 *
 * @author Vitaliy Potapov <noginsk@rambler.ru>
 * @link https://github.com/vitalets/x-editable-yii
 * @copyright Copyright &copy; Vitaliy Potapov 2012
 * @version 1.3.1
 */

/**
 * EditableSaver helps to update model by editable widget submit request.
 *
 * @property mixed onBeforeUpdate
 * @property mixed onAfterUpdate
 *
 * @package saver
 */
class EditableSaver extends CComponent {

    public $atr_class_name;

    /**
     * scenario used in model for update. Can be taken from `scenario` POST param
     *
     * @var mixed
     */
    public $scenario;

    /**
     * name of model
     *
     * @var mixed
     */
    public $modelClass;

    /**
     * primaryKey value
     *
     * @var mixed
     */
    public $primaryKey;

    /**
     * name of attribute to be updated
     *
     * @var mixed
     */
    public $attribute;

    /**
     * model instance
     *
     * @var CActiveRecord
     */
    public $model;

    /**
     * @var mixed new value of attribute
     */
    public $value;

    /**
     * http status code returned in case of error
     */
    public $errorHttpCode = 400;

    /**
     * name of changed attributes. Used when saving model
     *
     * @var mixed
     */
    protected $changedAttributes = array();

    /**
     * Constructor
     *
     * @param mixed $modelName
     * @return EditableBackend
     */
    public function __construct($modelClass) {
        if (empty($modelClass)) {
            throw new CException(Yii::t('EditableSaver.editable', 'You should provide modelClass in constructor of EditableSaver.'));
        }

        $this->modelClass = $modelClass;

        //for non-namespaced models do ucfirst (for backwards compability)
        //see https://github.com/vitalets/x-editable-yii/issues/9
        if (strpos($this->modelClass, '\\') === false) {
            $this->modelClass = ucfirst($this->modelClass);
        }
    }

    /**
     * main function called to update column in database
     *
     */
    public function update() {
        //get params from request
        $this->primaryKey = yii::app()->request->getParam('pk');
        $this->attribute = yii::app()->request->getParam('name');
        $atributes = [
            'prospect_value',
            'rated_value',
            'sec_hold_comp_summ',
            'prim_hold_comp_summ',
            'summ_inc_nds',
            'guaranty_req'
            
           ];
        
        
        if(in_array($this->attribute,$atributes)){ 
            $this->value = $this->cleanMoney(yii::app()->request->getParam('value'));
            }
        else{
            $this->value = yii::app()->request->getParam('value'); }
        $this->scenario = yii::app()->request->getParam('scenario');

        //checking params
        if (empty($this->attribute)) {
            throw new CException(Yii::t('EditableSaver.editable', 'Property "attribute" should be defined.'));
        }

        $this->model = new $this->modelClass();

        $isFormModel = $this->model instanceOf CFormModel;
        $isMongo = EditableField::isMongo($this->model);

        if (empty($this->primaryKey) && !$isFormModel) {
            throw new CException(Yii::t('EditableSaver.editable', 'Property "primaryKey" should be defined.'));
        }

        //loading model
        if ($isMongo) {
            $this->model = $this->model->findByPk(new MongoID($this->primaryKey));
        } elseif (!$isFormModel) {
            $this->model = $this->model->findByPk($this->primaryKey);
        }

        if (!$this->model) {
            throw new CException(Yii::t('EditableSaver.editable', 'Model {class} not found by primary key "{pk}"', array(
                '{class}' => get_class($this->model), '{pk}' => is_array($this->primaryKey) ? CJSON::encode($this->primaryKey) : $this->primaryKey)));
        }

        //keep parent model for mongo
        $originalModel = $this->model;

        //resolve model only for mongo! we should check attribute safety
        if ($isMongo) {
            $resolved = EditableField::resolveModels($this->model, $this->attribute);
            $this->model = $resolved['model']; //can be related model now
            $this->attribute = $resolved['attribute'];
            $staticModel = $resolved['staticModel'];
        } else {
            $staticModel = $this->model;
        }

        //set scenario for main model
        if ($this->scenario) {
            $originalModel->setScenario($this->scenario);
        }

        //is attribute safe
        if (!$this->model->isAttributeSafe($this->attribute)) {
            throw new CException(Yii::t('editable', 'Model {class} rules do not allow to update attribute "{attr}"', array(
                '{class}' => get_class($this->model), '{attr}' => $this->attribute)));
        }


        ///////////тут будет логгер/////////////////////////////////////////////////////////////////////////
        $this->logger($this->model, $this->attribute, $this->value, $this->primaryKey);


        ///////////////////////////////////////////////////////////////////////////////
        //setting new value
        $this->setAttribute($this->attribute, $this->value);

        //validate attribute
        $this->model->validate(array($this->attribute));
        $this->checkErrors();

        //trigger beforeUpdate event
        $this->beforeUpdate();
        $this->checkErrors();

        //remove virtual attributes (which NOT in DB table)
        if (!$isMongo) {
            $this->changedAttributes = array_intersect($this->changedAttributes, $originalModel->attributeNames());
            if (count($this->changedAttributes) == 0) {
                //can not pass empty array in model->save() method!
                $this->changedAttributes = null;
            }
        }

        //saving (no validation, only changed attributes) note: for mongo save all!
        if ($isMongo) {
            $result = $originalModel->save(false, null);
        } elseif (!$isFormModel) {
            $result = $originalModel->save(false, $this->changedAttributes);
        } else {
            $result = true;
        }
        if ($result) {
            $this->afterUpdate();
        } else {
            $this->error(Yii::t('EditableSaver.editable', 'Error while saving record!'));
        }
    }

    /**
     * logger 
     * @param $model
     * @param $attr
     * @param $new_value
     * @param $pk
     * @throws CHttpException if validation fails
     *  Saves data to LOG TABLE for changed atribute
     * TABLE name is 'log_'.'atribute_name' 

     */
    public function logger($model, $attr, $new_value, $pk) {
        $atr_class = '';

        $model = $this->model->findByPk($pk);
        //$model->scenario = $this->scenario;

        $atr_name = explode('_', $attr);
        if (count($atr_name) > 1) {
            foreach ($atr_name as $name => &$value) {
                $atr_class .= ucfirst($value);
            }
        } else {
            $atr_class = ucfirst($attr);
        }

        $this->atr_class_name = $atr_class;
        $atr_class = new $this->atr_class_name;
        $atr_class->old_value = $model->{$attr};
        $atr_class->new_value = $new_value;
        $atr_class->user_id = Yii::app()->user->id;
        $atr_class->scenario = 'logger';
        $atr_class->pk = $this->primaryKey;
        
        
        
        $atr_class->validate($atr_class->new_value);
        if ($atr_class->hasErrors()) {
            $err = array();
                foreach ($atr_class->getErrors() as $attribute => $errors) {
                    $err = array_merge($err, $errors);
                }
            $this->error($err[0]);
        }
            else {
                $atr_class->save();
            }
        }
        
        
        
        /**
     * errors as CHttpException
     * @param $msg
     * @throws CHttpException

     */ 
    public function checkErrors() {
        if ($this->model->hasErrors()) {
            $msg = array();
            foreach ($this->model->getErrors() as $attribute => $errors) {
                $msg = array_merge($msg, $errors);
            }
            //todo: show several messages. should be checked in x-editable js
            //$this->error(join("\n", $msg));
            $this->error($msg[0]);
        }
    }

    /**
     * errors as CHttpException
     * @param $msg
     * @throws CHttpException
     */
    public function error($msg) {
        throw new CHttpException($this->errorHttpCode, $msg);
    }

    /**
     * setting new value of attribute.
     * Attrubute name also stored in array to save only changed attributes
     *
     * @param mixed $name
     * @param mixed $value
     */
    public function setAttribute($name, $value) {
        $this->model->$name = $value;
        if (!in_array($name, $this->changedAttributes)) {
            $this->changedAttributes[] = $name;
        }
    }

    /**
     * This event is raised before the update is performed.
     * @param CModelEvent $event the event parameter
     */
    public function onBeforeUpdate($event) {
        $this->raiseEvent('onBeforeUpdate', $event);
    }

    /**
     * This event is raised after the update is performed.
     * @param CEvent $event the event parameter
     */
    public function onAfterUpdate($event) {
        $this->raiseEvent('onAfterUpdate', $event);
    }

    /**
     * beforeUpdate
     *
     */
    protected function beforeUpdate() {
        $this->onBeforeUpdate(new CEvent($this));
    }

    /**
     * afterUpdate
     *
     */
    protected function afterUpdate() {
        $this->onAfterUpdate(new CEvent($this));
    }
    protected function cleanMoney($value){
        
        $check_p = strpos($value,'.');
        $check_c = strpos($value,',');

	if($check_p !== false){
		$ex= explode('.',$value);
		$l = strlen($ex[1]);
			if($l == 0 ){$num = str_replace(' ','',$ex[0]).'.00';}
			if($l == 1 ){$num = str_replace(' ','',$ex[0]).'.'.$ex[1].'0';}
			if($l == 2 ){$num = str_replace(' ','',$ex[0]).'.'.$ex[1];}
                        if($l >  2 ){$num = str_replace(' ','',$ex[0]).'.00';}
	}	
	if($check_c !== false){
		$ex= explode(',',$value);
		$l = strlen($ex[1]);
			if($l == 0 ){$num = str_replace(' ','',$ex[0]).'.00';}
			if($l == 1 ){$num = str_replace(' ','',$ex[0]).'.'.$ex[1].'0';}
			if($l == 2 ){$num = str_replace(' ','',$ex[0]).'.'.$ex[1];}
                        if($l >  2 ){$num = str_replace(' ','',$ex[0]).'.00';}
	}	
	if($check_c === false && $check_p === false){		
		$num = str_replace(' ','',$value).'.00';		
	}
        return $num;
        }
    
    

}
