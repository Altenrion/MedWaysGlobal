<?php
/* @var $this ShowCaseController */

$this->breadcrumbs=array(
	'Show Case',
);
?>


<div class="fullwidthbanner-container revolution">
    <div class="fullwidthbanner">
        <ul>
            <li data-transition="fade"> <img src="<?=Yii::app()->baseUrl; ?>/images/art/docs_.png" alt="" />
                <div class="caption sft bold opacity-bg" data-x="550" data-y="215" data-speed="500" data-start="2000" data-easing="Sine.easeOut">Эстафета вузовской науки </div>
                <div class="caption sfr bold opacity-bg" data-x="550" data-y="280" data-speed="500" data-start="2500" data-easing="Sine.easeOut">Используй свой шанс!</div>
                <div class="caption sfb" data-x="550" data-y="340" data-speed="500" data-start="3000" data-easing="Sine.easeOut"><a href="<?=Yii::app()->createUrl('ShowCase/login')?>" class="btn btn-large">Регистрация</a></div>
            </li>
            <li data-transition="fade"> <img src="<?=Yii::app()->baseUrl; ?>/images/art/map4.png" alt="" />
                <div class="caption sft" data-x="50" data-y="90" data-speed="900" data-start="500" data-easing="Sine.easeOut"><img src="<?=Yii::app()->baseUrl; ?>/images/art/slider-back.png" alt="" /></div>
                <div class="caption fade" data-x="35" data-y="440" data-speed="500" data-start="300" data-easing="Sine.easeOut"><img src="<?=Yii::app()->baseUrl; ?>/images/art/slider-shadow.png" alt="" /></div>
                <div class="caption sft" data-x="35" data-y="97" data-speed="900" data-start="800" data-easing="Sine.easeOut"><img src="<?=Yii::app()->baseUrl; ?>/images/art/slider-middle.png" alt="" /></div>
                <div class="caption sft" data-x="60" data-y="105" data-speed="900" data-start="1300" data-easing="Sine.easeOut"><img src="<?=Yii::app()->baseUrl; ?>/images/art/slider-first.png" alt="" /></div>
                <div class="caption sfr bold opacity-bg" data-x="620" data-y="270" data-speed="500" data-start="2500" data-easing="Sine.easeOut">В эстафете уже <?=(isset($clean_num))?($clean_num):('500') ?> ! </div>
                <div class="caption sfb" data-x="620" data-y="335" data-speed="500" data-start="3000" data-easing="Sine.easeOut"><a href="<?=Yii::app()->createUrl('ShowCase/statistics')?>" class="btn btn-large">Статистика</a></div>
            </li>
<!--            <li data-transition="fade"> <img src="--><?//=Yii::app()->baseUrl; ?><!--/images/art/slider-bg3.jpg" alt="" />-->
<!--                <div class="caption sfl" data-x="450" data-y="115" data-speed="900" data-start="500" data-easing="Sine.easeOut"><img src="--><?//=Yii::app()->baseUrl; ?><!--/images/art/slider-browser.png" alt="" /></div>-->
<!--                <div class="caption sfl" data-x="800" data-y="180" data-speed="900" data-start="900" data-easing="Sine.easeOut"><img src="--><?//=Yii::app()->baseUrl; ?><!--/images/art/slider-tablet.png" alt="" /></div>-->
<!--                <div class="caption sfl" data-x="980" data-y="290" data-speed="900" data-start="1600" data-easing="Sine.easeOut"><img src="--><?//=Yii::app()->baseUrl; ?><!--/images/art/slider-mobile.png" alt="" /></div>-->
<!--                <div class="caption sfl bold opacity-bg" data-x="35" data-y="180" data-speed="500" data-start="1500" data-easing="Sine.easeOut">100% Responsive</div>-->
<!--                <div class="caption sfr bold opacity-bg" data-x="35" data-y="245" data-speed="500" data-start="2000" data-easing="Sine.easeOut">Retina-ready design</div>-->
<!--                <div class="caption sfb" data-x="35" data-y="310" data-speed="500" data-start="2500" data-easing="Sine.easeOut"><a href="#" class="btn btn-green btn-large">Get in Touch</a></div>-->
<!--            </li>-->
            <li data-transition="fade"> <img src="<?=Yii::app()->baseUrl; ?>/images/art/doc__.png" alt="" />
                <div class="caption sft bold opacity-bg" data-x="center" data-y="205" data-speed="500" data-start="500" data-easing="Sine.easeOut">Медицинский форум </div>
                <div class="caption sfb lite opacity-bg" data-x="center" data-y="271" data-speed="500" data-start="1000" data-easing="Sine.easeOut"><strong>MedWAYS</strong> - перспективные научные направления 2014</div>
                <div class="caption sfb" data-x="center" data-y="339" data-speed="500" data-start="1500" data-easing="Sine.easeOut"><img src="<?=Yii::app()->baseUrl; ?>/images/buttons/mw.png" alt="" /></div>
            </li>
        </ul>
        <div class="tp-bannertimer tp-bottom"></div>
    </div>
    <!-- /.fullwidthbanner -->
</div>



<div class="light-wrapper">
    <div class="container inner">

<!--<h1>--><?php //echo $this->id . '/' . $this->action->id; ?><!--</h1>-->




        <div class="row bm20">
            <div class="col-sm-6">
                <div class="section-title">О мероприятии</div>
                <p class="just">Общероссийское научно-практическое мероприятие <a>«Эстафета вузовской науки»</a> (далее Эстафета) – это многоэтапный проект, направленный на содействие в реализации Стратегии развития медицинской науки в Российской Федерации на период до 2025 года и программы по созданию карты российской науки в медицинской области.</p>
                <p class="just"> <a> Участники Эстафеты</a> -  научные и научно-педагогические коллективы, научные-исследовательские организации, аффилированные с ведомственными медицинскими образовательными учреждениями.</p>
                <p class="just"> Основные задачи настоящего Проекта: </p>
                <blockquote>
                <ul class="circled">

                   <li>Способствовать выявлению ведущих научных коллективов</li>
                   <li>Способствовать определению центров лидерства и точек роста</li>
                   <li>Способствовать развитию профильных научных платформ</li>
                   <li>Способствовать кооперации вузов с передовыми компаниями</li>
                   <li>Способствовать расширению международной интеграции</li>
                   <li>Способствовать совершенствованию академической мобильности</li>
                   <li>Способствовать созданию и внедрению передовых механизмов мотивации ученых</li>
                   <li>Способствовать популяризации исследовательской и инновационной деятельности</li>
                </ul>
                </blockquote>

            </div>
            <div class="col-sm-6">
                <div class="section-title">Этапы <span>Эстафета проходит в три этапа</span></div>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a data-toggle="collapse" class="panel-toggle active" data-parent="#accordion" href="#collapseOne">1. Открытие Эстафеты  </a> </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse in" style="height: auto;">
                            <div class="panel-body">Старт Эстафеты предусматривает освещение результатов мероприятия предыдущего года и уточнение задач на текущий период. К участию приглашаются все медицинские высшие учебные заведения страны и аффилированные с ними научно-исследовательские коллективы.</div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a data-toggle="collapse" class="panel-toggle collapsed" data-parent="#accordion" href="#collapseTwo">2. Конкурсный отбор проектов (ФО) </a> </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body ">
                                <p class="just">В каждом федеральном округе определяется медицинский университет, в компетенции которого формирование экспертного совета и проведение конкурсного отбора научно-инновационных проектов по тематикам научных платформ.</p>

                                <ul class="circled">
                                    <li><a class="date">01.09.2014 – 15.10.2014</a>
                                        <blockquote>


                                            <li>Формирование региональных экспертных советов</li>
                                            <li>Электронная регистрация проектов</li>


                                        </blockquote>

                                    </li>
                                    <li><a class="date">15.10.2014 – 01.11.2014</a>
                                        <blockquote>
                                            <li>Экспертиза проектов регионального этапа</li>
                                        </blockquote>
                                    </li>
                                </ul>

                                <p class="just">Лучшие работы регионального этапа пройдут экспертизу финального этапа. Вуз,
                                    максимальное количество проектов которого победило в региональном этапе, становится
                                    площадкой второго этапа Эстафеты следующего года.</p>



                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a data-toggle="collapse" class="panel-toggle collapsed" data-parent="#accordion" href="#collapseThree">3. финальный конкурсный отбор </a> </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <p class="just">Настоящий этап предусматривает общую экспертизу и отбор проектов для очной презентации. К участию в Финале приглашены руководители и представители рабочих групп научных платформ, представители профильных министерств, представители государственных фондов и коммерческих организаций, представители промышленного сектора и бизнеса.</p>

                                <ul class="circled">
                                    <li><a class="date">01.11.2014 – 15.11.2014</a>
                                        <blockquote>
                                            <li>Экспертиза проектов финального этапа</li>
                                    </li>


                                        </blockquote>

                                    </li>
                                    <li><a class="date">16.11.2014 – 23.11.20144</a>
                                        <blockquote>
                                            <li>Информирование победителей, приглашение к очной презентации проектов.</li>
                                        </blockquote>
                                    </li>
                                </ul>

                                <p class="just">Вуз, максимальное количество проектов которого победило в финале, становится стартовой площадкой Эстафеты следующего года. </p>



                            </div>
                        </div>

                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"> <a data-toggle="collapse" class="panel-toggle collapsed" data-parent="#accordion" href="#collapseFour"> Награждение финалистов  </a> </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" style="height: 0px;">
                            <div class="panel-body">
                                <p class="just">Очная презентация и церемония награждения лучших проектов состоится в рамках Медицинского Форума «MedWAYS – ПЕРСПЕКТИВНЫЕ НАУЧНЫЕ НАПРАВЛЕНИЯ – 2014» <a class="date">4-5 декабря 2014 года </a>в ГБОУ ВПО Первый МГМУ им. И.М. Сеченова Минздрава России.</p>
                            </div>
                        </div>

                    </div>



                </div>
            </div>
        </div>

        <div class="row alert alert-danger bm10"> <strong> Электронный ресурс регистрации проектов будет доступен с 1 сентября 2014 года.</strong></div>


        </div>
        <div id="second" class="parallax">
            <div class="container inner text-center">

                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="lead tp3 bm0 text-center">Мы верим в ваши силы! Примите участие в эстафете прямо сейчас. </p>
                            </div>
                            <div class="col-sm-12"><a href="<?=Yii::app()->createUrl('ShowCase/login')?>" class="btn bm0">Регистрация</a></div>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-12">
                                <p class="lead tp3 bm0 text-center">Следите в реальном времени за шансом на победу ! </p>
                            </div>
                            <div class="col-sm-12"><a href="<?=Yii::app()->createUrl('ShowCase/statistics')?>" class="btn bm0">Статистика</a></div>
                        </div>
                    </div>
                </div>
                </div>
            </div>



    <div class="light-wrapper">
        <div class="container inner">

            <div class="clearfix"></div>
            <div class="section-title text-center">Последние новости</div>

            <div class="row classic-blog">
                <div class="col-sm-9 col-sm-offset-1 content">
                    <div class="posts">

                        <!-- /.post .format-gallery -->

                        <div class="post format-standard">
                            <div class="date-wrapper"> <a href="blog-post.html" class="date"><span class="day">23</span> <span class="month">Авг</span> </a> </div>
                            <!-- /.date-wrapper -->
                            <div class="format-wrapper"> <i class="icon-pencil"></i> </div>
                            <!-- /.format -->

                            <div class="post-content">
                                <h2 class="post-title"><a href="blog-post.html">В скором времени будет дан старт эстафеты</a></h2>
                                <div class="meta"> <span class="category"><a href="#">MedWAYS</a>, <a href="#">Daily</a></span> <span class="comments"><a href="#">23 Авг, 2014</a></span> <span class="like"><a href="#">25 <i class="icon-eye"></i></a></span> </div>
                                <!-- /.meta -->
                                <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
                            </div>
                            <!-- /.post-content -->
                        </div>
                        <!-- /.post .format-standard -->
                        <div class="post format-quote">
                            <div class="date-wrapper"> <a href="blog-post.html" class="date"><span class="day">18</span> <span class="month">Авг</span></a> </div>
                            <!-- /.date-wrapper -->
                            <div class="format-wrapper"> <i class="icon-quote"></i> </div>
                            <!-- /.format -->

                            <div class="post-content">
                                <blockquote>
                                    <p>Maecenas sed diam eget risus varius blandit sit amet non magna. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Donec ullamcorper nulla non metus auctor fringilla. Cum sociis natoque penatibus et magnis dis parturient montes. <small>Very important person</small></p>
                                </blockquote>
                            </div>
                            <!-- /.post-content -->
                        </div>




                        <div class="post format-link">
                            <div class="date-wrapper"> <a href="blog-post.html" class="date"><span class="day">14</span> <span class="month">Авг</span> </a> </div>
                            <!-- /.date-wrapper -->
                            <div class="format-wrapper"> <i class="icon-link"></i> </div>
                            <!-- /.format -->

                            <div class="post-content">
                                <h2 class="post-title"><a href="http://google.com/">Nullam quis risus eget urna mollis</a></h2>
                                <div class="meta"> <span class="category"><a href="#">MedWAYS</a>, <a href="#">Daily</a></span> <span class="comments"><a href="#">14 Авг, 2014</a></span> <span class="like"><a href="#">25 <i class="icon-eye"></i></a></span> </div>
                                <!-- /.meta -->
                                <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec sed odio dui. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
                            </div>
                            <!-- /.post-content -->
                        </div>
                        <!-- /.post .format-link -->

                    </div>
                    <!-- /.posts -->


                    <!-- /.pagination -->
                </div>
                <!-- /.col-sm-8 .content -->

                <!-- /.col-sm-4 .sidebar -->
            </div>
            <!-- /.row .classic-blog -->
        </div>
        <!-- /.container -->
    </div>