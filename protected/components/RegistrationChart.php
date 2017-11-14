<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 22.10.2014
 * Time: 11:07
 */
class RegistrationChart
{

    const FIRST_DAY = "2014-09-01";
    public $_day;
    public $_old_count;


    public function getProjectRegInfo()
    {
        $this->_day = 1;
        $this->_old_count = 0;
        $criteria = new CDbCriteria;
        $criteria->select = 'count(REG_DATE),REG_DATE';
        $criteria->group = 'DAY(REG_DATE)';
        $criteria->order = 'REG_DATE';
        $proj_reg_day = ProjectRegistry::model()->findAll($criteria);
        unset($criteria);

        $arr = array();
        foreach ($proj_reg_day as $p_k => $p_v) {

            $date = explode(" ", $p_v->REG_DATE);
            $day = explode("-", $date[0]);

            $criteria = new CDbCriteria();
            $criteria->select = 'REG_DATE';
            $criteria->condition = "REG_DATE LIKE '%$date[0]%' AND REG_DATE >  '".Yii::app()->params['eventStartDate']." 00:00:00'";

            $count_proj = ProjectRegistry::model()->count($criteria);


            $nday = $day[2];

            if ((int)$day[1] == 9) {
                $this->_day = (int)$nday;
            } elseif ((int)$day[1] == 10) {
                $nday += 30;
                $this->_day = (int)$nday;
            } elseif ((int)$day[1] == 11) {
                $nday += 61;
                $this->_day = (int)$nday;
            }

            $this->_old_count += (int)$count_proj;
            $arr[] = array($this->_day, $this->_old_count);

        }
        return $arr;


    }

    public function getExpertRegInfo()
    {
        $this->_day = 1;
        $this->_old_count = 0;

        $criteria = new CDbCriteria;
        $criteria->select = 'REG_DATE';
        $criteria->group = 'DAY(REG_DATE)';
        $criteria->order = 'REG_DATE';
        $criteria->condition = "roles IN ('Exp', 'Exp1', 'Exp2', 'Exp3')";
        $experts_reg_day = Users::model()->findAll($criteria);


        unset($criteria);

        $arr = array();
        foreach ($experts_reg_day as $p_k => $p_v) {

            $date = explode(" ", $p_v->REG_DATE);
            $day = explode("-", $date[0]);

            $criteria = new CDbCriteria();
            $criteria->select = 'id';
            $criteria->condition = "REG_DATE LIKE '%$date[0]%' AND roles IN ('Exp', 'Exp1', 'Exp2', 'Exp3') AND REG_DATE >  ".Yii::app()->params['eventStartDate'];

            $count_exp = Users::model()->count($criteria);


            $nday = $day[2];


            if ((int)$day[1] == 9) {
                $this->_day = (int)$nday;
            } elseif ((int)$day[1] == 10) {
                $nday += 30;
                $this->_day = (int)$nday;
            } elseif ((int)$day[1] == 11) {
                $nday += 61;
                $this->_day = (int)$nday;
            }

            $this->_old_count += (int)$count_exp;
            $arr[] = array($this->_day, $this->_old_count);
        }
        return $arr;

    }

    public function compileJsonData()
    {
        $proj_days = $this->getProjectRegInfo();
        $exp_days = $this->getExpertRegInfo();
        $JSON = CJSON::encode(array($proj_days, $exp_days));

        return $JSON;
    }


}