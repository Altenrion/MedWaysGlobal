<?
$assetsUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('cabinet.assets'));


/* @ BEGIN CSS FRAMEWORK */
Yii::app()->clientScript->registerCssFile($assetsUrl . '/plugins/bootstrap/css/bootstrap.min.css');
Yii::app()->clientScript->registerCssFile($assetsUrl . '/plugins/font-awesome/css/font-awesome.min.css');

/* @ BEGIN CSS PLUGIN */
Yii::app()->clientScript->registerCssFile($assetsUrl . '/plugins/pace/pace-theme-minimal.css');

/* @ BEGIN CSS TEMPLATE */
Yii::app()->clientScript->registerCssFile($assetsUrl . '/css/main.css');
Yii::app()->clientScript->registerCssFile($assetsUrl . '/css/skins.css');

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

    <title>Kertas &ndash; 404</title>

    <link rel="icon" href="assets/img/favicon.ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body class="error">
<div class="outer">
    <div class="middle">
        <div class="inner">
            <div class="row">
                <!-- BEGIN ERROR PAGE -->
                <div class="col-lg-12">
                    <!-- BEGIN ERROR -->
                    <div class="circle">
                        <i class="fa fa-chain-broken bg-blue"></i>
                        <span>404</span>
                    </div>
                    <!-- END ERROR -->
                    <!-- BEGIN ERROR DESCRIPTION -->
                    <span class="status">Opps! Page Not Found!</span>
                    <span class="detail">The page you're looking for could not be found. <a href="index.html">Go home instead?</a></span>
                    <!-- END ERROR DESCRIPTION -->
                </div>
                <!-- END ERROR PAGE -->
            </div>
        </div>
    </div>
</div>

<!-- BEGIN JS FRAMEWORK -->
<script src="<?= $assetsUrl ?>/plugins/jquery-2.1.0.min.js"></script>
<script src="<?= $assetsUrl ?>/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- END JS FRAMEWORK -->

<!-- BEGIN JS PLUGIN -->
<script src="<?= $assetsUrl ?>/plugins/pace/pace.min.js"></script>
<!-- END JS PLUGIN -->
</body>
</html>