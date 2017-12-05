<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 23.10.2014
 * Time: 23:43
 */

class StatisticCharts {

    public function getUniversData(){

        $projects_sql = "select COUNT(*) as num , un.CONTACTS_UNIVER as name
            from m_w_project_registry as pr
            JOIN m_w_users as us on us.id = pr.ID_REPRESENTATIVE
            JOIN m_w_university as un on us.ID_UNIVER= un.ID_UNIVER
            where pr.REG_DATE >  '".Yii::app()->params['eventStartDate']."'
                AND us.ID_UNIVER IS NOT NULL
			
            GROUP BY us.ID_UNIVER
		     ORDER BY num DESC
            LIMIT 5";

        $totalProjects = "select COUNT(*) as num 
            from m_w_project_registry as pr
            JOIN m_w_users as us on us.id = pr.ID_REPRESENTATIVE
            where pr.REG_DATE >  '".Yii::app()->params['eventStartDate']."' AND us.ID_UNIVER IS NOT NULL";

        $con = Yii::app()->db;

        $totalProjectregistry = $con->createCommand($projects_sql);
        $data = $totalProjectregistry->queryAll();

        $totalProjects = $con->createCommand($totalProjects)->queryAll();

        foreach ($data as $i => $topUniver) {
            $topUnivers[$i] = array(round(($data[$i]['num'] / $totalProjects[0]['num']) *100, 2), $data[$i]['name']);
        }

        return $topUnivers;
    }

    public function getStagesData(){

//        $criteria = new CDbCriteria;
//        $criteria->select = 'COUNT(ID_PROJECT) ID_PROJECT, ID_STAGE  ';
//        $criteria->group = 'ID_STAGE';
//        $criteria->condition = "FIRST_LAVEL_APPROVAL = 3 AND REG_DATE >  ".Yii::app()->params['eventStartDate']."";
//        $criteria->order = 'ID_PROJECT';
//        $stages = ProjectRegistry::model()->findAll($criteria);
//        $ordered = array_reverse(CJSON::decode(CJSON::encode($stages)));
//        foreach($ordered as $key=>$val){
//
//            $stage = Stage::model()->findByPk($val['ID_STAGE']);
//
//            $stageName = $stage->NAME_STAGE;
//
//            $counPr = ProjectRegistry::model()->count("FIRST_LAVEL_APPROVAL = 3 AND REG_DATE >  ".Yii::app()->params['eventStartDate']."");
//            $perc = ((100/$counPr) * $val['ID_PROJECT']);
//
//            $stageDATA[] = array(round($perc),$stageName);
//        }

        $query = "
            SELECT st.NAME_STAGE as stage,
            count(*) as total ,
            count(case when pr.ID_PHASE = '1' then 1 else null end) as phase1,
            count(case when pr.ID_PHASE = '2' then 1 else null end) as phase2, 
            count(case when pr.ID_PHASE = '3' then 1 else null end) as phase3 
            
            FROM `m_w_project_registry` as pr
            JOIN m_w_stage as st ON st.ID_STAGE = pr.ID_STAGE
            JOIN m_w_phase as ph ON ph.ID_PHASE = pr.ID_PHASE
            
            WHERE  REG_DATE >  '".Yii::app()->params['eventStartDate']."'
            
            GROUP BY pr.ID_STAGE 
            ORDER BY total DESC
            ";

        $con = Yii::app()->db;

        $stages = $con->createCommand($query)->queryAll();

        return $stages;
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