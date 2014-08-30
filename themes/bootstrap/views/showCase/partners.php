<?php
/* @var $this ShowCaseController */


?>

<div class="head-image option-4" style="background-image: url(<?=Yii::app()->baseUrl?>/images/art/ptbg4.jpg);">
    <div class="overlay dark">
        <div class="container">
            <h1 class="page-title">Партнеры </h1>
        </div>
    </div>
</div>

<div class="dark-wrapper" >
    <div class="container inner">
        <div class="row">
            <div class="col-sm-7">
                <h3 class="section-title">Партнеры</h3>
                <div class="sidebox widget">

                    <ul class="post-list">
                        <li>
                            <div class="icon-overlay icn-link"> <a href="###"><span class="icn-more"></span><img src="<?=Yii::app()->baseUrl?>/images/art/part_sk.jpg" alt=""> </a> </div>
                            <div class="meta">
                                <h6><a href="#@#"> Фонд развития Центра разработки и коммерциализации новых технологий</br>
                                        Фонд «Сколково»
                                    </a></h6>
                                <em><a href="http://sk.ru" target="_blank">sk.ru</a></em> </div>
                        </li>

                    </ul>
                    <!-- /.post-list -->
                </div>
            </div>


            <div class="col-sm-5">
                <h3 class="section-title bm30">Заявка на партнерство</h3>
                    <div class="divide20"></div>
                    <div class="form-container">
                        <form class="forms" action="<?=Yii::app()->createUrl('ShowCase/regPartners')?>" name="partners_request" method="post">
                            <fieldset>
                                <ol>
                                    <li class="form-row text-input-row name-field">
                                        <input type="text" name="name" class="text-input defaultText required defaultTextActive" title="Имя (Обязательно)">
                                    </li>
                                    <li class="form-row text-input-row email-field">
                                        <input type="text" name="email" class="text-input defaultText required email defaultTextActive" title="Email (Обязательно)">
                                    </li>
                                    <li class="form-row text-input-row subject-field">
                                        <input type="text" name="org_name" class="text-input defaultText defaultTextActive" title="Название организации">
                                    </li>
                                    <li class="form-row text-area-row">
                                        <textarea name="message" class="text-area required"></textarea>
                                    </li>
                                    <li class="nocomment" style="display: none;">
                                        <input id="nocomment" value="" name="partners_request">
                                    </li>
                                    <li class="button-row">
                                        <input type="submit" value="Submit" name="submit" class="btn btn-submit bm0">
                                        <span class="response alert alert-success"></span>

                                    </li>
                                </ol>
                                <input type="hidden" name="v_error" id="v-error" value="Required">
                                <input type="hidden" name="v_email" id="v-email" value="Enter a valid email">
                            </fieldset>
                        </form>
                    </div>
                    <!-- /.form-container -->

                <div class="sidebox widget">
                    <h3>проведения мероприятия и техническая поддержка</h3>
                    <p>ГБОУ ВПО Первый Московский государственный медицинский университет имени И.М. Сеченова Минздрава России
                    </p>
                    <address>
                        <strong>Университетский технопарк</strong><br>
                        Москва, Трубецкая ул., д.8, стр.2<br>
                        <abbr >Кузнецова Юлия Евгеньевна : <ssmu class="ru"></ssmu></abbr> <a href="mailto:#">kuznetsova.yulia@bk.ru</a><br>
                        <abbr >Барышев Никита Владимирович : <ssmu class="ru"></ssmu></abbr> <a href="mailto:#">administration@altenrion.ru</a>
                    </address>
                </div>


            </div>

        </div>
        <hr>
        <div id="testimonials" class="tab-container">
            <div class="panel-container">
                <div id="tst1"> Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Praesent commodo cursus magna. <span class="author">Nikolas Brooten</span> </div>
                <div id="tst2"> Cras justo odio, dapibus ac facilisis in, egestas eget quam. Maecenas faucibus mollis interdum. Etiam porta sem malesuada magna mollis euismod. <span class="author">Coriss Ambady</span> </div>
                <div id="tst3"> Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Donec sed odio dui. Aenean lacinia bibendum nulla sed consectetur. <span class="author">Barclay Widerski</span> </div>
                <div id="tst4"> Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor gravida at eget metus. <span class="author">Elsie Spear</span> </div>
            </div>
            <ul class="etabs">
                <li class="tab"><a href="#tst1">1</a></li>
                <li class="tab"><a href="#tst2">2</a></li>
                <li class="tab"><a href="#tst3">3</a></li>
                <li class="tab"><a href="#tst4">4</a></li>
            </ul>
        </div>

    </div>
</div>

