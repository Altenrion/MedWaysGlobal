<?php

/**
 * This is the model class for table "m_w_users".
 *
 * The followings are the available columns in table 'm_w_users':
 * @property integer $ID_USER
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
 * @property string $ROLE
 * @property integer $AKTIV_KEY
 * @property string $PASSWD
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
			array('F_NAME, L_NAME, S_NAME, EMAIL, PHONE, ID_DISTRICT, ID_UNIVER, BIRTH_DATE, SEX, DEGREE, ACADEMIC_TITLE, W_POSITION, HIRSH, PRIVACY, ID_STAGE, ID_SPECIALITY, ROLE, PASSWD', 'required'),
			array('ID_DISTRICT, ID_UNIVER, HIRSH, PRIVACY, ID_STAGE, ID_SPECIALITY, AKTIV_KEY', 'numerical', 'integerOnly'=>true),
			array('F_NAME, L_NAME, S_NAME, EMAIL, ROLE, PASSWD', 'length', 'max'=>50),
			array('PHONE', 'length', 'max'=>20),
			array('SEX', 'length', 'max'=>2),
			array('DEGREE, ACADEMIC_TITLE, W_POSITION', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_USER, F_NAME, L_NAME, S_NAME, EMAIL, PHONE, ID_DISTRICT, ID_UNIVER, BIRTH_DATE, SEX, DEGREE, ACADEMIC_TITLE, W_POSITION, HIRSH, PRIVACY, ID_STAGE, ID_SPECIALITY, ROLE, AKTIV_KEY, PASSWD', 'safe', 'on'=>'search'),
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
			'projectRegistries' => array(self::HAS_MANY, 'ProjectRegistry', 'ID_REPRESENTATIVE'),
			'secondLavelMarks' => array(self::HAS_ONE, 'SecondLavelMarks', 'ID_EXPERT'),
			'iDDISTRICT' => array(self::BELONGS_TO, 'District', 'ID_DISTRICT'),
			'iDUNIVER' => array(self::BELONGS_TO, 'University', 'ID_UNIVER'),
			'iDSTAGE' => array(self::BELONGS_TO, 'Stage', 'ID_STAGE'),
			'iDSPECIALITY' => array(self::BELONGS_TO, 'Speciality', 'ID_SPECIALITY'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_USER' => 'Id User',
			'F_NAME' => 'F Name',
			'L_NAME' => 'L Name',
			'S_NAME' => 'S Name',
			'EMAIL' => 'Email',
			'PHONE' => 'Phone',
			'ID_DISTRICT' => 'Id District',
			'ID_UNIVER' => 'Id Univer',
			'BIRTH_DATE' => 'Birth Date',
			'SEX' => 'Sex',
			'DEGREE' => 'Degree',
			'ACADEMIC_TITLE' => 'Academic Title',
			'W_POSITION' => 'W Position',
			'HIRSH' => 'Hirsh',
			'PRIVACY' => 'Privacy',
			'ID_STAGE' => 'Id Stage',
			'ID_SPECIALITY' => 'Id Speciality',
			'ROLE' => 'Role',
			'AKTIV_KEY' => 'Aktiv Key',
			'PASSWD' => 'Passwd',
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

		$criteria->compare('ID_USER',$this->ID_USER);
		$criteria->compare('F_NAME',$this->F_NAME,true);
		$criteria->compare('L_NAME',$this->L_NAME,true);
		$criteria->compare('S_NAME',$this->S_NAME,true);
		$criteria->compare('EMAIL',$this->EMAIL,true);
		$criteria->compare('PHONE',$this->PHONE,true);
		$criteria->compare('ID_DISTRICT',$this->ID_DISTRICT);
		$criteria->compare('ID_UNIVER',$this->ID_UNIVER);
		$criteria->compare('BIRTH_DATE',$this->BIRTH_DATE,true);
		$criteria->compare('SEX',$this->SEX,true);
		$criteria->compare('DEGREE',$this->DEGREE,true);
		$criteria->compare('ACADEMIC_TITLE',$this->ACADEMIC_TITLE,true);
		$criteria->compare('W_POSITION',$this->W_POSITION,true);
		$criteria->compare('HIRSH',$this->HIRSH);
		$criteria->compare('PRIVACY',$this->PRIVACY);
		$criteria->compare('ID_STAGE',$this->ID_STAGE);
		$criteria->compare('ID_SPECIALITY',$this->ID_SPECIALITY);
		$criteria->compare('ROLE',$this->ROLE,true);
		$criteria->compare('AKTIV_KEY',$this->AKTIV_KEY);
		$criteria->compare('PASSWD',$this->PASSWD,true);

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
}
