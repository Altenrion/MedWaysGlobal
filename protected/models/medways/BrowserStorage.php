<?php

/**
 * This is the model class for table "m_w_browser_storage".
 *
 * The followings are the available columns in table 'm_w_browser_storage':
 * @property integer $id
 * @property integer $Firefox
 * @property integer $Opera
 * @property integer $Chrome
 * @property integer $Safari
 * @property integer $MSIE6
 * @property integer $MSIE7
 * @property integer $MSIE8
 * @property integer $MSIE9
 * @property integer $MSIE10
 * @property integer $Others
 * @property integer $Total_views
 */
class BrowserStorage extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_w_browser_storage';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id, Firefox, Opera, Chrome, Safari, MSIE6, MSIE7, MSIE8, MSIE9, MSIE10, Others, Total_views', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, Firefox, Opera, Chrome, Safari, MSIE6, MSIE7, MSIE8, MSIE9, MSIE10, Others, Total_views', 'safe', 'on'=>'search'),
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
			'Firefox' => 'Firefox',
			'Opera' => 'Opera',
			'Chrome' => 'Chrome',
			'Safari' => 'Safari',
			'MSIE6' => 'Msie6',
			'MSIE7' => 'Msie7',
			'MSIE8' => 'Msie8',
			'MSIE9' => 'Msie9',
			'MSIE10' => 'Msie10',
			'Others' => 'Others',
			'Total_views' => 'Total Views',
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
		$criteria->compare('Firefox',$this->Firefox);
		$criteria->compare('Opera',$this->Opera);
		$criteria->compare('Chrome',$this->Chrome);
		$criteria->compare('Safari',$this->Safari);
		$criteria->compare('MSIE6',$this->MSIE6);
		$criteria->compare('MSIE7',$this->MSIE7);
		$criteria->compare('MSIE8',$this->MSIE8);
		$criteria->compare('MSIE9',$this->MSIE9);
		$criteria->compare('MSIE10',$this->MSIE10);
		$criteria->compare('Others',$this->Others);
		$criteria->compare('Total_views',$this->Total_views);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BrowserStorage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
