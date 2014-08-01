
<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'DeletePatient')); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4 class="text-info">Удаление записи о пациенте</h4>
</div>

<div class="modal-body text-warning">
    Вы собираетесь удалить пациента ID <span id="patientdel">***</span>. 
    <strong>Выполнить удаление?</strong>
</div>

<div class="modal-footer">
<?
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'searchForm',
    'type'=>'search',
    'htmlOptions'=>array('class'=>'hiiden'),
)); ?>
 
<?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'url'=>Yii::app()->createUrl('UseDSS/deletePatient'),
            'label'=>'Удалить',
            'htmlOptions' => array('name'=>'deletePatient'),
            'type' => 'info',
)); ?>
 <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Отмена',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
    ));
    ?>
<?php $this->endWidget(); ?>
    
   
    
</div>

<?php $this->endWidget(); ?>

