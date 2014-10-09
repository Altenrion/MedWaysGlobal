<div class="table-responsive">
<?php $widget->run(); ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        $('tbody').on('mousedown', 'tr', function(){

            var row_num = this.rowIndex-1;
            bin(row_num);

            console.log(row_num);
            bin();

        });

        function bin (num){
            $('tbody tr').eq(num).bind('click', function(){
                var project_id = $(this).find('td:nth-child(1)').html();
                console.log(project_id);

                $.get("<?=Yii::app()->createUrl("Autorized/ManageProject")?>/", {
                    Project: project_id
                }, function () {
                    document.location.href = '<?=Yii::app()->createUrl("Autorized/ManageProject")?>/Project/' + project_id;
                });
            });
        }


    });
</script>

