<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 23.07.14
 * Time: 17:16
 * To change this template use File | Settings | File Templates.
 */
?>
<?php /* @var $this AutorizedController */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?=Yii::app()->baseUrl.'/images/favicon.png' ?> ">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Личный кабинет</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=Yii::app()->baseUrl?>/adminka/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=Yii::app()->baseUrl?>/adminka/css/sb-admin.css" rel="stylesheet">

    <!--Mine Customs -->
    <link href="<?=Yii::app()->baseUrl?>/adminka/css/stylings.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=Yii::app()->baseUrl?>/adminka/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=Yii::app()->createUrl('Autorized/index')?>">MedWays</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> &nbsp;<?=Yii::app()->user->name?> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="<?=Yii::app()->createUrl('Autorized/profile')?>"><i class="fa fa-fw fa-user"></i> Профиль</a>
                    </li>

                    <li>
                        <a href="<?=Yii::app()->createUrl('ShowCase/index')?>"><i class="fa fa-fw fa-eye"></i> На сайт</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?=Yii::app()->createUrl('ShowCase/logout')?>"><i class="fa fa-fw fa-power-off"></i> Выйти</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="#"><i class="fa fa-fw fa-bar-chart-o"></i> Статистика</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-graduation-cap"></i> Проект</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-info"></i> Информация</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-edit"></i> Обратная связь</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-calendar"></i> Новости</a>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <?php echo $content; ?>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery Version 1.11.0 -->
    <script src="<?=Yii::app()->baseUrl?>/adminka/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=Yii::app()->baseUrl?>/adminka/js/bootstrap.min.js"></script>

</body>

</html>