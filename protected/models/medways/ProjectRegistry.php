<?php

/**
 * This is the model class for table "m_w_project_registry".
 *
 * The followings are the available columns in table 'm_w_project_registry':
 * @property integer $ID_PROJECT
 * @property integer $ID_REPRESENTATIVE
 * @property integer $ID_STAGE
 * @property string $NAME
 * @property string $DESCR_PROJECT
 * @property string $ROADMAP_PROJECT
 * @property integer $ID_PHASE
 * @property integer $ID_BUDGET
 * @property integer $EXECUTERS_NUM
 * @property integer $UN_THIRTY_FIVE
 * @property integer $STUDY
 * @property integer $PUBLICATIONS
 * @property integer $FORIN_PUBL
 * @property integer $START_YEAR
 * @property integer $END_YEAR
 * @property integer $YEAR_BUDGET
 * @property integer $LONG_BUDGET
 * @property integer $CO_FINANCING
 * @property integer $PRIVACY_P
 * @property integer $FIRST_LAVEL_APPROVAL
 * @property string $FIRST_LAVEL_COMMENT
 * @property integer $SECOND_LAVEL_RATING
 * @property integer $THIRD_LAVEL_RATING
 * @property string $REG_DATE
 *
 * The followings are the available model relations:
 * @property Users $iDREPRESENTATIVE
 * @property Stage $iDSTAGE
 * @property Phase $iDPHASE
 * @property Budget $iDBUDGET
 * @property SecondLavelMarks[] $secondLavelMarks
 */
class ProjectRegistry extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_w_project_registry';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ID_REPRESENTATIVE', 'required'),
			array('ID_REPRESENTATIVE,YEAR_BUDGET, LONG_BUDGET, CO_FINANCING ,ID_STAGE, ID_PHASE, ID_BUDGET, EXECUTERS_NUM, UN_THIRTY_FIVE, STUDY, PUBLICATIONS, FORIN_PUBL, START_YEAR, END_YEAR, PRIVACY_P, FIRST_LAVEL_APPROVAL, SECOND_LAVEL_RATING, THIRD_LAVEL_RATING', 'numerical', 'integerOnly'=>true),
			array('NAME', 'length', 'max'=>400),
            array('ROADMAP_PROJECT','safe','on'=>'update'),
			array('DESCR_PROJECT' , 'length', 'max'=>1500),
            array('FIRST_LAVEL_COMMENT', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_PROJECT, ID_REPRESENTATIVE, ID_STAGE, NAME, DESCR_PROJECT, ROADMAP_PROJECT, ID_PHASE, ID_BUDGET, EXECUTERS_NUM, UN_THIRTY_FIVE, STUDY, PUBLICATIONS, FORIN_PUBL, START_YEAR, END_YEAR, YEAR_BUDGET, LONG_BUDGET, CO_FINANCING, PRIVACY_P, FIRST_LAVEL_APPROVAL, SECOND_LAVEL_RATING, THIRD_LAVEL_RATING', 'safe', 'on'=>'search'),
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
			'iDREPRESENTATIVE' => array(self::BELONGS_TO, 'Users', 'ID_REPRESENTATIVE'),
			'iDSTAGE' => array(self::BELONGS_TO, 'Stage', 'ID_STAGE'),
			'iDPHASE' => array(self::BELONGS_TO, 'Phase', 'ID_PHASE'),
			'iDBUDGET' => array(self::BELONGS_TO, 'Budget', 'ID_BUDGET'),
			'secondLavelMarks' => array(self::HAS_MANY, 'SecondLavelMarks', 'ID_PROJECT'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_PROJECT' => 'Id Project',
			    'ID_REPRESENTATIVE' => 'Id Representative',
			    'ID_STAGE' => 'Id Stage',
			    'NAME' => 'Name',
			    'DESCR_PROJECT' => 'Descr Project',
			    'ROADMAP_PROJECT' => 'Roadmap Project',
			    'ID_PHASE' => 'Id Phase',
			'ID_BUDGET' => 'Id Budget',
			    'EXECUTERS_NUM' => ' Количество исполнителей',
			    'UN_THIRTY_FIVE' => 'Кол',
			    'STUDY' => 'Количество обучающиеся',
			    'PUBLICATIONS' => 'Количество публикаций',
			    'FORIN_PUBL' => 'Количество публикаций в зарубежных изданиях',
			    'START_YEAR' => 'Год начала',
			    'END_YEAR' => 'Год окончания',
			    'YEAR_BUDGET' => 'Бюджет на год',
			    'LONG_BUDGET' => 'Бюджет на период реализации',
			    'CO_FINANCING' => 'Объем софинансирования',
			    'PRIVACY_P' => 'Privacy',


			'FIRST_LAVEL_APPROVAL' => 'First Lavel Approval',
			'SECOND_LAVEL_RATING' => 'Second Lavel Rating',
			'THIRD_LAVEL_RATING' => 'Third Lavel Rating',
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

		$criteria->compare('ID_PROJECT',$this->ID_PROJECT);
		$criteria->compare('ID_REPRESENTATIVE',$this->ID_REPRESENTATIVE);
		    $criteria->compare('ID_STAGE',$this->ID_STAGE);
		$criteria->compare('NAME',$this->NAME,true);
		$criteria->compare('DESCR_PROJECT',$this->DESCR_PROJECT,true);
		    $criteria->compare('ROADMAP_PROJECT',$this->ROADMAP_PROJECT,true);
		    $criteria->compare('ID_PHASE',$this->ID_PHASE);
		    $criteria->compare('ID_BUDGET',$this->ID_BUDGET);
		$criteria->compare('EXECUTERS_NUM',$this->EXECUTERS_NUM);
		$criteria->compare('UN_THIRTY_FIVE',$this->UN_THIRTY_FIVE);
		$criteria->compare('STUDY',$this->STUDY);
		$criteria->compare('PUBLICATIONS',$this->PUBLICATIONS);
		$criteria->compare('FORIN_PUBL',$this->FORIN_PUBL);
		$criteria->compare('START_YEAR',$this->START_YEAR);
		$criteria->compare('END_YEAR',$this->END_YEAR);
        $criteria->compare('YEAR_BUDGET',$this->YEAR_BUDGET,true);
        $criteria->compare('LONG_BUDGET',$this->LONG_BUDGET,true);
        $criteria->compare('CO_FINANCING',$this->CO_FINANCING,true);
        $criteria->compare('PRIVACY_P',$this->PRIVACY_P);
		$criteria->compare('FIRST_LAVEL_APPROVAL',$this->FIRST_LAVEL_APPROVAL);
		$criteria->compare('SECOND_LAVEL_RATING',$this->SECOND_LAVEL_RATING);
		$criteria->compare('THIRD_LAVEL_RATING',$this->THIRD_LAVEL_RATING);
        $criteria->compare('FIRST_LAVEL_COMMENT',$this->FIRST_LAVEL_COMMENT,true);
        $criteria->compare('REG_DATE',$this->REG_DATE,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProjectRegistry the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function findProjectData($id){
        $data = Yii::app()->db->createCommand("SELECT
                proj.ID_PROJECT as id,
                proj.NAME,
                proj.DESCR_PROJECT,
                proj.EXECUTERS_NUM,
                proj.UN_THIRTY_FIVE,
                proj.STUDY,
                proj.PUBLICATIONS,
                proj.FORIN_PUBL,
                proj.START_YEAR,
                proj.END_YEAR,
                proj.YEAR_BUDGET,
                proj.LONG_BUDGET,
                proj.CO_FINANCING,
                proj.FIRST_LAVEL_APPROVAL,
                proj.SECOND_LAVEL_RATING,
                proj.THIRD_LAVEL_RATING,
                proj.FIRST_LAVEL_COMMENT,
                proj.ROADMAP_PROJECT,
                (SELECT stage.NAME_STAGE FROM m_w_stage as stage WHERE stage.ID_STAGE = proj.ID_STAGE) AS ID_STAGE,

                (SELECT phase.NAME FROM m_w_phase as phase WHERE phase.ID_PHASE = proj.ID_PHASE) AS ID_PHASE,
                (SELECT budget.NAME FROM m_w_budget as budget WHERE budget.ID_BUDGET = proj.ID_BUDGET) AS ID_BUDGET


                FROM m_w_project_registry as proj
                WHERE proj.ID_REPRESENTATIVE = $id")->queryAll();

        return $data;

    }




}
