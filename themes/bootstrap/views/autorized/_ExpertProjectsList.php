<div class="table-responsive">
<?php $widget->run(); ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {


        console.log('ggg');

        $('table.dataTable tbody tr').bind('click', function(){
            var project_id = $(this).find('td:nth-child(1)').html();
            console.log(project_id);

            $.get("<?=Yii::app()->createUrl("Autorized/ManageProject")?>/", {
                Project: project_id
            }, function () {
                document.location.href = '<?=Yii::app()->createUrl("Autorized/ManageProject")?>/Project/' + project_id;
            });



        })


        $('table.values tr').bind('click', function () {
            var taskID = $(this).find('input.rowID').val();
            $.get("/Task/Edit/", {
                id: taskID
            }, function () {
                document.location.href = '/Task/Edit/' + taskID;
            });
        });
    });
</script>