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
                <li><a href="#settings" data-toggle="tab">Настройки</a></li>
            </ul>
            <div class="tab-content">


                <!-- BEGIN PROFILE -->

                <div class="tab-pane active" id="profile">
                    <p class="lead">Мои данные  <span> &nbsp;&nbsp;&nbsp;</span><button id="enable" class="btn btn-xs btn-primary "><i class="fa  fa-edit"> </i> редактировать</button></p>
                    <hr>
                    <div class="row">
                        <?if(isset($data) && !is_null($data)){?>

                        <div class="col-sm-6">
                            <p><strong>Фамилия:</strong>
                                <? $this->widget('editable.Editable', array(
                                        'type'      => 'text',
                                        'pk'        => $data['id'],
                                        'name'      => 'F_NAME',
                                        'text'      => CHtml::encode($data['F_NAME']),
                                        'url'       => $this->createUrl('Autorized/updateProfile'),
                                        'title'     => 'Введите фамилию',
                                        'placement' => 'right',
                                        'options' => array( 'disabled'=>true, 'class'=>'edit',  ),  ));  ?>
                            </p>
                            <p><strong>Имя:</strong>
                                <? $this->widget('editable.Editable', array(
                                        'type'      => 'text',
                                        'pk'        => $data['id'],
                                        'name'      => 'L_NAME',
                                        'text'      => CHtml::encode($data['L_NAME']),
                                        'url'       => $this->createUrl('Autorized/updateProfile'),
                                        'title'     => 'Введите фамилию',
                                        'placement' => 'right',
                                        'options' => array( 'disabled'=>true, ),  )); ?>
                            </p>
                            <p><strong>Отчество:</strong>
                                <? $this->widget('editable.Editable', array(
                                        'type'      => 'text',
                                        'pk'        => $data['id'],
                                        'name'      => 'S_NAME',
                                        'text'      => CHtml::encode($data['S_NAME']),
                                        'url'       => $this->createUrl('Autorized/updateProfile'),
                                        'title'     => 'Введите фамилию',
                                        'placement' => 'right',
                                        'options' => array( 'disabled'=>true, ),  )); ?>
                            </p>
                            <p><strong>Пол:</strong>
                                <? $this->widget('editable.Editable', array(
                                        'type'      => 'select',
                                        'name'      => 'SEX',
                                        'pk'        => $data['id'],
                                        'text'      => CHtml::encode(($data['SEX'])=='1'?'M':'Ж'),
                                        'url'       => $this->createUrl('Autorized/updateProfile'),
                                        'source'    => Editable::source(array(1 => 'М', 2 => 'Ж')),
                                        'title'     => 'Enter title',
                                        'placement' => 'right',
                                        'options'     => array( 'disabled'=>true, 'showbuttons'=>false, ) )); ?>
                            </p>
                            <p><strong>Дата рождения:</strong>
                                <? $this->widget('editable.Editable', array(
                                        'type'      => 'combodate',
                                        'name'      => 'BIRTH_DATE',
                                        'pk'        => $data['id'],
                                        'text'      => CHtml::encode(date('d / m / Y', strtotime($data['BIRTH_DATE']))),
                                        'url'       => $this->createUrl('Autorized/updateProfile'),
                                        'format'      => 'YYYY-MM-DD', //in this format date sent to server
                                        'viewformat'  => 'DD / MM / YYYY', //in this format date is displayed
                                        'template'    => 'DD / MM / YYYY', //template for dropdowns
                                        'combodate'   => array('minYear' => 1930, 'maxYear' => 2015),
                                        'options'     => array( 'datepicker' => array('language' => 'ru'), 'disabled'=>true, )  )); ?>
                            </p>
                            <p><strong>Телефон:</strong>
                                <? $this->widget('editable.Editable', array(
                                        'type'      => 'text',
                                        'pk'        => $data['id'],
                                        'name'      => 'PHONE',
                                        'text'      => CHtml::encode($data['PHONE']),
                                        'url'       => $this->createUrl('Autorized/updateProfile'),
                                        'title'     => 'Введите фамилию',
                                        'placement' => 'right',
                                        'options' => array( 'disabled'=>true, ),)); ?>
                            </p>
                        </div>
                        <div class="col-sm-6">
                            <p><strong>Ученая степень:</strong>
                                <?  $this->widget('editable.Editable', array(
                                        'type'      => 'select',
                                        'name'      => 'DEGREE',
                                        'pk'        => $data['id'],
                                        'text'      => CHtml::encode($data['DEGREE']),
                                        'url'       => $this->createUrl('Autorized/updateProfile'),
                                        'source'    => Editable::source(array('кандидат наук'=>'кандидат наук' , 'доктор наук'=>'доктор наук','нет'=>'нет')),
                                        'title'     => 'Enter title',
                                        'placement' => 'right',
                                        'options'     => array( 'disabled'=>true, 'showbuttons'=>false,  ) )); ?>
                            </p>
                            <p><strong>Ученое звание:</strong>
                                <?$this->widget('editable.Editable', array(
                                        'type'      => 'select',
                                        'name'      => 'ACADEMIC_TITLE',
                                        'pk'        => $data['id'],
                                        'text'      => CHtml::encode($data['ACADEMIC_TITLE']),
                                        'url'       => $this->createUrl('Autorized/updateProfile'),
                                        'source'    => Editable::source(array('доцент'=>'доцент' , 'профессор'=>'профессор','нет'=>'нет')),
                                        'title'     => 'Enter title',
                                        'placement' => 'right',
                                        'options'     => array( 'disabled'=>true,'showbuttons'=>false, )  )); ?>
                            </p>
                            <p><strong>Округ:</strong>
                                <? $this->widget('editable.Editable', array(
                                        'type'      => 'select',
                                        'name'      => 'ID_DISTRICT',
                                        'pk'        => $data['id'],
                                        'text'      => CHtml::encode($data['ID_DISTRICT']),
                                        'url'       => $this->createUrl('Autorized/updateProfile'),
                                        'source'    => $this->createUrl('Autorized/getDistricts'),
                                        'title'     => 'Enter title',
                                        'placement' => 'right',
                                        'options' => array( 'disabled'=>true,  'showbuttons'=>false, ), )); ?>
                            </p>
                            <p><strong>Вуз:</strong>
                                <? $this->widget('editable.Editable', array(
                                        'type'      => 'select',
                                        'name'      => 'ID_UNIVER',
                                        'pk'        => $data['id'],
                                        'text'      => CHtml::encode($data['ID_UNIVER']),
                                        'url'       => $this->createUrl('Autorized/updateProfile'),
                                        'source'    => $this->createUrl('Autorized/getUniversities'),
                                        'title'     => 'Enter title',
                                        'placement' => 'right',
                                        'options' => array( 'disabled'=>true,  'showbuttons'=>false, ), ));  ?>
                            </p>
                            <p><strong>Должность:</strong>
                                <? $this->widget('editable.Editable', array(
                                        'type'      => 'text',
                                        'pk'        => $data['id'],
                                        'name'      => 'W_POSITION',
                                        'text'      => CHtml::encode($data['W_POSITION']),
                                        'url'       => $this->createUrl('Autorized/updateProfile'),
                                        'title'     => 'Введите фамилию',
                                        'placement' => 'right',
                                        'options' => array( 'disabled'=>true, ), )); ?>
                            </p>
                            <p><strong>Специальность:</strong>
                                <? $this->widget('editable.Editable', array(
                                    'type'      => 'select',
                                    'name'      => 'ID_SPECIALITY',
                                    'pk'        => $data['id'],
                                    'text'      => CHtml::encode($data['ID_SPECIALITY']),
                                    'url'       => $this->createUrl('Autorized/updateProfile'),
                                    'source'    => $this->createUrl('Autorized/getSpecialities'),
                                    'title'     => 'Enter title',
                                    'placement' => 'right',
                                    'options' => array( 'disabled'=>true,  'showbuttons'=>false),  )); ?>
                            </p>
                            <p><strong>Индекс Хирша:</strong>
                                <? $this->widget('editable.Editable', array(
                                    'type'      => 'text',
                                    'pk'        => $data['id'],
                                    'name'      => 'HIRSH',
                                    'text'      => CHtml::encode($data['HIRSH']),
                                    'url'       => $this->createUrl('Autorized/updateProfile'),
                                    'title'     => 'Введите фамилию',
                                    'placement' => 'right',
                                    'options' => array( 'disabled'=>true, ),  )); ?>
                            </p>
<!--                            <p><strong>Rating:</strong> <span class="text-yellow"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></span></p>-->
                        </div>
                    <? }else { ?>
                            <div class="grid-body">
                                <div class="alert alert-danger fade in">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <h4>Внимание! Осторожно! </h4>
                                    <p>По не установленным причинам на сервере произошел технический сбой! Убедительная просьба перезайти в сой кабинет,
                                        и если ошибка повториться сообщите об этом администрации.</p>

                                </div>
                            </div>
                    <? }  ?>

                    </div>

                    <div class="row">


                        <div class="col-sm-4 stats">
                            <h1><?=round($perc_prof)?> %</h1>
                            <span>Заполненность профиля</span>
                            <button class="btn btn-primary"><i class="fa fa-user"></i> Профиль</button>
                        </div>

                        <?if($this->checkRole(array('Manager'))):?>
                        <div class="col-sm-4 stats">

                                <h1> 0 %</h1>
                                <span>Заполненность проекта</span>
                                <button class="btn btn-info"><i class="fa fa-graduation-cap"></i> Проект</button>
                        </div>
                        <? endif; ?>
                        <?if($this->checkRole(array('Exp','Exp1','Exp2','Exp3'))):?>
                        <div class="col-sm-4 stats">

                                <h1> 0 </h1>
                                <span>Поступило проектов</span>
                                <button class="btn btn-info"><i class="fa fa-graduation-cap"></i> Проектов</button>
                        </div>
                        <? endif; ?>
                        <?if($this->checkRole(array('Dev'))):?>
                            <div class="col-sm-4 stats">

                                <h1> 0 </h1>
                                <span>Обращений</span>
                                <button class="btn btn-info"><i class="fa fa-envelope"></i> Обращений</button>
                            </div>
                        <? endif; ?>

                        <div class="col-sm-4 stats">
                            <h1><?=$this->DaysIn($data['REG_DATE'])?></h1>
                            <span>Дней</span>
                            <button class="btn btn-primary"><i class="fa fa-calendar"></i> Дней в проекте</button>
                        </div>
                    </div>
                </div>

                <!-- END PROFILE -->




                <!-- BEGIN SETTINGS -->
                <div class="tab-pane" id="settings">
                    <p class="lead">Мои настройки</p>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Дублировать оповещения по email</label>
                                    <div class="col-sm-2">
                                        <input type="checkbox" class="js-switch" checked>
                                    </div>
                                    <label class="col-sm-2 control-label"> Подписаться на новости</label>
                                    <div class="col-sm-2">
                                        <input type="checkbox" class="js-switch" checked>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Дублировать обращениия по email</label>
                                    <div class="col-sm-2">
                                        <input type="checkbox" class="js-switch">
                                    </div>
                                    <label class="col-sm-2 control-label">SMS оповещения</label>
                                    <div class="col-sm-2">
                                        <input type="checkbox" class="js-switch">
                                    </div>
                                </div>
<!--                                <div class="form-group">-->
<!--                                    <label class="col-sm-4 control-label">Subscribe Newsletters</label>-->
<!--                                    <div class="col-sm-2">-->
<!--                                        <input type="checkbox" class="js-switch" checked>-->
<!--                                    </div>-->
<!--                                    <label class="col-sm-2 control-label">RSS Feeds</label>-->
<!--                                    <div class="col-sm-2">-->
<!--                                        <input type="checkbox" class="js-switch">-->
<!--                                    </div>-->
<!--                                </div>-->
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
                        <p style="font-size:13px;">
                            Здравствуйте <?=Yii::app()->user->name ?>! В данном окне вы можете выбрать и загрузить фотографию для своей учетной записи. Напоминаем вам что
                            рекомендуемый размер фотографий : 500x500 пикс. ; Если вы уже загружали изображение ранее, применено для вашей
                            учетной записи будет последнее.

                        </p>
                        </br>
                        <form action="<?=Yii::app()->createUrl('Images/upload')?>" method="post" enctype="multipart/form-data" id="MyUploadForm">
                            <input name="image_file" id="imageInput" type="file"  style="float:left;"/>
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
    Yii::app()->clientScript->registerScriptFile($assetsUrl.'/js/MyEditsToEditable.js', CClientScript::POS_END );
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