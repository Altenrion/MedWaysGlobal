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
        <? endforeach; ?>
        });

    });
</script>