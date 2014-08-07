<?php
/* @var $this SiteController */
/* @var $error array */


?>

<div class="light-wrapper">
    <div class="container inner">
        <div class="row classic-blog">
            <div class="col-sm-4 content ">

                <div class="divide85"></div>

                <p>

                <h4 class="bm20">Здравствуйте! Это страница ошибки <?php echo $code; ?></h4>
                    Вы опали сюда потому что: </br>
                <ul class="circled">
                    <li>Страницы с таким адресом нет</li>
                    <li>Вы ошиблись при вводе адреса</li>
                    <li>Вмешались высшие силы </li>
                </ul>
                </p>

                <div class="error">
                <?php // echo CHtml::encode($message); ?>
                </div>

            </div>
            <div class="col-sm-4 content ">
                <figure class="media-wrapper bm0"><img src="<?=Yii::app()->baseUrl?>/images/badge/deckfailcat.png" alt=""></figure>
            </div>
            <div class="col-sm-4 content">
                <div class="divide85"></div>

                <p>

                Но не волнуйтесь, </br>
                К тому времени как вы дочитаете </br>
                этот текст, скрипт вернет Вас</br>
                на главную страницу
                </p>

            </div>
        </div>
    </div>
</div>

<? header('Refresh:10;url='. $this->createUrl('ShowCase/index')); ?>