<?

if(isset($notifies) && !is_null($notifies)){

    $gritter_init = "function initNotification() { $(window).load(function(){";
    $timer = '';
    $type = '';

    foreach ($notifies as $noty) {
    $timer= $timer+1000;

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

?>