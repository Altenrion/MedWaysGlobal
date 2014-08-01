<?php
/* @var $this SiteController */
/* @var $model ContMain */



$this->pageTitle=Yii::app()->name;


var_dump($_POST);
?>


<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Primary',
    'type'=>'success', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'null', // null, 'large', 'small' or 'mini'
    'buttonType'=>'submit',
)); ?>
<br/><br/><br/>

<p><hr></p>

<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'myModal')); ?>
 
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Редактирование проекта</h4>
</div>
 
<div class="modal-body">
    <p> </p>
    

    <?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data'=>array('id'=>1, 'firstName'=>'Mark', 'lastName'=>'Otto', 'language'=>'CSS'),
    'attributes'=>array(
        array('name'=>'firstName', 'label'=>'First name'),
        array('name'=>'lastName', 'label'=>'Last name'),
        array('name'=>'language', 'label'=>'Language'),
    ),
)); ?>
    
    
</div>
 
<div class="modal-footer">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'label'=>'Сохранить',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Закрыть',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
</div>
 
<?php $this->endWidget(); ?>


       
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Редактировать',
    'type'=>'primary',
    'htmlOptions'=>array(
        'data-toggle'=>'modal',
        'data-target'=>'#myModal',
    ),
)); ?>
<br/><br/><br/>
<?
if(Yii::app()->user->checkAccess('Admin')){
    echo "hello, I'm administrator<br/>";
}
if(Yii::app()->user->checkAccess('Dev')){
    echo "hello, I'm Developer ^_^<br/>";
}
//
echo Yii::app()->user->id.'<br/>';
echo Yii::app()->user->role.'<br/>';
echo Yii::app()->user->name.'<br/>';
?>