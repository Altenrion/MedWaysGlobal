<?php
/**
 * Created by JetBrains PhpStorm.
 * User: User
 * Date: 14.08.14
 * Time: 13:26
 * To change this template use File | Settings | File Templates.
 */
/* @var $this AutorisedController */

$mod_one = '';
$mod_two = '';
$mod_three= '';
$mod_four= '';
$no_edit = false;
$no_buttons = false;
if(isset($data) && !is_null($data)){

        $first_mod = $data[0]['FIRST_LAVEL_APPROVAL'];
        switch($first_mod){

            case '1': $mod_one = $this->statusOk();  $mod_two = $this->statusSpinner() ; $no_edit = true;  break;
            case '2': $mod_one = $this->statusSpinner() ;  $mod_two = $this->statusFail(); break;
            case '3': $mod_one = $this->statusOk();  $mod_two = $this->statusOk(); $no_edit = true; break;
            case '9': $mod_one = $this->statusFail(); $mod_two = $this->statusFail();  $no_edit = true;  $no_buttons=true; break;
            default: $mod_one = $this->statusSpinner() ;  $mod_two = $this->statusSpinner() ;  break;

        }
        $third_mod = $data[0]['SECOND_LAVEL_RATING'];
        if(!is_null($third_mod)){
            $mod_three = $this->statusOk();
        }else{
            $mod_three = $this->statusSpinner();
        }
        $fourth_mod = $data[0]['THIRD_LAVEL_RATING'];
        if(!is_null($fourth_mod)){
            $mod_four = $this->statusOk();
        }else{
            $mod_four = $this->statusSpinner();
        }
    }

?>

    <!-- BEGIN CONTENT HEADER -->
    <section class="content-header">
        <i class="fa fa-graduation-cap"></i>
        <span>Проект пользователя</span>
        <ol class="breadcrumb">
            <li><a href="<?=Yii::app()->createUrl('Autorized/profile')?>">Кабинет</a></li>
            <li class="active"><a href="">Проект</a></li>
        </ol>
    </section>
    <!-- END CONTENT HEADER -->

<section class="content">
<div class="row">
<!-- BEGIN USER PROFILE -->
<div class="col-md-12">

<div class="grid profile">

    <div class="grid-header" style="border:0px; background: none; color: #777777">
        <i class="fa fa-graduation-cap"></i>
        <span class="grid-title">Проект <small style="font-size: 11px;"><?= $this->MakeOrder($data[0]['id']) ?></small> </span>
        <div class="pull-right grid-tools">
            <a data-widget="collapse" title="Collapse"><i class="fa fa-chevron-up"></i></a>
            <a data-widget="reload" title="Reload"><i class="fa fa-refresh"></i></a>
            <a data-widget="remove" title="Remove"><i class="fa fa-times"></i></a>
        </div>
    </div>



    <div class="grid-body">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#profile" data-toggle="tab">Проект</a></li>
        <li><a href="#settings" data-toggle="tab">Оценки</a></li>
    </ul>
    <div class="tab-content">


    <!-- BEGIN PROFILE -->

    <div class="tab-pane active" id="profile">
    <p class="lead">Проектные данные  <span> &nbsp;&nbsp;&nbsp;</span>

        <? if(!$no_edit){ ?>
            <button id="enable" class="btn btn-xs btn-primary "><i class="fa  fa-edit"> </i> редактировать</button>
        <? } ?>
        <? if(!$no_buttons){ ?>
        <button  data-toggle="modal" data-target="#modalPrimaryPDF" class="btn btn-xs btn-primary " style="font-size:0.6em;"><i class="fa  fa-cloud-upload"> </i> загрузить аннотацию</button>
        <button id="Pull" data-toggle="modal"  class="btn btn-xs btn-primary " style="font-size:0.6em;"><i class="fa  fa-trophy" > </i> зарегистрировать</button>
        <? } ?>
        </p>
        <hr>
    <div class="row">
        <?if(isset($data) && !is_null($data)){?>

            <div class="col-sm-12">
                <p><strong>Название проекта:</strong>
                    <? $this->widget('editable.Editable', array(
                        'type'      => 'textarea',
                        'pk'        => $data[0]['id'],
                        'name'      => 'NAME',
                        'text'      => CHtml::encode($data[0]['NAME']),
                        'url'       => $this->createUrl('Autorized/updateProject'),
                        'title'     => 'Введите фамилию',
                        'placement' => 'right',
                        'options' => array( 'disabled'=>true, ),  )); ?>
                </p>
                </div>
                <div class="col-sm-6">
                <p><strong>Научная платформа:</strong>
                    <? $this->widget('editable.Editable', array(
                        'type'      => 'select',
                        'name'      => 'ID_STAGE',
                        'pk'        => $data[0]['id'],
                        'text'      => CHtml::encode($data[0]['ID_STAGE']),
                        'url'       => $this->createUrl('Autorized/updateProject'),
                        'source'    => $this->createUrl('Autorized/getStages'),
                        'title'     => 'Enter title',
                        'placement' => 'right',
                        'options' => array( 'disabled'=>true, ), ));  ?>
                </p>

                <p><strong>Количество исполнителей:</strong>
                    <? $this->widget('editable.Editable', array(
                        'type'      => 'text',
                        'pk'        => $data[0]['id'],
                        'name'      => 'EXECUTERS_NUM',
                        'text'      => CHtml::encode($data[0]['EXECUTERS_NUM']),
                        'url'       => $this->createUrl('Autorized/updateProject'),
                        'title'     => 'Введите фамилию',
                        'placement' => 'right',
                        'options' => array( 'disabled'=>true, ),  )); ?>
                </p>
                <p><strong>Из них до 35 лет:</strong>
                    <? $this->widget('editable.Editable', array(
                        'type'      => 'text',
                        'pk'        => $data[0]['id'],
                        'name'      => 'UN_THIRTY_FIVE',
                        'text'      => CHtml::encode($data[0]['UN_THIRTY_FIVE']),
                        'url'       => $this->createUrl('Autorized/updateProject'),
                        'title'     => 'Введите фамилию',
                        'placement' => 'right',
                        'options'     => array( 'disabled'=>true, ) )); ?>
                </p>
                <p><strong>Из них обучающихся:</strong>
                    <? $this->widget('editable.Editable', array(
                        'type'      => 'text',
                        'pk'        => $data[0]['id'],
                        'name'      => 'STUDY',
                        'text'      => CHtml::encode($data[0]['STUDY']),
                        'url'       => $this->createUrl('Autorized/updateProject'),
                        'title'     => 'Введите фамилию',
                        'placement' => 'right',
                        'options' => array( 'disabled'=>true, ), )); ?>
                </p>
                <p><strong>Суммарное кол-во публикаций по теме:</strong>
                    <? $this->widget('editable.Editable', array(
                        'type'      => 'text',
                        'pk'        => $data[0]['id'],
                        'name'      => 'PUBLICATIONS',
                        'text'      => CHtml::encode($data[0]['PUBLICATIONS']),
                        'url'       => $this->createUrl('Autorized/updateProject'),
                        'title'     => 'Введите фамилию',
                        'placement' => 'right',
                        'options' => array( 'disabled'=>true, ),)); ?>
                </p>

                <p><strong>Из них в зарубежных изданиях:</strong>
                    <?  $this->widget('editable.Editable', array(
                        'type'      => 'text',
                        'pk'        => $data[0]['id'],
                        'name'      => 'FORIN_PUBL',
                        'text'      => CHtml::encode($data[0]['FORIN_PUBL']),
                        'url'       => $this->createUrl('Autorized/updateProject'),
                        'title'     => 'Введите фамилию',
                        'placement' => 'right',
                        'options' => array( 'disabled'=>true, ), )); ?>
                </p>
            </div>
            <div class="col-sm-6">
                <p><strong>Год начала:</strong>
                    <? $this->widget('editable.Editable', array(
                        'type'      => 'combodate',
                        'name'      => 'START_YEAR',
                        'pk'        => $data[0]['id'],
                        'text'      => CHtml::encode($data[0]['START_YEAR']),
                        'url'       => $this->createUrl('Autorized/updateProject'),
                        'format'      => 'YYYY', //in this format date sent to server
                        'viewformat'  => 'YYYY', //in this format date is displayed
                        'template'    => 'YYYY', //template for dropdowns
                        'combodate'   => array('minYear' => 1980, 'maxYear' => 2015),
                        'options'     => array( 'disabled'=>true, ) )); ?>
                </p>
                <p><strong>Год окончания:</strong>
                    <?  $this->widget('editable.Editable', array(
                        'type'      => 'combodate',
                        'name'      => 'END_YEAR',
                        'pk'        => $data[0]['id'],
                        'text'      => CHtml::encode($data[0]['END_YEAR']),
                        'url'       => $this->createUrl('Autorized/updateProject'),
                        'format'      => 'YYYY', //in this format date sent to server
                        'viewformat'  => 'YYYY', //in this format date is displayed
                        'template'    => 'YYYY', //template for dropdowns
                        'combodate'   => array('minYear' => 2014, 'maxYear' => 2030),
                        'options'     => array('disabled'=>true, ) )); ?>
                </p>
                <p><strong>Стадия развития проекта:</strong>
                    <? $this->widget('editable.Editable', array(
                        'type'      => 'select',
                        'name'      => 'ID_PHASE',
                        'pk'        => $data[0]['id'],
                        'text'      => CHtml::encode($data[0]['ID_PHASE']),
                        'url'       => $this->createUrl('Autorized/updateProject'),
                        'source'    => $this->createUrl('Autorized/getPhases'),
                        'title'     => 'Enter title',
                        'placement' => 'right',
                        'options' => array( 'disabled'=>true, ), ));  ?>
                </p>
                <p><strong>Объем финансирования на период реализации (руб):</strong>
                    <? $this->widget('editable.Editable', array(
                        'type'      => 'select',
                        'name'      => 'ID_BUDGET',
                        'pk'        => $data[0]['id'],
                        'text'      => CHtml::encode($data[0]['ID_BUDGET']),
                        'url'       => $this->createUrl('Autorized/updateProject'),
                        'source'    => $this->createUrl('Autorized/getBudget'),
                        'title'     => 'Enter title',
                        'placement' => 'right',
                        'options' => array( 'disabled'=>true, ), )); ?>
                </p>
                <p><strong>Объем финансирования на календарный год (руб):</strong>
                    <? $this->widget('editable.Editable', array(
                        'type'      => 'text',
                        'pk'        => $data[0]['id'],
                        'name'      => 'YEAR_BUDGET',
                        'text'      => CHtml::encode($data[0]['YEAR_BUDGET']),
                        'url'       => $this->createUrl('Autorized/updateProject'),
                        'title'     => 'Введите фамилию',
                        'placement' => 'right',
                        'options' => array( 'disabled'=>true, ),  )); ?>
                </p>
                <p><strong>Объем предполагаемого coфинансирования (руб):</strong>
                    <?  $this->widget('editable.Editable', array(
                        'type'      => 'text',
                        'pk'        => $data[0]['id'],
                        'name'      => 'CO_FINANCING',
                        'text'      => CHtml::encode($data[0]['CO_FINANCING']),
                        'url'       => $this->createUrl('Autorized/updateProject'),
                        'title'     => 'Введите фамилию',
                        'placement' => 'right',
                        'options' => array( 'disabled'=>true, ),  )); ?>
                </p>
                </div>
                <div class="col-sm-12">
                <p><strong>Краткая аннотация (1500 знаков) :</strong>
                    <?   $this->widget('editable.Editable', array(
                        'type'      => 'textarea',
                        'pk'        => $data[0]['id'],
                        'name'      => 'DESCR_PROJECT',
                        'text'      => CHtml::encode($data[0]['DESCR_PROJECT']),
                        'url'       => $this->createUrl('Autorized/updateProject'),
                        'title'     => 'Введите фамилию',
                        'placement' => 'right',
                        'options' => array( 'disabled'=>true, ),  )); ?>
                </p>


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
        <div class="col-sm-12">
            <div class="alert alert-info">
                Для завершения регистрации проекта загрузите полную аннотацию в PDF формате.
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-sm-3 stats">
                <h1 id="first_check"><?=$mod_one?></h1>
                <span> Подача заявки  </span>
                <button class="btn btn-primary"><i class="fa fa-flag-o"></i> Подача </button>
            </div>
            <div class="col-sm-3 stats">
                <h1 id="exp_check"> <?=$mod_two?></h1>
                <span> Проверка заявки </span>
                <button class="btn btn-primary"><i class="fa fa-legal"></i> Проверка </button>
            </div>
            <div class="col-sm-3 stats">

                <h1><?=$mod_three?></h1>
                <span>Окружная экспертиза</span>
                <button class="btn btn-primary"><i class="fa fa-flag-checkered"></i> Окружная</button>
            </div>
            <div class="col-sm-3 stats">

                <h1><?=$mod_four?></h1>
                <span>Федеральная экспертиза</span>
                <button class="btn btn-primary"><i class="fa fa-flag"></i> Федеральная</button>
            </div>
    </div>
    </div>
    <!-- END PROFILE -->

    <!-- BEGIN SETTINGS -->
    <div class="tab-pane" id="settings">
        <p class="lead">Оценки проекта</p>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="grid no-border">

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Имя</th>
                                    <th>Статус</th>
                                    <th>Оценка</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Александр Стаханов</td>
                                    <td>Эксперт</td>
                                    <td><span class="text-yellow"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Аркадий Гайдар</td>
                                    <td>Эксперт</td>
                                    <td><span class="text-yellow"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></span></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Иларион Арденгард</td>
                                    <td>Инвестор</td>
                                    <td><span class="text-yellow"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></span></td>
                                </tr>
                                </tbody>
                            </table>
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

    <!-- модальное окно для добавления PDF -->

        <div class="modal fade" id="modalPrimaryPDF" tabindex="-1" role="dialog" aria-labelledby="myModalLabel14" aria-hidden="true">
            <div class="modal-wrapper">
                <div class="modal-dialog">
                    <div class="modal-content bg-blue">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel14">Загрузка PDF документа</h4>
                        </div>
                        <div class="modal-body">
                            <p style="font-size:13px;">
                                Файл аннотации должен являться PDF документом и содержать всю необходимую информацию,
                                которую вы можете предоставить, для непредвзятой оценки вашего проекта  экспертной группой
                            </p>
                            </br>
                            <form action="<?=Yii::app()->createUrl('Images/uploadPDF')?>" method="post" enctype="multipart/form-data" id="MyUploadForm">
                                <input name="pdf_file" id="imageInput" type="file"  style="float:left;"/>
                                <button type="submit" id="submit-btn" class="btn btn-sm btn-primary">Загрузить</button>

                                <i class="fa fa-refresh fa-spin" id="loading-img" style="display:none;"   ></i>
                            </form>
                            <div id="output" ></div>
                        </div>
                        <div class="modal-footer">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    <!--/PDF-->


    <!-- модальное окно для отображения инфы при заявке проекта -->

        <div class="modal fade" id="Pull_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel14" aria-hidden="true">
            <div class="modal-wrapper">
                <div class="modal-dialog">
                    <div class="modal-content bg-red">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel14">Уважаемый пользователь!</h4>
                        </div>
                        <div class="modal-body">
                            <p style="font-size:13px;">
                                Если вы видителе это сообщение, значит вы попытались отправить свой проект на участие в эстафете.
                                К сожалению, вы не заполнили некоторые поля при регистрации.</br></br>
                                Убедительная просьба, проверьте внимательно пропущенные поля в персональной форме регистрации и в форме регистрации проекта.
                                Так же проверьте, загрузили ли вы PDF документ аннотации проекта.
                                Возможность заявить проект на участие предоставляется при заполнении всей информации.
                            </p>
                        </div>
                        <div class="modal-footer">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!--/PDF-->


    <script type="text/javascript">
        var Url = '<?=Yii::app()->createUrl('Autorized/checkFullInfo')?>';
    </script>


<?
$base_url = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile($base_url.'/adminka/js/MyEditsToEditable.js', CClientScript::POS_END);
$cs->registerScriptFile($base_url.'/adminka/js/jquery.form.min.js', CClientScript::POS_END);
$cs->registerScriptFile($base_url.'/adminka/js/avatar_upload.js', CClientScript::POS_END);
?>