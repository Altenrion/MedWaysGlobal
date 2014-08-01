
<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'EditImage')); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Редактирование изображения</h4>
</div>

<div class="modal-body">
    Редактируем выбранное изображение
    <?
    
   // $p = Yii::app()->createController('UseDSS');
   // $r = $p[0]->createAction('modal')->run();
    ?>
</div>

<div class="modal-footer">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'info',
        'label' => 'Сохранить',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
    ));
    ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Закрыть',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
    ));
    ?>
</div>

<?php $this->endWidget(); ?>

