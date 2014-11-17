<?/* @var $this AutorizedController */

$assetsUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('cabinet.assets'));


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

    <title>Kertas &ndash; Lock Screen</title>

    <link rel="icon" href="<?=$assetsUrl ?>/img/favicon.ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- BEGIN CSS FRAMEWORK -->
    <link rel="stylesheet" href="<?=$assetsUrl ?>/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$assetsUrl ?>/plugins/font-awesome/css/font-awesome.min.css">
    <!-- END CSS FRAMEWORK -->

    <!-- BEGIN CSS PLUGIN -->
    <link rel="stylesheet" href="<?=$assetsUrl ?>/plugins/pace/pace-theme-minimal.css">
    <!-- END CSS PLUGIN -->

    <!-- BEGIN CSS TEMPLATE -->
    <link rel="stylesheet" href="<?=$assetsUrl ?>/css/main.css">
    <!-- END CSS TEMPLATE -->


</head>

<body class="login">
<div class="outer">
    <div class="middle">
        <div class="inner">
            <div class="row">
                <!-- BEGIN LOCKSCREEN BOX -->
                <div class="col-lg-12">
                    <h3 class="text-center login-title">С возращением! </h3>
                    <div class="account-wall">
                        <!-- BEGIN PROFILE IMAGE -->
                        <img class="profile-img" src="<?=Yii::app()->baseUrl ?>/images/avatars/<?=$this->getAvatar();?>" alt="">
                        <!-- END PROFILE IMAGE -->
                        <p class="profile-name"><?=Yii::app()->user->name?></p>
                        <span class="profile-email"><?=Yii::app()->user->email?></span>


                        <!-- BEGIN LOGIN FORM -->
                        <form name="login" action="<?=Yii::app()->createUrl('Autorized/unlockScreen')?>" method="post" name="LoginForm" class="form-login">
                            <input type="password" name="LoginForm[password]" class="form-control" placeholder="Пароль">
                            <input type="hidden" name="LoginForm[username]" class="form-control" value="<?=Yii::app()->user->email?>">
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
                            <label class="checkbox pull-left">
                                <input type="checkbox" value="remember-me">Запомнить меня
                            </label>
                            <a href="#" class="pull-right need-help">Нужна помощь?</a><span class="clearfix"></span>
                        </form>
                        <!-- END LOGIN FORM -->


                    </div>
                    <a href="<?=Yii::app()->createUrl('Autorized/logout')?>" class="text-center new-account">Войти с другого аккаунта</a>
                </div>
                <!-- END LOCKSCREEN BOX -->
            </div>
        </div>
    </div>
</div>

<!-- BEGIN JS FRAMEWORK -->
<script src="<?=$assetsUrl ?>/plugins/jquery-2.1.0.min.js"></script>
<script src="<?=$assetsUrl ?>/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- END JS FRAMEWORK -->

<!-- BEGIN JS PLUGIN -->
<script src="<?=$assetsUrl ?>/plugins/pace/pace.min.js"></script>
<!-- END JS PLUGIN -->


</body>
</html>