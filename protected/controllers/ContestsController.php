<?php

class ContestsController extends Controller {
    
    protected $_model;
    
    

    public function actionAction() {
        $this->render('action');
    }

    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('ContMain',array(
                'criteria' => array(
                    'with' => array('docType','currentStatus','checkStatus'),
                 ),
                 'pagination' => array(
                     'pageSize' => Yii::app()->params['postsPerPage'],
                 ),
                ));
        
        $this->render('index', array(
        
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionProjects() {
        $this->render('projects');
    }

    public function actionUpdateDataTest(){
        $edit = new EditableSaver('ContMain');
        $edit->scenario = 'update';
        $edit->onBeforeUpdate = function($event){
            $event->sender->setAttribute('updater_id',Yii::app()->user->id);
        };
        $edit->update();
    }
    
//    public function actionUpdateData(){
//        
//        $model = new ContMain;
//        $model->updateData($_POST['name'],$_POST['pk'],$_POST['value']); 
//        
//    }
    
    
    public function actionDetail() {
        $model = new ContMain;
        if(isset($_GET['id'])){
            
            $data = $model->findDetails($_GET['id']);
            
                            }
        
        
        
        $this->render('projects',array(
            'data'=>$data,
            'model'=>$model,
        ));
    }
    
    
    public function actionGetStatusList(){
        
        echo CJSON::encode(Editable::source(ContCheckStatus::model()->findAll(), 'id', 'status_name')); 
        
        
    }
     public function actionGetCompanyNames(){
         
        echo CJSON::encode(Editable::source(HoldingCompanies::model()->findAll(), 'id', 'company_name')); 

         
     }
     
     public function actionGetCurrentStatus(){
                 
         echo CJSON::encode(Editable::source(ContCurrentStatus::model()->findAll(), 'id', 'status_name')); 
     
     }
     
     public function actionGetDocTypeList(){
          echo CJSON::encode(Editable::source(ContDocType::model()->findAll(), 'id', 'type_name')); 

                 
     }
     public function actionGetContTypeList(){
          echo CJSON::encode(Editable::source(ContType::model()->findAll(), 'id', 'type_name')); 

                 
     }
     
     
     public function editMoney($emount){
     if(is_numeric($emount)){
        $norm =  number_format($emount, 2, ',', ' ');
          }     
     else{
         $norm = $emount;
         }
     return $norm;
     }
    
     public function GetLogData($label,$pk){
         $this->_model = $label;       
         
        // $log_model = new $this->_model;
         
        $model = new ContMain;
        $data = $model->getLogArray($label,$pk);
        $table = "<table class='my'>
            <tbody>";
                  
        foreach($data as $row){
            $table .= "<tr><td> {$row['usr_name']} - {$row['role']} </td><td>  {$row['new']} </td><td>  {$row['date']}</td></tr></br>" ;
            
        }
         
        $table .= "</tbody></table>";
         
         
         //$data =  $log_model::model()->logCondition(5,$pk)->findAll();
         
         
         
       //  $userName = Users::model()->findAllByPk($data[0]['iser_id']);
         
         
         
         
         
         
         
     return $table;
         
         
         
     }
     
     
     
     
    // Uncomment the following methods and override them if needed
    /*
      public function filters()<
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