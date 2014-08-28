<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 27.08.14
 * Time: 20:38
 * To change this template use File | Settings | File Templates.
 */
/* @var $this AutorizedController */

$assetsUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('cabinet.assets'));


?>

<!-- BEGIN CONTENT HEADER -->
<section class="content-header">
    <i class="fa fa-user"></i>
    <span>Профиль пользователя</span>
    <ol class="breadcrumb">
        <li><a href="">Кабинет</a></li>
        <li class="active"><a href="">Профиль</a></li>
    </ol>
</section>
<!-- END CONTENT HEADER -->

<!-- BEGIN MAIN CONTENT -->
<section class="content">
<div class="row">
<!-- BEGIN USER PROFILE -->
<div class="col-md-12">


    <?php if(Yii::app()->user->hasFlash('CONTACT_EMAIL')):?>
        <div class="alert alert-info alert-dismissable" style="display:none;">
            <?php  echo Yii::app()->user->getFlash('CONTACT_EMAIL'); ?>
        </div>
    <?php
        Yii::app()->clientScript->registerScript(
            'myShowHideEffect',
            '$(".alert").slideDown("slow", function(){$(".alert").animate({opacity: 1.0}, 5000).fadeOut("slow");});',
            CClientScript::POS_READY
        );
    ?>
    <?php endif; ?>


    <div class="grid profile">



        <div class="grid-header">
            <div class="col-xs-9">
                <div class="row">
                    <div class="col-xs-12 col-sm-2">
                        <img data-toggle="modal" data-target="#modalPrimary3" src="<?=Yii::app()->baseUrl ?>/images/avatars/<?=$this->getAvatar();?>" class="img-circle avatar" alt="">
                    </div>
                    <div class="col-xs-12 col-sm-7 persnal">
                        <h3><?=Yii::app()->user->name?></h3>
                        <p><i class="fa fa-fw fa-child"></i> <?= isset($role)?($role):('')?></p>
                        <p><i class="fa fa-fw fa-envelope"></i> <?=Yii::app()->user->email ?></p>
                    </div>
                </div>
            </div>
            <div class="col-xs-3 text-right visio">
                <p><a href="" title="Everyone can see your profile"><i class="fa fa-globe"></i> Виден всем</a></p>
            </div>
        </div>



        <div class="grid-body">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#profile" data-toggle="tab">Профиль</a></li>
                <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
                <li><a href="#photos" data-toggle="tab">Photos</a></li>
                <li><a href="#settings" data-toggle="tab">Настройки</a></li>
            </ul>
            <div class="tab-content">
                <!-- BEGIN PROFILE -->
                <div class="tab-pane active" id="profile">
                    <p class="lead">Мои данные  <span> &nbsp;&nbsp;&nbsp;</span><button id="enable" class="btn btn-xs btn-primary "><i class="fa  fa-edit"> </i> редактировать</button></p>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            <p><strong>Имя:</strong> тест </p>
                            <p><strong>Фамилия:</strong> тест </p>
                            <p><strong>Отчество:</strong> Web Designer / UI Designer</p>
                            <p><strong>Пол:</strong> website</p>
                            <p><strong>Дата рождения:</strong> July 24<sup>th</sup>, 2010</p>
                            <p><strong>Телефон:</strong> (917) 544-7768</p>
                        </div>
                        <div class="col-sm-6">
                            <p><strong>Ученая степень:</strong> Специалист</p>
                            <p><strong>Ученое звание:</strong> Специалист</p>
                            <p><strong>Округ:</strong> ЦФО</p>
                            <p><strong>Вуз:</strong> НИЯУ МИФИ</p>
                            <p><strong>Должность:</strong> НИЯУ МИФИ</p>
                            <p><strong>Специальность:</strong> НИЯУ МИФИ</p>
                            <p><strong>Индекс Хирша:</strong> НИЯУ МИФИ</p>



<!--                            <p><strong>Rating:</strong> <span class="text-yellow"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></span></p>-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 stats">
                            <h1>46,2K</h1>
                            <span>Followes</span>
                            <button class="btn btn-success"><i class="fa fa-plus-circle"></i> Follow</button>
                        </div>
                        <div class="col-sm-4 stats">
                            <h1>127</h1>
                            <span>Following</span>
                            <button class="btn btn-info"><i class="fa fa-user"></i> View Profile</button>
                        </div>
                        <div class="col-sm-4 stats">
                            <h1>10,9K</h1>
                            <span>Subscribers</span>
                            <button class="btn btn-danger"><i class="fa fa-rss"></i> Subscribe</button>
                        </div>
                    </div>
                </div>
                <!-- END PROFILE -->
                <!-- BEGIN TIMELINE -->
                <div class="tab-pane" id="timeline">
                    <p class="lead">My Timeline</p>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="timeline-centered">
                                <article class="timeline-entry">
                                    <div class="timeline-entry-inner">
                                        <time class="timeline-time" datetime="2014-01-10T03:45"><span>11:41 AM</span> <span>Today</span></time>

                                        <div class="timeline-icon bg-primary">
                                            <i class="fa fa-home"></i>
                                        </div>

                                        <div class="timeline-label">
                                            <h2><a href="#">Jeffrey Williams</a> <span>posted a status update</span></h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        </div>
                                    </div>
                                </article>

                                <article class="timeline-entry left-aligned">
                                    <div class="timeline-entry-inner">
                                        <time class="timeline-time" datetime="2014-01-10T03:45"><span>08:12 AM</span> <span>Today</span></time>

                                        <div class="timeline-icon bg-warning">
                                            <i class="fa fa-bell"></i>
                                        </div>

                                        <div class="timeline-label">
                                            <h2><a href="#">Job Meeting</a></h2>
                                            <p>You have a meeting at <strong>10:00 AM</strong> in the <strong>Meeting Room</strong>.</p>
                                        </div>
                                    </div>
                                </article>

                                <article class="timeline-entry">
                                    <div class="timeline-entry-inner">
                                        <time class="timeline-time" datetime="2014-01-10T03:45"><span>02:10 AM</span> <span>15/06/2014</span></time>

                                        <div class="timeline-icon bg-danger">
                                            <i class="fa fa-user"></i>
                                        </div>

                                        <div class="timeline-label">
                                            <h2><a href="#">Larry Gardner</a> <span>changed his</span> <a href="#">Profile Picture</a></h2>
                                            <blockquote>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</blockquote>
                                            <img src="<?=$assetsUrl?>/img/gallery/1.jpg" class="img-responsive img-rounded full-width" alt="">
                                        </div>
                                    </div>
                                </article>

                                <article class="timeline-entry begin">
                                    <div class="timeline-entry-inner">
                                        <div class="timeline-icon bg-default">
                                            <i class="fa fa-laptop"></i>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END TIMELINE -->
                <!-- BEGIN PHOTOS -->
                <div class="tab-pane" id="photos"></div>
                <!-- END PHOTOS -->
                <!-- BEGIN SETTINGS -->
                <div class="tab-pane" id="settings">
                    <p class="lead">Мои настройки</p>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Global Notifications</label>
                                    <div class="col-sm-2">
                                        <input type="checkbox" class="js-switch" checked>
                                    </div>
                                    <label class="col-sm-2 control-label">Email Notifications</label>
                                    <div class="col-sm-2">
                                        <input type="checkbox" class="js-switch" checked>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Phone Notifications</label>
                                    <div class="col-sm-2">
                                        <input type="checkbox" class="js-switch">
                                    </div>
                                    <label class="col-sm-2 control-label">Mail Notifications</label>
                                    <div class="col-sm-2">
                                        <input type="checkbox" class="js-switch">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Subscribe Newsletters</label>
                                    <div class="col-sm-2">
                                        <input type="checkbox" class="js-switch" checked>
                                    </div>
                                    <label class="col-sm-2 control-label">RSS Feeds</label>
                                    <div class="col-sm-2">
                                        <input type="checkbox" class="js-switch">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SETTINGS -->
            </div>
        </div>
    </div>
</div>
<!-- END USER PROFILE -->
</div>
</section>
<!-- END MAIN CONTENT -->


    <div class="modal fade" id="modalPrimary3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel14" aria-hidden="true">
        <div class="modal-wrapper">
            <div class="modal-dialog">
                <div class="modal-content bg-blue">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel14">Выбор фотографии</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            Здравствуйте <?=Yii::app()->user->name ?>! В данном окне вы можете выбрать и загрузить фотографию для своей учетной записи. Напоминаем вам что
                            рекомендуемый размер фотографий : 500x500 пикс. ; Если вы уже загружали изображение ранее, применено для вашей
                            учетной записи будет последнее.

                        </p>
                        <form action="<?=Yii::app()->createUrl('Images/upload')?>" method="post" enctype="multipart/form-data" id="MyUploadForm">
                            <input name="image_file" id="imageInput" type="file"  onchange="return doSomething();"/>
                            <button type="submit" id="submit-btn" class="btn btn-sm btn-primary">Загрузить</button>

                            <i class="fa fa-refresh fa-spin" id="loading-img" style="display:none;"   ></i>
                        </form>
                        <div id="output" ></div>



                    </div>
                    <div class="modal-footer">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                            <button type="button" id="RebootAva" class="btn btn-default">Применить</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?

    Yii::app()->clientScript->registerCssFile($assetsUrl.'/css/avatar_upload.css', CClientScript::POS_BEGIN );
    Yii::app()->clientScript->registerScriptFile($assetsUrl.'/js/switch.js', CClientScript::POS_END );
    Yii::app()->clientScript->registerScriptFile($assetsUrl.'/js/jquery.form.min.js', CClientScript::POS_END );
    Yii::app()->clientScript->registerScriptFile($assetsUrl.'/js/avatar_upload.js', CClientScript::POS_END );



    if(isset($messages) && !is_null($messages)){
        $gritter_init = "function initNotification() { $(window).load(function(){";
        $timer = '';

        foreach ($messages as $mes) {
            $timer= $timer+1000;
            $gritter_init .= "setTimeout(function(){
                                $.gritter.add({
                                    class_name: '".$mes[0]."',
                                    title: '".$mes[1]."',
                                    text: '".$mes[2]."',

                                    time: ''
                                });
                                return false;
                            }, ".$timer.");" ;

        }
        $gritter_init .= "}); } $(function() {  'use strict';  initNotification();   });";
        Yii::app()->clientScript->registerScript('griiter_show',$gritter_init, CClientScript::POS_READY);


    }



?>