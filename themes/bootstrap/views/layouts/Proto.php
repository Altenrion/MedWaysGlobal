<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 23.07.14
 * Time: 17:16
 * To change this template use File | Settings | File Templates.
 */
?>
<?php /* @var $this ShowCaseController */ ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Эстафета вузовской науки 2017, Медицина, Молодые ученые, Инновации">
        <meta name="author" content="Altenrion">
        <meta http-equiv="X-UA-Compatible" content="IE=9">

        <link rel="shortcut icon" href="<?=Yii::app()->baseUrl.'/images/favicon1.ico' ?> ">
        <title>Эстафета</title>

        <!-- Bootstrap core CSS -->
        <link href="<?=Yii::app()->baseUrl?>/css/bootstrap.css" rel="stylesheet">
        <link href="<?=Yii::app()->baseUrl?>/css/settings.css" rel="stylesheet">
        <link href="<?=Yii::app()->baseUrl?>/css/owl.carousel.css" rel="stylesheet">
        <link href="<?=Yii::app()->baseUrl?>/js/adaptive/google-code-prettify/prettify.css" rel="stylesheet">
        <link href="<?=Yii::app()->baseUrl?>/js/adaptive/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css" media="all" />
        <link href="<?=Yii::app()->baseUrl?>/js/adaptive/fancybox/helpers/jquery.fancybox-thumbs0ff5.css?v=1.0.2" rel="stylesheet" type="text/css" />
        <link href="<?=Yii::app()->baseUrl?>/css/style_adoptive.css" rel="stylesheet">
        <link href="<?=Yii::app()->baseUrl?>/css/color/red.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700italic,700,900,900italic,300italic,300,100italic,100' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,700,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
        <link href="<?=Yii::app()->baseUrl?>/type/fontello.css" rel="stylesheet">



        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="<?=Yii::app()->baseUrl?>/js/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
    <div class="yamm navbar basic default">
        <div class="navbar-header">
            <div class="container">
                <div class="basic-wrapper">
                    <a class="btn responsive-menu pull-right" data-toggle="collapse" data-target=".navbar-collapse"><i class='icon-menu-1'></i></a> <a class="navbar-brand" href="<?=Yii::app()->createUrl('ShowCase/index')?>"><img src="<?=Yii::app()->baseUrl?>/images/logo_med.png" alt="" /></a>
                </div>
                <div class="collapse navbar-collapse pull-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown"><a href="<?= Yii::app()->createUrl('ShowCase/index')?>" class="dropdown-toggle ">Главная</a>
                        </li>

                        <li class="dropdown"><a href="<?=Yii::app()->createUrl('ShowCase/info')?>" class="dropdown-toggle js-activated">Информация</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= (Yii::app()->controller->action->id == 'info')?('#DOCS'):(Yii::app()->createUrl('ShowCase/info').'#DOCS')     ?>">Локальные документы</a></li>
                                <li><a href="<?= (Yii::app()->controller->action->id == 'info')?('#PLATF'):(Yii::app()->createUrl('ShowCase/info').'#PLATF')     ?>">Научные платформы</a></li>
                                <li><a href="<?= (Yii::app()->controller->action->id == 'info')?('#NPB'):(Yii::app()->createUrl('ShowCase/info').'#NPB')     ?>">Нормативная база</a></li>
<!--                                <li><a href="--><?//=Yii::app()->createUrl('ShowCase/statistics')   ?><!--">Статистика</a></li>-->
                            </ul>
                        </li>
                        <li class="dropdown"><a href="<?=Yii::app()->createUrl('ShowCase/organizers')?>" class="dropdown-toggle">Организаторы</a>

                        </li>
<!--                        <li><a href="--><?//=Yii::app()->createUrl('ShowCase/partners')?><!--">Партнеры</a></li>-->

<!--                        <li><a href="--><?//=Yii::app()->createUrl('ShowCase/feedback')?><!--">Обратная связь </a></li>-->

                        <li class="mobi"><a href="<?=Yii::app()->createUrl('ShowCase/login')?>">Вход </a></li>
                    </ul>

                    <ul class="social pull-right">

                        <? if($this->checkRole(array('Dev','Manager','Exp','Exp1','Exp2','Exp3'))): ?>
                            <li><a href="<?=Yii::app()->createUrl('Autorized/profile')?>"><i class="icon-user"></i></a></li>
                        <? endif; ?>
                        <? if($this->checkRole(array('Dev','Manager','Exp','Exp1','Exp2','Exp3'))):  ?>
                            <li><a href="<?=Yii::app()->createUrl('ShowCase/logout')?>"><i class="icon-logout"></i></a></li>
                        <? endif; ?>
                        <? if(Yii::app()->user->isGuest): ?>
                            <li><a href="<?=Yii::app()->createUrl('ShowCase/login')?>"><i class="icon-login"></i></a></li>
                        <? endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <!--/.nav-collapse -->
    </div>
    <!--/.navbar -->



    <div class="offset"></div>

            <?php echo $content; ?>


    <footer class="black-wrapper">
        <div class="container inner">
            <div class="row">
                <section class="col-sm-3 widget">
                    <h3 class="section-title widget-title">Базовые вузы</h3>
                    <ul class="post-list" >
                        <li>ЦФО – <a href="#" style="font-size: 9pt;">Воронежский государственный медицинский университет им. Н.Н. Бурденко</a></li>
                        <li>ЮФО – <a href="#" style="font-size: 9pt;">Кубанский государственный медицинский университет</a></li>
                        <li>СЗФО – <a href="#" style="font-size: 9pt;">Северо-Западный государственный медицинский университет имени И.И. Мечникова</a></li>
                        <li>СФО – <a href="#" style="font-size: 9pt;">Красноярский государственный Медицинский университет имени профессора В.Ф. Войно-Ясенецкого</a></li>
                        <li>ДФО – <a href="#" style="font-size: 9pt;">Тихоокеанский государственный медицинский университет</a></li>
                        <li>УФО – <a href="#" style="font-size: 9pt;">Уральский государственный медицинский университет</a></li>
                        <li>ПФО – <a href="#" style="font-size: 9pt;">Саратовский государственный медицинский университет имени В. И. Разумовского</a></li>
                        <li>СКФО – <a href="#" style="font-size: 9pt;">Ставропольский государственный медицинский университет</a></li>
                    </ul>
                    <!-- /.post-list -->
                </section>
                <!-- /.widget -->
<!--                <section class="col-sm-3 widget">-->
<!--                    <h3 class="section-title widget-title">О мероприятии</h3>-->
<!--                    <p>ЭСТАФЕТА ВУЗОВСКОЙ НАУКИ – проект федерального масштаба, основной целью которого является поддержка ведущих научных коллективов, осуществляющих исследовательскую деятельность в приоритетных направлениях развития медицинской науки, ориентированных на создание высокотехнологичных инновационных продуктов, обеспечивающих сохранение и укрепление здоровья населения;-->
<!--                        интеграция научно-инновационного опыта,  образовательной деятельности и лечебного процесса.</p>-->
<!--                </section>-->
                <!-- /.widget -->
                <section class="col-sm-3 widget">
                    <h3 class="section-title widget-title">Научные платформы</h3>

                    <div class="tagcloud">
                        <a href="#" style="font-size: 12pt;">Онкология</a>
                        <a href="#" style="font-size: 14pt;">Кардиология и ангиология</a>
                        <a href="#" style="font-size: 11pt;">Эндокринология</a>
                        <a href="#" style="font-size: 11pt;">Неврология</a>
                        <a href="#" style="font-size: 15pt;">Педиатрия</a>
                        <a href="#" style="font-size: 10pt;">Психиатрия и зависимости</a>
                        <a href="#" style="font-size: 9pt;">Иммунология</a>
                            <a href="#" style="font-size: 9pt;">    Микробиология</a>
                        <a href="#" style="font-size: 12pt;">Фармакология</a>
                        <a href="#" style="font-size: 9pt;">Профилактическая среда</a>
                        <a href="#" style="font-size: 15pt;">Репродуктивное здоровье</a>
                        <a href="#" style="font-size: 11pt;">Регенеративная медицина</a>
                        <a href="#" style="font-size: 9pt;">Инвазивные технологии</a>
                        <a href="#" style="font-size: 12pt;">Инновационные фундаментальные технологии в медицине</a>

                    </div>
                </section>
                <!-- /.widget -->
                <section class="col-sm-3 widget">
                    <h3 class="section-title widget-title">Организаторы</h3>
                    <strong>Региональный этап мероприятия:</strong>
                    <p>ФГБОУ ВО «Воронежский государственный медицинский университет им. Н.Н.
                        Бурденко» Министерства здравоохранения Российской Федерации
                    </p>

                    <div class="divide20"></div>

                    <strong>Финальный этап мероприятия:</strong>

                    <p>ФГБОУ ФО Первый МГМУ имени И.М. Сеченова Минздрава России</p>


                </section>
                <section class="col-sm-3 widget">
                    <h3 class="section-title widget-title">Контакты</h3>

                    <strong>Контакты по научно организационным вопросам</strong>
                    <div class="divide30"></div>

                    <strong> Мешалкина Наталия Юрьевна:</strong>
                    <div class="divide5"></div>
                    <i class="icon-mail contact"></i> <a href="#">posrc12@yandex.ru</a></br>
                    <i class="icon-phone contact"></i> <a href="#">+7(495) 622-95- 00</a></br>
                    <div class="divide30"></div>

                    <strong> Тимошенко Камилла Талгатовна:</strong>
                    <div class="divide10"></div>
                    <i class="icon-mail contact"></i> <a href="#">kamilla.timoshenko@gmail.com</a></br>
                </section>


                <!-- /.widget -->
            </div>
            <!-- /.row -->
        </div>
        <!-- .container -->


    <div class="sub-footer">
        <div class="container">
                <p class="pull-left">Powered by Altenrion&nbsp;&nbsp; © &nbsp;&nbsp<?=date('Y')?> MedWAYS,  &nbsp;&nbsp;   Все права защищены.</p>
            <ul class="footer-menu pull-right">
                <li><a href="<?= Yii::app()->createUrl('ShowCase/index')?>">Главная</a></li>
                <li><a href="<?= Yii::app()->createUrl('ShowCase/info')?>">Информация</a></li>
                <li><a href="<?= Yii::app()->createUrl('ShowCase/organizers')?>">Организаторы</a></li>
                <li><a href="<?= Yii::app()->createUrl('ShowCase/partners')?>">Партнеры</a></li>
                <li><a href="<?= Yii::app()->createUrl('ShowCase/feedback')?>">Обратная связь</a></li>
            </ul>
        </div>
    </div>
    </footer>
    <!-- /footer -->

    <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter46544628 = new Ya.Metrika({ id:46544628, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/46544628" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?=Yii::app()->baseUrl?>/js/adaptive/jquery.min.js"></script>
    <script src="<?=Yii::app()->baseUrl?>/js/adaptive/bootstrap.min.js"></script>
    <script src="<?=Yii::app()->baseUrl?>/js/adaptive/twitter-bootstrap-hover-dropdown.min.js"></script>
    <script src="<?=Yii::app()->baseUrl?>/js/adaptive/jquery.themepunch.plugins.min.js"></script>
    <script src="<?=Yii::app()->baseUrl?>/js/adaptive/jquery.themepunch.revolution.min.js"></script>
    <script src="<?=Yii::app()->baseUrl?>/js/adaptive/jquery.fancybox.pack.js"></script>
    <script src="<?=Yii::app()->baseUrl?>/js/adaptive/fancybox/helpers/jquery.fancybox-thumbs0ff5.js?v=1.0.2"></script>
    <script src="<?=Yii::app()->baseUrl?>/js/adaptive/fancybox/helpers/jquery.fancybox-mediae209.js?v=1.0.0"></script>
    <script src="<?=Yii::app()->baseUrl?>/js/adaptive/jquery.isotope.min.js"></script>
    <script src="<?=Yii::app()->baseUrl?>/js/adaptive/jquery.easytabs.min.js"></script>
    <script src="<?=Yii::app()->baseUrl?>/js/adaptive/owl.carousel.min.js"></script>
    <script src="<?=Yii::app()->baseUrl?>/js/adaptive/jquery.fitvids.js"></script>
    <script src="<?=Yii::app()->baseUrl?>/js/adaptive/jquery.sticky.js"></script>
    <script src="<?=Yii::app()->baseUrl?>/js/adaptive/google-code-prettify/prettify.js"></script>
    <script src="<?=Yii::app()->baseUrl?>/js/adaptive/jquery.slickforms.js"></script>
    <script src="<?=Yii::app()->baseUrl?>/js/adaptive/scripts.js"></script>
    <script src="<?=Yii::app()->baseUrl?>/js/skel/skel.min.js"></script>
    <script src="<?=Yii::app()->baseUrl?>/js/skel/init.js"></script>
    </body>
</html>