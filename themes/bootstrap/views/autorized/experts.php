<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 14.08.14
 * Time: 13:26
 * To change this template use File | Settings | File Templates.
 */

?>

<div id="content" class="col-lg-12 col-sm-12 col-xs-12">


    <section class="content-header">
        <i class="fa fa-user"></i>
        <span>Профиль пользователя</span>
        <ol class="breadcrumb">
            <li><a href="">Кабинет</a></li>
            <li class="active"><a href="">Профиль</a></li>
        </ol>
    </section>


			<div class="row profile">
                <div class="col-md-12">

                    <div class="grid no-border">
                        <div class="grid-header">
                            <i class="fa fa-table"></i>
                            <span class="grid-title">Custom Table</span>
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
                                    <th>Message</th>

                                </tr>
                                </thead>
                                <tbody>
                                <? foreach($models as $model): ?>
                                    <tr>
                                        <td><?= $model->id  ?></td>
                                        <td> Привет </td>
                                    </tr>
                                <? endforeach; ?>
                                </tbody>
                            </table>
                            <ul class="pagination">
                                <? $this->widget('CLinkPager', array('pages'=>$pages)) ?>
                            </ul>

                        </div>
                    </div>
                </div>


			</div><!--/profile-->



			</div>