
<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'EditPatient')); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Редактирование пациента</h4>
</div>

<div class="modal-body">
    Редактируем выбранного пациента
    <?
    
   // $p = Yii::app()->createController('UseDSS');
   // $r = $p[0]->createAction('modal')->run();
    ?>
</div>

<div class="modal-footer">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'primary',
        'label' => 'Save changes',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
    ));
    ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
    ));
    ?>
</div>

<?php $this->endWidget(); ?>

