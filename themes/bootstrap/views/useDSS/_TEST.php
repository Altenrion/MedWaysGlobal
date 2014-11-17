<style>
    #TEST{
        width:90%;
        height:85%;
        margin-left:-45%;
    }
    
    .foot{
       position:absolute;
       bottom:0;
       width:100%;
       padding-left:0px;
       padding-right:0px;
    }
    .pad{
        margin-right: 20px;
        
    }
    .imgfullscr{
        height:90%;
        width:auto;
        
    }
    .modal-body{
        max-height: 80%;
    }
    
</style>
<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'TEST')); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Полноекранный просмотр изображения</h4>
</div>

<div class="modal-body">
TEST
<img class="imgfullscr" src='<?=Yii::app()->baseUrl.'/img/Cytology/7/{4C19BA0F-DDC2-4111-BEB9-9E33A074BBE9}.jpg' ?>' />
</div>
<br><br><br><br>
<div class="modal-footer foot">
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'type' => 'info',
        'label' => 'Запомнить',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal',
            'class'=>'pad'
            ),
    ));
    ?>
    <?php
    $this->widget('bootstrap.widgets.TbButton', array(
        'label' => 'Закрыть',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal',
                        'class'=>'pad'
            ),
    ));
    ?>
</div>

<?php $this->endWidget(); ?>

