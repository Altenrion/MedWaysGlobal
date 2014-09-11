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
                <div class="col-sm-6">
                <?
                $news = new News;
                $post = $news->getNews();
//                var_dump($post);

                if(is_array($post)){
                    setlocale(LC_ALL,'ru_RU.CP1251','ru_RU','rus');
                    foreach($post as $p){
                        $date = date("j F, Y",strtotime($p['created']));
                        $date = $this->checkMonth($date);
//                        $date=  str_replace( "September", "cент",$date);

                        echo "<span><b>{$p['title']} :</b> </span> <span>{$p['content']}</span> </br> <b>Создано: </b>$date</br></br> ";
//                        echo $this->checkMonth($date);

                    }
                }
                    echo '</br></br>';
//                $news->setNews('Тестовая новость5', 'Lorem ipsum dolor sit amet, consectetur iure laudantium molestias nam nihil officiis possimus quibusdam quidem quod rerum sed, soluta sunt tempore ullam veritatis vitae voluptatum. Dicta, dolorem eligendi est excepturi exercitationem laborum libero modi officia, quas rem similique, soluta veniam.');
                ?>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-7">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Your Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Confirm Password</label>
                                <div class="col-sm-7">
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Your Password (again)">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-7">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Your Email">
                                </div>
                            </div>
                        </div>
                    </div>
				</div><!--/col-->

			</div><!--/profile-->



</section>