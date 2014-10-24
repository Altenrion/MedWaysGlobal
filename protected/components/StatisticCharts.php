<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 23.10.2014
 * Time: 23:43
 */

class StatisticCharts {

    public function getUniversData(){

        $criteria = new CDbCriteria;
        $criteria->select = 'COUNT(id) id,ID_UNIVER';
        $criteria->group = 'ID_UNIVER';
        $criteria->condition = "id IN (SELECT ID_REPRESENTATIVE FROM m_w_project_registry pr WHERE FIRST_LAVEL_APPROVAL = '3')";
        $criteria->order = 'id';
        $universData = Users::model()->findAll($criteria);

        $arr = array_reverse(CJSON::decode(CJSON::encode($universData)));
        $data = array_slice($arr,0,5);

        $vuzDATA = array();
        foreach($data as $key=>$val){

            $vuz = University::model()->findByPk($val['ID_UNIVER']);
            $vuzName = $vuz->CONTACTS_UNIVER;

            $counPr = ProjectRegistry::model()->count('FIRST_LAVEL_APPROVAL = 3');
            $perc = (100/$counPr) * $val['id'];

            $vuzDATA[] = array(round($perc),$vuzName);

        }

        return $vuzDATA;


    }

    public function getStagesData(){

        $criteria = new CDbCriteria;
        $criteria->select = 'COUNT(ID_PROJECT) ID_PROJECT, ID_STAGE  ';
        $criteria->group = 'ID_STAGE';
        $criteria->condition = "FIRST_LAVEL_APPROVAL = 3";
        $criteria->order = 'ID_PROJECT';
        $stages = ProjectRegistry::model()->findAll($criteria);

        $ordered = array_reverse(CJSON::decode(CJSON::encode($stages)));

        foreach($ordered as $key=>$val){

            $stage = Stage::model()->findByPk($val['ID_STAGE']);
            $stageName = $stage->NAME_STAGE;

            $counPr = ProjectRegistry::model()->count('FIRST_LAVEL_APPROVAL = 3');
            $perc = ((100/$counPr) * $val['ID_PROJECT']);

            $stageDATA[] = array(round($perc),$stageName);
        }
        return $stageDATA;
    }

    public function getManagersData(){

        $totalManagers = CJSON::decode(CJSON::encode(ProjectRegistry::model()->findAll()));
        foreach($totalManagers as $t_k=>$t_v){
            $total[]= $t_v['EXECUTERS_NUM'];
        }
        $total_managers = array_sum($total);


        $studyManagers = CJSON::decode(CJSON::encode(ProjectRegistry::model()->findAll("STUDY IS NOT NULL")));
        foreach($studyManagers as $m_k=>$m_v){
            $studies[] = $m_v['STUDY'];
        }
        $study_managers = array_sum($studies);
        $perc = ((100/$total_managers) * $study_managers);
        $managersDATA[] = round($perc);

        $underManagers = CJSON::decode(CJSON::encode(ProjectRegistry::model()->findAll("UN_THIRTY_FIVE IS NOT NULL ")));
        foreach($underManagers as $u_k=>$u_v){
            $under[] = $u_v['UN_THIRTY_FIVE'];
        }
        $under_managers = array_sum($under);
        $percu = ((100/$total_managers) * $under_managers);

        $managersDATA[] = round($percu);


        $totalPubls = CJSON::decode(CJSON::encode(ProjectRegistry::model()->findAll()));
        foreach($totalPubls as $t_k=>$t_v){
            $publstotal[]= $t_v['PUBLICATIONS'];
        }
        $total_publs = array_sum($publstotal);

        $forinPubls = CJSON::decode(CJSON::encode(ProjectRegistry::model()->findAll("FORIN_PUBL IS NOT NULL ")));
        foreach($forinPubls as $p_k=>$p_v){
            $publs[] = $p_v['FORIN_PUBL'];
        }
        $forin_publs = array_sum($publs);
        $percpubls = ((100/$total_publs) * $forin_publs);

        $managersDATA[] = round($percpubls);

        return $managersDATA;
    }

    public function getMoneyData(){

        $criteria = new CDbCriteria;
        $criteria->select = 'COUNT(ID_PROJECT) ID_PROJECT, ID_BUDGET  ';
        $criteria->group = 'ID_BUDGET';
        $criteria->condition = "ID_BUDGET IS NOT NULL";
        $criteria->order = 'ID_PROJECT';
        $money = CJSON::decode(CJSON::encode(ProjectRegistry::model()->findAll($criteria)));
        $total = CJSON::decode(CJSON::encode(ProjectRegistry::model()->count("ID_BUDGET IS NOT NULL")));

        foreach($money as $m_k=>$m_v){

            $num = $m_v['ID_PROJECT'];
            $perc = round((100/$total)*$num);

            $monName = Budget::model()->findByPk($m_v['ID_BUDGET']);
            $moneyDATA[]= array($perc ,$monName->NAME);
        }

        return $moneyDATA;
    }


} 