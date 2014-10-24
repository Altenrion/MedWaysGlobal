<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 22.10.2014
 * Time: 11:07
 */

class RegistrationChart {

    const FIRST_DAY = "2014-09-01";
    public $_day;



    public function getProjectRegInfo(){
        $this->_day = 1;

        $criteria = new CDbCriteria;
        $criteria->select = 'count(REG_DATE),REG_DATE';
        $criteria->group = 'DAY(REG_DATE)';
        $criteria->order = 'REG_DATE';
        $proj_reg_day = ProjectRegistry::model()->findAll($criteria);
        unset( $criteria);

        $arr = array();
        foreach($proj_reg_day as $p_k=>$p_v){

            $criteria= new CDbCriteria();
            $criteria->select = 'REG_DATE';
            $criteria->condition = 'REG_DATE <= :REG_DATE';
            $criteria->params = array(':REG_DATE'=>$p_v->REG_DATE);

            $count_proj = ProjectRegistry::model()->count($criteria);

            $date = explode(" ",$p_v->REG_DATE);


            $day =  explode("-",$date[0]);
            $nday = $day[2];

            if($this->_day <= $nday){
                $this->_day=(int) $nday;
            }else{
                $nday += 30;
                $this->_day = (int) $nday;
            }

            $arr[] = array($this->_day,(int)$count_proj);

        }
        return $arr;


    }

    public function getExpertRegInfo(){
        $this->_day = 1;
        $criteria = new CDbCriteria;
        $criteria->select = 'count(REG_DATE),REG_DATE';
        $criteria->group = 'DAY(REG_DATE)';
        $criteria->order = 'REG_DATE';
        $criteria->condition = "roles IN ('Exp', 'Exp1', 'Exp2', 'Exp3')";
        $experts_reg_day = Users::model()->findAll($criteria);
        unset( $criteria);

        $arr = array();
        foreach($experts_reg_day as $p_k=>$p_v){

            $criteria= new CDbCriteria();
            $criteria->select = 'REG_DATE';
            $criteria->condition = 'REG_DATE <= :REG_DATE';
            $criteria->params = array(':REG_DATE'=>$p_v->REG_DATE);

            $count_proj = ProjectRegistry::model()->count($criteria);

            $date = explode(" ",$p_v->REG_DATE);
            $day =  explode("-",$date[0]);
            $nday = $day[2];
            if($this->_day <= $nday){
                $this->_day=(int) $nday;
            }else{
                $nday += 30;
                $this->_day = (int) $nday;
            }
            $arr[] = array($this->_day,(int)$count_proj);
        }
//        var_dump($arr);
        return $arr;

    }

    public function compileJsonData(){

        $proj_days = $this->getProjectRegInfo();
        $exp_days = $this->getExpertRegInfo();
        $JSON = CJSON::encode(array($proj_days,$exp_days));

        return $JSON;
    }



} 