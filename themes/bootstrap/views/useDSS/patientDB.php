

<div class="row">
    
    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'info'=>array('block'=>false, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),)
    ); ?>
 
        <br/>

    <ul class="nav nav-tabs">
        <li class="active">
            <a href="<?=Yii::app()->createUrl('UseDSS/patientDB')?>">База данных пациентов</a>
        </li>
        <li><a href="<?=Yii::app()->createUrl('UseDSS/images')?>">Изображения</a></li>
        <li><a href="<?=Yii::app()->createUrl('UseDSS/searchOptions')?>">Поиск</a></li>
        <li><a href="<?=Yii::app()->createUrl('UseDSS/analitics')?>">Аналитика</a></li>
    </ul>
   
    <div class="span12 ">
        <div class="row">
            <div class="span5"><span class="text-info"><b>Выберите нужный орган для отображения пациентов: </b></span>
            
                <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
                    'type'=>'info', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size'=>'mini',
                    'buttons'=>array(
                        array('label'=>'Органы','items'=>array(
                            array('label'=>'Желудок', 'url'=>Yii::app()->createUrl('UseDSS/patientDB', array('organ'=>'Stomach'))),
                            array('label'=>'Молочная железа', 'url'=>Yii::app()->createUrl('UseDSS/patientDB', array('organ'=>'Mammary'))),
                            array('label'=>'Щитовидная железа', 'url'=>Yii::app()->createUrl('UseDSS/patientDB', array('organ'=>'Throid'))),
                            array('label'=>'Кишечник толстый', 'url'=>Yii::app()->createUrl('UseDSS/patientDB',array('organ'=>'Intestine'))),
                            array('label'=>'Печень', 'url'=>Yii::app()->createUrl('UseDSS/patientDB',array('organ'=>'Liver'))),
                            array('label'=>'Пищевод', 'url'=>Yii::app()->createUrl('UseDSS/patientDB',array('organ'=>'Esophagus'))),
                            array('label'=>'Поджелудочная железа', 'url'=>Yii::app()->createUrl('UseDSS/patientDB',array('organ'=>'Pancreas'))),
                            array('label'=>'Прямая кишка', 'url'=>Yii::app()->createUrl('UseDSS/patientDB',array('organ'=>'Rectum'))),
                            array('label'=>'Почка', 'url'=>Yii::app()->createUrl('UseDSS/patientDB',array('organ'=>'Kidney'))),
                            array('label'=>'Лимфотические узлы', 'url'=>Yii::app()->createUrl('UseDSS/patientDB',array('organ'=>'Lymph'))),
                            array('label'=>'Шейка матки', 'url'=>Yii::app()->createUrl('UseDSS/patientDB',array('organ'=>'Cervix'))),
                            array('label'=>'Мокрота(нативн.)', 'url'=>Yii::app()->createUrl('UseDSS/patientDB',array('organ'=>'SputumNat'))),
                            array('label'=>'Мокрота(окраш.)', 'url'=>Yii::app()->createUrl('UseDSS/patientDB',array('organ'=>'SputumO'))),
                            array('label'=>'Толстая кишка', 'url'=>Yii::app()->createUrl('UseDSS/patientDB',array('organ'=>'Colon'))),
                        )),
                   ),
                )); ?>
            
            </div>
        </div>
        </br>
        
        <table class="table table-condensed table-striped table-hover table-bordered">
            <thead>
            <th>ID</th>
            <th width="10%">№</th>
            <th>И</th>
            <th>Р</th>
            <th width="40%">Цитологическое заключение (диагноз)</th>
            <th width="40%">Гистологический диагноз </th>
            <th>Возраст</th>
            <th>Пол</th>
        </thead>
            <tbody>
              
                <?  
        if(isset($data)):
            foreach ($data as $dat): ?>
                <tr class='choice' data-toggle='modal' data-target='#PatientModal' id='<?=$dat['id'] ?>'>
                    <td><?=$dat['id'] ?></td>
                    <td><?=$dat['num'] ?></td>
                    <td><?=$dat['imgs'] ?></td>
                    <td> </td>
                    <td><?=$dat['cyt'] ?></td>
                    <td><?=$dat['gyst'] ?></td>
                    <td><?=$dat['age'] ?></td>
                    <td><?=$dat['sex'] ?></td>   
                </tr>
        <? endforeach; endif;?>
        
            </tbody>
        </table>
        
        
        
    </div>
    
</div>

       <?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'PatientModal')); ?>
 
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4 class="text-info">Выбор пациента</h4>
</div>
 
<div class="modal-body">
    <p class="text-info">Вы выбрали пациента ID<span id="patient"></span> для детального просмотра.</p>
</div>
 
<div class="modal-footer">
   
    
</div>
 
<?php $this->endWidget(); ?>

      
