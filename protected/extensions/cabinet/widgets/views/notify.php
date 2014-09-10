<!--<div class="col-md-6 browser_counter" data-browsers="--><?//=$method ?><!--" >-->
<!--    <div class="grid">-->
<!--        <div class="grid-header">-->
<!--            <i class="fa fa-bar-chart-o"></i>-->
<!--            <span class="grid-title">Статистика браузеров</span>-->
<!--            <div class="pull-right grid-tools">-->
<!--                <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>-->
<!--                <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>-->
<!--                <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div class="grid-body">-->
<!--            <div id="chart-donut" style="width:100%; height:250px;"></div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<?


if(isset($notifies) && !is_null($notifies)){

    $gritter_init = "function initNotification() { $(window).load(function(){";
    $timer = '';
    $type = '';

    foreach ($notifies as $noty) {
    $timer= $timer+1000;

 print_r($timer);
    if($noty['type'] == 'sticky'){ $type = 'sticky: true,';}

    $gritter_init .= "setTimeout(function(){
                                $.gritter.add({
                                    class_name: '".$noty['color']."',
                                    title: '".$noty['title']."',
                                    text: '".$noty['text']."',
                                    ".$type."
                                    time: ''
                                });
                                return false;
                            }, ".$timer.");" ;
    }

    $gritter_init .= "}); } $(function() {  'use strict';  initNotification();   });";
    Yii::app()->clientScript->registerScript('griiter_show',$gritter_init, CClientScript::POS_READY);



}

//var_dump($notifies);


?>