<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Images
 *
 * @author User
 */
class Images extends CActiveRecord {

    public function findAllimg($patient_id){
        
        $sql = "SELECT UNIQUEFILENAME FROM images  WHERE ID_PATIENT = $patient_id";
        
        $img = Yii::app()->db->createCommand($sql)->queryAll();
        return $img;
    }
    
    public function findNeeds(){
        $sql = "SELECT `UNIQUEFILENAME` FROM `images` WHERE `ID_PATIENT` IN 
               (SELECT `ID_PATIENT` FROM patient WHERE ID_ORGAN = 11)";
        $img = Yii::app()->db->createCommand($sql)->queryAll();
        return $img;
    }
    
    public function getPatientImagesData($id_patient){
        $sql = "SELECT im.UNIQUEFILENAME as im_name, im.ID_IMAGE as im_id  FROM `images` as im  WHERE ID_PATIENT = $id_patient";
        $data = Yii::app()->db->createCommand($sql)->queryAll();
        return $data;
                
    }
    
    public function getImagesDescr($id_patient){
        $id_img = $this->getPatientImagesData($id_patient);
        $eachImgData = array();
        $i=0;
        foreach ($id_img as $id){
            $eachImgData[$i] = $this->getImgPropreties($id['im_id']);
            $eachImgData[$i][1] = $this->getAllFeatures($id['im_id']);
            $i++;
        }
        
        return $eachImgData;
    }
     public function getImgPropreties($id_img){
        $sql = "SELECT im.ID_IMAGE as id, 
                (SELECT z.NAME FROM `v_zoom` AS z WHERE z.ID_ZOOM = im.ID_ZOOM) as zoom,
                (SELECT c.NAME FROM `v_color` AS c WHERE c.ID_COLOR = im.ID_COLOR)  as color,
                (SELECT vg.NAME_GYST_DESCR FROM `v_gyst_descr` AS vg WHERE vg.ID_GYST_DESCR = im.ID_GYST_DESCR) AS gyst,
                (SELECT vc.NAME_CYT_DESCR FROM `v_cyt_descr` AS vc WHERE vc.ID_CYT_DESCR = im.ID_CYT_DESCR) AS cyt
                FROM `images` as im  WHERE ID_IMAGE = $id_img";
        $data = Yii::app()->db->createCommand($sql)->queryAll();
        return $data; 
     }
     public function getAllFeatures($id_img) {
         $mFeat = $this->getMainFeture($id_img);
         $features = array();
         
         $i = 0;
         foreach ($mFeat as $fe){
             $features[$i]['main'] = $fe['name'] ;
             $features[$i]['sub'] = $this->getSubFeatures($fe['id'],$id_img); 
             $i++;
            }
                    return $features;
 
         } 
         public function getMainFeture($id_img){
        $sql = "(SELECT NAME_MAIN_FEATURE as name, ID_MAIN_FEATURE  as id FROM  `v_micro_main_features` WHERE 
                 ID_MAIN_FEATURE IN (SELECT ID_MAIN_FEATURE FROM `v_micro_features` WHERE ID_FEATURE IN (
                 SELECT ID_FEATURE FROM `images_micro_features` WHERE ID_IMAGE = $id_img))) ";
        $data = Yii::app()->db->createCommand($sql)->queryAll();
        return $data;   
     }
         public function getSubFeatures($id_fe,$id_img){
            $sql = "SELECT vmic.NAME_SUB_FEATURE as name FROM  `v_micro_sub_features` as vmic WHERE 
                vmic.ID_SUB_FEATURE IN (SELECT vm.ID_SUB_FEATURE FROM `v_micro_features` as vm WHERE vm.ID_MAIN_FEATURE = $id_fe
		AND vm.ID_FEATURE IN (SELECT ID_FEATURE FROM `images_micro_features` WHERE ID_IMAGE = $id_img)) ";
        $data = Yii::app()->db->createCommand($sql)->queryAll();
        return $data;  
             
         }
     }
     
     
     
    

