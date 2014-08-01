<style>
    .scroll{
            height: 600px;
            overflow: auto;
            position: relative;
            }
            
           
</style>

<div class="row">
   
        <br/>

    <ul class="nav nav-tabs">
        <li><a href="<?=Yii::app()->createUrl('UseDSS/patientDB')?>">База данных пациентов</a></li>
        <li><a href="<?=Yii::app()->createUrl('UseDSS/images')?>">Изображения</a></li>
        <li class="active"><a href="<?=Yii::app()->createUrl('UseDSS/searchOptions')?>">Поиск</a></li>
        <li><a href="<?=Yii::app()->createUrl('UseDSS/analitics')?>">Аналитика</a></li>
    </ul>
   <ul class="nav nav-tabs">
        <li ><a href="<?=Yii::app()->createUrl('UseDSS/searchOptions')?>">Параметры поиска</a></li>
        <li class="active"><a href="<?=Yii::app()->createUrl('UseDSS/searchResults')?>">Результаты поиска</a></li>
       
    </ul>
    <div class="span12">
     <? 
        
        switch($ind):
            case '1':  $this->renderPartial('_PatientSearch', ['searchData' => $searchData]); break;
            case '2':  $this->renderPartial('_ImageSearch', ['searchData' => $searchData]); break;
        endswitch;
         
        
        //var_dump($optionsPat);
        //var_dump($searchData);
        ?>
        </div>
    
</div>


