<?php

/**
 * This is the model class for table "m_w_notification_storage".
 *
 * The followings are the available columns in table 'm_w_notification_storage':
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $address
 * @property integer $user_id
 * @property string $repeat
 * @property string $type
 * @property string $color
 * @property integer $block
 */
class NotificationStorage extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_w_notification_storage';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, text, address, repeat, type', 'required'),
			array('user_id, block', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>300),
			array('text', 'length', 'max'=>500),
			array('address', 'length', 'max'=>50),
			array('repeat, type, color', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, text, address, user_id, repeat, type, color, block', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'text' => 'Text',
			'address' => 'Address',
			'user_id' => 'User',
			'repeat' => 'Repeat',
			'type' => 'Type',
			'color' => 'Color',
			'block' => 'Block',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('repeat',$this->repeat,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('block',$this->block);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return NotificationStorage the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}