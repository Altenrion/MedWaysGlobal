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
    <span>Панель управления</span>
    <ol class="breadcrumb">
        <li>Кабинет</li>
        <li class="active">Панель</li>
    </ol>
</section>
<!-- END CONTENT HEADER -->

<section class="content">
    <div class="row ">
        <div class="col-md-12">
            <? $this->widget("cabinet.widgets.BrowserCounter") ?>
        </div>
    </div><!--/profile-->
</section>

