<div class="table-responsive">
<?php $widget->run(); ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        var row_id = $('table.dataTable>tbody>tr>td:first').val();



        console.log(row_id);


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