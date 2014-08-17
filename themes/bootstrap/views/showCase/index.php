<?php
/* @var $this ShowCaseController */

$this->breadcrumbs=array(
	'Show Case',
);
?>


<div class="fullwidthbanner-container revolution">
    <div class="fullwidthbanner">
        <ul>
            <li data-transition="fade"> <img src="<?=Yii::app()->baseUrl; ?>/images/art/docs.png" alt="" />
                <div class="caption sft bold opacity-bg" data-x="550" data-y="215" data-speed="500" data-start="2000" data-easing="Sine.easeOut">Эстафета вузовской науки </div>
                <div class="caption sfr bold opacity-bg" data-x="550" data-y="280" data-speed="500" data-start="2500" data-easing="Sine.easeOut">Используй свой шанс!</div>
                <div class="caption sfb" data-x="550" data-y="340" data-speed="500" data-start="3000" data-easing="Sine.easeOut"><a href="<?=Yii::app()->createUrl('ShowCase/login')?>" class="btn btn-large">Регистрация</a></div>
            </li>
            <li data-transition="fade"> <img src="<?=Yii::app()->baseUrl; ?>/images/art/map4.png" alt="" />
                <div class="caption sft" data-x="50" data-y="90" data-speed="900" data-start="500" data-easing="Sine.easeOut"><img src="<?=Yii::app()->baseUrl; ?>/images/art/slider-back.png" alt="" /></div>
                <div class="caption fade" data-x="35" data-y="440" data-speed="500" data-start="300" data-easing="Sine.easeOut"><img src="<?=Yii::app()->baseUrl; ?>/images/art/slider-shadow.png" alt="" /></div>
                <div class="caption sft" data-x="35" data-y="97" data-speed="900" data-start="800" data-easing="Sine.easeOut"><img src="<?=Yii::app()->baseUrl; ?>/images/art/slider-middle.png" alt="" /></div>
                <div class="caption sft" data-x="60" data-y="105" data-speed="900" data-start="1300" data-easing="Sine.easeOut"><img src="<?=Yii::app()->baseUrl; ?>/images/art/slider-first.png" alt="" /></div>
                <div class="caption sfr bold opacity-bg" data-x="620" data-y="270" data-speed="500" data-start="2500" data-easing="Sine.easeOut">В эстафете уже 99999 проектов! </div>
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
            <li data-transition="fade"> <img src="<?=Yii::app()->baseUrl; ?>/images/art/slider-image22.jpg" alt="" />
                <div class="caption sft bold opacity-bg" data-x="center" data-y="215" data-speed="500" data-start="500" data-easing="Sine.easeOut">Медицинский форум </div>
                <div class="caption sfb lite opacity-bg" data-x="center" data-y="281" data-speed="500" data-start="1000" data-easing="Sine.easeOut"><strong>MedWAYS</strong> - перспективные научные направления 2014</div>
<!--                <div class="caption sfb" data-x="center" data-y="339" data-speed="500" data-start="1500" data-easing="Sine.easeOut"><a href="#" class="btn btn-large">Purchase Now</a></div>-->
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

