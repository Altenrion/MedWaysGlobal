<?php
/* @var $this ContestsController */
//Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/my.css',CClientScript::POS_BEGIN); 

$this->breadcrumbs=array(
	'Конкурсы'=>array('/contests'),
	'Подробно',
);
?>
<h1><?php //echo $this->id . '/' . $this->action->id; ?></h1>

<p>
<h2>  <? echo $pk = yii::app()->request->getParam('pk'); ?>  </h2>    

<!-- <h2><a href="file:///C:/Windows">Открыть диск C:/Windows</a></h2>-->

<div class='left'> 
     <? foreach ($data as $line=>$da): ?>
    <?= $this->GetLogData('cont_id',$da['id']);  ?>
    <?php endforeach; ?>
    
<table class="table table-striped">

    <? foreach ($data as $line=>$da): ?>
    
    <a href="#" 
rel="tooltip" 
data-html="true" 
title="<table>
<tr><td style='color:red;'>complex</td><td>HTML</td></tr>
<tr><td style='color:red;'>complex</td><td>HTML</td></tr>
<tr><td style='color:red;'>complex</td><td>HTML</td></tr>
</table>">
hover over me to see HTML
</a>
    
    <? //var_dump($da );?>
        <tr>
            <th width='30%'>№ конкурса
                <br></th>
            <td><?php echo CHtml::encode($da['id']); ?>
            
            </td>        
        </tr>
        <tr>
            
            
            
            
            <th><a href="#" rel="popover" data-html="true"  data-content="<?= $this->GetLogData('cont_id',$da['id'])?>">№ лота</a></th>
            <td><?php
                if(Yii::app()->user->checkAccess('ContestManager') || Yii::app()->user->checkAccess('Dev')){
                    $this->widget('editable.Editable', array(
                        'type'      => 'text',
                        'pk'        => $da['id'],
                        'name'      => 'cont_id',                        
                        'text'      => CHtml::encode($da['cont_id']),
                        'url'       => $this->createUrl('contests/updateDataTest'), 
                        'title'     => 'Enter cont id',
                        'placement' => 'right'
                    ));
                }
                else {  echo CHtml::encode($da['cont_id']); } ?></td>           
        </tr>
        <tr>
            <th>Обработано закупкой (№ КП)</th>
            <td><?php if(Yii::app()->user->checkAccess('ContestManager') || Yii::app()->user->checkAccess('Dev')){
                    $this->widget('editable.Editable', array(
                        'type'      => 'text',
                        'pk'        => $da['id'],
                        'name'      => 'suply_mod_kp',                        
                        'text'      => CHtml::encode($da['suply_mod_kp']),
                        'url'       => $this->createUrl('contests/updateDataTest'), 
                        'title'     => 'Enter user name',
                        'placement' => 'right'
                    ));
                }
                else {  echo CHtml::encode($da['suply_mod_kp']); } ?></td>         
        </tr>
        <tr>
            <th>Название </th>
            <td><?php if(Yii::app()->user->checkAccess('ContestManager') || Yii::app()->user->checkAccess('Dev')){
                
                $this->widget('editable.Editable', array(
                        'type'      => 'text',
                        'name'      => 'short_title',
                        'pk'        => $da['id'],
                        'text'      => CHtml::encode($da['short_title']),
                        'url'       => $this->createUrl('contests/updateDataTest'), 
                        'title'     => 'Enter title',
                        'placement' => 'right'
                    ));
                
                }
                else {  echo CHtml::encode($da['short_title']); }?></td>        
        </tr>
        <tr>
            <th>Название (полное)</th>
           <td><?php if(Yii::app()->user->checkAccess('ContestManager') || Yii::app()->user->checkAccess('Dev')){
                
                $this->widget('editable.Editable', array(
                        'type'      => 'textarea',
                        'name'      => 'long_title',
                        'pk'        => $da['id'],
                        'text'      => CHtml::encode($da['long_title']),
                        'url'       => $this->createUrl('contests/updateDataTest'), 
                        'title'     => 'Enter title',
                        'placement' => 'right',
                        'showbuttons' => 'bottom',
                    ));                
                }
                else {  echo CHtml::encode($da['long_title']); }?></td>        
        </tr>
         <tr>
            <th>Вид лота</th>
            <td><?php if(Yii::app()->user->checkAccess('ContestManager') || Yii::app()->user->checkAccess('Dev')){
                
                $this->widget('editable.Editable', array(
                        'type'      => 'select',
                        'name'      => 'cont_type_id',
                        'pk'        => $da['id'],
                        'text'      => CHtml::encode($da['cont_type_id']),
                        'url'       => $this->createUrl('contests/updateDataTest'), 
                        'source'    => $this->createUrl('contests/getContTypeList'), 
                        'title'     => 'Enter title',
                        'placement' => 'right'
              
                    ));               
                }
                else {  echo CHtml::encode($da['cont_type_id']); }?></td>       
        </tr>
       <tr>
            <th>Дата подачи</th>
             <td><?php if(Yii::app()->user->checkAccess('ContestManager') || Yii::app()->user->checkAccess('Dev')){
                
                $this->widget('editable.Editable', array(
                        'type'      => 'datetime',
                        'name'      => 'setoff_date',
                        'pk'        => $da['id'],
                        'text'      => CHtml::encode($da['setoff_date']),
                        'url'       => $this->createUrl('contests/updateDataTest'), 
                        'format'      => 'yyyy-mm-dd hh:ii:ss', //format in which date is expected from model and submitted to server
                        'viewformat'  => 'yyyy-mm-dd hh:ii',
                        'placement' => 'right',
                         'options'     => array(
                            'datepicker' => array('language' => 'ru') 
                        )  
                    ));
                }
                else {  echo CHtml::encode($da['setoff_date']); }?></td>          
       </tr>
       <tr>
            <th>Дата окончания</th>
            <td><?php if(Yii::app()->user->checkAccess('ContestManager') || Yii::app()->user->checkAccess('Dev')){
                
                $this->widget('editable.Editable', array(
                        'type'      => 'datetime',
                        'name'      => 'end_date',
                        'pk'        => $da['id'],
                        'text'      => CHtml::encode($da['end_date']),
                        'url'       => $this->createUrl('contests/updateDataTest'), 
                        'format'      => 'yyyy-mm-dd hh:ii:ss', //format in which date is expected from model and submitted to server
                        'viewformat'  => 'yyyy-mm-dd hh:ii',
                        'placement' => 'right',
                         'options'     => array(
                            'datepicker' => array('language' => 'ru') 
                        )  
                    ));                
                }
                else {  echo CHtml::encode($da['end_date']); }?></td>      
        </tr> 
       <tr>
            <th>Статус (обработано)</th>
            <td><?php if(Yii::app()->user->checkAccess('ContestManager') || Yii::app()->user->checkAccess('Dev')){
                
                $this->widget('editable.Editable', array(
                        'type'      => 'text',
                        'name'      => 'status_mod',
                        'pk'        => $da['id'],
                        'text'      => CHtml::encode($da['status_mod']),
                        'url'       => $this->createUrl('contests/updateDataTest'), 
                        'title'     => 'Enter title',
                        'placement' => 'right'
                    ));                
                }
                else {  echo CHtml::encode($da['status_mod']); }?></td>     
        </tr>
        <tr>
            <th>Статус (актуальность)</th>
            <td><?php if(Yii::app()->user->checkAccess('ContestManager') || Yii::app()->user->checkAccess('Dev')){
                
                $this->widget('editable.Editable', array(
                        'type'      => 'select',
                        'name'      => 'check_status_id',
                        'pk'        => $da['id'],
                        'text'      => CHtml::encode($da['status']),
                        'url'       => $this->createUrl('contests/updateDataTest'), 
                        'source'    => $this->createUrl('contests/getStatusList'), 
                        'title'     => 'Enter title',
                        'placement' => 'right'
              
                    ));               
                }
                else {  echo CHtml::encode($da['status']); }?></td>       
        </tr>
        <tr>
            <th>Статус (КД)</th>
             <td><?php if(Yii::app()->user->checkAccess('ContestManager') || Yii::app()->user->checkAccess('Dev')){
                
                $this->widget('editable.Editable', array(
                        'type'      => 'select',
                        'name'      => 'status_kd',
                        'pk'        => $da['id'],
                        'text'      => CHtml::encode(($da['status_kd'])=='1'?'Скачано':'Не скачано'),
                        'url'       => $this->createUrl('contests/updateDataTest'), 
                        'source'    => Editable::source(array(1 => 'Скачано', 2 => 'Не скачано')),
                        'title'     => 'Enter title',
                        'placement' => 'right'
                    ));                
                }
                else {  echo CHtml::encode($da['status_kd']); }?></td>    
        </tr>
        <tr>
            <th>Номинал (с НДС)</th>
            <td><?php if(Yii::app()->user->checkAccess('ContestManager') || Yii::app()->user->checkAccess('Dev')){
                    $this->widget('editable.Editable', array(
                        'type'      => 'text',
                        'pk'        => $da['id'],
                        'name'      => 'summ_inc_nds',                        
                        'text'      => CHtml::encode($this->editMoney($da['summ_inc_nds'])),
                        'url'       => $this->createUrl('contests/updateDataTest'), 
                        'title'     => 'Enter user name',
                        'placement' => 'right'
                        
                    ));
                }
                else {  echo CHtml::encode($da['summ_inc_nds']); } ?></td>        
        </tr>
        <tr>
            <th>Запрошенная гарантия (БГ)</th>
           <td><?php if(Yii::app()->user->checkAccess('ContestManager') || Yii::app()->user->checkAccess('Dev')){
                
                $this->widget('editable.Editable', array(
                        'type'      => 'text',
                        'name'      => 'guaranty_req',
                        'pk'        => $da['id'],
                        'text'      => CHtml::encode($this->editMoney($da['guaranty_req'])),
                        'url'       => $this->createUrl('contests/updateDataTest'), 
                        'title'     => 'Enter title',
                        'placement' => 'right'
                    ));                
                }
                else {  echo CHtml::encode($da['guaranty_req']); }?></td>      
        </tr>
        <tr>
           <th>URL</th>
           <td><?php if(Yii::app()->user->checkAccess('ContestManager') || Yii::app()->user->checkAccess('Dev')){
                
                $this->widget('editable.Editable', array(
                        'type'      => 'text',
                        'name'      => 'url',
                        'pk'        => $da['id'],
                        'text'      => CHtml::encode($da['url']),
                        'url'       => $this->createUrl('contests/updateDataTest'), 
                        'title'     => 'Enter title',
                        'placement' => 'right'
                    ));                
                }
                else {  echo CHtml::encode($da['url']); }?></td>          
        </tr>
        <tr>
            <th>Компания (от нас)</th>
            <td><?php if(Yii::app()->user->checkAccess('ContestManager') || Yii::app()->user->checkAccess('Dev')){
                
                $this->widget('editable.Editable', array(
                        'type'      => 'select',
                        'name'      => 'prim_hold_comp_id',
                        'pk'        => $da['id'],
                        'text'      => CHtml::encode($da['prim_company']),
                        'url'       => $this->createUrl('contests/updateDataTest'), 
                        'source'    => $this->createUrl('contests/getCompanyNames'), 
                        'title'     => 'Enter title',
                        'placement' => 'right'
                    ));                
                }
                else {  echo CHtml::encode($da['prim_company']); }?></td>         
        </tr>
        <tr>
            <th>Сумма компании</th>
            <td><?php if(Yii::app()->user->checkAccess('ContestManager') || Yii::app()->user->checkAccess('Dev')){
                    $this->widget('editable.Editable', array(
                        'type'      => 'text',
                        'pk'        => $da['id'],
                        'name'      => 'prim_hold_comp_summ',                        
                        'text'      => CHtml::encode($this->editMoney($da['prim_hold_comp_summ'])),
                        'url'       => $this->createUrl('contests/updateDataTest'), 
                        'title'     => 'Enter user name',
                        'placement' => 'right'
                    ));
                }
                else {  echo CHtml::encode($da['prim_hold_comp_summ']); } ?></td>          
        </tr>
        <tr>
            <th>Компания (подыгрыш)</th>
           <td><?php if(Yii::app()->user->checkAccess('ContestManager') || Yii::app()->user->checkAccess('Dev')){
                
                $this->widget('editable.Editable', array(
                        'type'      => 'select',
                        'name'      => 'sec_hold_comp_id',
                        'pk'        => $da['id'],
                        'text'      => CHtml::encode($da['sec_company']),
                        'url'       => $this->createUrl('contests/updateDataTest'), 
                        'source'    => $this->createUrl('contests/getCompanyNames'), 
                        'title'     => 'Enter title',
                        'placement' => 'right'
                    ));                
                }
                else {  echo CHtml::encode($da['sec_company']); }?></td>         
        </tr>
        <tr>
            <th>Сумма компании</th>
             <td><?php if(Yii::app()->user->checkAccess('ContestManager') || Yii::app()->user->checkAccess('Dev')){
                    $this->widget('editable.Editable', array(
                        'type'      => 'text',
                        'pk'        => $da['id'],
                        'name'      => 'sec_hold_comp_summ',                        
                        'text'      => CHtml::encode($this->editMoney($da['sec_hold_comp_summ'])),
                        'url'       => $this->createUrl('contests/updateDataTest'), 
                        'title'     => 'Enter user name',
                        'placement' => 'right'
                    ));
                }
                else {  echo CHtml::encode($da['sec_hold_comp_summ']); } ?></td>  
                                      
        </tr>
        
        <tr>
            <th>Обработано теханарями</th>
            <td><?php if(Yii::app()->user->checkAccess('ContestManager') || Yii::app()->user->checkAccess('Dev')){
                
                $this->widget('editable.Editable', array(
                        'type'      => 'select',
                        'name'      => 'tech_mod',
                        'pk'        => $da['id'],
                        'text'      => CHtml::encode(($da['tech_mod'] == 1)? 'обработано':'не обработано'),
                        'url'       => $this->createUrl('contests/updateDataTest'), 
                        'source'    => Editable::source(array(1=>'не обработано', 2=>'обработано')), 
                       
                        'placement' => 'right'
              
                    ));               
                }
                else {  echo CHtml::encode($da['tech_mod']); }?></td>       
        </tr>
        <tr>
            <th>Расчетная себестоимость</th>
            <td><?php if(Yii::app()->user->checkAccess('ContestManager') || Yii::app()->user->checkAccess('Dev')){
                    $this->widget('editable.Editable', array(
                        'type'      => 'text',
                        'pk'        => $da['id'],
                        'name'      => 'rated_value',                        
                        'text'      => CHtml::encode($this->editMoney($da['rated_value'])),
                        'url'       => $this->createUrl('contests/updateDataTest'), 
                        'title'     => 'Enter user name',
                        'placement' => 'right'
                    ));
                }
                else {  echo CHtml::encode($da['rated_value']); } ?></td>          
        </tr>
        <tr>
            <th>Ожидаемая прибыль</th>
            <td><span class='money'><?php if(Yii::app()->user->checkAccess('ContestManager') || Yii::app()->user->checkAccess('Dev')){
                    $this->widget('editable.Editable', array(
                        'type'      => 'text',
                        'pk'        => $da['id'],
                        'name'      => 'prospect_value',                        
                        'text'      => CHtml::encode($this->editMoney($da['prospect_value'])),
                        'url'       => $this->createUrl('contests/updateDataTest'),
                        'title'     => 'Enter user name',
                        'placement' => 'right'
                    ));
                }
                else {  echo CHtml::encode($da['prospect_value']); } ?></span></td>
        </tr>
        <tr>
            <th>Изменения</th>
            <td><?php if(Yii::app()->user->checkAccess('ContestManager') || Yii::app()->user->checkAccess('Dev')){
                
                $this->widget('editable.Editable', array(
                        'type'      => 'select',
                        'name'      => 'current_status_id',
                        'pk'        => $da['id'],
                        'text'      => CHtml::encode($da['current_status']),
                        'url'       => $this->createUrl('contests/updateDataTest'), 
                        'source'    => $this->createUrl('contests/getCurrentStatus'), 
                        'title'     => 'Enter title',
                        'placement' => 'right'
                    ));                
                }   
                else {  echo CHtml::encode($da['current_status']); }?></td>        
        </tr>
        <tr>
            <th>Вид документов</th>
            <td><?php if(Yii::app()->user->checkAccess('ContestManager') || Yii::app()->user->checkAccess('Dev')){
                
                $this->widget('editable.Editable', array(
                        'type'      => 'select',
                        'name'      => 'doc_type_id',
                        'pk'        => $da['id'],
                        'text'      => CHtml::encode($da['doc_type_id']),
                        'url'       => $this->createUrl('contests/updateDataTest'), 
                        'source'    => $this->createUrl('contests/getDocTypeList'), 
                        'title'     => 'Enter title',
                        'placement' => 'right'
              
                    ));               
                }
                else {  echo CHtml::encode($da['doc_type_id']); }?></td>       
        </tr>
        
   <?php endforeach; ?>
    </table>
     </div>
     <div style="clear:both;"></div>
</p>
<br/><br/><br/><br/><br/><br/><br/>
