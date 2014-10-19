<?php

/**
 * This is the model class for table "m_w_cr_answers".
 *
 * The followings are the available columns in table 'm_w_cr_answers':
 * @property integer $ID_ANSWER
 * @property string $NAME
 * @property integer $INDEX
 * @property integer $ID_CRITERIA
 *
 * The followings are the available model relations:
 * @property Creities $iDCRITERIA
 */
class CrAnswers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_w_cr_answers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NAME, INDEX, ID_CRITERIA', 'required'),
			array('INDEX, ID_CRITERIA', 'numerical', 'integerOnly'=>true),
			array('NAME', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_ANSWER, NAME, INDEX, ID_CRITERIA', 'safe', 'on'=>'search'),
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
			'iDCRITERIA' => array(self::BELONGS_TO, 'Creities', 'ID_CRITERIA'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_ANSWER' => 'Id Answer',
			'NAME' => 'Name',
			'INDEX' => 'Index',
			'ID_CRITERIA' => 'Id Criteria',
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

		$criteria->compare('ID_ANSWER',$this->ID_ANSWER);
		$criteria->compare('NAME',$this->NAME,true);
		$criteria->compare('INDEX',$this->INDEX);
		$criteria->compare('ID_CRITERIA',$this->ID_CRITERIA);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CrAnswers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
