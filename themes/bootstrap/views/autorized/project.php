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
if(isset($data) && !is_null($data)){

        $first_mod = $data[0]['FIRST_LAVEL_APPROVAL'];
        switch($first_mod){

            case '1': $mod_one = $this->statusOk();  $mod_two = $this->statusSpinner() ; $no_edit = true;  break;
            case '2': $mod_one = $this->statusSpinner() ;  $mod_two = $this->statusFail('доработка'); break;
            case '3': $mod_one = $this->statusOk();  $mod_two = $this->statusOk(); $no_edit = true; break;
            case '9': $mod_one = $this->statusFail('отклонена'); $mod_two = $this->statusFail('отклонена');  $no_edit = true; break;
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






//var_dump($data);
?>

    <div id="content" class="col-lg-12 col-sm-12 col-xs-12">

    <ol class="breadcrumb">
        <li class="active"><i class="fa fa-fw fa-graduation-cap"></i> Проект</li>
    </ol>

    <div class="row profile">

    <div class="col-sm-12 col-md-4 col-lg-3 bord">

        <div class="row">

            <div class="col-xs-12 col-sm-12">
                <div class="well">

                    <ul id="yw0" class="nav nav-list">
                        <li class="nav-header"><strong>Управление проектом</strong></li>
                        </br>

                        <li>
                            <p> Добавить бизнесплан
                                <a data-toggle="modal" href="#PDF_Modal" class="btn btn-xs btn-primary">
                                    Выбрать PDF
                                </a>
                            </p>

                        </li>
                        <li>
                            <p> Заявить проект
                                <a data-toggle="modal"  id="Pull" href="" class="btn btn-xs btn-primary">
                                    Отправить
                                    <i class="fa"></i></a> </p>
                        </li>
                        </br>
                        </br>

                        <li class="nav-header"><strong>Статусы экспертиз</strong></li>
                        </br>
                        <li>
                            <p id="first_check"> Подача заявки <?=$mod_one?></p>
                        </li>
                        <li>
                            <p id="exp_check"> Проверка заявки <?=$mod_two?></p>

                        </li>
                        <li>
                            <p> Окружная <?=$mod_three?></p>

                        </li>
                        <li>
                            <p> Федеральная <?=$mod_four?></p>

                        </li>

                        </br>


                        </br>

                    </ul>

                </div>
            </div>
        </div><!--/row-->

    </div><!--/col-->

    <div class="col-sm-12 col-md-7 col-lg-7 ">

    <? if($data[0]['FIRST_LAVEL_APPROVAL'] == '2' ){ ?>
    <div class="alert alert-warning  alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Комментарий эксперта: </strong> <?=$data[0]['FIRST_LAVEL_COMMENT']?>
    </div>
    <? } ?>
    <div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">Проектные данные

            <? if(!$no_edit){ ?>
            <button id="enable" class="btn btn-xs btn-primary pull-right"><i class="fa  fa-edit"> </i> редактировать</button>
            <? } ?>
        </h3>
    </div>
    <div class="panel-body persona">
    <table   class="table table-hover">
    <tbody>
    <tr>
        <th width="40%">Научная платформа</th>
        <td>
            <? if(isset($data[0])){

                $this->widget('editable.Editable', array(
                    'type'      => 'select',
                    'name'      => 'ID_STAGE',
                    'pk'        => $data[0]['id'],
                    'text'      => CHtml::encode($data[0]['ID_STAGE']),
                    'url'       => $this->createUrl('Autorized/updateProject'),
                    'source'    => $this->createUrl('Autorized/getStages'),
                    'title'     => 'Enter title',
                    'placement' => 'right',
                    'options' => array(
                        'disabled'=>true,
                    ),

                ));

            } ?>
        </td>
    </tr>
    <tr>
        <th>Название проекта</th>
        <td>
            <? if(isset($data[0])){
            $this->widget('editable.Editable', array(
                'type'      => 'textarea',
                'pk'        => $data[0]['id'],
                'name'      => 'NAME',
                'text'      => CHtml::encode($data[0]['NAME']),
                'url'       => $this->createUrl('Autorized/updateProject'),
                'title'     => 'Введите фамилию',
                'placement' => 'right',
                'options' => array(
                    'disabled'=>true,
                ),
            ));

            } ?>
        </td>
    </tr>
    <tr>
        <th>Количество исполнителей</th>
        <td>
            <? if(isset($data[0])){
            $this->widget('editable.Editable', array(
                'type'      => 'text',
                'pk'        => $data[0]['id'],
                'name'      => 'EXECUTERS_NUM',
                'text'      => CHtml::encode($data[0]['EXECUTERS_NUM']),
                'url'       => $this->createUrl('Autorized/updateProject'),
                'title'     => 'Введите фамилию',
                'placement' => 'right',
                'options' => array(
                    'disabled'=>true,
                ),
            ));

            } ?>
        </td>
    </tr>
    <tr>
        <th>Из них до 35 лет</th>
        <td>
            <? if(isset($data[0])){
                $this->widget('editable.Editable', array(
                    'type'      => 'text',
                    'pk'        => $data[0]['id'],
                    'name'      => 'UN_THIRTY_FIVE',
                    'text'      => CHtml::encode($data[0]['UN_THIRTY_FIVE']),
                    'url'       => $this->createUrl('Autorized/updateProject'),
                    'title'     => 'Введите фамилию',
                    'placement' => 'right',
                    'options' => array(
                        'disabled'=>true,
                    ),
                ));

            }

         ?>
        </td>
    </tr>
    <tr>
        <th>Из них обучающихся</th>
        <td>
            <?

            if(isset($data[0])){
                $this->widget('editable.Editable', array(
                    'type'      => 'text',
                    'pk'        => $data[0]['id'],
                    'name'      => 'STUDY',
                    'text'      => CHtml::encode($data[0]['STUDY']),
                    'url'       => $this->createUrl('Autorized/updateProject'),
                    'title'     => 'Введите фамилию',
                    'placement' => 'right',
                    'options' => array(
                        'disabled'=>true,
                    ),
                ));

            }  ?>
        </td>
    </tr>
    <tr>
        <th>Суммарное кол-во публикаций</th>
        <td>
            <? if(isset($data[0])){
            $this->widget('editable.Editable', array(
                'type'      => 'text',
                'pk'        => $data[0]['id'],
                'name'      => 'PUBLICATIONS',
                'text'      => CHtml::encode($data[0]['PUBLICATIONS']),
                'url'       => $this->createUrl('Autorized/updateProject'),
                'title'     => 'Введите фамилию',
                'placement' => 'right',
                'options' => array(
                    'disabled'=>true,
                ),
            ));

            } ?>
        </td>
    </tr>

    <tr>
        <th>Из них в зарубежных изданиях</th>
        <td>
            <? if(isset($data[0])){
                $this->widget('editable.Editable', array(
                    'type'      => 'text',
                    'pk'        => $data[0]['id'],
                    'name'      => 'FORIN_PUBL',
                    'text'      => CHtml::encode($data[0]['FORIN_PUBL']),
                    'url'       => $this->createUrl('Autorized/updateProject'),
                    'title'     => 'Введите фамилию',
                    'placement' => 'right',
                    'options' => array(
                        'disabled'=>true,
                    ),
                ));
            }  ?>
        </td>
    </tr>
    <tr>
        <th>Год начала</th>
        <td>
            <? if(isset($data[0])){
                $this->widget('editable.Editable', array(
                'type'      => 'combodate',
                'name'      => 'START_YEAR',
                'pk'        => $data[0]['id'],
                'text'      => CHtml::encode($data[0]['START_YEAR']),
                'url'       => $this->createUrl('Autorized/updateProject'),
//                                            'format'      => 'yyyy-mm-dd', //format in which date is expected from model and submitted to server
                'format'      => 'YYYY', //in this format date sent to server
                'viewformat'  => 'YYYY', //in this format date is displayed
                'template'    => 'YYYY', //template for dropdowns
                'combodate'   => array('minYear' => 1980, 'maxYear' => 2015),
                'options'     => array(
                    'datepicker' => array('language' => 'ru'),
                    'disabled'=>true,
                )
            ));

            } ?>
        </td>
    </tr>
    <tr>
        <th>Год окончания</th>
        <td>
            <? if(isset($data[0])){
                $this->widget('editable.Editable', array(
                    'type'      => 'combodate',
                    'name'      => 'END_YEAR',
                    'pk'        => $data[0]['id'],
                    'text'      => CHtml::encode($data[0]['END_YEAR']),
                    'url'       => $this->createUrl('Autorized/updateProject'),
//                                            'format'      => 'yyyy-mm-dd', //format in which date is expected from model and submitted to server
                    'format'      => 'YYYY', //in this format date sent to server
                    'viewformat'  => 'YYYY', //in this format date is displayed
                    'template'    => 'YYYY', //template for dropdowns
                    'combodate'   => array('minYear' => 1980, 'maxYear' => 2030),
                    'options'     => array(
                        'datepicker' => array('language' => 'ru'),
                        'disabled'=>true,
                    )
                ));
            } ?>
        </td>
    </tr>
    <tr>
        <th>Стадия развития проекта</th>
        <td>
        <? if(isset($data[0])){

            $this->widget('editable.Editable', array(
                'type'      => 'select',
                'name'      => 'ID_PHASE',
                'pk'        => $data[0]['id'],
                'text'      => CHtml::encode($data[0]['ID_PHASE']),
                'url'       => $this->createUrl('Autorized/updateProject'),
                'source'    => $this->createUrl('Autorized/getPhases'),
                'title'     => 'Enter title',
                'placement' => 'right',
                'options' => array(
                    'disabled'=>true,
                ),

            ));

        }    ?>
        </td>
    </tr>

    <tr>
        <th>Объем финансирования на период реализации</th>
        <td>
    <? if(isset($data[0])){
        $this->widget('editable.Editable', array(
            'type'      => 'select',
            'name'      => 'ID_BUDGET',
            'pk'        => $data[0]['id'],
            'text'      => CHtml::encode($data[0]['ID_BUDGET']),
            'url'       => $this->createUrl('Autorized/updateProject'),
            'source'    => $this->createUrl('Autorized/getBudget'),
            'title'     => 'Enter title',
            'placement' => 'right',
            'options' => array(
                'disabled'=>true,
            ),

        ));

    } ?>
        </td>
    </tr>
    <tr>
        <th>Объем финансирования на календарный год</th>
        <td>
        <? if(isset($data[0])){
            $this->widget('editable.Editable', array(
                'type'      => 'text',
                'pk'        => $data[0]['id'],
                'name'      => 'YEAR_BUDGET',
                'text'      => CHtml::encode($data[0]['YEAR_BUDGET']),
                'url'       => $this->createUrl('Autorized/updateProject'),
                'title'     => 'Введите фамилию',
                'placement' => 'right',
                'options' => array(
                    'disabled'=>true,
                ),
            ));

        }  ?>
        </td>
    </tr>
    <tr>
        <th>Доля предполагаемого coфинансирования</th>
        <td>
        <? if(isset($data[0])){
            $this->widget('editable.Editable', array(
                'type'      => 'text',
                'pk'        => $data[0]['id'],
                'name'      => 'CO_FINANCING',
                'text'      => CHtml::encode($data[0]['CO_FINANCING']),
                'url'       => $this->createUrl('Autorized/updateProject'),
                'title'     => 'Введите фамилию',
                'placement' => 'right',
                'options' => array(
                    'disabled'=>true,
                ),
            ));

        }  ?>
        </td>
    </tr>
    <tr>
        <th>Аннотация</th>
        <td>
        <? if(isset($data[0])){
            $this->widget('editable.Editable', array(
                'type'      => 'textarea',
                'pk'        => $data[0]['id'],
                'name'      => 'DESCR_PROJECT',
                'text'      => CHtml::encode($data[0]['DESCR_PROJECT']),
                'url'       => $this->createUrl('Autorized/updateProject'),
                'title'     => 'Введите фамилию',
                'placement' => 'right',
                'options' => array(
                    'disabled'=>true,
                ),
            ));

        }  ?>
        </td>
    </tr>

    </tbody>
    </table>
    </div>
    </div>



    <!-- модальное окно для добавления PDF -->

    <div class="modal fade" id="PDF_Modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Выберите файл с аннотацией к проекту</h4>
                </div>
                <div class="modal-body">
                    <div id="upload-wrapper">
                        <div align="center">

                            <h4>Загрузка PDF документа </br></br>
                                <small> Файл аннотации должен являться PDF документом и содержать всю необходимую информацию,
                                    которую вы можете предоставить, для непредвзятой оценки вашего проекта  экспертной группой </small></h4>
                            </br>
                            <form action="<?=Yii::app()->createUrl('Images/uploadPDF')?>" method="post" enctype="multipart/form-data" id="MyUploadForm">
                                <input name="pdf_file" id="imageInput" type="file"  />
                                <input type="submit"  id="submit-btn" value="Загрузить" class="btn btn-primary" />
                                <img src="<?=Yii::app()->baseUrl?>/images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
                            </form>
                            <div id="output"></div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="#" data-dismiss="modal" id="RebootAva"class="btn">Закрыть</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div><!--/PDF-->


    <!-- модальное окно для отображения инфы при заявке проекта -->

    <div class="modal fade" id="Pull_Modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Внимание! Вы не ввели необходимую информацию! </h4>
                </div>
                <div class="modal-body">
                    <div id="upload-wrapper">
                        <div >

                            <h4 align="center">Уважаемый пользователь!  </h4>
                                <h4><small> Если вы видителе это сообщение, значит вы попытались отправить свой проект на участие в эстафете.
                                    К сожалению, вы не заполнили некоторые поля при регистрации.</br></br>
                                    Убедительная просьба, проверьте внимательно пропущенные поля в персональной форме регистрации, и в форме регистрации проекта.
                                    Возможность заявить проект на участие предоставляется при заполнении всей информации.
                                </small></h4>

<!--                            <form action="--><?//=Yii::app()->createUrl('Images/uploadPDF')?><!--" method="post" enctype="multipart/form-data" id="MyUploadForm">-->
<!--                                <input name="pdf_file" id="imageInput" type="file"  />-->
<!--                                <input type="submit"  id="submit-btn" value="Загрузить" class="btn btn-primary" />-->
<!--                                <img src="--><?//=Yii::app()->baseUrl?><!--/images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>-->
<!--                            </form>-->
                            <div id="output"></div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a href="#" data-dismiss="modal" id="RebootAva"class="btn">Закрыть</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div><!--/PDF-->







    </div><!--/profile-->

    <script type="text/javascript">
        var Url = '<?=Yii::app()->createUrl('Autorized/checkFullInfo')?>';
    </script>


    </div>
<?
$base_url = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile( $base_url.'/assets/3160b985/js/bootstrap-datetimepicker.js', CClientScript::POS_END);
$cs->registerScriptFile($base_url.'/adminka/js/MyEditsToEditable.js', CClientScript::POS_END);
$cs->registerScriptFile($base_url.'/adminka/js/jquery.form.min.js', CClientScript::POS_END);
$cs->registerScriptFile($base_url.'/adminka/js/avatar_upload.js', CClientScript::POS_END);
?>