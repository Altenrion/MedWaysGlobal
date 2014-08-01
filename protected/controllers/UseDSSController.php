<?php

class UseDSSController extends Controller
{
    
        private $_id;
        private $_organ = 1;
        
        public $defaultAction = 'PatientDB';
    
    
	public function actionPatientDB()
	{
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/patient.js',CClientScript::POS_END);
            
            $model = new Patient;
            if(isset($_GET['organ'])){
                $org = $_GET['organ'];
                switch ($org):
                    case 'Stomach':     Yii::app()->session['organ'] = '1';break;// желудок ---
                    case 'Mammary':     Yii::app()->session['organ'] = '2';break;//Цитология_МолочнаяЖелеза
                    case 'Throid':      Yii::app()->session['organ'] = '3';break;//Цитология_ЩитовиднаяЖелеза
                    case 'Intestine':   Yii::app()->session['organ'] = '4';break;//Цитология_КишечникТолстый
                    case 'Liver':       Yii::app()->session['organ'] = '5';break;//Цитология_Печень
                    case 'Esophagus':   Yii::app()->session['organ'] = '6';break;//Цитология_Пищевод
                    case 'Pancreas':    Yii::app()->session['organ'] = '7';break;//Цитология_ПоджелудочнаяЖелеза
                    case 'Rectum':      Yii::app()->session['organ'] = '8';break;//Цитология_ПрямаяКишка
                    case 'Kidney':      Yii::app()->session['organ'] = '9';break;// почка ---
                    case 'Lymph':       Yii::app()->session['organ'] = '10';break;// лимфотические узлы ---
                    case 'Cervix':      Yii::app()->session['organ'] = '11';break; //Цитология_ШейкаМатки 
                    case 'SputumNat':   Yii::app()->session['organ'] = '12';break;//Цитология_Мокрота_Нативные
                    case 'SputumO':     Yii::app()->session['organ'] = '13';break;//Цитология_Мокрота_Окрашенные
                    case 'Colon':       Yii::app()->session['organ'] = '14';break;// толстая кишка ---
                endswitch;
            }
           
            if(!isset(Yii::app()->session['organ'])){$organ = $this->getOrgan();}
                else {$organ = Yii::app()->session['organ'];}
                
            if(isset($_POST['patient'])){
                $this->setId($_POST['patient']);    
            }   
                
            $data = $model->getPatientsData($organ);
            $this->render('patientDB',array('data'=>$data));
	}
          
        public function setOrgan($organ){
            $this->_organ = $organ;
        }
        public function getOrgan(){
            return $this->_organ;
        }

        
        public function setId($id){
            $this->_id = $id;
            Yii::app()->session['patient'] = $id;
        }
        public function getId() {
            return $this->_id;
        }
        
        
        public function actionImages()
	{
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/patient.js',CClientScript::POS_END);

        $modelP = new Patient;
        $modelIm = new Images;
        
        
        if(isset(Yii::app()->session['patient'])){
        $id = Yii::app()->session['patient'];
        }else{$id = 777;}
        
        $dataPatient = $modelP->getPatientData($id);
        
        $id_patient = $id;
        $dataImages = $modelIm->getPatientImagesData($id_patient);
        
        $dataImgProp = $modelIm->getImagesDescr($id_patient);
        
        
        $images = $modelIm->findNeeds($this->_id);
		$this->render('images',array(
                        'images'=>$images,
                        'dataPatient'=>$dataPatient,
                        'dataImages'=>$dataImages,
                        'dataImgProp'=>$dataImgProp));
	}
        
        
        
        
         public function actionSearchOptions()
	{
         $modelP = new Patient;
         $modelIm = new Images;
            
         $cytDiag = $modelP->getCytDiagList();
         $gystDiag = $modelP->getGystDiagList(); 
         
         $cytDescr = $modelP->getCytDescrList();
         $gystDescr = $modelP->getGystDescrList();
         $color = $modelP->getColorList();
         $zoom = $modelP->getZoomList();
         $type = $modelP->getTypeList();
            
		$this->render('searchOptinons' , [
                    'cytDiag'=>$cytDiag,
                    'gystDiag'=>$gystDiag,
                    'cytDescr'=>$cytDescr,
                    'gystDescr'=>$gystDescr,
                    'color'=>$color,
                    'zoom'=>$zoom,
                    'type'=>$type,
                    
                    
                    
                    
                ]);
	}
         public function actionSearchResults()
	{       $searchData= array();
                $optionsPat = array();$optionsImg = array();
                $switch = 0;
                if(isset($_POST['searchBy'])){ ($_POST['searchBy'] == 'patient')?($switch = 1):($switch = 2) ;} // => string 'patient' / 'image' 
                if(isset($_POST['searchType'])){$union = $_POST['searchType']; $optionsPat['uns'] =$union;$optionsImg['uns']=$union; }                                // => string 'AND' / 'OR' 
                if(isset($_POST['num'])){$num = $_POST['num'];$optionsPat['num'] =$num;  }                               //=> string '' 
                if(isset($_POST['date'])){$date = $_POST['date'];$optionsPat['date'] =$date; }                            //=> string '' 
                if(isset($_POST['cytDiag'])){$cytDiag = $_POST['cytDiag']; $optionsPat['cytDiag']= $cytDiag; }                   //=> string '---' 
                if(isset($_POST['gystDiag'])){$gystDiag = $_POST['gystDiag']; $optionsPat['gystDiag']=$gystDiag;  }                //=> string '---' 
                if(isset($_POST['methodPat'])){$methodPat = $_POST['methodPat']; $optionsPat['methodPat']= $methodPat;}             //=> string '---' 
                if(isset($_POST['cytDescr'])){$cytDescr = $_POST['cytDescr']; $optionsImg['cytDescr']=$cytDescr; }                //=> string '---' 
                if(isset($_POST['gystDescr'])){$gystDescr = $_POST['gystDescr']; $optionsImg['gystDescr']= $gystDescr; }             //=> string '---' 
                if(isset($_POST['paint'])){$paint = $_POST['paint']; $optionsImg['paint']= $paint;}                         //=> string '---' 
                if(isset($_POST['zoom'])){$zoom = $_POST['zoom']; $optionsImg['zoom']=$zoom; }                            //=> string '---' 
                if(isset($_POST['methodImg'])){$methodImg = $_POST['methodImg']; $optionsImg['methodImg']=$methodImg; }             //=> string '---' 
                
                $modelPt = new Patient;
                
                switch ($switch):
                    case 1: $searchData= $modelPt->searchByPatient($optionsPat); $ind = 1;break;
                    case 2: $searchData= $modelPt->searchByImage($optionsImg);$ind = 2;break;
                endswitch;
                

                
                
		$this->render('searchResults',['optionsPat'=>$optionsPat,
                                               'optionsImg'=>$optionsImg,
                                               'searchData'=>$searchData,
                                               'ind'=>$ind,
                    ]);
	}
        public function actionAnalitics()
	{
            
		$this->render('analitics');
	}
        public function actionObserv()
	{
		$this->render('observ');
	}

        public function actionModal(){
            $data = 'Ииииииихааааа!';
            
            $this->renderPartial('_modal',['data'=>$data]);
            
        }        
        
        public function checkDiag($value,array $ver) {
            if($v== $ver['diag']){$result = $v['ver'];}
        
            return $result;
            }
      
	
//	public function actionSort()
//	{
//		$this->render('sort');
//	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
        
        
}