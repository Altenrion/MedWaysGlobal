
<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'SimpleDictionary')); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Простой словарь</h4>
</div>

<div class="modal-body">
   Выберите словарь
    <?
    
    //$p = Yii::app()->createController('UseDSS');
    //$r = $p[0]->createAction('modal')->run();
    ?>
    
      <select>
        <option>Цитологические диагнозы</option>
        <option>Гистологические диагнозы</option>
        <option>Микропризнаки</option>
        <option>Макропризнаки</option>
        <option>Увеличение</option>
        <option>Окраска</option>
        <option>Цитологическое описание</option>
        <option>Гистологическое описание</option>
       

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

