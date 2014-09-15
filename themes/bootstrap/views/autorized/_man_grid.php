<?php
/**
 * Created by JetBrains PhpStorm.
 * User: n.v.barishev
 * Date: 15.09.14
 * Time: 12:58
 * To change this template use File | Settings | File Templates.
 */
?>

<div class="grid no-border">
    <div class="grid-header">
        <i class="fa fa-table"></i>
        <span class="grid-title">Список представителей</span>
        <div class="pull-right grid-tools">
            <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
            <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
            <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
        </div>
    </div>
    <div class="grid-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th><?= $sortm->link('id') ?></th>
                    <th><?= $sortm->link('F_NAME','Фамилия') ?></th>
                    <th><?= $sortm->link('L_NAME','Имя') ?></th>
                    <th><?= $sortm->link('S_NAME','Отчество') ?></th>
                    <th><?= $sortm->link('EMAIL','email') ?></th>
                    <th><?= $sortm->link('roles','Роль') ?></th>
                    <th>Управление</th>

                </tr>
                </thead>
                <tbody>
                <? foreach($manags as $model): ?>
                    <tr>
                        <td><?= $model->id  ?></td>
                        <td><?= $model->F_NAME  ?></td>
                        <td><?= $model->L_NAME  ?></td>
                        <td><?= $model->S_NAME  ?></td>
                        <td><?= $model->EMAIL  ?></td>
                        <td><?= $model->roles  ?></td>
                        <td>
                            <a href="#"><i class="fa fa-check bg-green action"></i></a>
                            <a href="#"><i class="fa fa-pencil bg-blue action"></i></a>
                            <a href="#"><i class="fa fa-crop bg-red action"></i></a>
                        </td>

                    </tr>
                <? endforeach; unset($model);?>
                </tbody>
            </table>

            <? $this->widget('LinkPager', array(
                'pages'=>$pags,
            )) ?>

        </div>
    </div>
</div>