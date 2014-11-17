<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Patient
 *
 * @author User
 */
class Patient extends CActiveRecord {
    
    private $_id =  null;
    
    public function setPatientId($id){
        $this->_id = $id;
    }
    public function getPatientId(){
        return $this->_id;
    }
    public function getPatientsData($organ){
    
        $sql = "SELECT p.ID_PATIENT as id, p.HISTORY_NUM as num, p.AGE as age, p.SEX as sex, 
                (SELECT count(im.ID_IMAGE) FROM `images` AS im WHERE im.ID_PATIENT=p.ID_PATIENT ) AS imgs, 
                (SELECT gyst.NAME_GYST_DIAG FROM `v_gyst_diag` AS gyst WHERE gyst.ID_GYST_DIAG = p.ID_GYST_DIAG ) AS gyst,
                (SELECT cyt.NAME_CYT_DIAG FROM `v_cyt_diag` AS cyt WHERE cyt.ID_CYT_DIAG = p.ID_CYT_DIAG ) AS cyt
                FROM `patient` AS `p`
                WHERE ID_ORGAN = $organ";
        $data = Yii::app()->db->createCommand($sql)->queryAll();
        return $data;
    }
    
    public function getPatientData($id){
        $sql = "SELECT p.HISTORY_NUM as num, p.AGE as age, p.SEX as sex, 
                (SELECT count(im.ID_IMAGE) FROM `images` AS im WHERE im.ID_PATIENT=p.ID_PATIENT ) AS imgs, 
                (SELECT gyst.NAME_GYST_DIAG FROM `v_gyst_diag` AS gyst WHERE gyst.ID_GYST_DIAG = p.ID_GYST_DIAG ) AS gyst,
                (SELECT cyt.NAME_CYT_DIAG FROM `v_cyt_diag` AS cyt WHERE cyt.ID_CYT_DIAG = p.ID_CYT_DIAG ) AS cyt
                FROM `patient` AS `p`
                WHERE ID_PATIENT = $id";
        $data = Yii::app()->db->createCommand($sql)->queryAll();
        return $data;
        
        
    }
    
    public function getCytDiagList(){
          $sql = "SELECT NAME_CYT_DIAG as name, ID_CYT_DIAG as id FROM  `v_cyt_diag` order by left(NAME_CYT_DIAG, 2)";
        $data = Yii::app()->db->createCommand($sql)->queryAll();
        return $data;
    }
    public function getGystDiagList(){
          $sql = "SELECT NAME_GYST_DIAG as name, ID_GYST_DIAG as id FROM  `v_gyst_diag` order by left(NAME_GYST_DIAG, 2)";
        $data = Yii::app()->db->createCommand($sql)->queryAll();
        return $data;
    }    
    
    public function getCytDescrList() {
          $sql = "SELECT NAME_CYT_DESCR as name, ID_CYT_DESCR as id FROM  `v_cyt_descr` order by left(NAME_CYT_DESCR, 2)";
        $data = Yii::app()->db->createCommand($sql)->queryAll();
        return $data;    
        
    }
    public function getGystDescrList(){
          $sql = "SELECT NAME_GYST_DESCR as name, ID_GYST_DESCR as id FROM  `v_gyst_descr` order by left(NAME_GYST_DESCR, 2)";
        $data = Yii::app()->db->createCommand($sql)->queryAll();
        return $data;
    }      
    public function getZoomList(){
          $sql = "SELECT NAME as name, ID_ZOOM  as id FROM  `v_zoom` order by left(NAME, 5)";
        $data = Yii::app()->db->createCommand($sql)->queryAll();
        return $data;
    }   
        public function getColorList(){
          $sql = "SELECT NAME as name, ID_COLOR  as id FROM  `v_color` order by left(NAME, 3)";
        $data = Yii::app()->db->createCommand($sql)->queryAll();
        return $data;
    }   
      public function getTypeList(){
          $sql = "SELECT NAME as name, ID_TYPE  as id FROM  `v_types` order by left(NAME, 3)";
        $data = Yii::app()->db->createCommand($sql)->queryAll();
        return $data;
    }  
    
    
    public function searchByPatient($options) {
        
        $op = $options;
        $option = "WHERE";
        //if(count($op)>0){$option = "WHERE ";}
        $i=0;
        if(isset($op['uns'])){$un = $op['uns'];}
        if(isset($op['num']) && $op['num'] !== "" ){ $i++; $option.=" HISTORY_NUM = {$op['num']} ";}
        if(isset($op['date']) && $op['date'] !== "" ){$i++; $option.= (($i>1)?($un):(" "))." BIRTH = {$op['date']} ";}
        if(isset($op['cytDiag']) && $op['cytDiag'] !== "---" ){$i++; $option.= (($i>1)?($un):(" "))." ID_CYT_DIAG = {$op['cytDiag']} ";}
        if(isset($op['gystDiag']) && $op['gystDiag'] !== "---" ){$i++; $option.= (($i>1)?($un):(" "))." ID_GYST_DIAG = {$op['gystDiag']} ";}
        if(isset($op['methodPat']) && $op['methodPat'] !== "---" ){$i++; $option.= (($i>1)?($un):(" "))." ID_TYPE = {$op['methodPat']} ";}
        if($option == "WHERE"){$option = " ";}
        
        
        $sql = "SELECT p.ID_PATIENT as id,p.HISTORY_NUM as  num ,p.AGE as age, p.SEX as sex, 
                (SELECT count(im.ID_IMAGE) FROM `images` AS im WHERE im.ID_PATIENT=p.ID_PATIENT ) AS img , 
                (SELECT gyst.NAME_GYST_DIAG FROM `v_gyst_diag` AS gyst WHERE gyst.ID_GYST_DIAG = p.ID_GYST_DIAG ) AS gyst,
                (SELECT cyt.NAME_CYT_DIAG FROM `v_cyt_diag` AS cyt WHERE cyt.ID_CYT_DIAG = p.ID_CYT_DIAG ) AS cyt
                FROM `patient` AS `p`
                ";
        
        $dataOne = Yii::app()->db->createCommand($sql.$option)->queryAll();
        
        $option = "WHERE";
        //if(count($op)>0){$option = "WHERE";}
        $z=0;
        if(isset($op['num']) && $op['num'] !== "" ){ $z++; $option.=" HISTORY_NUM = {$op['num']} ";}
        if(isset($op['date']) && $op['date'] !== "" ){$z++; $option.= (($z>1)?($un):(" "))." BIRTH = {$op['date']} ";}
        if(isset($op['gystDiag']) && $op['gystDiag'] !== "---" ){$z++; $option.= (($z>1)?($un):(" "))." ID_GYST_DIAG = {$op['gystDiag']} ";}
        if(isset($op['methodPat']) && $op['methodPat'] !== "---" ){$z++; $option.= (($z>1)?($un):(" "))." ID_TYPE = {$op['methodPat']} ";}
        if($option == "WHERE"){$option = " ";}
        
        $sql1 = "SELECT COUNT(ID_PATIENT) id  FROM `patient` ";
        
        $dataAll = Yii::app()->db->createCommand($sql1.$option)->queryAll();
        $ver = "";
        $cyts = array();
        if(isset($op['cytDiag']) && $op['cytDiag'] !== "---" ){$ver = (count($dataOne)/count($dataAll))." из ".count($dataAll);}
//        if(isset($op['cytDiag']) && $op['cytDiag'] == "---" ){
//            foreach ($dataOne as $da){ $cyts[] = $da['cyt']; }
//            $clean = array_unique($cyts);
//            $option = "WHERE";
//            $dataZ = array(); 
//            $key = 0;
//            foreach ($clean as $c){
//                $y=0;
//                if(isset($op['uns'])){$un = $op['uns'];}
//                if(isset($op['num']) && $op['num'] !== "" ){ $y++; $option.=" HISTORY_NUM = {$op['num']} ";}
//                if(isset($op['date']) && $op['date'] !== "" ){$y++; $option.= (($y>1)?($un):(" "))." BIRTH = {$op['date']} ";}
//                if(isset($op['cytDiag']) && $op['cytDiag'] !== "---" ){$y++; $option.= (($y>1)?($un):(" "))." ID_CYT_DIAG = $c ";}
//                if(isset($op['gystDiag']) && $op['gystDiag'] !== "---" ){$y++; $option.= (($y>1)?($un):(" "))." ID_GYST_DIAG = {$op['gystDiag']} ";}
//                if(isset($op['methodPat']) && $op['methodPat'] !== "---" ){$y++; $option.= (($y>1)?($un):(" "))." ID_TYPE = {$op['methodPat']} ";}
//                if($option == "WHERE"){$option = " ";}
//
//                $dataZ[$key] = $c;
//                $d= Yii::app()->db->createCommand($sql1.$option)->queryAll();
//                $dataZ[$key] = $dataZ + $d;
//                $key++;
//            }
//            
            
        
        return $dataOne;
        
        
    }
    public function searchByImage($options) {
      
        $ddd = "ttt";
        return $ddd;
        
    }
  
    
    
    
    
}
