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
    <span>Управление проектами</span>
    <ol class="breadcrumb">
        <li><a href="">Кабинет</a></li>
        <li class="active"><a href="">Проекты</a></li>
    </ol>
</section>
<!-- END CONTENT HEADER -->

<section class="content">
    <div class="row">
        <!-- BEGIN MAIN CONTENT -->
        <div class="col-md-12">
            <div class="grid">
                <div class="grid-header" style="border:0px; background: none; color: #777777">
                    <i class="fa fa-graduation-cap"></i>
                    <span class="grid-title">Проекты <small style="font-size: 11px;">доступные для проверки</small> </span>

                    </div>
                <div class="grid-body">
                    <? $this->actionExpertProjectsList(); ?>
			    </div>
	        </div>
	    </div>
</section>