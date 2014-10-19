<?php
/**
 * EDataColumn class file.
 *
 * @license http://www.yiiframework.com/license/
 */

Yii::import('zii.widgets.grid.CDataColumn');

/**
 *
 */
class EDataColumn extends CDataColumn {
	/**
	 * Renders the header cell.
	 */
	public function renderHeaderCell()
	{
		$this->headerHtmlOptions['id']=$this->id;
		echo CHtml::openTag('th',$this->headerHtmlOptions);
		$this->renderHeaderCellContent();
		echo "</th>";
	}

	/**
	 * Renders the header cell content.
	 * This method will render a link that can trigger the sorting if the column is sortable.
	 */
	protected function renderHeaderCellContent() {
		if($this->name!==null && $this->header===null)
		{
			if($this->grid->dataProvider instanceof CActiveDataProvider)
				echo CHtml::encode($this->grid->dataProvider->model->getAttributeLabel($this->name));
			else
				echo CHtml::encode($this->name);
		}
		else
			echo trim($this->header)!=='' ? $this->header : $this->grid->blankDisplay;
			//parent::renderHeaderCellContent();
	}

	protected function renderDataCellContent($row,$data) {
		if (!$this->visible)
			return $this->grid->nullDisplay;
		else
			return parent::renderDataCellContent($row,$data);
	}

	public function getDataCellContent($row) {
        if (method_exists(get_parent_class($this), 'getDataCellContent'))
            return parent::getDataCellContent($row);
		ob_start();
		$this->renderDataCellContent($row,$this->grid->dataProvider->data[$row]);
		return ob_get_clean();
	}

    public function getDistrict($id_district){
        $distr = '';
        switch($id_district){
            case '1':  $distr= 'ЦФО';  break;
            case '2':  $distr= 'ЮФО';  break;
            case '3':  $distr= 'СЗФО';  break;
            case '4':  $distr= 'ДФО';  break;
            case '5':  $distr= 'СФО';  break;
            case '6':  $distr= 'УФО';  break;
            case '7':  $distr= 'ПФО';  break;
            case '8':  $distr= 'СКФО';  break;
            case '9':  $distr= 'КФО';  break;
        }


        return $distr;
    }

    public function getStage($id_stage){
        $st =  Stage::model()->findByPk($id_stage);
        return $st['NAME_STAGE'];
    }

    public function getStageFromProject($id){

        $pr = ProjectRegistry::model()->find("ID_REPRESENTATIVE = '$id'" );

        $st =  Stage::model()->findByPk($pr->ID_STAGE);
        return $st['NAME_STAGE'];
    }

    public function getStagesList(){
        $st = Stage::model()->findAll();
        $list = array();


        foreach($st as $st_k=>$st_v){


            $list[$st_v->ID_STAGE] = $st_v->NAME_STAGE ;
        }
    return  $list;

    }

    public function getUniver($id_univer){
        $univer = University::model()->findByPk($id_univer);
        return $univer['NAME_UNIVER'];
    }

    /** Метод для получения роли пользователя в таблицу экспертов */
    public function getRole($role){

        switch($role){
            case 'Dev': $rol = 'Разработчик'; break;
            case 'Manager': $rol = 'Руководитель проекта'; break;
            case 'Exp':$rol = 'Эксперт0'; break;
            case 'Exp1':$rol = 'Эксперт1'; break;
            case 'Exp2':$rol = 'Эксперт2'; break;
            case 'Exp3': $rol = 'Эксперт3'; break;
        }

        return $rol;

    }

    /** Метод для получения статуса проекта в таблицу экспертам */
    public function getStatus($id_project){
        $proj = ProjectRegistry::model()->findByPk($id_project);
        $st = '';
        if ($proj['FIRST_LAVEL_APPROVAL']== 0){$st = 'Зарегистрирован';}
        if ($proj['FIRST_LAVEL_APPROVAL']== 1){$st = 'Подан';}
        if ($proj['FIRST_LAVEL_APPROVAL']== 3){$st = 'Одобрен';}
        if ($proj['FIRST_LAVEL_APPROVAL']== 9){$st = 'Заблокирован';}
        if (!is_null($proj['SECOND_LAVEL_RATING'])){$st = 'Окружная оценка';}
        if (!is_null($proj['THIRD_LAVEL_RATING'])){$st = 'Федеральная оценка';}
        return $st;

    }


}
