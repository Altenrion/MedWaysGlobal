<div class="table-responsive">
    <?php $widget->run(); ?>
</div>

<?
    $exp = Users::model()->findAll("roles='Exp' OR roles='Exp1' OR roles='Exp2' OR roles='Exp3'");
    $nums = array();
    foreach($exp as $num){
        $nums[] = $num->id;
    }
?>

<script type="text/javascript">
    $(document).ready(function () {

        $('tbody').on('mouseover', 'tr', function(){
        <? foreach($nums as $id_k=>$id_v): ?>
            $('a[rel="roles_<?=$id_v ?>"]').editable({'disabled':false,'showbuttons':false,'name':'roles','title':'Выберите роль','value':null,'url':'<?= Yii::app()->createUrl('Autorized/updateProfile') ?>','type':'select','placement':'top','source':[{'value':'Exp','text':'Эксперт0'},{'value':'Exp1','text':'Эксперт1'},{'value':'Exp2','text':'Эксперт2'},{'value':'Exp3','text':'Эксперт3'}]});
            $('a[rel="ID_STAGE_<?=$id_v ?>"]').editable({'disabled':false,'showbuttons':false,'name':'ID_STAGE','title':'Выберите платформу','value':null,'url':'<?= Yii::app()->createUrl('Autorized/updateProfile') ?>','type':'select','placement':'top','source':[
                {'value':'1','text':'Онкология'},
                {'value':'2','text':'Кардиология и ангиология'},
                {'value':'3','text':'Неврология'},
                {'value':'4','text':'Эндокринология'},
                {'value':'5','text':'Педиатрия'},
                {'value':'6','text':'Психиатрия и зависимости'},
                {'value':'7','text':'Имунология'},
                {'value':'8','text':'Микробиология'},
                {'value':'9','text':'Фaрмакология'},
                {'value':'10','text':'Профилактическая среда'},
                {'value':'11','text':'Репродуктивное здоровье'},
                {'value':'12','text':'Регенеративная медицина'},
                {'value':'13','text':'Инвазивные технологии'},
                {'value':'14','text':'Инновационные фундаментальные технологии в медицине'},


            ]});

            <? endforeach; ?>
        });

    });
</script>