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
                $news = new News;
                $post = $news->getNews();
                var_dump($post);

                if(is_array($post)){
                    setlocale(LC_ALL,'ru_RU.CP1251','ru_RU','rus');
                    foreach($post as $p){
                        $date = date("j F, Y",strtotime($p['created']));
                        $date = $this->checkMonth($date);
//                        $date=  str_replace( "September", "cент",$date);

                        echo "<span><b>{$p['title']} :</b> </span> <span>{$p['content']}</span> </br> <b>Создано: </b>$date</br> ";
//                        echo $this->checkMonth($date);

                    }
                }

//                $news->setNews('Тестовая новость', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium amet autem blanditiis, consequatur consequuntur cumque debitis delectus deserunt illo inventore iure laudantium molestias nam nihil officiis possimus quibusdam quidem quod rerum sed, soluta sunt tempore ullam veritatis vitae voluptatum. Dicta, dolorem eligendi est excepturi exercitationem laborum libero modi officia, quas rem similique, soluta veniam.');
                ?>


				</div><!--/col-->

			</div><!--/profile-->



</section>