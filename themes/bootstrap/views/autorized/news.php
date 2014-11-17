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
    <span>Новости</span>
    <ol class="breadcrumb">
        <li><a href="">Кабинет</a></li>
        <li class="active"><a href="">Новости</a></li>
    </ol>
</section>
<!-- END CONTENT HEADER -->



<section class="content">

    <div class="row ">

        <div class="col-sm-12 ">
            <div class="col-md-12">
                <div class="timeline-centered">
                    <? $this->widget("cabinet.widgets.NewsLine",array('count'=>0)) ?>

                    <article class="timeline-entry begin">
                        <div class="timeline-entry-inner">
                            <div class="timeline-icon bg-default">
                                <i class="fa fa-laptop"></i>
                            </div>
                        </div>
                    </article>
                </div>
            </div>



        </div><!--/col-->

    </div><!--/profile-->


</section>