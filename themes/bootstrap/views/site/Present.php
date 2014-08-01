<?php

/* @var $this SiteController */

 $this->pageTitle = Yii::app()->name;
?>
<style>
    
</style>
</style>

<?php /** @var BootActiveForm $form */

$a = false;
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'verticalForm',
    'htmlOptions'=>array('class'=>'well'),
)); ?>
 
<?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'list',
    'items'=>array(
        array('label'=>'СОРТИРОВКА'),
        array('label'=>'Номер конкурса', 'icon'=>'home', 'url'=>'update?k=1'),
        array('label'=>'Название', 'icon'=>'book', 'url'=>'#'),
        array('label'=>'Application', 'icon'=>'pencil', 'url'=>'#'),
        array('label'=>'ГРУППИРОВКА'),
        array('label'=>'Profile', 'icon'=>'user', 'url'=>'#'),
        array('label'=>'Settings', 'icon'=>'cog', 'url'=>'#'),
        array('label'=>'Help', 'icon'=>'flag', 'url'=>'#'),
    ),
)); ?>
<?php $this->endWidget(); ?>
