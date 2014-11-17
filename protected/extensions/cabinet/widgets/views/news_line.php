<style type="text/css">

    @media (max-width: 1200px){
        .timeline-time{
            font-size: 10px;
            margin-left: 30px;
        }
    }
    @media (min-width: 510px) and (max-width: 565px) {
        .timeline-time{
            font-size: 10px;!important;
            margin-left: 50px;
        }
    }

    @media (max-width: 510px){
        .timeline-time{
            font-size: 0.9em;
            margin-left: 70px;

        }
    }

    @media (max-width: 565px){
        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon{
            width: 30px;
            height: 30px;
            line-height: 30px;
            font-size: 1em;
        }

        .timeline-centered:before {
            margin-left: 20px;
        }
        .timeline-icon.bg-default, .timeline-icon.bg-primary{
            margin-left:29px;
        }
    }


</style>

<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 14.09.14
 * Time: 23:58
 * To change this template use File | Settings | File Templates.
 */





foreach($news_line as $news_k=>$news_v) {



    $date = date("j F, Y",strtotime($news_v['created']));
    $date = $this->checkMonth($date);


    $dd = str_replace(',',' ',$date);
    $date_f = explode(' ',$dd);

    if($controller == 'autorized'){

       ?>
        <article class="timeline-entry">
            <div class="timeline-entry-inner">
                <time class="timeline-time" ><span><?=$date_f[0].' '.$date_f[1]?></span> <span>2014</span></time>

                <div class="timeline-icon bg-primary">
                    <i class="fa fa-pencil"></i>
                </div>

                <div class="timeline-label">
                    <h2><?=$news_v['title']?></h2>
                    <p><?=$news_v['content']?></p>
                </div>
            </div>
        </article>

<?
    }

    if($controller == 'showCase'){
        ?>
        <div class="post format-standard">
            <div class="date-wrapper"> <a href="blog-post.html" class="date"><span class="day"><?=$date_f[0]?></span> <span class="month"><?=$date_f[1]?></span> </a> </div>
            <div class="format-wrapper"> <i class="icon-pencil"></i> </div>

            <div class="post-content">
                <h2 class="post-title"><a href="blog-post.html"><?=$news_v['title']?></a></h2>
                <div class="meta"> <span class="category"><a href="#">MedWAYS</a>, <a href="#">Daily</a></span> <span class="comments"><a href="#"><?=$date?></a></span> <span class="like"><a href="#"><?=rand(1,100)?> <i class="icon-eye"></i></a></span> </div>
                <!-- /.meta -->
                <p><?=$news_v['content']?></p>
            </div>
        </div>



        <?
    }

}
?>
