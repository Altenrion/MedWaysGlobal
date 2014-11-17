<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 14.08.14
 * Time: 13:26
 * To change this template use File | Settings | File Templates.
 */

//var_dump($_GET);
?>

<!-- BEGIN CONTENT HEADER -->
<section class="content-header">
    <i class="fa fa-user"></i>
    <span>Управление пользователями</span>
    <ol class="breadcrumb">
        <li><a href="">Кабинет</a></li>
        <li class="active"><a href="">Управление</a></li>
    </ol>
</section>
<!-- END CONTENT HEADER -->



<section class="content">

    <div class="row ">

        <div class="col-sm-12 ">
<!--            <button type="button" class="btn btn-xs  btn-primary btn-radius"><i class="fa fa-envelope-o"></i></button>-->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">Эксперты</a></li>
                <li class=""><a href="#profile" data-toggle="tab">Представители</a></li>

            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <? $this->actionExpertsList(); ?>
<!--                    --><?// $this->renderPartial('_exp_grid',array('sort'=>$sort,'pages'=>$pages,'models'=>$models)); ?>
                </div>
                <div class="tab-pane" id="profile">
                    <? $this->actionManagersList(); ?>
<!--                    --><?// $this->renderPartial('_man_grid',array('sortm'=>$sortm,'pags'=>$pags,'manags'=>$manags)); ?>
                </div>
            </div>




        </div><!--/col-->

    </div><!--/profile-->


</section>