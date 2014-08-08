<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $username
 * @property string $sername
 * @property string $email
 * @property string $roles
 * @property integer $password
 */
class Users extends CActiveRecord
{
            const ROLE_DEVELOPER = 'Dev';
            const ROLE_ADMIN = 'Admin';
            const ROLE_DIRECTOR = 'Director';
            const ROLE_USER = 'user';
            const ROLE_BANNED = 'banned';
    
       
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, sername, email, roles, password', 'required'),
			array('password', 'numerical', 'integerOnly'=>true),
			array('username, sername', 'length', 'max'=>40),
			array('email', 'length', 'max'=>50),
			array('roles', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, sername, email, roles, password', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                    
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'sername' => 'Sername',
			'email' => 'Email',
			'roles' => 'Roles',
			'password' => 'Password',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('sername',$this->sername,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('roles',$this->roles,true);
		$criteria->compare('password',$this->password);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
        public static function encrypting($value) {

                $site_key = Yii::app()->getParams()->hash_site_key;
                //hashing plain password with added salt
                return hash_hmac('sha256', $value, $site_key);

        }

       public function validatePassword($password)
        {
            return $this->encrypting($password)===$this->password;
        }


 
    /**
    * perform one-way encryption on the password before we store it in
    the database
    */
    protected function afterValidate()
    {
        parent::afterValidate();
        $this->password = $this->encrypting($this->password);
    }
        
        
        
        
        
        
}
