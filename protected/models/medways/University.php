<?php

/**
 * This is the model class for table "m_w_university".
 *
 * The followings are the available columns in table 'm_w_university':
 * @property integer $ID_UNIVER
 * @property string $NAME_UNIVER
 * @property string $CONTACTS_UNIVER
 * @property integer $ID_DISTRICT
 *
 * The followings are the available model relations:
 * @property District $iDDISTRICT
 * @property Users[] $users
 */
class University extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_w_university';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NAME_UNIVER, CONTACTS_UNIVER, ID_DISTRICT', 'required'),
			array('ID_DISTRICT', 'numerical', 'integerOnly'=>true),
			array('NAME_UNIVER', 'length', 'max'=>100),
			array('CONTACTS_UNIVER', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_UNIVER, NAME_UNIVER, CONTACTS_UNIVER, ID_DISTRICT', 'safe', 'on'=>'search'),
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
			'iDDISTRICT' => array(self::BELONGS_TO, 'District', 'ID_DISTRICT'),
			'users' => array(self::HAS_MANY, 'Users', 'ID_UNIVER'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_UNIVER' => 'Id Univer',
			'NAME_UNIVER' => 'Name Univer',
			'CONTACTS_UNIVER' => 'Contacts Univer',
			'ID_DISTRICT' => 'Id District',
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

		$criteria->compare('ID_UNIVER',$this->ID_UNIVER);
		$criteria->compare('NAME_UNIVER',$this->NAME_UNIVER,true);
		$criteria->compare('CONTACTS_UNIVER',$this->CONTACTS_UNIVER,true);
		$criteria->compare('ID_DISTRICT',$this->ID_DISTRICT);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return University the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
