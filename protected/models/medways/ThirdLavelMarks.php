<?php

/**
 * This is the model class for table "m_w_third_lavel_marks".
 *
 * The followings are the available columns in table 'm_w_third_lavel_marks':
 * @property integer $ID_MARK
 * @property integer $ID_EXPERT
 * @property integer $ID_PROJECT
 * @property integer $mark_1
 * @property integer $mark_2
 * @property integer $mark_3
 * @property integer $mark_4
 * @property integer $mark_5
 * @property integer $mark_6
 * @property integer $mark_7
 * @property integer $mark_8
 * @property integer $mark_9
 * @property integer $mark_10
 * @property integer $TOTAL_MARK
 *
 * The followings are the available model relations:
 * @property ProjectRegistry $iDPROJECT
 * @property Users $iDEXPERT
 */
class ThirdLavelMarks extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_w_third_lavel_marks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_EXPERT, ID_PROJECT, mark_1, mark_2, mark_3, mark_4, mark_5, mark_6, mark_7, mark_8, mark_9, mark_10, TOTAL_MARK', 'required'),
			array('ID_EXPERT, ID_PROJECT, mark_1, mark_2, mark_3, mark_4, mark_5, mark_6, mark_7, mark_8, mark_9, mark_10, TOTAL_MARK', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_MARK, ID_EXPERT, ID_PROJECT, mark_1, mark_2, mark_3, mark_4, mark_5, mark_6, mark_7, mark_8, mark_9, mark_10, TOTAL_MARK', 'safe', 'on'=>'search'),
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
			'iDPROJECT' => array(self::BELONGS_TO, 'ProjectRegistry', 'ID_PROJECT'),
			'iDEXPERT' => array(self::BELONGS_TO, 'Users', 'ID_EXPERT'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_MARK' => 'Id Mark',
			'ID_EXPERT' => 'Id Expert',
			'ID_PROJECT' => 'Id Project',
			'mark_1' => 'Mark 1',
			'mark_2' => 'Mark 2',
			'mark_3' => 'Mark 3',
			'mark_4' => 'Mark 4',
			'mark_5' => 'Mark 5',
			'mark_6' => 'Mark 6',
			'mark_7' => 'Mark 7',
			'mark_8' => 'Mark 8',
			'mark_9' => 'Mark 9',
			'mark_10' => 'Mark 10',
			'TOTAL_MARK' => 'Total Mark',
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

		$criteria->compare('ID_MARK',$this->ID_MARK);
		$criteria->compare('ID_EXPERT',$this->ID_EXPERT);
		$criteria->compare('ID_PROJECT',$this->ID_PROJECT);
		$criteria->compare('mark_1',$this->mark_1);
		$criteria->compare('mark_2',$this->mark_2);
		$criteria->compare('mark_3',$this->mark_3);
		$criteria->compare('mark_4',$this->mark_4);
		$criteria->compare('mark_5',$this->mark_5);
		$criteria->compare('mark_6',$this->mark_6);
		$criteria->compare('mark_7',$this->mark_7);
		$criteria->compare('mark_8',$this->mark_8);
		$criteria->compare('mark_9',$this->mark_9);
		$criteria->compare('mark_10',$this->mark_10);
		$criteria->compare('TOTAL_MARK',$this->TOTAL_MARK);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ThirdLavelMarks the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
