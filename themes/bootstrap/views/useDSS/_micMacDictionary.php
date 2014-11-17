
<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'MicMacDictionary')); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>словарь признаков</h4>
</div>

<div class="modal-body">
   Выберите признак
    <?
    
    //$p = Yii::app()->createController('UseDSS');
    //$r = $p[0]->createAction('modal')->run();
    ?>
    
      <select>

        <option>Микропризнаки</option>
        <option>Макропризнаки</option>
       
       

      </select>
    <div class="input-append">
        <input class="span2" id="appendedInputButtons" size="16" type="text">
        <button class="btn" type="button">Добавить</button>
    </div>
</div>

 

<div class="modal-footer">
    
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
    ));
    ?>
</div>

<?php $this->endWidget(); ?>

