<?/* @var $this AutorizedController */

$assetsUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('cabinet.assets'));

/* @ BEGIN CSS FRAMEWORK */
Yii::app()->clientScript->registerCssFile($assetsUrl.'/plugins/bootstrap/css/bootstrap.min.css');
Yii::app()->clientScript->registerCssFile($assetsUrl.'/plugins/font-awesome/css/font-awesome.min.css');

/* @ BEGIN CSS PLUGIN */
Yii::app()->clientScript->registerCssFile($assetsUrl.'/plugins/pace/pace-theme-minimal.css');
Yii::app()->clientScript->registerCssFile($assetsUrl.'/plugins/jquery-magnific-popup/magnific-popup.css');
Yii::app()->clientScript->registerCssFile($assetsUrl.'/plugins/switchery/switchery.min.css');
Yii::app()->clientScript->registerCssFile($assetsUrl.'/plugins/jquery-niftymodal/css/component.css');
Yii::app()->clientScript->registerCssFile($assetsUrl.'/plugins/jquery-gritter/css/jquery.gritter.css');

/* @ BEGIN CSS TEMPLATE */
Yii::app()->clientScript->registerCssFile($assetsUrl.'/css/main.css');
Yii::app()->clientScript->registerCssFile($assetsUrl.'/css/skins.css');


///* @ BEGIN JS FRAMEWORK */
//Yii::app()->clientScript->registerScriptFile( $assetsUrl.'/plugins/jquery-2.1.0.min.js', CClientScript::POS_END);
//Yii::app()->clientScript->registerScriptFile( $assetsUrl.'/plugins/bootstrap/js/bootstrap.min.js', CClientScript::POS_END);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MedWAYS - кабинет</title>

    <link rel="icon" href="<?=$assetsUrl?>/img/favicon.ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

 </head>

<body class="skin-dark">
<!-- BEGIN HEADER -->
<header class="header">
<!-- BEGIN LOGO -->
<a href="<?=Yii::app()->createUrl('Autorized/profile')?>" class="logo">
    <img src="<?=$assetsUrl?>/img/logo.png" alt="Kertas" height="20">
</a>
<!-- END LOGO -->
<!-- BEGIN NAVBAR -->
<nav class="navbar navbar-static-top" role="navigation">
    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="fa fa-bars fa-lg"></span>
    </a>

    <!-- BEGIN NEWS TICKER -->
    <div class="ticker">
        <strong>Важно:</strong>
        <ul>
            <li>Очень важная новость для всех всех всех ! </li>
            <li>Очень важная новость 2 для всех всех всех ! Очень важная новость 2 для всех всех всех ! .</li>
            <li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </li>
            <li>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
        </ul>
    </div>
    <!-- END NEWS TICKER -->

    <div class="navbar-right">
        <ul class="nav navbar-nav">

            <li class="dropdown profile-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-cog fa-lg"></i>
                    <span class="username">Управление</span>
                    <i class="caret"></i>
                </a>
                <ul class="dropdown-menu box profile">
                    <li><div class="up-arrow"></div></li>
                    <li class="border-top">
                        <a href="<?=Yii::app()->createUrl('Autorized/profile')?>"><i class="fa fa-user"></i>Профиль</a>
                    </li>
                    <li>
                        <a href="<?=Yii::app()->createUrl('ShowCase/index')?>"><i class="fa fa-eye"></i>На сайт</a>
                    </li>

<!--                    <li>-->
<!--                        <a target="_blank"  href="--><?//=Yii::app()->createUrl('Autorized/lockScreen')?><!--"><i class="fa fa-lock"></i>Заблокировать</a>-->
<!--                    </li>-->
                    <li>
                        <a href="<?=Yii::app()->createUrl('Autorized/logout')?>"><i class="fa fa-power-off"></i>Выйти</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!-- END NAVBAR -->
</header>
<!-- END HEADER -->

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- BEGIN SIDEBAR -->
    <aside class="left-side sidebar-offcanvas">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?=Yii::app()->baseUrl ?>/images/avatars/<?=$this->getAvatar();?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?=Yii::app()->user->name?></p>
                    <a href="#"><i class="fa fa-circle text-green"></i> Online</a>
                </div>
            </div>
           </br>
            <ul class="sidebar-menu">
                <li>
                    <a href="<?=Yii::app()->createUrl('Autorized/dashboard')?>">
                        <i class="fa fa-dashboard "></i><span>Панель управления</span>
                    </a>
                </li>
                <li>
                    <a href="<?=Yii::app()->createUrl('Autorized/profile')?>">
                        <i class="fa fa-user"></i><span>Профиль</span>
                    </a>
                </li>
                <li>
                    <a href="<?=Yii::app()->createUrl('Autorized/experts')?>">
                        <i class="fa fa-group"></i><span>Эксперты</span>
                    </a>
                </li>
                <li>
                    <a href="<?=Yii::app()->createUrl('Autorized/project')?>">
                        <i class="fa fa-graduation-cap"></i><span>Проект</span>
                    </a>
                </li>
                <li>
                    <a href="<?=Yii::app()->createUrl('Autorized/projects')?>">
                        <i class="fa fa-graduation-cap"></i><span>Проекты</span>
                    </a>
                </li>
                <li>
                    <a href="<?=Yii::app()->createUrl('Autorized/statistics')?>">
                        <i class="fa fa-bar-chart-o"></i><span>Статистика</span>
                    </a>
                </li>
                <li>
                    <a href="<?=Yii::app()->createUrl('Autorized/info')?>">
                        <i class="fa fa-info"></i><span>Информация</span>
                    </a>
                </li>
                <li>
                    <a href="<?=Yii::app()->createUrl('Autorized/news')?>">
                        <i class="fa fa-calendar"></i><span>Новости</span>
                    </a>
                </li>


<!--                <li class="menu">-->
<!--                    <a href="#">-->
<!--                        <i class="fa fa-laptop"></i><span>UI Elements</span>-->
<!--                        <i class="fa fa-angle-left pull-right"></i>-->
<!--                    </a>-->
<!--                    <ul class="sub-menu">-->
<!--                        <li><a href="ui-general.html">General</a></li>-->
<!--                        <li><a href="ui-buttons.html">Buttons</a></li>-->
<!--                        <li><a href="ui-grid.html">Grid</a></li>-->
<!--                        <li><a href="ui-group-list.html">Group List</a></li>-->
<!--                        <li><a href="ui-icons.html">Icons</a></li>-->
<!--                        <li><a href="ui-messages.html">Messages & Notifications</a></li>-->
<!--                        <li><a href="ui-modals.html">Modals</a></li>-->
<!--                        <li><a href="ui-tabs.html">Tabs & Accordions</a></li>-->
<!--                        <li><a href="ui-typography.html">Typography</a></li>-->
<!--                    </ul>-->
<!--                </li>-->

            </ul>
        </section>
    </aside>
    <!-- END SIDEBAR -->

    <!-- BEGIN CONTENT -->
    <aside class="right-side">
                    <?php echo $content; ?>
    </aside>
    <!-- END CONTENT -->

    <!-- BEGIN MODAL OVERLAY -->
    <div class="md-overlay"></div>
    <!-- END MODAL OVERLAY -->

    <!-- BEGIN SCROLL TO TOP -->
    <div class="scroll-to-top"></div>
    <!-- END SCROLL TO TOP -->
</div>

<!-- BEGIN JS FRAMEWORK -->
<script src="<?=$assetsUrl ?>/plugins/jquery-2.1.0.min.js"></script>
<script src="<?=$assetsUrl ?>/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- END JS FRAMEWORK -->

<!-- BEGIN JS PLUGIN -->
<script src="<?=$assetsUrl ?>/plugins/pace/pace.min.js"></script>
<script src="<?=$assetsUrl ?>/plugins/jquery-totemticker/jquery.totemticker.min.js"></script>
<script src="<?=$assetsUrl ?>/plugins/jquery-resize/jquery.ba-resize.min.js"></script>
<script src="<?=$assetsUrl ?>/plugins/jquery-blockui/jquery.blockUI.min.js"></script>
<script src="<?=$assetsUrl ?>/plugins/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?=$assetsUrl ?>/plugins/switchery/switchery.min.js"></script>
<script src="<?=$assetsUrl ?>/plugins/jquery-niftymodal/js/classie.js"></script>
<script src="<?=$assetsUrl ?>/plugins/jquery-niftymodal/js/modalEffects.js"></script>
<script src="<?=$assetsUrl ?>/plugins/jquery-gritter/js/jquery.gritter.min.js"></script>
<script src="<?=$assetsUrl ?>/js/notification.js"></script>
<!-- END JS PLUGIN -->

<!-- BEGIN JS TEMPLATE -->
<script src="<?=$assetsUrl ?>/js/main.js"></script>
<script src="<?=$assetsUrl ?>/js/skin-selector.js"></script>

<!-- END JS TEMPLATE -->
</body>
</html>