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
    <span>Статистика мероприятия</span>
    <ol class="breadcrumb">
        <li><a href="">Кабинет</a></li>
        <li class="active"><a href="">Статистика</a></li>
    </ol>
</section>
<!-- END CONTENT HEADER -->



<section class="content">

			<div class="row ">

				<div class="col-md-12 ">



                <?
                $notify = new Notify();

                $notify->SetNotify($address='Dev',$user_id=0,$title='Text2Text2',$text='Text3',$type='quick',$repeat='regular');

//                var_dump($notify->GetNotify('Exp',2));

                ?>

				</div><!--/col-->

			</div><!--/profile-->



</section>