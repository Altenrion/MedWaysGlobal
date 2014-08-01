
<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'AddPatient')); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Добавление пациентов</h4>
</div>

<form class="form-horizontal">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Имя пациента</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="имя">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Фамилия пациента</label>
    <div class="controls">
      <input type="password" id="inputPassword" placeholder="Фамилия">
    </div>
  </div>
    <div class="control-group">
    <label class="control-label" for="inputPassword">Возраст</label>
    <div class="controls">
      <input type="password" id="inputPassword" placeholder="возраст">
    </div>
  </div>
       <div class="control-group">
    <label class="control-label" for="inputPassword">Пол</label>
    <div class="controls">
<select>
  <option>М</option>
  <option>Ж</option>
</select>    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <label class="checkbox">
        <input type="checkbox">Отметить как аквированного
      </label>
    </div>
  </div>
</form>

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

