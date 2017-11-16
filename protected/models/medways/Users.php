<?php

/**
 * This is the model class for table "m_w_users".
 *
 * The followings are the available columns in table 'm_w_users':
 * @property integer $id
 * @property string $F_NAME
 * @property string $L_NAME
 * @property string $S_NAME
 * @property string $EMAIL
 * @property string $PHONE
 * @property integer $ID_DISTRICT
 * @property integer $ID_UNIVER
 * @property string $BIRTH_DATE
 * @property string $SEX
 * @property string $DEGREE
 * @property string $ACADEMIC_TITLE
 * @property string $W_POSITION
 * @property integer $HIRSH
 * @property integer $PRIVACY
 * @property integer $ID_STAGE
 * @property integer $ID_SPECIALITY
 * @property string $roles
 * @property integer $AKTIV_KEY
 * @property integer $REG_DATE
 * @property string $password
 * @property string $AVATAR
 *
 * The followings are the available model relations:
 * @property ProjectRegistry[] $projectRegistries
 * @property SecondLavelMarks $secondLavelMarks
 * @property District $iDDISTRICT
 * @property University $iDUNIVER
 * @property Stage $iDSTAGE
 * @property Speciality $iDSPECIALITY
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

    private $_old_password;
    public $ExpCount;
    public $ProjCount;
    public $UniverModer;
    public $updated_pass;


    protected function afterFind() // при чтении из базы
    {
        $this->_old_password = $this->password;
        parent::afterFind();
    }

    protected function beforeSave()
    {
        if (parent::beforeSave())
        {
            if ($this->password !== $this->_old_password)
            {
//                $this->salt = $this->generateSalt();
                $this->password = $this->encrypting($this->password);
                $this->updated_pass = $this->updated_pass;
            }
            return true;
        }
        else
            return false;
    }



	public function tableName()
	{
		return 'm_w_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('F_NAME, L_NAME, S_NAME, EMAIL, roles, password', 'required'),
			array('ID_DISTRICT, ID_UNIVER, HIRSH, ID_STAGE, ID_SPECIALITY, AKTIV_KEY', 'numerical', 'integerOnly'=>true),
			array('F_NAME, L_NAME, S_NAME, EMAIL, roles', 'length', 'max'=>50),
			array('PHONE', 'length', 'max'=>50),
			array('SEX', 'length', 'max'=>2 ),
//            array('AVATAR', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>true, 'on'=>'update'),
//            array('password','unsafe','on'=>'update'),
            array('AVATAR','safe','on'=>'update'),
            array('BIRTH_DATE', 'date', 'format'=>'yyyy-M-d'),
			array('DEGREE, ACADEMIC_TITLE, W_POSITION', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id,REG_DATE, L_NAME, S_NAME, EMAIL, PHONE, ID_DISTRICT, ID_UNIVER, SEX, DEGREE, ACADEMIC_TITLE, W_POSITION, HIRSH, PRIVACY, ID_STAGE, ID_SPECIALITY, roles, AKTIV_KEY, password', 'safe', 'on'=>'search'),
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
			'projectRegistry' => array(self::HAS_MANY, 'ProjectRegistry', 'ID_REPRESENTATIVE'),
			'secondLavelMarks' => array(self::HAS_ONE, 'SecondLavelMarks', 'ID_EXPERT'),
			'district' => array(self::BELONGS_TO, 'District', 'ID_DISTRICT'),
			'univer' => array(self::BELONGS_TO, 'University', 'ID_UNIVER'),
			'stage' => array(self::BELONGS_TO, 'Stage', 'ID_STAGE'),
			'speciality' => array(self::BELONGS_TO, 'Speciality', 'ID_SPECIALITY'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID ',
			'F_NAME' => 'Фамилия',
			'L_NAME' => 'Имя',
			'S_NAME' => 'Отчество',
			'EMAIL' => 'Email',
			'PHONE' => 'Телефон',
			'ID_DISTRICT' => 'Округ',
			'ID_UNIVER' => 'Университет',
			'BIRTH_DATE' => 'Дата рождения',
			'SEX' => 'Пол',
			'DEGREE' => 'Степень',
			'ACADEMIC_TITLE' => 'Academic Title',
			'W_POSITION' => 'W Position',
			'HIRSH' => 'Хирш',
			'PRIVACY' => 'Privacy',
			'ID_STAGE' => 'Платформа',
			'ID_SPECIALITY' => 'Специальность',
			'roles' => 'Роль',
			'AKTIV_KEY' => 'Aktiv Key',
			'password' => 'Пароль',
            'REG_DATE' => 'Дата регистрации'
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
		$criteria->compare('F_NAME',$this->F_NAME,true);
		$criteria->compare('L_NAME',$this->L_NAME,true);
		$criteria->compare('S_NAME',$this->S_NAME,true);
		$criteria->compare('EMAIL',$this->EMAIL,true);
        $criteria->compare('password',$this->password,true);
        $criteria->compare('PHONE',$this->PHONE,true);
        $criteria->compare('BIRTH_DATE',$this->BIRTH_DATE,true);
        $criteria->compare('SEX',$this->SEX,true);
        $criteria->compare('DEGREE',$this->DEGREE,true);
        $criteria->compare('ACADEMIC_TITLE',$this->ACADEMIC_TITLE,true);
        $criteria->compare('ID_DISTRICT',$this->ID_DISTRICT);
		$criteria->compare('ID_UNIVER',$this->ID_UNIVER);
		$criteria->compare('W_POSITION',$this->W_POSITION,true);
        $criteria->compare('ID_SPECIALITY',$this->ID_SPECIALITY);
        $criteria->compare('HIRSH',$this->HIRSH);
        $criteria->compare('PRIVACY',$this->PRIVACY);
        $criteria->compare('roles',$this->roles,true);
        $criteria->compare('REG_DATE',$this->REG_DATE,true);

        $criteria->compare('ID_STAGE',$this->ID_STAGE);
		$criteria->compare('AKTIV_KEY',$this->AKTIV_KEY);

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

    public function findProfileData($id){
        $data = Yii::app()->db->createCommand("SELECT
                user.id,
                user.F_NAME,
                user.L_NAME,
                user.S_NAME,
                user.EMAIL,
                user.PHONE,
                user.BIRTH_DATE,
                user.SEX,
                user.BIRTH_DATE,
                user.DEGREE,
                user.ACADEMIC_TITLE,
                (SELECT dist.NAME FROM m_w_district as dist WHERE dist.ID_DISTRICT = user.ID_DISTRICT) AS ID_DISTRICT,
                (SELECT univ.NAME_UNIVER FROM m_w_university as univ WHERE univ.ID_UNIVER = user.ID_UNIVER) AS ID_UNIVER,
                (SELECT spec.NAME FROM m_w_speciality as spec WHERE spec.ID_SPECIALITY = user.ID_SPECIALITY) AS ID_SPECIALITY,
                user.W_POSITION,
                user.HIRSH,
                user.PRIVACY,
                user.roles,
                user.REG_DATE,
                user.AVATAR

                FROM m_w_users as user
                WHERE user.id = $id")->queryAll();

        return $data;

    }

    public function getDistrictProjectsPoints(){
        $data = Yii::app()->db->createCommand(" SELECT distr.ID_DISTRICT, 
            IFNULL((select COUNT(*) from m_w_users as user WHERE user.AKTIV_KEY='100' 
                AND user.ID_DISTRICT= distr.ID_DISTRICT    
                AND user.roles='Manager'
                AND user.ID_DISTRICT is not NULL
                AND user.id IN (select proj.ID_REPRESENTATIVE FROM m_w_project_registry as proj where  proj.REG_DATE > ".Yii::app()->params['eventStartDate'].")
            ), 0 ) as counterr
            
            from m_w_district as distr
            GROUP BY distr.ID_DISTRICT")->queryAll();
        return $data;
    }
    public function getDistrictUniversPoints(){
        $data = Yii::app()->db->createCommand("SELECT distr.ID_DISTRICT, 
            IFNULL((select COUNT(DISTINCT user.ID_UNIVER) from m_w_users as user WHERE user.AKTIV_KEY='100' 
                AND user.ID_DISTRICT= distr.ID_DISTRICT    
                AND user.roles='Manager'
                AND user.ID_DISTRICT is not NULL
                AND user.id IN (select proj.ID_REPRESENTATIVE FROM m_w_project_registry as proj where  proj.REG_DATE > ".Yii::app()->params['eventStartDate'].")
                AND user.ID_UNIVER is not NULL
            
            ), 0 ) as counterr
            
            from m_w_district as distr
            GROUP BY distr.ID_DISTRICT ")->queryAll();
        return $data;
    }



}
