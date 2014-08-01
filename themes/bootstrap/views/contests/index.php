<?php
/* @var $this ContestsController */

$this->breadcrumbs=array(
	'Конкурсы',

);

Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/my.css'); 

//var_dump($_POST);
//var_dump($_GET);

?>
<div class='main'>
<div class='left'>
<h1><?php // echo $this->id . '/' . $this->action->id; 


?></h1>

<?php  $this->widget('bootstrap.widgets.TbGridView', array(
    'dataProvider'=>$dataProvider,
    
//    'type'=>'striped bordered condensed',
//    'filter'=>$model,
    'columns'=>array(
        array(
            'name'=>'short_title',
            'type'=>'raw',
            'value'=>'CHtml::link($data->short_title, Yii::app()->createUrl("contests/detail")."?id=".$data->id )', //,array("target"=>"_blank")

        ),
        array(
            'name'=>'cont_id',
            'type'=>'raw',
            'value'=>'$data->cont_id'
        ),
         array(
            'name'=>'summ_inc_nds',
            'type'=>'raw',
            'value'=>'str_replace(" ","&nbsp;",strrev(chunk_split(strrev($data->summ_inc_nds),3," ")) )'
        ),array(
            'name'=>'guaranty_req',
            'type'=>'raw',
            'value'=>'$data->guaranty_req'
        ),
         array(
            'name'=>'setoff_date',
            'type'=>'raw',
            'value'=>'str_replace("-",".",$data->setoff_date)'
        ),
        array(
            'name'=>'suply_mod_kp',
            'type'=>'raw',
            'value'=>'$data->suply_mod_kp'
        ),
        array(
            'name'=>'status_kd',
            'type'=>'raw',
            'value'=>'($data->status_kd == 1)?"скачано":"не&nbsp;скачано"'
        ),
        
        
    ),
)); 
?>
<br/><br/><br/>
<?php
//$listDataProvider = Yii::app()->baseUrl.'/img/koala.png';
/*

$this->widget('bootstrap.widgets.TbThumbnails', array(
    'dataProvider'=>$listDataProvider,
    'template'=>"{items}\n{pager}",
    'itemView'=>'_thumb',
   
)); */?>
   
</div>    
    <!--боковая панель-------------------------->
<div class='right'>
    <?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading'=>'Проекты',
    )); ?>
 
    <br/><p>Пример панельки для отображения данных по проектам.</p><p> Внутри нее можно разместить абсолютно любую информацию и соответственно с подразделами и всплывающими окнами.</p>
    <p><?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'size'=>'null',
        'label'=>'Подробнее...',
    )); ?></p>
 
<?php $this->endWidget(); ?>
    
</div>
  
    <div style="clear:both;"></div>
</div>
<br/>