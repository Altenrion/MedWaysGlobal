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
        <meta name="description" content="">
        <meta name="author" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=9">

        <link rel="shortcut icon" href="<?=Yii::app()->baseUrl.'/images/favicon.png' ?> ">
        <title>Moose</title>

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
                    <a class="btn responsive-menu pull-right" data-toggle="collapse" data-target=".navbar-collapse"><i class='icon-menu-1'></i></a> <a class="navbar-brand" href="<?=Yii::app()->createUrl('ShowCase/index')?>"><img src="<?=Yii::app()->baseUrl?>/images/logo2.png" alt="" /></a>
                </div>
                <div class="collapse navbar-collapse pull-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown"><a href="<?= Yii::app()->createUrl('ShowCase/index')?>" class="dropdown-toggle ">Главная</a>
                        </li>

                        <li class="dropdown"><a href="<?=Yii::app()->createUrl('ShowCase/info')?>" class="dropdown-toggle js-activated">Информация</a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= (Yii::app()->controller->action->id == 'info')?('#DOCS'):(Yii::app()->createUrl('ShowCase/info').'#DOCS')     ?>">Локальные документы</a></li>
                                <li><a href="<?= (Yii::app()->controller->action->id == 'info')?('#PLATF'):(Yii::app()->createUrl('ShowCase/info').'#PLATF')     ?>">Платформы</a></li>
                                <li><a href="<?= (Yii::app()->controller->action->id == 'info')?('#NPB'):(Yii::app()->createUrl('ShowCase/info').'#NPB')     ?>">НПБ</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="<?=Yii::app()->createUrl('ShowCase/organizers')?>" class="dropdown-toggle">Организаторы</a>

                        </li>
                        <li><a href="<?=Yii::app()->createUrl('ShowCase/partners')?>">Партнеры</a></li>

                        <li><a href="<?=Yii::app()->createUrl('ShowCase/feedback')?>">Обратная связь </a></li>
                    </ul>

                    <ul class="social pull-right">

                        <? if($this->checkRole(array('Dev','Manager','Exp','Exp1','Exp2','Exp3'))):   ?>
                        <li><a href="###"><i class="icon-shareable"></i></a></li>
                        <? endif; ?>

                        <? if($this->checkRole(array('Dev','Manager','Exp','Exp1','Exp2','Exp3'))): ?>
                            <li><a href="<?=Yii::app()->createUrl('Autorized/index')?>"><i class="icon-user"></i></a></li>
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
                    <h3 class="section-title widget-title">Popular Posts</h3>
                    <ul class="post-list">
                        <li>
                            <h6><a href="blog-post.html">Vivamus sagittis lacus vel augue metus</a></h6>
                            <em>3th Oct 2012</em> </li>
                        <li>
                            <h6><a href="blog-post.html">Scelerisque nisl consectetur et</a></h6>
                            <em>28th Sep 2012</em> </li>
                        <li>
                            <h6><a href="blog-post.html">Pellentesque ornare sem lacinia quam</a></h6>
                            <em>15th Aug 2012</em> </li>
                    </ul>
                    <!-- /.post-list -->
                </section>
                <!-- /.widget -->
                <section class="col-sm-3 widget">
                    <h3 class="section-title widget-title">About</h3>
                    <p>Aenean lacinia bibendum nulla sed leo posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
                    <p>Donec ullamcorper metus auctor fringi. Nullam quis risus eget.</p>
                    <p>Vestibulum id ligula porta  euismod semper. Maecenas faucibus mollis.</p>
                </section>
                <!-- /.widget -->
                <section class="col-sm-3 widget">
                    <h3 class="section-title widget-title">Tags</h3>
                    <div class="tagcloud"> <a href="#" style="font-size: 9pt;">blogroll</a> <a href="#" style="font-size: 19pt;">daily</a> <a href="#" style="font-size: 9pt;">dialog</a> <a href="#" style="font-size: 9pt;">gallery</a> <a href="#" style="font-size: 10pt;">journal</a> <a href="#" style="font-size: 9pt;">link</a> <a href="#" style="font-size: 12pt;">motion</a> <a href="#" style="font-size: 9pt;">music</a> <a href="#" style="font-size: 20pt;">photo</a> <a href="#" style="font-size: 13pt;">professional</a> <a href="#" style="font-size: 16pt;">quotation</a> <a href="#" style="font-size: 9pt;">show</a> <a href="#" style="font-size: 15pt;">sound</a> <a href="#" style="font-size: 9pt;">tv</a> <a href="#" style="font-size: 9pt;">video</a> <a href="#" style="font-size: 9pt;">gift</a> <a href="#" style="font-size: 19pt;">label</a> <a href="#" style="font-size: 9pt;">christmas</a> <a href="#" style="font-size: 9pt;">holiday</a> <a href="#" style="font-size: 10pt;">fun</a> <a href="#" style="font-size: 9pt;">recipes</a> <a href="#" style="font-size: 12pt;">concert</a> <a href="#" style="font-size: 9pt;">drinks</a> <a href="#" style="font-size: 20pt;">apps</a> <a href="#" style="font-size: 13pt;">iphone</a> <a href="#" style="font-size: 16pt;">ipad</a> <a href="#" style="font-size: 9pt;">develop</a> <a href="#" style="font-size: 15pt;">marketing</a> <a href="#" style="font-size: 9pt;">strategy</a> <a href="#" style="font-size: 13pt;">food</a> <a href="#" style="font-size: 12pt;">typography</a> <a href="#" style="font-size: 9pt;">mobile</a> <a href="#" style="font-size: 15pt;">envato</a> <a href="#" style="font-size: 9pt;">icon</a></div>
                </section>
                <!-- /.widget -->
                <section class="col-sm-3 widget">
                    <h3 class="section-title widget-title">Get In Touch</h3>
                    <p>Fusce dapibus, tellus commodo, tortor mauris condimentum utellus fermentum, porta sem malesuada magna. Sed posuere consectetur est at lobortis.</p>
                    <div class="divide10"></div>
                    <i class="icon-location contact"></i> Moonshine St. 14/05 Light City, Jupiter <br />
                    <i class="icon-phone contact"></i>+00 (123) 456 78 90 <br />
                    <i class="icon-mail contact"></i> <a href="first.last%40email.html">first.last@email.com</a> </section>
                <!-- /.widget -->
            </div>
            <!-- /.row -->
        </div>
        <!-- .container -->


    <div class="sub-footer">
        <div class="container">
            <p class="pull-left">© <?=date('Y')?> MedWays. Все права защищены.</p>
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
<!--    <script src="--><?//=Yii::app()->baseUrl?><!--/js/validator/jquery.validate.min.js"></script>-->
    <!-- DEMO ONLY -->

    </body>
</html>