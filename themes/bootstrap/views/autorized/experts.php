<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 14.08.14
 * Time: 13:26
 * To change this template use File | Settings | File Templates.
 */

?>



<!-- BEGIN CONTENT HEADER -->
<section class="content-header">
    <i class="fa fa-user"></i>
    <span>Управление экспертами</span>
    <ol class="breadcrumb">
        <li><a href="">Кабинет</a></li>
        <li class="active"><a href="">Эксперты</a></li>
    </ol>
</section>
<!-- END CONTENT HEADER -->

<section class="content">
			<div class="row ">
                <div class="col-md-12">

                    <div class="grid no-border">
                        <div class="grid-header">
                            <i class="fa fa-table"></i>
                            <span class="grid-title">Список экспертов</span>
                            <div class="pull-right grid-tools">
                                <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
                                <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
                                <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
                            </div>
                        </div>
                        <div class="grid-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th><?= $sort->link('id') ?></th>
                                    <th><?= $sort->link('F_NAME','Фамилия') ?></th>
                                    <th><?= $sort->link('L_NAME','Имя') ?></th>
                                    <th><?= $sort->link('S_NAME','Отчество') ?></th>
                                    <th><?= $sort->link('EMAIL','email') ?></th>
                                    <th>Управление</th>

                                </tr>
                                </thead>
                                <tbody>
                                <? foreach($models as $model): ?>
                                    <tr>
                                        <td><?= $model->id  ?></td>
                                        <td><?= $model->F_NAME  ?></td>
                                        <td><?= $model->L_NAME  ?></td>
                                        <td><?= $model->S_NAME  ?></td>
                                        <td><?= $model->EMAIL  ?></td>
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
                                    'pages'=>$pages,
//                                    'cssFile'=>false,
//                                    'class'=>'CLinkPager',
                                )) ?>

                        </div>
                    </div>




                </div>


			</div><!--/profile-->

</section>

